

<title>Word Counter & Toolkit Platform for writers</title>
<script src="jquery-1.7.2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="jquery.textarea-expander.js"></script>
<script type="text/javascript" src="js2.js"></script>
<script type="text/javascript" src="app-jquery.js"></script>
<link rel="stylesheet" href="style2.css" type="text/css" charset="utf-8" />
<link rel="stylesheet" href="stylesheet.css" type="text/css" charset="utf-8" />
<link href='favicon.gif' rel='shortcut icon' />


<?php 

include("db.php");



/// echo $_POST["id56"];
		
		//  echo $row[0] ;
		// if ($id == $_POST["id56"])  {
		
		 // echo " <a href=\"javascript:history.go(-1);\">Back!</a>  (You can't delete a page added before.)";
		// } else {
//date_default_timezone_set("America/Santiago");
//$fecha = localtime(); 
$id = $_POST["id56"];
$fecha = date('l j \of F Y h:i:s A');
$fecha_t = date('l F \t\h\e jS, Y');
//$sql2='UPDATE  `reg_750` SET  `data` ="'.$g.'", `date` ="'.$fecha.'", `date_title` = "'$fecha_t'" WHERE  `reg_750`.`id` ="'.$f.'";';
// $sql2="DELETE INTO `reg_750` (`id`, `data`, `work_name`, `date`, `activo`, `date_title`) VALUES (NULL,'', '', '".$fecha."', '', '".$fecha_t."');";

$sql2="DELETE FROM reg_750 WHERE `id` = ".$id." order by id desc;";

$rs2 = mysql_query ($sql2,$link2) or die ("<br><b>Error!. ".$sql2."</b>");

 // echo " <a href=\"javascript:history.go(-1);\">back</a> ";
 header("Location: ./index.php"); /* Redirect browser */

/* Make sure that code below does not get executed when we redirect. */
 exit;

// }



?>
