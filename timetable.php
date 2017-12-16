<?php
/**
 * Created by PhpStorm.
 * User: Joe_PC
 * Date: 15/12/2017
 * Time: 10:46 PM
 */
include "gen/config.php";
$query = "SELECT * FROM timetable";
$result_array = mysqli_fetch_assoc(mysqli_query($conn, $query));
$actual_image_name = $result_array['image'];

?>