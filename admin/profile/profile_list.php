<?php
 include("../template/header.php");
?>
 <div class="portlet box blue">
           <div class="portlet-title">
                <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","Profile"))?></b>
                </div>
                <div class="tools">
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                </div>
            </div>             
            
						<div class="portlet-body">
				      <div class="table-responsive">	
				          <table class="table">
						 <?php
								
								$whrstr .= "AND id='".$_SESSION['users_id']."'";
						 
								$info["table"] = "users";
								$info["fields"] = array("users.*"); 
								$info["where"]   = "1   $whrstr";
								$arr =  $db->select($info);
								for($i=0;$i<count($arr);$i++)
								{
								
						 ?>
                               <tr><td>Email</td><td><?=$arr[$i]['email']?></td></tr>
                               <tr><td>Title</td><td><?=$arr[$i]['title']?></td></tr>
                               <tr><td>First Name</td><td><?=$arr[$i]['first_name']?></td></tr>
                               <tr><td>Last name</td><td><?=$arr[$i]['last_name']?></td></tr>
                               <tr><td>Picture</td><td> <?php
								    if(is_file('../../'.$arr[0]['file_picture'])&&file_exists('../../'.$arr[0]['file_picture']))
									{
								 ?>
                                  <img src="../../<?=$arr[0]['file_picture']?>" style="width:100px;height:100px;">
                                  <?php
									}
								  ?>	</td></tr>
                               <tr><td>Address</td><td><?=$arr[$i]['address']?></td></tr>
                               <tr><td>City</td><td><?=$arr[$i]['city']?></td></tr>
                               <tr><td>State</td><td><?=$arr[$i]['state']?></td></tr>
                               <tr><td>Zip</td><td><?=$arr[$i]['zip']?></td></tr>
                               <tr><td>Country</td><td>
								<?php
                                    unset($info2);        
                                    $info2['table']    = country;	
                                    $info2['fields']   = array("country");	   	   
                                    $info2['where']    =  "1 AND id='".$arr[$i]['country_id']."' LIMIT 0,1";
                                    $res2  =  $db->select($info2);
                                    echo $res2[0]['country'];	
                                ?>
                              </td></tr>
                               <tr><td>Created at</td><td><?=$arr[$i]['created_at']?></td></tr>
                               <tr><td>Updated at</td><td><?=$arr[$i]['updated_at']?></td></tr>
                               <tr><td>User type</td><td><?=$arr[$i]['user_type']?></td></tr>
                               <tr><td>Status</td><td><?=$arr[$i]['status']?></td></tr>
                              
							  <tr><td>Action</td><td nowrap >
								  <a href="index.php?cmd=edit&id=<?=$arr[0]['id']?>"  class="btn default btn-xs purple"><i class="fa fa-edit"></i>Edit</a>
								  <!--<a href="index.php?cmd=delete&id=<?=$arr[0]['id']?>" class="btn btn-sm red filter-cancel"  onClick=" return confirm('Are you sure to delete this item ?');"><i class="fa fa-times"></i>Delete</a> -->
							 </td></tr>
						     <?php
								}
						     ?> 		
						</table>
						</div>
					 </div>				
				
		</div>
<?php
include("../template/footer.php");
?>









