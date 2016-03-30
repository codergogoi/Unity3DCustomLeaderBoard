<?php
    
    // variable needed on connect the database
    var $host = 'localhost'; // hostname
    var $db_uid = 'ecintera_lbuser'; // DB user ID
    var $db_pwd = '1IJPBacuYBb35OTV'; // DB password
    var $db_name = 'my_newgame'; // DB name
   
    // connection function using mysql
    $db = mysql_connect(this->host, this->db_uid, this->db_pwd) or die('Could not connect: ' . mysql_error());
    mysql_select_db(this->db_name) or die('Could not select database');
    
    // Strings must be escaped to prevent SQL injection attack.
    $name = mysql_real_escape_string($_GET['name'], $db);
    $country = mysql_real_escape_string($_GET['country'], $db);
    $uid = mysql_real_escape_string($_GET['uid'], $db);
    $score = mysql_real_escape_string($_GET['score'], $db);
    $date = date('Y-m-d H:i:s');
    $hash = $_GET['hash'];
    
    $secretKey="ecicustomleaderboard"; // assign this on unity3d when you call this API
    
    $real_hash = md5($name . $score . $secretKey);
    if($real_hash == $hash) {
        
        // mysql insert query
        $query = "insert into international_players values (NULL, '$uid','$name','$country','$score',NULL);";
         echo $query;
        $result = mysql_query($query) or die('Query failed: ' . mysql_error());
       
    }
   
?>