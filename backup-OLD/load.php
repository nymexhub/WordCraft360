<?php 

include("db.php");
	if (empty($_POST['id'])) {
	echo "You must select a work.";
	echo " <a href=\"javascript:history.go(-1);\">back</a> ";
	} elseif ($_POST['id']== true) {

	$qs = $_POST['id'];


$sql2='SELECT * 
FROM  `reg_750` 
WHERE id =  '.$qs.'
LIMIT 0 , 30';
$rs2 = mysql_query ($sql2,$link2) or die ("<br><b>Error!. ".$sql2."</b>");

 // echo " <a href=\"javascript:history.go(-1);\">back</a> ";
 header("Location: ./write.php?id=".$qs.""); /* Redirect browser */

/* Make sure that code below does not get executed when we redirect. */
exit;
}

?>
