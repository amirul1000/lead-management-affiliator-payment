<?php
 include("../template/header.php");
?>
<script language="javascript" src="phone.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<link rel="stylesheet" href="../../datepicker/jquery-ui.css">
<script src="../../datepicker/jquery-1.10.2.js"></script>
<script src="../../datepicker/jquery-ui.js"></script>


<a href="index.php?cmd=list" class="btn green"><i class="fa fa-arrow-circle-left"></i> List</a> <br><br>
  <div class="portlet box blue">
      <div class="portlet-title">
          <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","phone"))?></b>
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

								 <form name="frm_phone" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
								  <div class="portlet-body">
						         <div class="table-responsive">	
					                <table class="table">
										 <tr>
						 <td>Phone No</td>
						 <td>
						    <input type="text" name="phone_no" id="phone_no"  value="<?=$phone_no?>" class="form-control-static">
						 </td>
				     </tr><tr>
		           		 <td>Status</td>
				   		 <td><?php
	$enumphone = getEnumFieldValues('phone','status');
?>
<select  name="status" id="status"   class="form-control-static">
<?php
   foreach($enumphone as $key=>$value)
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

