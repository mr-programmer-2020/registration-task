<?php

require_once(ROOT .'/models/User.php');
 

class userController
{
    public function actionRegister()
    {
        $name = '';
        $familyName='';
        $phoneNumber='';
        $email='';
        $errors=false;
        $result=false;
        
        if(isset($_POST['submit']))
        {
            $name = $_POST['name'];
            $familyName = $_POST['familyName'];
            $phoneNumber = $_POST['phoneNumber'];
            $email = $_POST['email'];
            
            //check Name 
            if(empty($name))
            {
                $errors[] = 'name is required';
            }
            else
            {    //check name format
                if(!User::checkUserNameFormat($name))
                {
                    $errors[] = 'invalid name, the name must be only characters';
                }
                else
                {   //check name lenght
                    if(!User::checkUserNameLenght($name))
                    {
                        $errors[]="the name must be between 3 and 20 charachters ";
                    }
                
                }   
            
            }

            //check familyName 
            if(empty($familyName))
            {
                $errors[] = 'family name is required';
            }
            else
            {   //check familyName format
                if(!User::checkUserNameFormat($familyName))
                {
                    $errors[] = 'invalid family name, the familyName must be only characters';
                }
                else
                {   //check familyName lenght
                    if(!User::checkUserNameLenght($familyName))
                    {
                        $errors[]="the family name must be between 3 and 20 charachters";
                    }
                
                }   
            
            }

            //check phoneNumber 
            if(empty($phoneNumber))
            {
                $errors[]='phone number is required';
            }
            else
            {
                //check phoneNumber format 
                if(!User::checkNumberFormat($phoneNumber))
                {
                    $errors[] = 'invalid phone number, the phone number must be only numbers';
                }
                else
                {      //check phoneNumber lenght 
                    if(!User::checkNumberLenght($phoneNumber))
                    {
                        $errors[] = 'phone number must be more between 8 to 12 numbers';
                    }
                    else
                    {   //check if the number is exists
                        if(User::checkNumbeExists($phoneNumber))
                        {
                            $errors[] = 'this phone number is already exist';
                        }
                    }
                }
            }

            // check email
            if(empty($email))
            {
                $errors[] = 'email address is required';
            }
            else
            {
                //check email format
                if(!User::checkEmail($email))
                {
                    $errors[] = 'invalid email format';
                }
                else
                {
                    //check if the email is exists
                    if(User::checkEmailExists($email))
                    {
                        $errors[] = 'this email is already exists';
                    }
                }
            }
            
            //check if no errors
            if($errors == false)
            {
                
                $result = User::addUser($name,$familyName,$phoneNumber,$email);       
            } 

        }
              
        require_once('views/users/register.php');
    }
}