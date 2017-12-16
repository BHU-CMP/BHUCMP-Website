<?php
include '../../../gen/config.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../../index.html");
}

?>
<?php
require_once 'dbconfig.php';
/**
 * Created by PhpStorm.
 * User: Joe_Pc
 * Date: 23/09/2017
 * Time: 10:32 PM
 */


if (isset($_GET['view_id']) && !empty($_GET['view_id'])) {
    $id = $_GET['view_id'];
    $stmt = $DB_con->prepare('SELECT * FROM login ORDER BY id =:uid DESC');
    $stmt->execute(array(':uid' => $id));
    $edit_row = $stmt->fetch(PDO::FETCH_ASSOC);
    extract($edit_row);
} else {
    echo '<script> alert("Error get user information. Please try again.")</script>';
    header("Location: index.php");
}
?>

<!DOCTYPE html >
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no"/>
    <title>Admin: View Users</title>
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <script type="text/javascript" src="../../../js/jquery-1.11.3-jquery.min.js"></script>
    <!--Do not remove this js(../../../js/jquery-1.11.3-jquery.min.js) from here, it will have some errors during signout.-->
    <style>
        .size, h2, h3, a, label {
            color: #FFFFFF;
        }
    </style>
</head>
<body style="background-size: contain; background-color: #37474f;">
<br>
<br>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../../../index.php" title="HOME">BHU-NACOSS</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                   aria-expanded="false">
                    <span class="glyphicon glyphicon-user"></span>&nbsp;Welcome Admin: <?php echo $_SESSION['admin']; ?>
                    &nbsp;<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="../../gen/logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign
                            Out</a></li>
                </ul>
            </li>
        </ul>
    </div>


</nav>
<br>
<div class="clearfix"></div>
<div class="container">

    <h3>Details of <b><?php echo $edit_row['fname'] . "&nbsp;" . $edit_row['lname']; ?></b></h3>

    <table class="table table-responsive pagination">

        <tr>
            <td><label class="control-label">Image</label></td>
            <td><label class="control-label">Email.</label></td>
            <td><label class="control-label">First Name</label></td>
            <td><label class="control-label">Last Name</label></td>
            <td><label class="control-label">Status</label></td>
            <td><label class="control-label">Gender.</label></td>
            <td><label class="control-label">Level</label></td>
        </tr>
        <tr>
            <td class="size"><img src="../../../image/<?php echo $edit_row['image']; ?>" class="img-rounded"
                                  width="250px" height="250px"/></td>
            <td class="size"><?php echo $edit_row['email']; ?></td>
            <td class="size"><?php echo $edit_row['email']; ?></td>
            <td class="size"><?php echo $edit_row['fname']; ?></td>
            <td class="size"><?php echo $edit_row['lname']; ?></td>
            <td class="size"><?php echo $edit_row['status']; ?></td>
            <td class="size"><?php echo $edit_row['level']; ?></td>
        </tr>
    </table>

    <a href="index.php" class="btn btn btn-success"> Go back</a>


    <!-- Latest compiled and minified JavaScript -->
    <script src="../../../bootstrap/js/bootstrap.min.js"></script>


</body>
</html>

