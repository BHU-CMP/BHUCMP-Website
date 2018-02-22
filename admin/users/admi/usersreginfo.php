<?php
/**
 * Created by PhpStorm.
 * User: Joe_Pc
 * Date: 18/02/2018
 * Time: 11:37
 */
$query= "Select * FROM login";
$complete = mysqli_query($conn,$query);
$fed = mysqli_num_rows($complete);
echo $fed;

?>