<?php 

   $host     = "localhost"; 
   $database = "affiliate2";
   $user     = "root";
   $password = "secret";
   
   $db  = new Db($host,$user,$password,$database);
   
   if($db->linkid=='')
   {
	 echo "Could not connect with server! .Database Connection Error";   
   	 exit;
   }
   
   $GLOBALS['DB'] = $db;
   
   $user     = "";
   $password = "";

?>
