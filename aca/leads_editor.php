<!DOCTYPE html>
<?php
 $assets_url = '../v4.0.1/theme';
?>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.2.0
Version: 3.4
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest (the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Head BEGIN -->
<head>
  <meta charset="utf-8">
  <title>Blog Page | Metronic Frontend</title>

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta content="Metronic Shop UI description" name="description">
  <meta content="Metronic Shop UI keywords" name="keywords">
  <meta content="keenthemes" name="author">

  <meta property="og:site_name" content="-CUSTOMER VALUE-">
  <meta property="og:title" content="-CUSTOMER VALUE-">
  <meta property="og:description" content="-CUSTOMER VALUE-">
  <meta property="og:type" content="website">
  <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
  <meta property="og:url" content="-CUSTOMER VALUE-">

  <link rel="shortcut icon" href="favicon.ico">

  <!-- Fonts START -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
  <!-- Fonts END -->

  <!-- Global styles START -->          
  <link href="<?=$assets_url?>/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?=$assets_url?>/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Global styles END --> 
   
  <!-- Page level plugin styles START -->
  <link href="<?=$assets_url?>/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
  <!-- Page level plugin styles END -->

  <!-- Theme styles START -->
  <link href="<?=$assets_url?>/assets/global/css/components.css" rel="stylesheet">
  <link href="<?=$assets_url?>/assets/frontend/layout/css/style.css" rel="stylesheet">
  <link href="<?=$assets_url?>/assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
  <link href="<?=$assets_url?>/assets/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
  <link href="<?=$assets_url?>/assets/frontend/layout/css/custom.css" rel="stylesheet">
  <!-- Theme styles END -->
	<script type="text/javascript" src="../js/jquery.js"></script>
    <link rel="stylesheet" href="../datepicker/jquery-ui.css">
    <script src="../datepicker/jquery-1.10.2.js"></script>
    <script src="../datepicker/jquery-ui.js"></script>
</head>
<!-- Head END -->
<?php
  if($message)
  {
	  echo "<h3 style=\"color:red;\">$message</h3>";
  }
?>                  
                  <form method="post">
                  <div style="padding-left:100px;">
	                <h3 class="form-section">Lead's Name</h3>
                    <div class="form-group">
                          <div class="row">
                             <div class="col-md-3 col-sm-3">
                                   <span style="color:red;">*</span><input type="text" name="first_name" id="first_name"  value="<?=$first_name?>" class="form-control-static" required>
                                    <br>
                                   <small class="form-text text-muted">First Name</small>
                             </div>
                             <div class="col-md-3 col-sm-3">
                                  <input type="text" name="title" id="title"  value="<?=$title?>" class="form-control-static">
                                  <br>
                                  <small class="form-text text-muted">Initial</small>
                             </div>
                             <div class="col-md-3 col-sm-3">
                                  <input type="text" name="last_name" id="last_name"  value="<?=$last_name?>" class="form-control-static">
                                  <br>
                                  <small class="form-text text-muted">Last Name</small>
                             </div>
                          </div>
                      </div>
	                   
                       <h3 class="form-section">Phone</h3>
                       <div class="form-group"> 
                          <div class="row">
                             <div class="col-md-3 col-sm-3">
                                    <span style="color:red;">*</span><input type="text" name="arrea_code" id="arrea_code"  value="<?=$arrea_code?>" class="form-control-static" required>
                                    <br>
                                  <small class="form-text text-muted">Area Code</small>
                             </div>
                             <div class="col-md-3 col-sm-3">
                                   <input type="text" name="phone_no" id="phone_no"  value="<?=$phone_no?>" class="form-control-static" required>
                                   <br>
                                  <small class="form-text text-muted">Phone No</small>
                             </div>
                          </div>   
					  </div> 
					  
                    <h3 class="form-section">Address</h3>  
					<div class="form-group"> 
                     <div class="row">
                         <div class="col-md-6 col-sm-6">
                            <input type="text" name="address_line_1" id="address_line_1"  value="<?=$address_line_1?>" class="form-control">
                              <small class="form-text text-muted">Address line</small>
                         </div>
                      </div>	
                      
                       <div class="row">
                         <div class="col-md-6 col-sm-6">
                           <input type="text" name="address_line_2" id="address_line_2"  value="<?=$address_line_2?>" class="form-control">
                              <small class="form-text text-muted">Address line 2</small>
                         </div>
                      </div>	 
                      
                       <div class="row">
                         <div class="col-md-2 col-sm-2">
                           <input type="text" name="city" id="city"  value="<?=$city?>" class="form-control-static">
                            <br>
                              <small class="form-text text-muted">City</small>
                         </div>
                         <div class="col-md-2 col-sm-2">
                           <input type="text" name="state" id="state"  value="<?=$state?>" class="form-control-static">
                             <br>
                              <small class="form-text text-muted">State</small>
                         </div>
                         <div class="col-md-2 col-sm-2">
                         </div>
                      </div>	 
                      
                       <div class="row">
                         <div class="col-md-2 col-sm-2">
                           <input type="text" name="zip" id="zip"  value="<?=$zip?>" class="form-control-static">
                            <br>
                              <small class="form-text text-muted">Zip</small>
                         </div>
                         <div class="col-md-2 col-sm-2">
                            <?php
								$info['table']    = "country";
								$info['fields']   = array("*");   	   
								$info['where']    =  "1=1 ORDER BY country ASC";
								$rescountry  =  $db->select($info);
							?>
                            <input type="text" name="country_id" id="country_id"  value="<?=$country_id?>">
                            <script>
                                            $(document).ready(function() {
                                                $('#country_id')
                                                            .selectize({
                                                                    plugins: ['remove_button'],
                                                                    persist: true,
                                                                    create: true,
                                                                    closeAfterSelect: true,
                                                                    maxItems: 1,
                                                                    hideSelected: true,
                                                                    openOnFocus: true,
                                                                    closeAfterSelect: true,
                                                                    maxOptions: 100,
                                                                    selectOnTab: true,
                                                                    valueField: 'id',
                                                                    placeholder: 'Country Name ...',
                                                                    labelField: 'title',
                                                                    searchField: 'title',
                                                                    onInitialize: function() {
                                                                        this.trigger('change', this.getValue(), true);
                                                                    },
                                                                    onChange: function(value, isOnInitialize) {
                                                                       
                                                                    },	
                                                                    options: [
                                                                               
                                                                                                                                          
                                                                            ],
                                                                            create: true
                                                                        }); 
                                                                        
                                                                        
                                                                        
                                                function load_country_id()
                                                    {
                                                            var xhr; 
                                                        
                                                            searchbar = $('#country_id');  
                                                            var $select = searchbar.selectize();
                                                            var control = $select[0].selectize;
                                                            //control.clear(); 
                                                            //control.clearOptions(); 
                                                           
                            
                                                            //$("#spinner3").html('<img src="../../images/indicator.gif" alt="Wait" />');               
                                                           
                                                            xhr && xhr.abort();
                                                                xhr = $.ajax({
                                                                    url: 'index.php?cmd=country',
                                                                    success: function(results) {
                                                                           var data_source = eval(results);                                    
                                                                            for ( var i = 0 ; i < data_source.length ; i++ ) 
                                                                            {   
                                                                                control.addOption({
                                                                                                id: data_source[i].id,
                                                                                                title: data_source[i].country,
                                                                                                url: ''
                                                                                            });
                                                                            }
                                                                           
                                                                           // $("#spinner3").html('');
                            
                                                                    },
                                                                    error: function() {
                                                                         callback();
                                                                    }
                                                                })
                                                    }
                            
                                               load_country_id(); 
                                               
                                            });
                                         </script>   
                            
                            
                             <br>
                              <small class="form-text text-muted">Country</small>
                         </div>
                         <div class="col-md-2 col-sm-2">
                         </div>
                      </div>	  	
					</div> 	    
					  
                      <h3 class="form-section">Date of Birth</h3>  
                      <div class="form-group"> 
                          <div class="row">
                             <div class="col-md-6 col-sm-6">
                               <input type="text" name="dob" id="dob"  value="<?=$dob?>" class="datepicker form-control-static">
                                 <br>
                                  <small class="form-text text-muted">Dob</small>
                             </div>
                          </div>
                      </div>
                      
                      <h3 class="form-section">Email</h3> 
                      <div class="form-group"> 
                          <div class="row">
                             <div class="col-md-2 col-sm-2">
                                 <input type="text" name="email" id="email"  value="<?=$email?>" class="form-control-static">
                                 <br>
                                  <small class="form-text text-muted">Email</small>
                             </div>
                          </div>
                      </div>
                    <div class="form-group"> 
                        <input type="hidden" name="cmd" value="add">
                        <input type="hidden" name="id" value="<?=$Id?>">			
                        <input type="submit" name="btn_submit" id="btn_submit" value="submit" class="btn red">
                    </div>
                    </div>  
            </form>
				
  <script>
	$( ".datepicker" ).datepicker({
		dateFormat: "yy-mm-dd", 
		changeYear: true,
		changeMonth: true,
		showOn: 'button',
		buttonText: 'Show Date',
		buttonImageOnly: true,
		buttonImage: '../images/calendar.gif',
	});
	
	$('body').on('keydown', 'input, select, textarea', function(e) {
    var self = $(this)
      , form = self.parents('form:eq(0)')
      , focusable
      , next
      ;
    if (e.keyCode == 13) {
        focusable = form.find('input,a,select,button,textarea').filter(':visible');
        next = focusable.eq(focusable.index(this)+1);
        if (next.length) {
            next.focus();
        } else {
            form.submit();
        }
        return false;
    }
});
</script>  		

<!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
    <!--[if lt IE 9]>
    <script src="<?=$assets_url?>/assets/global/plugins/respond.min.js"></script>
    <![endif]-->
    <script src="<?=$assets_url?>/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?=$assets_url?>/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="<?=$assets_url?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
    <script src="<?=$assets_url?>/assets/frontend/layout/scripts/back-to-top.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="<?=$assets_url?>/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->

    <script src="<?=$assets_url?>/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();
            Layout.initTwitter();
        });
    </script>
    <!-- END PAGE LEVEL JAVASCRIPTS -->


	
<script type="text/javascript" src="../js/selectize.js"></script>
<link rel='stylesheet' href='../css/selectize.css'>
<link rel='stylesheet' href='../css/selectize.default.css'>
<style type="text/css">
    .selectize-input {
      width: 100% !important;
      height: 62px !important;
    }
</style>
