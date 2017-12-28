<?php
/**
 * Created by PhpStorm.
 * User: Joe_PC
 * Date: 27/12/2017
 * Time: 3:51 PM
 */

// connect to the database
include "../../../gen/session.php";

// confirm that the 'id' variable has been set
if (isset($_GET['id']) && is_numeric($_GET['id']))
{
// get the 'id' variable from the URL
    $id = $_GET['id'];

// delete record from database
    if ($stmt = $conn->prepare("DELETE FROM login WHERE id = ? LIMIT 1"))
    {
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->close();
    }
    else
    {
        echo "ERROR: could not prepare SQL statement.";
    }
    $conn->close();

// redirect user after delete is successful
    header("Location: index.php");
}
else
// if the 'id' variable isn't set, redirect the user
{
    header("Location: index.php");
}

?>