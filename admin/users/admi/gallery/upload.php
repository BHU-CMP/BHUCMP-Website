<?php
include ("../../../gen/session.php");


$name = $conn->real_escape_string(strtoupper($_POST['txt_name']));
$description = $conn->real_escape_string(trim($_POST['txt_desc']));
$image = $conn->real_escape_string($_FILES['avatar']['name']);

$tmp_dir = $_FILES['avatar']['tmp_name'];
$imgSize = $_FILES['avatar']['size'];

$upload = "gallery/";

$imgExt = strtolower(pathinfo($image, PATHINFO_EXTENSION)); // get image extension

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

$image = rand(10,100). "." . $imgExt;

    if (in_array($imgExt, $valid_extensions)) {
        // Check file size '2MB'
        if ($imgSize < 2000000) {
            move_uploaded_file($tmp_dir,$upload . $image);




            $query= "INSERT INTO gallery (image, description, name) VALUES ('{$image}','{$description}',   '{$name}')";
            $data = mysqli_query($conn,$query);
            if ($data){
                header("location: index.php");
                echo "<script type='application/javascript'>alert('Successfully Uploaded')</script>";

                }else{

                echo "<script type='application/javascript'>alert('Error uploading file')</script>";
            }
        }
    }
?>