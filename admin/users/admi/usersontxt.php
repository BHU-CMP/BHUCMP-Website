<?php
/**
 * Created by PhpStorm.
 * User: Joe_Pc
 * Date: 18/02/2018
 * Time: 11:20
 */
// Script Online Users and Visitors - http://coursesweb.net/php-mysql/
if(!isset($_SESSION)) session_start(); // start Session, if not already started

$filetxt = 'userson.txt'; // the file in which the online users /visitors are stored
$sep = '^^'; // characters used to separate the user name and date-time
$vst_id = '-vst-'; // an identifier to know that it is a visitor, not logged user

/*
 If you have an user registration script,
 replace $_SESSION['nume'] with the variable in which the user name is stored.
 You can get a free registration script from: http://coursesweb.net/php-mysql/register-login-script-users-online_s2
*/

// the visitors IP (and add the identifier)
$uvon = $_SERVER['SERVER_ADDR']. $vst_id;

$rgxvst = '/^([0-9\.]*)'. $vst_id. '/i'; // regexp to recognize the line with visitors
$nrvst = 0; // to store the number of visitors



// check if the file from $filetxt exists and is writable
if(is_writable($filetxt)) {
    // get into an array the lines added in $filetxt
    $ar_rows = file($filetxt, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $nrrows = count($ar_rows); // number of rows

    // if there is at least one line, parse the $ar_rows array
    if($nrrows>0) {
        for($i=0; $i<$nrrows; $i++) {
            // get each line and separate the user /visitor and the timestamp
            $ar_line = explode($sep, $ar_rows[$i]);


        }
    }
}
// the HTML code with data to be displayed
$reout = '               
                 <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>'.$nrvst.'</h3>

                            <p>Unique Visitors</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>';
// write data in $filetxt


// if access from <script>, with GET 'uvon=showon', adds the string to return into a JS statement
// in this way the script can also be included in .html files
if(isset($_GET['uvon']) && $_GET['uvon']=='showon') $reout = "document.write('$reout');";

echo $reout; // output /display the result
?>
