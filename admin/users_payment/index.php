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
		 case "pay_to_all":
		        //get comission
					unset($info);
					unset($data);
				$info["table"] = "commission";
				$info["fields"] = array("commission.*"); 
				$info["where"]   = "1";
				$rescommission =  $db->select($info);
				
				
				//get all users
		           unset($info);
				   unset($data);
				$info["table"] = "users";
				$info["fields"] = array("users.*"); 
				$info["where"]   = "1 AND status='active'";
				$arr =  $db->select($info);
				for($i=0;$i<count($arr);$i++)
				{
				   $first_name = $arr[$i]['first_name'];
				   $last_name = $arr[$i]['last_name'];
				   $email = $arr[$i]['email'];	
				   $users_id = $arr[$i]['id'];	
				   
				   //get all unpaid & approved leads
				      unset($info);
					  unset($data);
					$info["table"] = "leads";
					$info["fields"] = array("count(*) as total"); 
					$info["where"]   = "1 AND lead_by_users_id='".$arr[$i]['id']."'   
										  AND paid_status='nopiad'	       
										  AND status='approved'";// 
					//$info["debug"]   = true;									  
					$res =  $db->select($info);
					$total = $res[0]['total']; 
					
					$amount = $rescommission[0]['amount']*$total;
					
					if($amount==0)
					{
						continue;
					}
					
					//update leads
					  unset($info);
					  unset($data);
					$info["table"] = "leads";
					$info["fields"] = array("*"); 
					$info["where"]   = "1 AND lead_by_users_id='".$arr[$i]['id']."'   
										  AND paid_status='nopiad'	       
										  AND status='approved'";// 
					$res =  $db->select($info);
					for($j=0;$j<count($res);$j++)
					{
						$id = $res[$j]['id'];
						  unset($info);
						  unset($data);
						$info['table']    = "leads";
						$data['updated_at']   = date("Y-m-d H:i:s");						
						$data['paid_amount']   = $rescommission[0]['amount'];
						$data['paid_status']   = 'paid';
						$info['data']     =  $data;
						$info['where'] = "id=".$id;
						$db->update($info);
					}
					
					//make a transaction
					   unset($info);
					   unset($data);
					$info['table']    = "transactions";
					$data['users_id']   = $users_id;
					$data['subject']   = 'Payment for leads to '.$first_name.' '.$last_name;
					$data['description']   = 'Payment for leads to '.$first_name.' '.$last_name;
					$data['debit']   = 0;
					$data['credit']   = $amount;
					$data['refference']   = 'Payment for leads to '.$first_name.' '.$last_name;
					$data['date_time_updated']   = date("Y-m-d H:i:s");
					$info['data']     =  $data;
						 $db->insert($info);
						 
					   unset($info);
					   unset($data);
					$info['table']    = "transactions";
					$data['users_id']   = $users_id;
					$data['subject']   = 'Paid by Company  to '.$first_name.' '.$last_name;
					$data['description']   = 'Paid by Company  to '.$first_name.' '.$last_name;
					$data['debit']   = $amount;
					$data['credit']   = 0;
					$data['refference']   = 'Paid by Company  to '.$first_name.' '.$last_name;
					$data['date_time_updated']   = date("Y-m-d H:i:s");
					$info['data']     =  $data;
						 $db->insert($info);	 
					//make invoice
					// get the HTML
					ob_start();
					include(dirname(__FILE__).'/invoice.php');
					$html = ob_get_clean();
					
					$subject = 'Invoic for Affiliate'; 
					
					$body = "Dear $first_name $last_name,<br>
					$html
					
					Thanks,<br>
					hbeci Team";
					//send email
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$headers .= 'From: cartinting <info@hbeci.com>' . "\r\n";
					
					$status = mail($email, $subject, $body, $headers);
					
					$message = "Payment has been paid sucessfully";
					
				}
		        include("users_payment_list.php");		
		       break;  
		 case "lead_details":
		       include("lead_details.php");		        
		      break;  
	     default :    
		       include("users_payment_list.php");		         
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
