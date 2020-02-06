<?php
 $assets_url = '../../v4.0.1/theme'; 
?>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?=$assets_url?>/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=$assets_url?>/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=$assets_url?>/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=$assets_url?>/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="<?=$assets_url?>/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="<?=$assets_url?>/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
<link href="<?=$assets_url?>/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=$assets_url?>/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="<?=$assets_url?>/assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
<link href="<?=$assets_url?>/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?=$assets_url?>/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?=$assets_url?>/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="<?=$assets_url?>/assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?=$assets_url?>/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>

<link rel="stylesheet" href="<?=$assets_url?>/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css" />
 <style>
body{
	background-color:white;
}
</style>
 <?php
  if($message)
  {
	  echo "<h3 style=\"color:red;\">$message</h3>";
  }
?>  
 <div style="padding-left:100px;">  
  <?php
	$Id    = $_REQUEST['id'];
	if( !empty($Id ))
	{
		$info['table']    = "users";
		$info['fields']   = array("*");   	   
		$info['where']    =  "id=".$Id;
		$res  =  $db->select($info);
	   
		$Id        = $res[0]['id'];  
		$valid_invalid_tester_phone     = $res[0]['valid_invalid_tester_phone'];
	}
  ?>
  <form name="frm_users" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
      
       <div class="form-group   card portlet light portlet-fit bordered">
          <div class="row">
                 <span style="color:red;">*</span><input type="valid_invalid_tester_phone" name="valid_invalid_tester_phone" id="valid_invalid_tester_phone"  value="<?=$valid_invalid_tester_phone?>" class="form-control-static" style="300px;" required>
                     <?php
                     if(!empty($valid_invalid_tester_phone))
					 {
					?>
                     <a href="index.php?cmd=delete_valid_invalid_tester_phone&id=<?=$res[0]['id']?>">Delete</a> 
                    <?php
					 }
					?> 
                    <br>
                   <small class="form-text text-muted">Valid invalid tester phone</small>
          </div>
      </div>
       
        <div class="form-group"> 
            <input type="hidden" name="cmd" value="add_users_tester_phone">
            <input type="hidden" name="id" value="<?=$Id?>">			
            <input type="submit" name="btn_submit" id="btn_submit" value="submit" class="btn red">
        </div>
   </form>     
 </div>