<?php
session_start();
include_once('../gen/config.php');

if (!isset($_SESSION['user'])) {
    header("Location: ../index.html");
}
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
    <script type="text/javascript" src="../js/jquery-1.11.3-jquery.min.js"></script>
    <link rel="stylesheet" href="../style.css" type="text/css"/>
    <title>Your Profile</title>
    <style>
        p, tr, td, h2, h3, a, label {
            color: #FFFFFF;
        }

        .size, .table {
            width: 10%;
        }
    </style>

</head>

<body style="background-size: contain; background-color: #37474f;">

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">BHUNACOSS</a>
        </div>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                   aria-expanded="false">
                    <?php
                    $query = "SELECT * FROM `login` WHERE matno='{$_SESSION['user']}'";
                    $result_array = mysqli_fetch_assoc(mysqli_query($conn, $query));
                    $actual_first_name = $result_array['fname'];
                    $actual_last_name = $result_array['lname'];

                    ?>
                    <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $actual_first_name; ?>
                    <span><?php echo $actual_last_name; ?>&nbsp;<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="home.php"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</a></li>
                    <li><a href="edit-profile.php?edit_id=<?php echo $_SESSION['user'] ?>" title="click to edit"
                           onclick="return confirm('sure you want to edit ?')"<span
                                class="glyphicon glyphicon-edit"></span>&nbsp;Edit Profile</a></li>
                    <li><a href="profile.php"><span class="glyphicon glyphicon-paperclip"></span>&nbsp;Profile</a></li>

                    <li><a href="../gen/logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign
                            Out</a></li>
                </ul>
            </li>
        </ul>


    </div><!--/.nav-collapse -->

</nav>
