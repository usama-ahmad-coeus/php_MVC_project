<?php

//we want to redirect the user to te main  if he is already logged in
session_start();
if(!isset($_SESSION['user'])) {
    $user=$_SESSION['user'];
    header("Location:login.php");
}

?>

<?php if (isset($_GET["Message"])): ?>

    <script type="text/javascript">
        alert("<?php echo htmlentities(urldecode($_GET["Message"])); ?>");
    </script>

<?php endif; ?>

<?php

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
    $sql = "select count(*) from 'Users' group by 'name' having destination='CEO'";
    $result = mysqli_query($conn, $sql);
    $values = mysqli_fetch_assoc($result);
    mysqli_close($conn);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Dashboard</title>
    <!-- datapicker-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="dashboard.php">DashBoard</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a  data-toggle="modal" data-target="#attendence">Mark Attendence</a></li>
                <?php   if(isset($_SESSION['designation'] )) { ?>

                    <?php if($_SESSION['designation'] == 'Admin' || $_SESSION['designation'] =='Hr') { ?>

                        <li><a href="addedit.php">ADD Employees</a></li>

                        <?php } ?>

                <?php } ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li style=" background-color:#ff6666 "><a data-toggle="tooltip" data-placement="bottom" title="Name" href="#">Welcome,<?php echo $_SESSION['user'] ;    ?></a></li>
                <li style=" background-color:#ff6666 "><a data-toggle="tooltip" data-placement="bottom" title="Designation" href="#"><?php echo $_SESSION['designation'] ;    ?></a></li>
                <li><a href="../index.php?op=logout" style="color: white;background-color:crimson">Logout</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard <small>Manage Your Site</small></h1>
            </div>

        </div>
    </div>
</header>

<section id="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="active">Dashboard</li>
        </ol>
    </div>
</section>

<section id="main">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="addedit.php" class="list-group-item active main-color-bg">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
                    </a>
                    <a href="../pages.html" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Pages <span class="badge">12</span></a>
                    <a href="../posts.html" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Posts <span class="badge">33</span></a>
                    <a href="../users.html" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users <span class="badge">203</span></a>
                </div>

                <div class="well">
                    <h4>Disk Space Used</h4>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                            60%
                        </div>
                    </div>
                    <h4>Bandwidth Used </h4>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
                            40%
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <!-- Website Overview -->
                <div class="panel panel-default">
                    <div class="panel-heading main-color-bg">
                        <h3 class="panel-title">Website Overview</h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-3">
                            <div class="well dash-box">
                                <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                </h2>
                                <h4>CEO's</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="well dash-box">
                                <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 12</h2>
                                <h4>DEvelopers</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="well dash-box">
                                <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 33</h2>
                                <h4>Project Manager</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="well dash-box">
                                <h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> 12,334</h2>
                                <h4>Incharge Manager</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Latest Users -->
            </div>
        </div>
    </div>
</section>
<br><br><br><br><br><br><br><br><br><br><br>
<footer id="footer">
    <p>Copyright AdminStrap, &copy; 2017</p>
</footer>

<!-- Modals -->
<!-- Add Attendence -->
<div class="modal fade" id="attendence" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:dodgerblue;color:black;text-align: center;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">LogIn Form</h4>
                <!-- Show error message if the controller sets err=1 in the url query string -->
                <?php if($_GET['err'] == 1) { ?>

                    <div class ="error-text">Login Incorrect. Please try again</div>

                <?php } ?>
            </div>
            <form  name="form" method="post" enctype="multipart/form-data" action="../index.php">
                <div class="container">
                    <div class="form-group">
                        <label>Time In:</label>
                        <input name ="timepicker" id="timepicker" width="276" />
                        <p>Please select SignedIn time</p>
                        <script>
                            $('#timepicker').timepicker();
                            $('#timepicker').attr('readonly', 'readonly');
                        </script>
                        <br>
                        <br>
                        <label>Time Out:</label>
                        <input id="timepicker1" name="timepicker1" width="276"  />
                        <p>Please select SignedOut time</p>
                        <script>
                            $('#timepicker1').timepicker();
                            $("#timepicker1").attr('readonly', 'readonly');
                        </script>
                    </div>
                 </div>
                 <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit"  name="op"  value="add_time" class="btn btn-primary">
                 </div>
            </form>
        </div>
    </div>
    </div>
</div>
<script>

</script>
<!-- Add Page -->
<div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:dodgerblue;color:black;text-align: center;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">LogIn Form</h4>
                <!-- Show error message if the controller sets err=1 in the url query string -->
                <?php if($_GET['err'] == 1) { ?>

                    <div class ="error-text">Login Incorrect. Please try again</div>

                <?php } ?>
            </div>
            <div class="modal-body">
                <form name="form" method="post" enctype="multipart/form-data" action="../index.php">

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name1" class="form-control"  placeholder="Name...">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email1" class="form-control"  placeholder="Email...">
                    </div>
                    <div class="form-group">
                        <label>Department</label>
                        <input type="text" name="department1" class="form-control"  placeholder="Department...">
                    </div>
                    <div class="form-group">
                        <label>Salary</label>
                        <input type="text" name="salary1" class="form-control"  placeholder="Salary">
                    </div>
                    <div class="form-group">
                        <label>Passsword</label>
                        <input type="text" name="password1" class="form-control"  placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Your Boss</label>
                        <select class="form-control" name="boss" id="exampleFormControlSelect1">
                            <option value="CEO">CEO</option>
                            <option value="Incharge Manager">Incharge Manager</option>
                            <option value="Project Manager">Project Manager</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Your Designation</label>
                        <select class="form-control" name="designation" id="exampleFormControlSelect1">
                            <option value="CEO">CEO</option>
                            <option value="Incharge Manager">Incharge Manager</option>
                            <option value="Developer">Developer</option>
                            <option value="Project Manager">Project Manager</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit"  name="op"  value="add" class="btn btn-primary">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
