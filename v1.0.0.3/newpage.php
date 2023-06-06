<?php 
include("db.php");


 $r = $_POST["id55"];


// if ($_SERVER['REQUEST_METHOD']=="POST"){
$sql1="SELECT * FROM `reg_750` order by id desc";
#ejecuto la query
$rs1 = mysql_query ($sql1,$link1) or die ('<br><b>Error!.</b>');

$row = mysql_fetch_array ($rs1);
 
        $i            = $row[0] ;
        $data          = $row[1] ;
		$info          = $row[2] ;
        $date          = $row["date"] ;
		// date_title
		$date_t          = $row["date_title"] ;
		
		// echo $r;
		 // echo $row[0] ;
	
		



/*
if (empty($_POST['qs']) OR empty($_POST['id2'])) {
	echo "You must select a work.";
	echo " <a href=\"javascript:history.go(-1);\">back</a> ";
	} elseif ($_POST['qs']== true && $_POST['id2']== true) {
	$g = $_POST['qs'];
	$f = $_POST['id2'];
	*/
//date_default_timezone_set("America/Santiago");
//$fecha = localtime(); 

$fecha = date('l j \of F Y h:i:s A');
$fecha_t = date('l F \t\h\e jS, Y');
//$sql2='UPDATE  `reg_750` SET  `data` ="'.$g.'", `date` ="'.$fecha.'", `date_title` = "'$fecha_t'" WHERE  `reg_750`.`id` ="'.$f.'";';
$sql2="INSERT INTO `reg_750` (`id`, `data`, `work_name`, `date`, `activo`, `date_title`) VALUES (NULL,'', '', '".$fecha."', '', '".$fecha_t."');";
$rs2 = mysql_query ($sql2,$link2) or die ("<br><b>Error!. ".$sql2."</b>");

 // echo " <a href=\"javascript:history.go(-1);\">back</a> ";
  header("Location: ./index.php"); /* Redirect browser */

/* Make sure that code below does not get executed when we redirect. */
// 
exit;

    


// }
 
?>
