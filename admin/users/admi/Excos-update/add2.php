<?php

include ("../../../gen/session.php");

    $excos_title = $conn->real_escape_string(strtoupper($_POST['excos_title']));
    $excos_name = $conn->real_escape_string(trim($_POST['excos_name']));
    $excos_image = $conn->real_escape_string($_FILES['avatar']['name']);

    $tmp_dir = $_FILES['avatar']['tmp_name'];
    $imgSize = $_FILES['avatar']['size'];

    $upload = "excosimages/";

    $imgExt = strtolower(pathinfo($excos_image, PATHINFO_EXTENSION)); // get image extension

    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

    $excos_image = rand(10, 100) . "." . $imgExt;

    if (in_array($imgExt, $valid_extensions)) {
// Check file size '2MB'
        if ($imgSize < 2000000) {
            move_uploaded_file($tmp_dir, $upload . $excos_image);


            $query = "INSERT INTO excos(excos_name, excos_image, excos_title) VALUES ('{$excos_name}','{$excos_image}','{$excos_title}')";
            $data = mysqli_query($conn, $query);
            if ($data) {
                header("location: index.php");
                echo "<script type='application/javascript'>alert('Successfully Uploaded')</script>";
            } else {
                echo "<script type='application/javascript'>alert('Error uploading file')</script>";
            }
        }
    }
?>
