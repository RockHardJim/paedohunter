<?php
defined('VIEW_FILES') || die('Direct access not allowed');
/**
* Secure login/registration user class.
*/
define('_SESSION_SALT', $_SERVER['HTTP_HOST']);
define('_SESSION_NAME', preg_replace('#[^a-z0-9]#i', '', $_SERVER['HTTP_HOST']));
define('_SESSION_DIR', str_replace('.', '_', $_SERVER['HTTP_HOST']) . '_sessiondata');

class User{
    /** @var string error msg */
    private $msg;
    /** @var int number of permitted wrong login attemps */
    private $permitedAttemps = 3;
	    /**
     * @var object $db_connection The database connection
     */
    private $db_connection = null;
	
    private $_secure_word = 'PAED0SH!tS0n_';

    private $_use_user_agent = true;
    
    private $_ip_block_length = 4;
	
    private $_algorithm;
   
    private $_cookie_name = 'paedosnacks';
    
    private $_cookie_expiration_days = 30;
	
	    private function _make_uniquekey()
    {
        $uniquekey = $this->_secure_word;
        if( $this->_use_user_agent )
            $uniquekey .= $_SERVER['HTTP_USER_AGENT'];
        
        // Compile and dissect the user's IP address
        $uniquekey .= implode('.', array_slice(explode('.', $_SERVER['REMOTE_ADDR']), 0, $this->_ip_block_length));
        
        // Fallback to sha1 or md5 if hash() function doesn't exist
        if($this->_algorithm === null)
            return function_exists('sha1') ? sha1($uniquekey) : md5($uniquekey);
        
        return hash($this->_algorithm, $uniquekey);
    }
	
	
	    private function _regenerate_session_id()
    {
        // I *think* if the parameter is null or false, the session info (such as session filename)
        // can be stored in the database and then restored on successful login.
        session_regenerate_id(true); // Requires PHP => 5.1
    }
	
 function __construct($DB_con)
 {
  $this->db = $DB_con;
 }
    
    private function _set_session_uniquekey()
    {
        $this->_regenerate_session_id();
        $_SESSION['_UniqueKey'] = $this->_make_uniquekey();
    }
	
    private function _session_setup()
    {
        if(!isset($_SESSION))
        {
            $dir_path = ini_get("session.save_path") . DIRECTORY_SEPARATOR . _SESSION_DIR;
            if(!is_dir($dir_path)) mkdir($dir_path);
            
            if( ini_get('session.use_trans_sid') == true) {
                ini_set('url_rewriter.tags'     , '');
                ini_set('session.use_trans_sid' , false);
            }
            
            $lifetime = 60 * 60 * 24 * $this->_cookie_expiration_days;
            ini_set('session.gc_maxlifetime'  , $lifetime);
            ini_set('session.gc_divisor'      , '1');
            ini_set('session.gc_probability'  , '1');
            ini_set('session.cookie_lifetime' , '0');
            ini_set('session.save_path', $dir_path);
            session_name(_SESSION_NAME);
            session_start();
        }
        $this->_algorithm = function_exists('hash') && in_array('sha256', hash_algos()) ? 'sha256' : null;
    }

	    protected function validate_uniquekey()
    {
        $this->_regenerate_session_id();
        
        if(isset($_SESSION['_UniqueKey']))
            return $_SESSION['_UniqueKey'] === $this->_make_uniquekey();
        
        if(DEBUG) echo '_UniqueKey is not set!';
        return false;
    }
    
	public function user_logout()
    {
        $this->_destroy();
    }
	
    private function _destroy()
    {
        if(isset($_SESSION)) $_SESSION = array();
        if(isset($_COOKIE[session_name()])) setcookie(session_name(), '', time() -40000);
        @session_destroy();
        return;
    }
	
	protected function set_session($id,$username,$role)
    {
        $this->_set_session_uniquekey();
        
        $_SESSION['id']       = $values[$id];
        $_SESSION['username']  = htmlspecialchars($values[$username]);
        $_SESSION['role']  = htmlspecialchars($values[$role]);
		$_SESSION['logged_in'] = true;
        
        return true;
    }
	
    public function login($username,$password){
            $stmt =	$DB_con->prepare('SELECT id, username, password, role FROM users WHERE username = ? and confirmed = 1 limit 1');
            $stmt->execute([$username]);
            $user = $stmt->fetch();

            if(password_verify($password,$user['password'])){
                if($user['wrong_logins'] <= $this->permitedAttemps){
                      
                $id = $user['id'];
                $username = $user['username'];
                $role = $user['role'];
                    
				return $this->set_session($id,$username,$role);
                
				}else{
                    $this->msg = 'This user account is blocked, please contact our support department.';
                    return false;
                }
            }else{
                $this->registerWrongLoginAttemp($username);
                $this->msg = 'Invalid login information or the account is not activated.';
                return false;
            } 
    }

