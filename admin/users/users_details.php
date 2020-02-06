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




 <div class="portlet box blue">
           <div class="portlet-title">
                <div class="caption"><i class="fa fa-globe"></i><b>User Details</b>
                </div>
                <div class="tools">
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                </div>
            </div>

            <div class="portlet-body">
      <div class="table-responsive">	
          <table class="table" width="100%">
         <?php
                
                
                $info["table"] = "users";
                $info["fields"] = array("users.*"); 
                $info["where"]   = "1  AND id='".$_REQUEST['id']."'";
                $arr =  $db->select($info);
                
                for($i=0;$i<count($arr);$i++)
                {
         ?>
            
              <tr><td>Email</td><td><?=$arr[$i]['email']?></td></tr>
              <tr><td>Password</td><td><?=$arr[$i]['password']?></td></tr>
              <tr><td>Title</td><td><?=$arr[$i]['title']?></td></tr>
              <tr><td>First Name</td><td><?=$arr[$i]['first_name']?></td></tr>
              <tr><td>Last Name</td><td><?=$arr[$i]['last_name']?></td></tr>
              <tr><td>File Picture</td><td><?php
                                    if(is_file('../../'.$arr[$i]['file_picture'])&&file_exists('../../'.$arr[$i]['file_picture']))
                                    {
                                 ?>
                                  <img src="../../<?=$arr[$i]['file_picture']?>" style="width:100px;height:100px;">
                                  <?php
                                    }
                                  ?></td></tr>
              <tr><td>Company</td><td><?=$arr[$i]['company']?></td></tr>
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
              <tr><td>Created At</td><td><?=$arr[$i]['created_at']?></td></tr>
              <tr><td>Updated At</td><td><?=$arr[$i]['updated_at']?></td></tr>
              <tr><td>User Type</td><td><?=$arr[$i]['user_type']?></td></tr>
              <tr><td>Status</td><td><?=$arr[$i]['status']?></td></tr>
            
        <?php
                  }
        ?>
        
        
        </table>
        </div>
     </div>				
</div>