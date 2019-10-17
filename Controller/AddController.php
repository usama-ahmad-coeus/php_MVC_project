<?php

class AddController
{

    function AddController()
    {
        //constructor
    }

    function  create($usename, $password, $email)
    {
        //create user in database
    }

    function add($email, $name, $department, $salary, $password, $boss, $designation, $file, $date)
    {
        //$user = new AddModel($name);
        //check against database ,does login
        if($this->authenticateAdd($email, $name, $department, $salary, $password, $boss, $designation, $file, $date)) {
            return true;
        } else {
            return false;
        }
    }

    function editAdd($id, $email, $name, $department, $salary, $password, $boss, $designation, $image, $timein, $timeout)
    {
        //$user = new AddModel($name);
        //check against database ,does login
        if($this->authenticateEditAdd($id, $email, $name, $department, $salary, $password, $boss, $designation, $image, $timein, $timeout)) {
            return true;
        } else {
            return false;
        }
    }

    static function authenticateAdd($email, $name, $department, $salary, $password1, $boss, $designation, $file, $date)
    {
        $n = $name;
        $em = $email;
        $dep = $department;
        $sal = $salary;
        $pas = $password1;
        $boss = $boss;
        $dest = $designation;
        $file = $file;
        $date = $date;
        $authenticating = false;
        //check against db
        $db = Database::getInstance();
        $mysqli = $db->getConnection();
        // Check connection
        if (!$mysqli) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            //echo "usama";die();
            $sql = "insert into Users(email,name ,department,salary,password,image,boss,destination,timein,timeout,date) values('$em','$n' ,'$dep' ,'$sal' ,'$pas','$file','$boss','$dest',0,0,'$date')";
            mysqli_query($mysqli, $sql);
            $authenticating = true;
            mysqli_close($mysqli);
        }
        return $authenticating;
    }

    static function authenticateEditAdd($id, $email, $name, $department, $salary, $password, $boss, $designation, $image, $timein, $timeout)
    {
        $id=$id;
        $n = $name;
        $em = $email;
        $dep = $department;
        $sal = $salary;
        $pas = $password;
        $bos = $boss;
        $dest = $designation;
        $timein = $timein;
        $timeout = $timeout;
        $file = $image;
        $authenticating = false;
        //check against db
        $db = Database::getInstance();
        $mysqli = $db->getConnection();
        if (!$mysqli) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            //echo "usama";die();
            $sql = "update  Users
            set email='$em',
            name='$n' ,
            department='$dep',
            salary='$sal',
            password='$pas',
            image='$file',
            boss='$bos',
            destination='$dest',
            timein='$timein',
            timeout='$timeout'
            where id ='$id'";
            mysqli_query($mysqli, $sql);
            $authenticating = true;
            mysqli_close($mysqli);
        }
        return $authenticating;
    }

}

?>