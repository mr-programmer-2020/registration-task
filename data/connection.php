<?php

class Connection
{

    public static function getConnection()
    {
        try
        {
            $paramsaPath =ROOT . '/data/db_param.php';
            $param = include($paramsaPath);

            $hdb = "mysql:host={$param['host']};dbname={$param['dbname']}";
            $db = new PDO($hdb,$param['user'],$param['password']);
            $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 

            
        } catch (Exeptioin $ex)
        {
            echo 'Connection error '. $ex->getMessage();
        }
        
        return $db;
    }

}