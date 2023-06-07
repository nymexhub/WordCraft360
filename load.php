
<title>Word Counter & Toolkit Platform for writers</title>
<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery.textarea-expander.js"></script>
    <script type="text/javascript" src="js/js-app.js"></script>
    <script type="text/javascript" src="js/app-jquery.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css" charset="utf-8" />
    <link rel="stylesheet" href="css/stylesheet.css" type="text/css" charset="utf-8" />
    <link href='misc/favicon.gif' rel='shortcut icon' />


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




$rs2 = $link2->query($sql2);




// $rs2 = mysql_query ($sql2,$link2) or die ("<br><b>Error!. ".$sql2."</b>");

 // echo " <a href=\"javascript:history.go(-1);\">back</a> ";
 header("Location: ./index.php?id=".$qs.""); /* Redirect browser */

/* Make sure that code below does not get executed when we redirect. */
exit;
 }

?>
