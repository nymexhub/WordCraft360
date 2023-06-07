<title>Word Counter & Toolkit Platform for writers</title>
<script src="../js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/jquery.textarea-expander.js"></script>
<script type="text/javascript" src="../js/js-app.js"></script>
<script type="text/javascript" src="../js/app-jquery.js"></script>
<link rel="stylesheet" href="../css/style.css" type="text/css" charset="utf-8" />
<link rel="stylesheet" href="../css/stylesheet.css" type="text/css" charset="utf-8" />
<link href='../misc/favicon.gif' rel='shortcut icon' />

<?php
/*
By Computer Science Engineer: Felipe Alfonso Gonzalez
email: f.alfonso@res-ear.ch
(CC) All protected under GNU/GPL 
*/

include("../config.db.php");


/// echo $_POST["id56"];

//  echo $row[0] ;
// if ($id == $_POST["id56"])  {

// echo " <a href=\"javascript:history.go(-1);\">Back!</a>  (You can't delete a page added before.)";
// } else {
//date_default_timezone_set("America/Santiago");
//$fecha = localtime(); 

$id = $_POST["id56"];
echo $id;
$fecha = date('l j \of F Y h:i:s A');
$fecha_t = date('l F \t\h\e jS, Y');

//$sql2='UPDATE  `reg_750` SET  `data` ="'.$g.'", `date` ="'.$fecha.'", `date_title` = "'$fecha_t'" WHERE  `reg_750`.`id` ="'.$f.'";';
// $sql2="DELETE INTO `reg_750` (`id`, `data`, `work_name`, `date`, `activo`, `date_title`) VALUES (NULL,'', '', '".$fecha."', '', '".$fecha_t."');";

echo "<br>";

$sql2 = "DELETE FROM `reg_750` WHERE `id` = " . $id;

$rs2 = $link2->query($sql2);
if (!$rs2) {
    die("<br><b>Error!. " . $link2->error . "</b>");
}


// echo " <a href=\"javascript:history.go(-1);\">back</a> ";
header("Location: ../index.php"); /* Redirect browser */
exit;
?>