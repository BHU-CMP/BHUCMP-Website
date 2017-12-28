<?php
/**
 * Created by PhpStorm.
 * User: Joe_PC
 * Date: 09/12/2017
 * Time: 12:09 PM
 */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'nacoss');
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
// show errors (remove this line if on a live site)
mysqli_report(MYSQLI_REPORT_ERROR);
if ($conn) {

} else {
    echo "Unsuccessful";
}