<?php

/*
By Computer Science Engineer: Felipe Alfonso Gonzalez
email: f.alfonso@res-ear.ch
(CC) All protected under GNU/GPL 
*/


if (empty($_POST['qs']) || empty($_POST['id2'])) {
    echo "You must select a work.";
    echo " <a href=\"javascript:history.go(-1);\">back</a> ";
} elseif ($_POST['qs'] && $_POST['id2']) {
    $g = $_POST['qs'];
    $f = $_POST['id2'];

    $fecha = date("D M j G:i:s Y");
    include("db.php");

    $sql2 = 'UPDATE  `reg_750` SET  `data` ="' . $g . '"  WHERE  `reg_750`.`id` ="' . $f . '";';
    $rs2 = $link2->query($sql2) or die ("<br><b>Error!. " . $link2->error . "</b>");

    // echo $sql2;
    // echo " <a href=\"javascript:history.go(-1);\">back</a> ";
    header("Location: ./write.php?id=" . $f . ""); /* Redirect browser */

    /* Make sure that code below does not get executed when we redirect. */
    exit;
}
?>
