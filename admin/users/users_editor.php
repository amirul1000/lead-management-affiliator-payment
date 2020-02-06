<?php
 include("../template/header.php");
?>
<script language="javascript" src="users.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<link rel="stylesheet" href="../../datepicker/jquery-ui.css">
<script src="../../datepicker/jquery-1.10.2.js"></script>
<script src="../../datepicker/jquery-ui.js"></script>

<link rel="stylesheet" href="../../css/toastr.css">
<script src="../../js/toastr.js"></script>
<style>
   input[type=file] {
    display: block;
    position: relative !important;
    visibility:visible !important;
}
</style>

<a href="index.php?cmd=list" class="btn green"><i class="fa fa-arrow-circle-left"></i> List</a> <br><br>
     
<?php
  if($message)
  {
	  echo "<h3 style=\"color:red;\">$message</h3>";
  }
?>                  
	              
 <form name="frm_users" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
								 
      <div style="padding-left:100px;">
        
        <h3 class="form-section">User's Name</h3>
          <div class="form-group card portlet light portlet-fit bordered">
              <div class="row">
                 <div class="col-md-3 col-sm-3">
                       <span style="color:red;">*</span><input type="text" name="first_name" id="first_name"  value="<?=$first_name?>" class="form-control-static" required>
                        <br>
                       <small class="form-text text-muted">First Name</small>
                 </div>
                 <div class="col-md-3 col-sm-3">
                      <input type="text" name="last_name" id="last_name"  value="<?=$last_name?>" class="form-control-static">
                      <br>
                      <small class="form-text text-muted">Last Name</small>
                 </div>
              </div>
          </div>
          
          <h3 class="form-section">Picture</h3>
          <div class="form-group  card portlet light portlet-fit bordered">
              <div class="row">
                 <div class="col-md-3 col-sm-3">
                      <img id="img_id" src="../../images/no_image.jpg" style="width:100px;height:100px;">
                 </div>
                 <div class="col-md-3 col-sm-3">
                                            <script src="../../Simple-Ajax-Uploader-master/SimpleAjaxUploader.js"></script> 
                                            <link href="../../Simple-Ajax-Uploader-master/assets/css/styles.css" rel="stylesheet">
                                     
                                              <!--<div class="container">-->                               
                                              <div class="row" style="padding-top:10px;">
                                                <div class="col-xs-2">
                                                  <input type="file" id="uploadBtn5"  value="Choose File">
                                                </div>
                                                <div class="col-xs-10">
                                              <div id="progressOuter5" class="progress progress-striped active" style="display:none;">
                                                <div id="progressBar5" class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                                </div>
                                              </div>
                                                </div>
                                              </div>
                                              <div class="row" style="padding-top:10px;">
                                                <div class="col-xs-10">
                                                  <div id="msgBox5">
                                                  </div>
                                                </div>
                                              </div>
                                          <!--</div>-->
                                          <?php
                                             if(isset($Id)) {
                                               $url = 'file_upload.php?id='.$Id;
                                            }
                                            else {
                                                $url = 'file_upload.php';
                                                }
                                          ?>
                                    
                                        
                                        <script>
                                        function escapeTags( str ) {
                                          return String( str )
                                                   .replace( /&/g, '&amp;' )
                                                   .replace( /"/g, '&quot;' )
                                                   .replace( /'/g, '&#39;' )
                                                   .replace( /</g, '&lt;' )
                                                   .replace( />/g, '&gt;' );
                                        }
                                        
                                        $(document).ready(function() {
                                         
                                          var btn1 = document.getElementById('uploadBtn5'),
                                              progressBar1 = document.getElementById('progressBar5'),
                                              progressOuter1 = document.getElementById('progressOuter5'),
                                              msgBox1 = document.getElementById('msgBox5');
                                        
                                          var uploader1 = new ss.SimpleUpload({
                                                button: btn1,
                                                url: '<?=$url?>',
                                                sessionProgressUrl: '../../Simple-Ajax-Uploader-master/code/sessionProgress.php',
                                                //name: 'uploadfile',
                                                name:'uploadfile', 
                                                multipart: true,
                                                hoverClass: 'hover',
                                                focusClass: 'focus',
                                                responseType: 'json',
                                                startXHR: function() {
                                                    progressOuter1.style.display = 'block'; // make progress bar visible           
                                                    this.setProgressBar( progressBar1 );           
                                                },
                                                onSubmit: function() {
                                                    msgBox1.innerHTML = ''; // empty the message box
                                                    btn1.innerHTML = 'Uploading...'; // change button text to "Uploading..."
                                                  },
                                                onComplete: function( filename, response ) {
                                                    //btn.innerHTML = 'Choose Another File';
													
													$("#uploadBtn5").removeAttr('required');
                                                    btn1.innerHTML = 'Choose File';
                                                    progressOuter1.style.display = 'none'; // hide progress bar when upload is completed
                                        
                                                    if ( !response ) {
                                                        msgBox1.innerHTML = 'Unable to upload file';
                                                        return;
                                                    }
                                        
                                                    if ( response.success === true ) {
                                                        msgBox1.innerHTML = '<strong>' + escapeTags( filename ) + '</strong>' + ' successfully uploaded.';
                                                        $("#img_id").attr('src', "data:image/JPEG;base64,"+response.img);
                                                    } else {
                                                        if ( response.msg )  {
                                                            msgBox1.innerHTML = escapeTags( response.msg );
                                        
                                                        } else {
                                                            msgBox1.innerHTML = 'An error occurred and the upload failed.';
                                                        }
                                                    }
                                                  },
                                                onError: function() {
                                                    progressOuter1.style.display = 'none';
                                                    msgBox1.innerHTML = 'Unable to upload file';
                                                  }
                                            });
                                            
                                          
                                        });
                                        </script>
                                        
                                         <?php 
                                          if(empty($bank_challen_no))
                                          {
                                            echo "Is file uploaded?  No";
                                          }
                                         else
                                         {
                                           echo "Is file uploaded? Yes";
                                         }
                                        ?>	 
                 </div>
              </div>
          </div>
          
          
          <div class="form-group   card portlet light portlet-fit bordered">
              <div class="row">
                 <div class="col-md-3 col-sm-3">
                       <span style="color:red;">*</span><input type="email" name="email" id="email"  value="<?=$email?>" class="form-control-static" required>
                        <br>
                       <small class="form-text text-muted">Email</small>
                 </div>
                 <div class="col-md-3 col-sm-3">
                     <span style="color:red;">*</span><input type="phone" name="phone_no" id="phone_no"  value="<?=$phone_no?>" class="form-control-static" required>
                        <br>
                       <small class="form-text text-muted">Phone</small>
                 </div>
              </div>
          </div>
          
          
           <h3 class="form-section">Address</h3>  
           <div class="form-group  card portlet light portlet-fit bordered"> 
             <div class="row">
                 <div class="col-md-6 col-sm-6">
                    <input type="text" name="address" id="address"  value="<?=$address?>" class="form-control">
                      <small class="form-text text-muted">Address</small>
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
		buttonImage: '../../images/calendar.gif',
	});
</script>  			
<?php
 include("../template/footer.php");
?>

<script type="text/javascript" src="../../js/selectize.js"></script>
<link rel='stylesheet' href='../../css/selectize.css'>
<link rel='stylesheet' href='../../css/selectize.default.css'>
<style type="text/css">
    .selectize-input {
      width: 100% !important;
      height: 62px !important;
    }
</style>