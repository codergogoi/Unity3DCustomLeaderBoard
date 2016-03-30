<?php
    
    $getData = false;
    
    var $host = 'localhost'; // hostname
    var $db_uid = 'ecintera_lbuser'; // DB user ID
    var $db_pwd = '1IJPBacuYBb35OTV'; // DB password
    var $db_name = 'my_newgame'; // DB name

 	 
    $con=mysqli_connect(this->host,this->db_uid,this->db_pwd,this->db_name);
    
    $ucountry =  $_GET['country'];
				
	if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
				
  
    $result = mysqli_query($con,"select name,score,country from international_players where country='$ucountry' order By score DESC");
    
    $jsonResponse = array("national" => array());
    $counter = 0;
    
    while($row = mysqli_fetch_array($result))
    {
						  $getData = true;
						  $jsonRow = array(
                                           
                                           "name"=> $row['name'],
                                           "country"=> $row['country'],
                                           "score"=> $row['score']
                                           
                                           
                                           );
						  
						  array_push($jsonResponse["national"], $jsonRow);
						  
        
    }
    
    if($getData){
						  
        echo json_encode($jsonResponse);
						  
    }else{
        
        echo 404;
        
    }
    
    
    
    mysqli_close($db);
    
    
    ?>