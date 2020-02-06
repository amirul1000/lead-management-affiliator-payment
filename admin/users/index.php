<?php
       session_start();
       include("../../common/lib.php");
	   include("../../lib/class.db.php");
	   include("../../common/config.php");
	   
	    if(empty($_SESSION['users_id'])) 
	   {
	     Header("Location: ../login/");
	   }
	  
	   $cmd = $_REQUEST['cmd'];
	   switch($cmd)
	   {
	     
		  case 'add': 
				$info['table']    = "users";
				$data['email']   = $_REQUEST['email'];
				$password  = rand(11111,99999);
                $data['password']   = $password;
                $data['title']   = $_REQUEST['title'];
                $data['first_name']   = $_REQUEST['first_name'];
                $data['last_name']   = $_REQUEST['last_name'];
                $data['phone_no']   = $_REQUEST['phone_no'];     
				/*if(strlen($_FILES['file_picture']['name'])>0 && $_FILES['file_picture']['size']>0)
				{
					
					if(!file_exists("../../users_images"))
					{ 
					   mkdir("../../users_images",0755);	
					}
					if(empty($_REQUEST['id']))
					{
					  $file=getMaxId($db)."_".str_replace(" ","_",strtolower(trim($_FILES['file_picture']['name'])));
					}
					else
					{
					  $file=trim($_REQUEST['id'])."_".str_replace(" ","_",strtolower(trim($_FILES['file_picture']['name'])));
					}
					$filePath="../../users_images/".$file;
					move_uploaded_file($_FILES['file_picture']['tmp_name'],$filePath);
					$data['file_picture']="users_images/".trim($file);
				}*/
				
				$_SESSION['file_picture_tmp_name'] = base64_decode($_SESSION['file_picture_tmp_name']);
				if(strlen($_SESSION['file_picture_name'])>0)
				{
					if(!file_exists("../../users_images"))
					{ 
					   mkdir("../../users_images",0755);	
					}
					if(empty($_REQUEST['id']))
					{
					  $file=getMaxId($db)."_".str_replace(" ","_",strtolower(trim($_SESSION['file_picture_name'])));
					}
					else
					{
					  $file=trim($_REQUEST['id'])."_".str_replace(" ","_",strtolower(trim($_SESSION['file_picture_name'])));
					}
					$filePath="../../users_images/".$file;
					//move_uploaded_file($_SESSION['file_picture_tmp_name'],$filePath);
					$fp=fopen($filePath,"w");
					
					fwrite($fp,$_SESSION['file_picture_tmp_name']);
					
					$data['file_picture']="users_images/".trim($file);
					
					unset($_SESSION['file_picture_tmp_name']);
					unset($_SESSION['file_picture_name']);
				}
                $data['company']   = $_REQUEST['company'];
                $data['address']   = $_REQUEST['address'];
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
				$data['user_type']   = 'affiliate';
                $data['status']   = 'active';
                
				$info['data']     =  $data;
				
				if(empty($_REQUEST['id']))
				{
					 $status = $db->insert($info);
					 if($status ==true)
					 {
						 $message = "User has been created successfully";
					 }
				}
				else
				{
					$Id            = $_REQUEST['id'];
					$info['where'] = "id=".$Id;
					
					$status = $db->update($info);
					 if($status ==true)
					 {
						 $message = "User has been updated successfully";
					 }
				}
				
				///send email
				$email   = $_REQUEST['email'];
                $password   = $password;
                $first_name  = $_REQUEST['first_name'];
                $last_name   = $_REQUEST['last_name'];
				$subject = "You are now a member at hbeci";
				
				$body = "Dear $first_name $last_name,<br>
						Your Login information at http://www.hbeci.com/member/ is like below:<br> 
						 Email:$email<br> 
						 password:$password<br><br>
						 
						 Thanks,<br>
						 hbeci Team";
				//send email
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= 'From: hbeci <info@hbeci.com>' . "\r\n";
					
				mail($_REQUEST["email"], $subject, $body, $headers);
				
				include("users_editor.php");						   
				break;    
		case "edit":      
				$Id               = $_REQUEST['id'];
				if( !empty($Id ))
				{
					$info['table']    = "users";
					$info['fields']   = array("*");   	   
					$info['where']    =  "id=".$Id;
				   
					$res  =  $db->select($info);
				   
					$Id        = $res[0]['id'];  
					$email    = $res[0]['email'];
					$password    = $res[0]['password'];
					$title    = $res[0]['title'];
					$first_name    = $res[0]['first_name'];
					$last_name    = $res[0]['last_name'];
					$phone_no    = $res[0]['phone_no'];
					$file_picture    = $res[0]['file_picture'];
					$company    = $res[0]['company'];
					$address    = $res[0]['address'];
					$city    = $res[0]['city'];
					$state    = $res[0]['state'];
					$zip    = $res[0]['zip'];
					$country_id    = $res[0]['country_id'];
					$created_at    = $res[0]['created_at'];
					$updated_at    = $res[0]['updated_at'];
					$user_type    = $res[0]['user_type'];
					$status    = $res[0]['status'];
					
				 }
						   
				include("users_editor.php");						  
				break;
						   
         case 'delete': 
				$Id               = $_REQUEST['id'];
				
				$info['table']    = "users";
				$info['where']    = "id='$Id'";
				
				if($Id)
				{
					$db->delete($info);
				}
				include("users_list.php");						   
				break; 
		 case "country":
		        $info["table"] = "country";
				$info["fields"] = array("country.*"); 
				$info["where"]   = "1   $whrstr ORDER BY country ASC";
				$arr =  $db->select($info);
				echo json_encode($arr);
		       break;
		case "user_details":
		      include("users_details.php");
		      break;
		case "users_tester_phone":		      
		      include("users_tester_phone.php");
		      break;
		case "add_users_tester_phone":
		        $info['table']    = "users";
				$data['valid_invalid_tester_phone']   = $_REQUEST['valid_invalid_tester_phone'];
				$info['data']     =  $data;
				$Id            = $_REQUEST['id'];
				$info['where'] = "id=".$Id;
				
				$status = $db->update($info);
				 if($status ==true)
				 {
					$message = "Phone has been updated successfully";
				 }
			
		      include("users_tester_phone.php");
		     break;	
		case "delete_valid_invalid_tester_phone":
		        $info['table']    = "users";
				$data['valid_invalid_tester_phone']   = "";
				$info['data']     =  $data;
				$Id            = $_REQUEST['id'];
				$info['where'] = "id=".$Id;
				
				$status = $db->update($info);
				 if($status ==true)
				 {
					$message = "Phone has been deleted successfully";
				 }
			  include("users_tester_phone.php");
		     break;	 	  	   						   
         case "list" :    	 
			  if(!empty($_REQUEST['page'])&&$_SESSION["search"]=="yes")
				{
				  $_SESSION["search"]="yes";
				}
				else
				{
				   $_SESSION["search"]="no";
					unset($_SESSION["search"]);
					unset($_SESSION['field_name']);
					unset($_SESSION["field_value"]); 
				}
				include("users_list.php");
				break; 
        case "search_users":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("users_list.php");
				break;  								   
						
	     default :    
		       include("users_list.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {	  
   $sql    = "SHOW TABLE STATUS LIKE 'users'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 } 	 
?>
