<?php 

Class Validate
{
    public static function ValidatePassword($password)
    {
        return strlen($_POST['password']) < 20 && strlen($_POST['password']) > 6;
    }
    public static  function ValidateEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
    public static  function ValidateEmptySpace($field)
    {
        return empty($field);
    }
    public static function ValidateChar($password)
    {
        return preg_match("/[^a-zA-Z0-9]+/", $password);
    }

    public static function validateNum($password)
    {
        return preg_match("#[0-9]+#", $password);
    }
    public static function validateAlphabets($password)
    {
        return preg_match("#[A-Za-z]+#", $password);
    }
    
}

$validate = new Validate();


