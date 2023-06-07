<?php
/*
By Computer Science Engineer: Felipe Alfonso Gonzalez
email: f.alfonso@res-ear.ch
(CC) All protected under GNU/GPL 
*/

if (isset($_POST['SAVE'])) {
    die('SAVE= ' . $_POST['SAVE']);
}

include('db.php');

$sql1 = "SELECT * FROM reg_750";
$rs1 = $link1->query($sql1);

?>

<html>
<head>
    <title>Word Counter & Toolkit Platform for writers</title>
    <script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery.textarea-expander.js"></script>
    <script type="text/javascript" src="js/js-app.js"></script>
    <script type="text/javascript" src="js/app-jquery.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css" charset="utf-8" />
    <link rel="stylesheet" href="css/stylesheet.css" type="text/css" charset="utf-8" />
    <link href='misc/favicon.gif' rel='shortcut icon' />
</head>
<body>
    <left>
        <?php
        if (($_SERVER['PHP_AUTH_USER'] != 'admin') || ($_SERVER['PHP_AUTH_PW'] != 'admin')) {
            header('WWW-Authenticate: Basic Realm=”Admin Access”');
            header('HTTP/1.0 401 Unauthorized');
            print('You must provide the proper credentials!');
            exit;
        }
        ?>
        <div class="control" id="control">
            <img src="images/writer.jpg" alt="Writer - Beta" height="auto" width="auto" /><br>
            >>>>>>>>>>>>>>>>>>>>>>>>>>>>
            <div class="font"><a href="index.php">Start</a></div>
            <form method="POST" action="load.php">
                <select name="id">
                    <option value="">Select date</option>
                    <?php
                    while ($row = $rs1->fetch_array()) {
                        $id = $row[0];
                        $date_t = $row["date_title"];
                        ?>
                        <option value="<?php echo $id; ?>"><?php echo $date_t; ?></option>
                    <?php } ?>
                </select>
                <input type="submit" id="button2" value="LOAD" />
            </form>
            <?php
            if (empty($_GET['id'])) {
                echo "You must select a date or add a new page.";
                ?>
<form method="POST" action="newpage.php">
    <?php
    $sql1 = "SELECT * FROM `reg_750` ORDER BY id DESC";
    $rs1 = $link1->query($sql1);
    $row55 = $rs1->fetch_array();
    $id55 = isset($row55[0]) ? $row55[0] : '';
    ?>
    <input type="hidden" name="id55" id="id55" value="<?php echo $id55; ?>">
    <input type="submit" id="button" value="NEW PAGE" />
</form>
<form method="POST" action="delpage.php">
    <?php
    $id56 = isset($row55[0]) ? $row55[0] : '';
    ?>
    <input type="hidden" name="id56" id="id56" value="<?php echo $id56; ?>">
    <input type="submit" id="button" value="DELETE PAGE" />
</form>


                <PRE>
                    INSTRUCTIONS:
                    -Create a new page
                    -Select the last date created in the list and LOAD it!
                </PRE>
            <?php
            } else {
                ?><br><form method="POST" idd="submit" action="save.php"><?php
                    $r = $_GET["id"];
                    $sql2 = "SELECT * FROM `reg_750` where id='" . $r . "'";
                    $rs2 = $link1->query($sql2);
                    while ($row2 = $rs2->fetch_array()) {
                        $id2 = $row2[0];
                        $data2 = $row2[1];
                        $last_update = $row2["date"];
                        $date_t2 = $row2["date_title"];
                        ?>
                        <h1><?php /* echo date('l \t\h\e jS, Y'); */
                        echo $date_t2; ?></h1>
                        <div class="1">
                            <textarea class="expand" style=" margin-bottom: 25px; resize:none; scrollHeight: yes;  border: 1px solid #ffffff; outline: none; overflow-x: hidden; overflow-y: hidden;" onkeyup="wordcounter(this); saveData(this);" onfocus="wordcounter(this);" rows="70" cols="150" style="width:300px; height:10px" wrap="virtual" name="qs" id="qs"><?php if (empty($data2)) {echo "Write here ...";} else { ?><?php echo $data2; ?><?php } ?></textarea>
                            <input type="hidden" name="id2" id="id2" value="<?php echo $id2; ?>">
                        </div>
                        <div class="2">
                            <!-- <input type="submit" id="button" value="SAVE" /> --> <div class="font">CTRL + S on your keyboard to save the words. Although is also saved, automatically.</div>
                            <p><b><span id="counted"></span></b> <div class="font">Last update: <?php echo $last_update; ?><div class="success" style="display: none;" class="font">Data has been added.</div></div>
                        </div>
                    </form>
                </div>
            </div>

            <?php
            }
            ?>

            <?php

        } ?>

    </left>

    <script>
        function saveData(textarea) {
            var data = textarea.value;
            var id = document.getElementById("id2").value;

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "save.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    console.log("Data saved successfully.");
                }
            };
            xhr.send("qs=" + encodeURIComponent(data) + "&id2=" + encodeURIComponent(id));
        }
    </script>

</body>
</html>
