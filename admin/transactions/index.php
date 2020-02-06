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
				$info['table']    = "transactions";
				$data['users_id']   = $_REQUEST['users_id'];
                $data['subject']   = $_REQUEST['subject'];
                $data['description']   = $_REQUEST['description'];
                $data['debit']   = $_REQUEST['debit'];
                $data['credit']   = $_REQUEST['credit'];
                $data['refference']   = $_REQUEST['refference'];
				if(empty($_REQUEST['id']))
				{
                	$data['date_time_created']   = date("Y-m-d H:i:s");
				}
				else
				{
                	$data['date_time_updated']   = date("Y-m-d H:i:s");
				}
				
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
				
				include("transactions_list.php");						   
				break;    
		case "edit":      
				$Id               = $_REQUEST['id'];
				if( !empty($Id ))
				{
					$info['table']    = "transactions";
					$info['fields']   = array("*");   	   
					$info['where']    =  "id=".$Id;
				   
					$res  =  $db->select($info);
				   
					$Id        = $res[0]['id'];  
					$users_id    = $res[0]['users_id'];
					$subject    = $res[0]['subject'];
					$description    = $res[0]['description'];
					$debit    = $res[0]['debit'];
					$credit    = $res[0]['credit'];
					$refference    = $res[0]['refference'];
					$date_time_created    = $res[0]['date_time_created'];
					$date_time_updated    = $res[0]['date_time_updated'];
					
				 }
						   
				include("transactions_editor.php");						  
				break;
						   
         case 'delete': 
				$Id               = $_REQUEST['id'];
				
				$info['table']    = "transactions";
				$info['where']    = "id='$Id'";
				
				if($Id)
				{
					$db->delete($info);
				}
				include("transactions_list.php");						   
				break; 
		  case 'transactions_details': 
				include("transactions_details.php");						   
				break; 	
		 case "select_users":
			$_SESSION['selected_users_id'] = $_REQUEST['selected_users_id'];
			Header("Location:../transactions");
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
				include("transactions_list.php");
				break; 
        case "search_transactions":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("transactions_list.php");
				break;  								   
						
	     default :    
		       include("transactions_list.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {	  
   $sql    = "SHOW TABLE STATUS LIKE 'transactions'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 } 	 
?>
