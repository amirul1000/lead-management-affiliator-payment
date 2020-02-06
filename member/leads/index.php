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
				$info['table']    = "leads";
				$data['lead_by_users_id']   = $_SESSION['users_id'];
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
				$data['entry_type']   = 'member';
                if(empty($_REQUEST['id']))
				{
					$data['paid_status']   = 'nopiad';
                	$data['created_at']   = date("Y-m-d H:i:s");
				}
				else
				{
					$data['updated_at']   = date("Y-m-d H:i:s");
				}
                //$data['user_type']   = $_REQUEST['user_type'];
                $data['status']   = 'pending';
                //$info['debug']   = true;
				
				$info['data']     =  $data;
				
				if(empty($_REQUEST['id']))
				{
					 $status = $db->insert($info);
					 if($status==true)
					 {
					   $message = "Data has been saved successfully";	 
					 }
				}
				else
				{
					$Id            = $_REQUEST['id'];
					$info['where'] = "id=".$Id;
					
					$status = $db->update($info);
					 if($status==true)
					 {
					   $message = "Data has been updated successfully";	 
					 }
				}
				//exit;
				///send email
				//admin email
				  unset($info);
				  unset($data);
				$info['table']    = "admin_contact";
				$info['fields']   = array("*");   	   
				$info['where']    =  "1=1";
				$res  =  $db->select($info);
				$email    = $res[0]['email'];
				$email   = $email;
                
				if(empty($_REQUEST['id']))
				{
				  $subject = "A lead has been added at hbeci by ".$_SESSION['first_name'].' '.$_SESSION['last_name'];
				}
				else
				{
					$subject = "A lead has been updated at hbeci by ".$_SESSION['first_name'].' '.$_SESSION['last_name'];
				}
				
				$body = "Dear Admin,<br>
				            $subject <br>
						    Email  : ".$_REQUEST['email']."<br>
							Title : ".$_REQUEST['title']."<br>
							First name  : ".$_REQUEST['first_name']."<br>
							Last name   : ".$_REQUEST['last_name']."<br>
							Arrea code : ".$_REQUEST['arrea_code']."<br>
							Phone no  : ".$_REQUEST['phone_no']."<br>
							DOB   : ".$_REQUEST['dob']."<br>
							Address line 1   : ".$_REQUEST['address_line_1']."<br>
							Address line 2   : ".$_REQUEST['address_line_2']."<br>
							City   : ".$_REQUEST['city']."<br>
							State   : ".$_REQUEST['state']."<br>
							Zip : ".$_REQUEST['zip']."<br>
						 Thanks,<br>
						 hbeci Team";
				//send email
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= 'From: hbeci <info@hbeci.com>' . "\r\n";
					
				mail($email, $subject, $body, $headers);
				
				include("leads_editor.php");						   
				break;    
		case "edit":      
				$Id               = $_REQUEST['id'];
				if( !empty($Id ))
				{
					$info['table']    = "leads";
					$info['fields']   = array("*");   	   
					$info['where']    =  "id=".$Id;
				   
					$res  =  $db->select($info);
				   
					$Id        = $res[0]['id'];  
					$lead_by_users_id    = $res[0]['lead_by_users_id'];
					$email    = $res[0]['email'];
					$password    = $res[0]['password'];
					$title    = $res[0]['title'];
					$first_name    = $res[0]['first_name'];
					$last_name    = $res[0]['last_name'];
					$phone_no    = $res[0]['phone_no'];
					$dob    = $res[0]['dob'];
					$file_picture    = $res[0]['file_picture'];
					$arrea_code    = $res[0]['arrea_code'];
					$address_line_1    = $res[0]['address_line_1'];
					$address_line_2    = $res[0]['address_line_2'];
					$city    = $res[0]['city'];
					$state    = $res[0]['state'];
					$zip    = $res[0]['zip'];
					$country_id    = $res[0]['country_id'];
					$created_at    = $res[0]['created_at'];
					$updated_at    = $res[0]['updated_at'];
					$user_type    = $res[0]['user_type'];
					$status    = $res[0]['status'];
					
				 }
						   
				include("leads_editor.php");						  
				break;
						   
         case 'delete': 
				$Id               = $_REQUEST['id'];
				
				$info['table']    = "leads";
				$info['where']    = "id='$Id'";
				
				if($Id)
				{
					$db->delete($info);
				}
				include("leads_list.php");						   
				break; 
		case "country":
		        $info["table"] = "country";
				$info["fields"] = array("country.*"); 
				$info["where"]   = "1   $whrstr ORDER BY country ASC";
				$arr =  $db->select($info);
				echo json_encode($arr);
		       break;	
		 case "lead_details":
		        include("lead_details.php");
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
				include("leads_list.php");
				break; 
        case "search_leads":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("leads_list.php");
				break;  								   
						
	     default :    
		       include("leads_list.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {	  
   $sql    = "SHOW TABLE STATUS LIKE 'leads'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 } 	 
?>
