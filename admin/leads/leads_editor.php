<?php
 include("../template/header.php");
?>
<script language="javascript" src="leads.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<link rel="stylesheet" href="../../datepicker/jquery-ui.css">
<script src="../../datepicker/jquery-1.10.2.js"></script>
<script src="../../datepicker/jquery-ui.js"></script>


<a href="index.php?cmd=list" class="btn green"><i class="fa fa-arrow-circle-left"></i> List</a> <br><br>
  <div class="portlet box blue">
      <div class="portlet-title">
          <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","leads"))?></b>
          </div>
          <div class="tools">
              <a href="javascript:;" class="reload"></a>
              <a href="javascript:;" class="remove"></a>
          </div>
      </div>
	   <div class="portlet-body">
		         <div class="table-responsive">	
	                <table class="table">
							 <tr>
                                  <td>  
    
                                     <form name="frm_leads" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
                                      <div class="portlet-body">
                                     <div class="table-responsive">	
                                        <table class="table">
                                             <tr>
                                 <td>Lead By Users</td>
                                 <td><?php
                                    $info['table']    = "users";
                                    $info['fields']   = array("*");   	   
                                    $info['where']    =  "1=1 ORDER BY first_name,last_name DESC";
                                    $resusers  =  $db->select($info);
                                ?>
                                <select  name="lead_by_users_id" id="lead_by_users_id"   class="form-control-static">
                                    <option value="">--Select--</option>
                                    <?php
                                       foreach($resusers as $key=>$each)
                                       { 
                                    ?>
                                      <option value="<?=$resusers[$key]['id']?>" <?php if($resusers[$key]['id']==$lead_by_users_id){ echo "selected"; }?>><?=$resusers[$key]['first_name']?> <?=$resusers[$key]['last_name']?> <?=$resusers[$key]['email']?></option>
                                    <?php
                                     }
                                    ?> 
                                </select>
                            </td>
                          </tr><tr>
                             <td>Email</td>
                             <td>
                                <input type="text" name="email" id="email"  value="<?=$email?>" class="form-control-static">
                             </td>
                         </tr><tr>
                             <td>Title</td>
                             <td>
                                <input type="text" name="title" id="title"  value="<?=$title?>" class="form-control-static">
                             </td>
                         </tr><tr>
                             <td>First Name</td>
                             <td>
                                <input type="text" name="first_name" id="first_name"  value="<?=$first_name?>" class="form-control-static">
                             </td>
                         </tr><tr>
                             <td>Last Name</td>
                             <td>
                                <input type="text" name="last_name" id="last_name"  value="<?=$last_name?>" class="form-control-static">
                             </td>
                         </tr><tr>
                             <td>Arrea Code</td>
                             <td>
                                <input type="text" name="arrea_code" id="arrea_code"  value="<?=$arrea_code?>" class="form-control-static">
                             </td>
                         </tr><tr>
                             <td>Phone No</td>
                             <td>
                                <input type="text" name="phone_no" id="phone_no"  value="<?=$phone_no?>" class="form-control-static">
                             </td>
                         </tr><tr>
                             <td>Dob</td>
                             <td>
                                <input type="text" name="dob" id="dob"  value="<?=$dob?>" class="datepicker form-control-static">
                             </td>
                         </tr><tr>
                             <td>Address Line 1</td>
                             <td>
                                <input type="text" name="address_line_1" id="address_line_1"  value="<?=$address_line_1?>" class="form-control-static">
                             </td>
                         </tr><tr>
                             <td>Address Line 2</td>
                             <td>
                                <input type="text" name="address_line_2" id="address_line_2"  value="<?=$address_line_2?>" class="form-control-static">
                             </td>
                         </tr><tr>
                             <td>City</td>
                             <td>
                                <input type="text" name="city" id="city"  value="<?=$city?>" class="form-control-static">
                             </td>
                         </tr><tr>
                             <td>State</td>
                             <td>
                                <input type="text" name="state" id="state"  value="<?=$state?>" class="form-control-static">
                             </td>
                         </tr><tr>
                             <td>Zip</td>
                             <td>
                                <input type="text" name="zip" id="zip"  value="<?=$zip?>" class="form-control-static">
                             </td>
                         </tr><tr>
                                 <td>Country</td>
                                 <td><?php
                                $info['table']    = "country";
                                $info['fields']   = array("*");   	   
                                $info['where']    =  "1=1 ORDER BY id DESC";
                                $rescountry  =  $db->select($info);
                            ?>
                            <select  name="country_id" id="country_id"   class="form-control-static">
                                <option value="">--Select--</option>
                                <?php
                                   foreach($rescountry as $key=>$each)
                                   { 
                                ?>
                                  <option value="<?=$rescountry[$key]['id']?>" <?php if($rescountry[$key]['id']==$country_id){ echo "selected"; }?>><?=$rescountry[$key]['country']?></option>
                                <?php
                                 }
                                ?> 
                            </select></td>
                          </tr>
                          <tr>
						 <td>Paid Amount</td>
						 <td>
						    <input type="text" name="paid_amount" id="paid_amount"  value="<?=$paid_amount?>" class="form-control-static">
						 </td>
				     </tr><tr>
		           		 <td>Paid Status</td>
                                                 <td><?php
                            $enumleads = getEnumFieldValues('leads','paid_status');
                        ?>
                        <select  name="paid_status" id="paid_status"   class="form-control-static">
                        <?php
                           foreach($enumleads as $key=>$value)
                           { 
                        ?>
                          <option value="<?=$value?>" <?php if($value==$paid_status){ echo "selected"; }?>><?=$value?></option>
                         <?php
                          }
                        ?> 
                        </select></td>
				  </tr>
                  <tr>
		           		 <td>Entry Type</td>
				   		 <td><?php
							$enumleads = getEnumFieldValues('leads','entry_type');
						?>
						<select  name="entry_type" id="entry_type"   class="form-control-static">
						<?php
						   foreach($enumleads as $key=>$value)
						   { 
						?>
						  <option value="<?=$value?>" <?php if($value==$entry_type){ echo "selected"; }?>><?=$value?></option>
						 <?php
						  }
						?> 
						</select></td>
				  </tr>
                          <tr>
                             <td>Status</td>
                             <td><?php
                                $enumleads = getEnumFieldValues('leads','status');
                            ?>
                            <select  name="status" id="status"   class="form-control-static">
                            <?php
                               foreach($enumleads as $key=>$value)
                               { 
                            ?>
                              <option value="<?=$value?>" <?php if($value==$status){ echo "selected"; }?>><?=$value?></option>
                             <?php
                              }
                            ?> 
                            </select></td>
                                     </tr>
                                     <tr> 
                                         <td align="right"></td>
                                         <td>
                                            <input type="hidden" name="cmd" value="add">
                                            <input type="hidden" name="id" value="<?=$Id?>">			
                                            <input type="submit" name="btn_submit" id="btn_submit" value="submit" class="btn red">
                                         </td>     
                                     </tr>
                                    </table>
                                    </div>
                                    </div>
                            </form>
                          </td>
                         </tr>
                        </table>
              </div>
			</div>
  </div>
  <script>
	$( ".datepicker" ).datepicker({
		dateFormat: "yy-mm-dd", 
		changeYear: true,
		changeMonth: true,
		showOn: 'button',
		buttonText: 'Show Date',
		buttonImageOnly: true,
		buttonImage: '../../images/calendar.gif',
	});
</script>  			
<?php
 include("../template/footer.php");
?>

