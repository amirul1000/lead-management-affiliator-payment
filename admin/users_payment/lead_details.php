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
                <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","leads"))?> details</b>
                </div>
            </div>

            <div class="portlet-body">
      <div class="table-responsive">	
          <table class="table">
							<tr bgcolor="#ABCAE0">
                                <td>Email</td>
                                <td>First Name</td>
                                <td>Last Name</td>
                                <td>Phone No</td>
                                <td>Paid Amount</td>
                                <td>Paid Status</td>
                                <td>Entry Type</td>
                                <td>Status</td>                                
							</tr>
						 <?php
									  
								$info["table"] = "leads";
								$info["fields"] = array("leads.*"); 
								$info["where"]   = "1   AND lead_by_users_id='".$_REQUEST['users_id']."'   
									                      AND paid_status='nopiad'	       
									                      AND status='approved'";
													
								
								$arr =  $db->select($info);
								
								for($i=0;$i<count($arr);$i++)
								{
								
								   $rowColor;
						
									if($i % 2 == 0)
									{
										
										$row="#C8C8C8";
									}
									else
									{
										
										$row="#FFFFFF";
									}
								
						 ?>
							<tr bgcolor="<?=$row?>" onmouseover=" this.style.background='#ECF5B6'; " onmouseout=" this.style.background='<?=$row?>'; ">
                                <td><?=$arr[$i]['email']?></td>
                                <td><?=$arr[$i]['first_name']?></td>
                                <td><?=$arr[$i]['last_name']?></td>
                                <td><?=$arr[$i]['arrea_code']?>-<?=$arr[$i]['phone_no']?></td>
                                <td><?=$arr[$i]['paid_amount']?></td>
                                <td><?=$arr[$i]['paid_status']?></td>
                                <td><?=$arr[$i]['entry_type']?></td>
                                <td><?=$arr[$i]['status']?></td>						
							</tr>
						<?php
								  }
						?>
						</table>
        </div>
     </div>				
</div>

<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?=$assets_url?>/assets/global/plugins/respond.min.js"></script>
<script src="<?=$assets_url?>/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="<?=$assets_url?>/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?=$assets_url?>/assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?=$assets_url?>/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
<script src="<?=$assets_url?>/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?=$assets_url?>/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/admin/pages/scripts/index.js" type="text/javascript"></script>
<script src="<?=$assets_url?>/assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>

<script src="<?=$assets_url?>/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   QuickSidebar.init(); // init quick sidebar
   Demo.init(); // init demo features 
   Index.init();   
   Index.initDashboardDaterange();
   Index.initJQVMAP(); // init index page's custom scripts
   Index.initCalendar(); // init index page's custom scripts
   Index.initCharts(); // init index page's custom scripts
   Index.initChat();
   Index.initMiniCharts();
   Tasks.initDashboardWidget();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>