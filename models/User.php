<?php

class User
{
    //create user
    public static function addUser($name,$familyName,$phoneNumber,$email)
    {
        $db = Connection::getConnection();
  
        $sql = 'INSERT INTO
                users
                SET
                name = :name,
                familyName = :familyName,
                phoneNumber = :phoneNumber,
                email = :email';

                
        $result = $db->prepare($sql);

        //clear data
        $name = htmlspecialchars(strip_tags($name));
        $familyName = htmlspecialchars(strip_tags($familyName));
        $phoneNumber = htmlspecialchars(strip_tags($phoneNumber));
        $email = htmlspecialchars(strip_tags($email));

        //bind data
        $result->bindParam(':name',$name,PDO::PARAM_STR);
        $result->bindParam(':familyName',$familyName,PDO::PARAM_STR);
        $result->bindParam(':phoneNumber',$phoneNumber,PDO::PARAM_INT);
        $result->bindParam(':email',$email,PDO::PARAM_STR);
        
        //execute query
        $result->execute();

        return true;
    }

    
    public static function checkUserNameFormat($name)
    {   
        return ctype_alpha($name) ? true : false;
       
    }
    
    public static function checkUserNameLenght($name)
    {
       return  strlen($name) >=3 &&
       strlen($name) <=20
        ? true : false;
    }
 
   

    public static function checkNumberFormat($number)
    {
        return ctype_digit($number) ? true : false;
    }

    public static function checkNumberLenght($number)
    {
        return strlen($number) >=8 &&
        strlen($number) <=13 ?
        true : false;
    }

    public static function checkEmail($email)
    {
        return filter_var($email,FILTER_VALIDATE_EMAIL) ? true : false;         
    }

    

    public static function checkNumbeExists($number)
    {
        $db = Connection::getConnection();
        $sql = "SELECT * FROM users where phoneNumber = :number ";
        $result = $db->prepare($sql);
        
        //clear data
        $number = htmlspecialchars(strip_tags($number));

        //bind data
        $result->bindParam(':number',$number,PDO::PARAM_INT);
        $result->execute();

        if($result->fetchColumn())
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    public static function checkEmailExists($email)
    {
        $db = Connection::getConnection(); 
        $sql = "SELECT * FROM users WHERE email = :email "; 
        $result=$db->prepare($sql);

        //clear data
        $email = htmlspecialchars(strip_tags($email));

        //bind data
        $result->bindParam(':email',$email,PDO::PARAM_STR);
        $result->execute();

        if($result->fetchColumn())
        {
            return true;
        }
        else
        {
            return false;
        }

    }

}