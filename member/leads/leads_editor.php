<?php
 include("../template/header.php");
?>
<script language="javascript" src="leads.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<link rel="stylesheet" href="../../datepicker/jquery-ui.css">
<script src="../../datepicker/jquery-1.10.2.js"></script>
<script src="../../datepicker/jquery-ui.js"></script>

<link rel="stylesheet" href="../../css/toastr.css">
<script src="../../js/toastr.js"></script>



<a href="index.php?cmd=list" class="btn green"><i class="fa fa-arrow-circle-left"></i> List</a> <br><br>
<?php
  if($message)
  {
	  echo "<h3 style=\"color:red;\">$message</h3>";
  }
?>                  
                  <form>
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
		buttonImage: '../../images/calendar.gif',
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
