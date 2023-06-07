<?php
/*
By Computer Science Engineer: Felipe Alfonso Gonzalez
email: f.alfonso@res-ear.ch
(CC) All protected under GNU/GPL 
*/

// include ("../../inc/config.inc.php");

// CLIENT INFORMATION
$g        = htmlspecialchars(trim($_POST['qs']));
$f        = htmlspecialchars(trim($_POST['id2']));



//date_default_timezone_set("America/Santiago");
$fecha = date("D M j G:i:s Y");
//$fecha_t = date('l \t\h\e jS');
// $fecha = date("D M j Y"); 
include("db.php");

// , `date` = 'Friday 20 of April 2012 09:52:38 PM', `date_title` = 'Friday 20 of April 2012' 
$sql2 = 'UPDATE  `reg_750` SET  `data` ="' . $g . '", `date` = "' . $fecha . '"   WHERE  id ="' . $f . '";';
// $rs2 = mysql_query ($sql2,$link2) or die ("<br><b>Error!. ".$sql2."</b>");
//   $sql2=  = "INSERT INTO reg_750 (data, id) VALUES ('$g','$f')";
$rs2 = mysql_query($sql2, $link2) or die("<br><b>Error!. " . $sql2 . "</b>");

// echo $sql2;
// echo " <a href=\"javascript:history.go(-1);\">back</a> ";
header("Location: ./index.php?id=" . $f . ""); /* Redirect browser */

/* Make sure that code below does not get executed when we redirect. */
exit;
