<?
/*
Program for writers developed by Felipe Alfonso Gonzalez
email: f.alfonso.go@gmail.com
(CC) All protected under a licence creative commons
*/

if(isset($_POST['SAVE'])){
    die('SAVE= ' . $_POST['SAVE']);
}

include('db.php');
// $qs_res=$_POST['qs'];
// $df=$_GET['id'];

//$sql1="select * from data where note like '%$qs%'  or note like '%$qs%+%$qs%' or pre_note like '%$qs%' or pre_note like '%$qs%+%$qs%'";
$sql1="SELECT * FROM `reg_750`";
#ejecuto la query
$rs1 = mysql_query ($sql1,$link1) or die ('<br><b>Error!.</b>');
?>
<html>
<head>

<title>Word Counter & Toolkit Platform for writers</title>
<script src="jquery-1.7.2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="jquery.textarea-expander.js"></script>
<script type="text/javascript" src="js2.js"></script>
<script type="text/javascript" src="app-jquery.js"></script>
<link rel="stylesheet" href="style2.css" type="text/css" charset="utf-8" />
<link rel="stylesheet" href="stylesheet.css" type="text/css" charset="utf-8" />
<link href='favicon.gif' rel='shortcut icon' />

</head>
<body>
<left>
  <div class="control">

<!-- <img src="writer.jpg" alt="Writer - Beta" height="auto" width="auto" />-->

<form method="POST" action="load.php"><select name="id">
<option value="">Select date</option>
<?php while ($row = mysql_fetch_array ($rs1)) {
        $id            = $row[0] ;
        $data          = $row[1] ;
		$info          = $row[2] ;
        $date          = $row["date"] ;
		// date_title
		$date_t          = $row["date_title"] ;
		 ?>
		
		 <option value="<? echo $id; ?>"><? echo $date_t; ?></option>
		 <? } ?>
		 </select><input type="submit" id="button2"  value="LOAD" /></form>
	
		 <?php 
		 if (empty($_GET['id'])) {
	 echo "You must select a date or add a new page.";
	 ?>
	 <form method="POST" action="newpage.php">
	<input type="submit" id="button"  value="NEW PAGE" />
</form>
<PRE>
	 
		 INSTRUCTIONS:
		 -Create a new page
		 -Select the last date created in the list and LOAD it!
</PRE>
<?
	} else {
	?><br><form method="POST" idd="submit" action="save.php"><?
 
		 $r = $_GET["id"];
		 $sql2="SELECT * FROM `reg_750` where id='".$r."'";
#ejecuto la query
$rs2 = mysql_query ($sql2,$link1) or die ('<br><b>Error!.</b>');
//  echo $sql2;
		 while ($row2 = mysql_fetch_array ($rs2)) {
        $id2            = $row2[0] ;
        $data2          = $row2[1] ;
		$info2          = $row2[2] ;
		$last_update    = $row2["date"] ;
		$date_t2          = $row2["date_title"] ;
		 ?>
				 <h1><? /* echo date('l \t\h\e jS, Y');*/ echo $date_t2; ?></h1>
		<div class="1">
		<textarea class="expand" style=" margin-bottom: 25px; resize:none; scrollHeight: yes;  border: 1px solid #ffffff; outline: none; overflow-x: hidden; overflow-y: hidden;" onKeyUp="wordcounter(this);"  onFocus="wordcounter(this); " rows="70" cols="150" style="width:300px; height:10px" wrap="virtual" name="qs" id="qs"><? if (empty($data2)) { echo"Write here ..."; } else {  ?><?php echo $data2; ?><? } ?></textarea>
		<input type="hidden" name="id2" id="id2" value="<? echo $id2; ?>">
</div><div class="2">
		<!-- <input type="submit" id="button" value="SAVE" /> --> <div class="font">CTRL + S on your keyboard to save the words.</div>
		<p><b><span id="counted"></span></b> <div class="font">Last update: <? echo $last_update; ?><div class="success" style="display: none;" class="font">Data has been added.</div></div>
				</form></div></div>

		<? }
		?>

<?
 } ?>


</left>


</body>
</html>