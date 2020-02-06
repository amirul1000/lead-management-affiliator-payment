<?php
       session_start();
       include("../common/lib.php");
	   include("../lib/class.db.php");
	   include("../common/config.php");
	   
	  if(isset($_REQUEST['ref']))
	   {
			$info["table"] = "users";
			$info["fields"] = array("users.*"); 
			$info["where"]   = "1 AND phone_no='".$_REQUEST['ref']."'";
			$arr =  $db->select($info);
			setcookie("affiliate_users_id", $arr[0]['id'], time()+3600*24*90);
	   }
	   
	   $cmd = $_REQUEST['cmd'];
	   switch($cmd)
	   {
	     
		  case 'add': 
				$info['table']    = "leads";
				$data['lead_by_users_id']   = $_COOKIE['affiliate_users_id'];
                $data['email']   = $_REQUEST['email'];
                $data['title']   = $_REQUEST['title'];
                $data['first_name']   = $_REQUEST['first_name'];
                $data['last_name']   = $_REQUEST['last_name'];
				$data['arrea_code']   = $_REQUEST['arrea_code'];
                $data['phone_no']   = $_REQUEST['phone_no'];
                $data['dob']   = $_REQUEST['dob'];
                $data['address_line_1']   = $_REQUEST['address_line_1'];
                $data['address_line_2']   = $_REQUEST['address_line_2'];
                $data['city']   = $_REQUEST['city'];
                $data['state']   = $_REQUEST['state'];
                $data['zip']   = $_REQUEST['zip'];
                $data['country_id']   = $_REQUEST['country_id'];
                if(empty($_REQUEST['id']))
				{
                	$data['created_at']   = date("Y-m-d H:i:s");
				}
				else
				{
					$data['updated_at']   = date("Y-m-d H:i:s");
				}
                //$data['user_type']   = $_REQUEST['user_type'];
                $data['status']   = 'pending';
                
				
				$info['data']     =  $data;
				
				if(empty($_REQUEST['id']))
				{
					if(duplicate($db)==false)
					{
					 $status = $db->insert($info);
					 if($status==true)
					 {
					   $message = "Data has been saved successfully";	 
					 }
					}
					else
					{
						$message = "Duplicate Phone no";	 
					}
				}
				include("leads_editor.php");						   
				break;   
		case "country":
		        $info["table"] = "country";
				$info["fields"] = array("country.*"); 
				$info["where"]   = "1   $whrstr ORDER BY country ASC";
				$arr =  $db->select($info);
				echo json_encode($arr);
		       break;	
	     default :    
		       include("leads_editor.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {	  
   $sql    = "SHOW TABLE STATUS LIKE 'leads'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 } 	
 
 function duplicate($db)
 {
	$info["table"] = "leads";
	$info["fields"] = array("leads.*"); 
	$info["where"]   = "1 AND arrea_code='".$_REQUEST['arrea_code']."' AND phone_no='".$_REQUEST['phone_no']."'";
	$arr =  $db->select($info); 
	if(count($arr)==0)
	{
		return false;
	}
	return true;
 }
?>
