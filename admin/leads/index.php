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
				$data['lead_by_users_id']   = $_REQUEST['lead_by_users_id'];
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
				$data['paid_amount']   = $_REQUEST['paid_amount'];
                $data['paid_status']   = $_REQUEST['paid_status'];
                $data['entry_type']   = $_REQUEST['entry_type'];
                $data['status']   = $_REQUEST['status'];
                
				
				$info['data']     =  $data;
				
				if(empty($_REQUEST['id']))
				{
					 $db->insert($info);
				}
				else
				{
					$Id            = $_REQUEST['id'];
					$info['where'] = "id=".$Id;
					
					$db->update($info);
				}
				include("leads_list.php");						   
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
					$title    = $res[0]['title'];
					$first_name    = $res[0]['first_name'];
					$last_name    = $res[0]['last_name'];
					$arrea_code    = $res[0]['arrea_code'];
					$phone_no    = $res[0]['phone_no'];
					$dob    = $res[0]['dob'];
					$address_line_1    = $res[0]['address_line_1'];
					$address_line_2    = $res[0]['address_line_2'];
					$city    = $res[0]['city'];
					$state    = $res[0]['state'];
					$zip    = $res[0]['zip'];
					$country_id    = $res[0]['country_id'];
					$created_at    = $res[0]['created_at'];
					$updated_at    = $res[0]['updated_at'];
					$paid_amount    = $res[0]['paid_amount'];
					$paid_status    = $res[0]['paid_status'];
					$entry_type    = $res[0]['entry_type'];
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
		  case 'leads_details': 
				include("leads_details.php");						   
				break; 	
		 case "select_users":
			$_SESSION['selected_users_id'] = $_REQUEST['selected_users_id'];
			Header("Location:../leads");
	       break;
		 case "process":
		        include("leads_process.php");
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
