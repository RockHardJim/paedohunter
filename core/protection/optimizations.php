<?php
defined('VIEW_FILES') || die('Direct access not allowed');
   
    function htmlcompress($buffer)
    {
        $search  = array(
            '/\>[^\S ]+/s', // Strip whitespaces after tags, except space
            '/[^\S ]+\</s', // Strip whitespaces before tags, except space
            '/(\s)+/s' // Shorten multiple whitespace sequences
        );
        $replace = array(
            '>',
            '<',
            '\\1'
        );
        $buffer  = preg_replace($search, $replace, $buffer);
        $buffer  = preg_replace('/<!--(.|\s)*?-->/', '', $buffer);
        return $buffer;
    }
    ob_start("htmlcompress");
?>