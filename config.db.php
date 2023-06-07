<?php 
/*
By Computer Science Engineer: Felipe Alfonso Gonzalez
email: f.alfonso@res-ear.ch
(CC) All protected under GNU/GPL 

********************

Load the .sql file generated in the folder: 'SQL-Latest-Updated'

********************
*/

/* ------
$link1 = mysql_connect ("localhost", "root", "")
        or die ("No se puede conectar a MySQL ");

mysql_select_db ("750") ;


$link2 = mysql_connect ("localhost", "root", "")
        or die ("No se puede conectar a MySQL ");

mysql_select_db ("750") ;
*/



    $user="root";
    $db_passwd="";
    $db="750W";
    $host="localhost";
    
    $link1 = 
    mysqli_connect($host,$user,$db_passwd,$db);
   /*
    if(!$link1)
    {
        echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
    }
    else
    {
        echo "<h3>Conexion Exitosa PHP - MySQL</h3><hr><br>";
    }
*/ 
    #

    
    $link2 = 
    mysqli_connect($host,$user,$db_passwd,$db);
   
   /* 
    if(!$link2)
    {
        echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
    }
    else
    {
        echo "<h3>Conexion Exitosa PHP - MySQL</h3><hr><br>";
    }
*/
?>