    /**
    * Register a new user account function
    * @return boolean of success.
    */
    public function registration($username,$name,$surname,$email,$password,$referral){
		$name = $sparklock->encrypt($name);
		$surname = $sparklock->encrypt($surname);
		$email = $sparklock->encrypt($email);
		$referral = $sparklock->encrypt($referral);
		
        if($this->checkEmail($email)){
            $this->msg = 'This email is already taken.';
            return false;
        }
		

        $password = $this->hashPass($password);
        $confCode = $this->hashPass(date('Y-m-d H:i:s').$sparklock->encrypt($email));
		$id = password_hash($sparklock->decrypt($email),  PASSWORD_DEFAULT, array('cost' => "2"));
		
        $stmt = $DB_con->prepare('INSERT INTO users (id, username, name, surname, email, password, confirm_code, referral) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
        if($stmt->execute([$id,$username,$name,$surname,$email,$password,$confCode,$referral])){
            if($this->sendConfirmationEmail($sparklock->decrypt($email))){
                return true;
            }else{
                $this->msg = 'Unable to send confirmation code.';
                return false; 
            }
        }else{
            $this->msg = 'User creation failed';
            return false;
        }
    }
	
	

    /**
    * Email the confirmation code function
    * @param string $email User email.
    * @return boolean of success.
    */
    private function sendConfirmationEmail($email){
        $stmt = $DB_con->prepare('SELECT confirm_code FROM users WHERE email = ? limit 1');
        $stmt->execute([$sparklock->decrypt($email)]);
        $code = $stmt->fetch();

        $subject = 'Confirm your paedohunter registration';
        $message = 'Please confirm you registration by pasting this code in the confirmation box: '.$code['confirm_code'];
        $headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: PaedoHunter<web@paedohunter.cf>' . "\r\n";

        if(mail($email, $subject, $message, $headers)){
            return true;
        }else{
            return false;
        }
    }

    /**
    * Activate a login by a confirmation code and login function
    * @param string $email User email.
    * @param string $confCode Confirmation code.
    * @return boolean of success.
    */
    public function emailActivation($username,$confCode){
        $stmt = $DB_con->prepare('UPDATE users SET confirmed = 1 WHERE username = ? and confirm_code = ?');
        $stmt->execute([$username,$confCode]);
        if($stmt->rowCount()>0){
            $stmt =	$pdo->prepare('SELECT id, username, password, role FROM users WHERE username = ? and confirmed = 1 limit 1');
            $stmt->execute([$username]);
            $user = $stmt->fetch();

            if(password_verify($password,$user['password'])){
                if($user['wrong_logins'] <= $this->permitedAttemps){
                      
                $id = $user['id'];
                $username = $user['username'];
                $role = $user['role'];
                    
				return $this->set_session($id,$username,$role);
	            return true;
            }else{
            	$this->msg = 'Account activation was not successful.';
            	return false;
            }            
        }else{
            $this->msg = 'Account activation was not successful.';
            return false;
        }
    }
	}

    /**
    * Password change function
    * @param int $id User id.
    * @param string $pass New password.
    * @return boolean of success.
    */
    public function passwordChange($id,$pass){
        if(isset($id) && isset($pass)){
            $stmt = $DB_con->prepare('UPDATE users SET password = ? WHERE id = ?');
            if($stmt->execute([$id,$this->hashPass($pass)])){
                return true;
            }else{
                $this->msg = 'Password change failed.';
                return false;
            }
        }else{
            $this->msg = 'Provide an ID and a password.';
            return false;
        }
    }


    /**
    * Assign a role function
    * @param int $id User id.
    * @param int $role User role.
    * @return boolean of success.
    */
    public function assignRole($id,$referral){
	$ref_code = $referral;
            $stmt = $DB_con->prepare('SELECT ref_code FROM admin where ref_code = ?');
            $stmt->execute([$ref_code]);
            if($stmt->rowCount() > 0){
			$role = 2;
            $stmt = $DB_con->prepare('UPDATE users SET role = ? WHERE id = ?');
			if($stmt->execute([$id,$role])){
            return true;
            }else{
                $this->msg = 'Failed to give moderator privileges.';
                return false;
            }
			}
				else	{
				$role = 1;
				$stmt = $DB_con->prepare('UPDATE users SET role = ? WHERE id = ?');
				$stmt->execute([$id,$role]);
                $this->msg = 'You have been assigned crowd role.';
                return true;
            }
            $this->msg = 'Your roles have been successfully allocated.';
            return false;
    }


    /**
    * Check if email is already used function
    * @param string $email User email.
    * @return boolean of success.
    */
    private function checkEmail($email){
        $stmt = $DB_con->prepare('SELECT id FROM users WHERE email = ? limit 1');
        $stmt->execute([$sparklock->decrypt($email)]);
        if($stmt->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }


    /**
    * Register a wrong login attemp function
    * @param string $email User email.
    * @return void.
    */
    private function registerWrongLoginAttemp($username){
        $stmt = $DB_con->prepare('UPDATE users SET login_attempts = login_attempts + 1 WHERE username = ?');
        $stmt->execute([$username]);
    }

    /**
    * Password hash function
    * @param string $password User password.
    * @return string $password Hashed password.
    */
    private function hashPass($password){
        return password_hash($password, PASSWORD_DEFAULT);
    }

    /**
    * Print error msg function
    * @return void.
    */
    public function printMsg(){
        print $this->msg;
    }

}
