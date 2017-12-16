<?php
/**
 * Created by PhpStorm.
 * User: Joe_PC
 * Date: 12/12/2017
 * Time: 1:15 PM
 */

include_once('header.php');
$query = "SELECT * FROM login WHERE matno='{$_SESSION['user']}'";
$info = mysqli_query($conn, $query);
$result_array = mysqli_fetch_assoc($info);
$image = $result_array['image'];


if (isset($_POST['save_update'])) {
    $new_image = $conn->real_escape_string($_FILES['user_image']['name']);

    $tmp_dir = $_FILES['user_image']['tmp_name'];
    $imgSize = $_FILES['user_image']['size'];

    if ($image) {
        $upload_dir = '../image/'; // upload directory
        $imgExt = strtolower(pathinfo($new_image, PATHINFO_EXTENSION)); // get image extension
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
        $new_image = rand(1000, 1000000) . "." . $imgExt;
        if (in_array($imgExt, $valid_extensions)) {
            if ($imgSize < 5000000) {
                unlink($upload_dir . $image);
                move_uploaded_file($tmp_dir, $upload_dir . $new_image);
            } else {
                $errMSG = "Sorry, your file is too large it should be less then 5MB";
            }
        } else {
            $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }
    } else {
        // if no image selected the old image remain as it is.
        $userpic = $image; // old image from database
    }
    if (!isset($errMSG)) {
        $quer1 = "UPDATE login SET image =$new_image WHERE matno='{$_SESSION['user']}'";
        $execute = mysqli_query($conn, $quer1);

        if ($execute) {
            echo "<script type='application/javascript'>alert('Successfully Updated!!!')</script>";
            header("location: ../index.php");
        }
    }
}

?>

<!Doctype html>
<html>
<head>
    <title>Edit Profile</title>
</head>
<br><br><br><br><br>

<div class="clearfix"></div>
<body>

<div class="container-fluid">

    <p><img src="../image/<?php echo $image; ?>" height="150" width="150"/>
        <input class="input-group" type="file" name="user_image" accept="image/*"/></p>
    <button type="submit" class="btn btn-success" name="save_update">
        Update
    </button>
</div>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
