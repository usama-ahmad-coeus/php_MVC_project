<?php

class LoginController
{
    function LoginController()
    {
        //constructor
    }

    function create($usename, $password, $email)
    {
        //create user in database
    }

    function login($username, $password)
    {
        //check against database ,does login
        if ($this->authenticate($username, $password)) {
            //start the session for the user
            session_Start();
            //instantiate the UserModel object
            $user = new UserModel($username);
            //set the user object to session
            $_SESSION['user'] = $username;
            $r = $_SESSION['user'];
            //echo $r;die();
            //we suppose that we authenticate the user
            return true;
        } else {
            return false;
        }
    }

    static function authenticate($name, $pass)
    {
        $authenticate = false;
        //check against db
        $db = Database::getInstance();
        $mysqli = $db->getConnection();
        if (!$mysqli) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            $sql = "select * from Users";
            $result = mysqli_query($mysqli, $sql);
            while ($row = mysqli_fetch_array($result)) {
                $name_n = $row['name'];
                $password_p = $row['password'];
                if ($name == $name_n && $pass == $password_p) {
                    $authenticate = true;
                }
            }
            mysqli_close($mysqli);
            return $authenticate;
        }
    }

    function logout()
    {
        //does logout
        session_start();
        session_destroy();
    }
}

?>