<?php

class AddTimeController
{
    function AddTimeController()
    {
        //constructor
    }

    function addInTime($sign_in_time,$name_pers_time)
    {
        //$user = new AddModel($name);
        //check against database ,does login
        if ($this->authenticateAddTimeIn($sign_in_time,$name_pers_time)) {
            return true;
        } else {
            return false;
        }
    }

    function addOutTime($sign_out_time,$name_pers_time)
    {
        //$user = new AddModel($name);
        //check against database ,does login
        if ($this->authenticateAddTimeOut($sign_out_time,$name_pers_time)) {
            return true;
        } else {
            return false;
        }
    }

    static function authenticateAddTimeIn($sign_in_time,$name_pers_time)
    {
        $name = $name_pers_time;
        $authenticating = false;
        //check against db
        $db = Database::getInstance();
        $mysqli = $db->getConnection();
        // Check connection
        if (!$mysqli) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            //echo "usama";die();
            $sql = "update Users set timein='$sign_in_time' where  name='$name'";
            mysqli_query($mysqli, $sql);
            $authenticating = true;
            mysqli_close($mysqli);
        }
        return $authenticating;
    }

    static function authenticateAddTimeOut($sign_out_time,$name_pers_time)
    {
       $name = $name_pers_time;
        $authenticating = false;
        $db = Database::getInstance();
        $mysqli = $db->getConnection();

        // Check connection
        if (!$mysqli) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            //echo "usama";die();
            $sql = "update Users set timeout='$sign_out_time' where  name='$name'";
            mysqli_query($mysqli, $sql);
            $authenticating = true;
            mysqli_close($mysqli);
        }
        return $authenticating;
    }

    function checkLoginorNot() {
         $name = $_SESSION['variable'];
         $authenticating = false;
         $servername = "localhost";
         $usernamedb = "root";
         $password = "coeus123";
         $dbname = "php_medium_level_MVC";

          // Create connection
         $conn = mysqli_connect($servername, $usernamedb, $password, $dbname);

          // Check connection
          if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
          } else {
              //echo "usama";die();
              $sql = "select timein from Users where name='$name'";
              $results = mysqli_query($conn, $sql);
              $values = mysqli_fetch_assoc($results);
              $num_rows = $values['timein'];
           if($num_rows != 0) {
               $authenticating = true;
               mysqli_close($conn);
           } else {
               $message = "First login then logout";
                header("Location:dashboard.php?Message=" . urlencode($message));
           }
          }
     return $authenticating;
    }
}

?>