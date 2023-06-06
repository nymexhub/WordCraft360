<?php 
/*
By Computer Science Engineer: Felipe Alfonso Gonzalez
email: f.alfonso@res-ear.ch
(CC) All protected under GNU/GPL 
******************************************************
MySQL-DB: felipe
Login: felipe

*/

/* -------------- local host -----------------
$link1 = mysql_connect ("localhost", "root", "")
        or die ("No se puede conectar a MySQL ");

mysql_select_db ("750") ;

//

	$link2 = mysql_connect ("localhost", "root", "")
        or die ("No se puede conectar a MySQL ");

mysql_select_db ("750") ;
*/
// ---------------- NNP ------------------------

// $link1 = mysql_connect ("localhost", "root", "")
// mysqli_connect("localhost","root","")
//




#$link1 = mysql_connect("localhost", "root", "")
#        or die ("No se puede conectar a MySQL ");

#mysql_select_db ("750W") ;

//

#$link2 = mysql_connect("localhost", "root", "")
#        or die ("No se puede conectar a MySQL ");

#mysql_select_db ("750W") ;


    $cons_usuario="root";
    $cons_contra="fafarafa";
    $cons_base_datos="750W";
    $cons_equipo="localhost";
    
    $link1 = 
    mysqli_connect($cons_equipo,$cons_usuario,$cons_contra,$cons_base_datos);
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
    #
    #

    
    $link2 = 
    mysqli_connect($cons_equipo,$cons_usuario,$cons_contra,$cons_base_datos);
   
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
