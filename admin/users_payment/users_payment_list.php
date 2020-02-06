<?php
 include("../template/header.php");
?>
<script language="javascript" src="leads.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<link rel="stylesheet" href="../../datepicker/jquery-ui.css">
<script src="../../datepicker/jquery-1.10.2.js"></script>
<script src="../../datepicker/jquery-ui.js"></script>

<script type="text/javascript" src="../../tinybox2/tinybox.js"></script>
<link rel="stylesheet" type="text/css" href="../../tinybox2/style.css" />
<script type="text/javascript">
    function popUp(url)
    { 
      var parentWindow = window;
      TINY.box.show({iframe:url,closejs:function(){return false;},boxid:'frameless',width:850,height:600,fixed:false,maskid:'bluemask',maskopacity:40});
    } 
</script>
<div class="row">
    <code>
        <font color="#993333">1.Credit-Users earning money will be at credit<br>
        2.Debit-Company will make payment at debit with selected user</font><br>
    </code>
</div>
<?php
  if($message)
  {
   echo "<b>".$message."<b><br>"; 
  }
?>
<a href="index.php?cmd=pay_to_all" class="btn btn-sm red filter-cancel"  onClick=" return confirm('Are you sure to pay to all ?');">
   <i class="m-icon-swapright m-icon-white"></i>
Pay To all</a> 
<br><br>
<?php
		unset($info);
		unset($data);
	$info["table"] = "commission";
	$info["fields"] = array("commission.*"); 
	$info["where"]   = "1";
	$rescommission =  $db->select($info);

?>
 
 <div class="portlet box blue">
           <div class="portlet-title">
                <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","Make Payment"))?></b>
                </div>
                <div class="tools">
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                </div>
            </div>             
            <div class="portlet-body">
	         <div class="table-responsive">	
                <table class="table">
				   <td> 
				
					 <div class="portlet-body">
				      <div class="table-responsive">	
				          <table class="table">
							<tr bgcolor="#ABCAE0">
                                <td>Users</td>
                                <td>Total Approved Unpaid</td>
                                <td>Aount will be paid</td>
                                <td>View</td>
							</tr>
						 <?php
								
								  unset($info);
								  unset($data);
								$info["table"] = "users";
								$info["fields"] = array("users.*"); 
								$info["where"]   = "1 AND status='active'";
								$arr =  $db->select($info);
								for($i=0;$i<count($arr);$i++)
								{
						 ?>
							<tr bgcolor="<?=$row?>" onmouseover=" this.style.background='#ECF5B6'; " onmouseout=" this.style.background='<?=$row?>'; ">
                             
                              <td>
                                 <?=$arr[$i]['first_name']?> <?=$arr[$i]['last_name']?> <?=$arr[$i]['email']?>
                              </td>
                              <td>
                                  <?php
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
									echo $total;
								  ?>
                              </td>
                              <td><?php
							       echo $rescommission[0]['amount']*$total;
                              ?></td>
                              <td nowrap >
								  <a  href="javascript:void();"  onClick="popUp('index.php?cmd=lead_details&users_id=<?=$arr[$i]['id']?>')" class="btn blue button-next">
									   Details
                                       <i class="m-icon-swapright m-icon-white"></i>                  
                                  </a> 
							 </td>
						
							</tr>
						<?php
								  }
						?>
						</table>
						</div>
					 </div>				
				</td>
				</tr>
				</table>
				</div>
			</div>
		</div>
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









