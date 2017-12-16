<?php
include '../../../gen/config.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../../index.html");
}

?>

<?php

require_once 'dbconfig.php';

if (isset($_GET['delete_id'])) {
    // select image from db to delete
    $stmt_select = $DB_con->prepare('SELECT image FROM login WHERE id =:uid ');
    $stmt_select->execute(array(':uid' => $_GET['delete_id']));
    $imgRow = $stmt_select->fetch(PDO::FETCH_ASSOC);
    unlink("../../../image/" . $imgRow['avatar']);
    // it will delete an actual record from db
    $stmt_delete = $DB_con->prepare('DELETE FROM login WHERE id =:uid ');
    $stmt_delete->bindParam(':uid', $_GET['delete_id']);
    $stmt_delete->execute();

    header("Location: index.php");
}
include "dbconfig.php";
?>
<!DOCTYPE html >
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1"/>
    <title>Admin: Users Home</title>
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap-theme.min.css">
    <!--Do not remove this js(../../../js/jquery-1.11.3-jquery.min.js) from here, it will have some errors during signout.-->
    <script src="../../../js/jquery-1.11.3-jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <style type="text/css" media="screen">
        #container {
            min-height: 1000px;
        }

        .page-header, h2, h3, a, label, .text-info, td {
            color: #FFFFFF;
        }
    </style>
    <style>

    </style>
    <!--Update page bootstrap-->
    <!-- Owl-Carousel -->
    <link href="../../../css/custom.css" rel="stylesheet">
    <link href="../../../css/owl.carousel.css" rel="stylesheet">
    <link href="../../../css/owl.theme.css" rel="stylesheet">


    <!-- Magnific Popup core CSS file -->
    <link rel="stylesheet" href="../../../css/magnific-popup.css">


    <!--endif-->
</head>


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
        <p></p>
        <form id="live-search" action="search.js" method="post">
            <fieldset>
                <input title="Search" type="text" class="form-control" placeholder="Search" value=""/>
            </fieldset>
        </form>
    </div>


</nav>
<br>
<br>
<br>

<br>
<div class="clearfix"></div>
<body style="background-size: contain; background-color: #37474f;">
<div class="container">

    <div class="page-header">
        <h1 class="h2">All members. / <a class="btn btn-default" href="addnew.php"> <span
                        class="glyphicon glyphicon-plus"></span> &nbsp; add new </a></h1>

    </div>


    <div class="row">
        <?php

        $stmt = $DB_con->prepare('SELECT * FROM login  ORDER BY id DESC');
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                ?>
                <table class="table table-responsive table-bordered  pagination">
                    <tr>
                        <td>Matric Number</td>
                        <td>Email</td>
                        <td>Level</td>
                    </tr>
                    <tr><?php
                        echo '<tr>';
                        echo '<td class="text-info"><b>' . $row['matno'] . '</b></td>';
                        echo '<td class="text-info"><b>' . $row['email'] . '</b></td>';
                        echo '<td class="text-info"><b>' . $row['level'] . '</b></td>';
                        echo '<td><a class="btn btn-success" href="editform.php?edit_id=' . $row['id'] . '" title="Click here to Update"><span class="glyphicon glyphicon-edit"></span>&nbsp;Update</a></td>';
                        echo '<td><a class="btn btn-danger" href="?delete_id=' . $row['id'] . '" title="Click to delete" onclick="return confirm(\' Are you sure you want to delete ?\')"><span class="glyphicon glyphicon-trash"></span>&nbsp;Delete</a></td>';
                        echo '<td><a class="btn btn-danger" href="view.php?view_id=' . $row['id'] . '" title="Click to view"><span class="glyphicon glyphicon-eye-"></span>&nbsp;View</a></td>';
                        ?>

                </table>
                <?php
            }//forgot to put search query
        } else {
            ?>
            <div class="col-xs-12">
                <div class="alert alert-warning">
                    <span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
                </div>
            </div>
            <?php
        }

        ?>
    </div>

</div>


<!-- Latest compiled and minified JavaScript -->

<script src="../../../js/jquery-1.10.2.js"></script>
<script src="../../../js/bootstrap.js"></script>

</body>
</html>