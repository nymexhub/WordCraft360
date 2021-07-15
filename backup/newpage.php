<?php 
include("db.php");
if ($_SERVER['REQUEST_METHOD']=="POST"){ 
/*
if (empty($_POST['qs']) OR empty($_POST['id2'])) {
	echo "You must select a work.";
	echo " <a href=\"javascript:history.go(-1);\">back</a> ";
	} elseif ($_POST['qs']== true && $_POST['id2']== true) {
	$g = $_POST['qs'];
	$f = $_POST['id2'];
	*/

//$fecha = localtime(); 
$fecha = date('l j \of F Y h:i:s A');
$fecha_t = date('l F \t\h\e jS, Y');
//$sql2='UPDATE  `reg_750` SET  `data` ="'.$g.'", `date` ="'.$fecha.'", `date_title` = "'$fecha_t'" WHERE  `reg_750`.`id` ="'.$f.'";';
$sql2="INSERT INTO `reg_750` (`id`, `data`, `work_name`, `date`, `activo`, `date_title`) VALUES (NULL,'', '', '".$fecha."', '', '".$fecha_t."');";
$rs2 = mysql_query ($sql2,$link2) or die ("<br><b>Error!. ".$sql2."</b>");

 // echo " <a href=\"javascript:history.go(-1);\">back</a> ";
 header("Location: ./write.php"); /* Redirect browser */

/* Make sure that code below does not get executed when we redirect. */
exit;
// }
}

?>
