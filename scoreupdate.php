<?php
   
    // variable needed on connect the database
    var $host = 'localhost'; // hostname
    var $db_uid = 'ecintera_lbuser'; // DB user ID
    var $db_pwd = '1IJPBacuYBb35OTV'; // DB password
    var $db_name = 'my_newgame'; // DB name
    
    // connection function using mysql
    $db = mysql_connect(this->host, this->db_uid, this->db_pwd) or die('Could not connect: ' . mysql_error());
    mysql_select_db(this->db_name) or die('Could not select database');
    
    
    $uid = mysql_real_escape_string($_GET['id'], $db);
    $score = mysql_real_escape_string($_GET['score'], $db);
   
    $query = "UPDATE international_players set score='$score' WHERE uid='$uid'";
        
    $result = mysql_query($query) or die('Query failed: ' . mysql_error());
   
    
?>