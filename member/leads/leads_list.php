<?php
 include("../template/header.php");
?>
<script type="text/javascript" src="../../tinybox2/tinybox.js"></script>
<link rel="stylesheet" type="text/css" href="../../tinybox2/style.css" />
<script type="text/javascript">
    function popUp(url)
    { 
      var parentWindow = window;
      TINY.box.show({iframe:url,closejs:function(){return false;},boxid:'frameless',width:850,height:600,fixed:false,maskid:'bluemask',maskopacity:40});
    } 
</script>

<a href="index.php?cmd=edit" class="btn green"><i class="fa fa-plus-circle"></i> Add a Lead</a> <br><br>
 <div class="row">
                     <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="dashboard-stat blue-madison">
                            <div class="visual">
                                <i class="fa fa-comments"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                     <?php
                                    $whrstr = "AND lead_by_users_id='".$_SESSION['users_id']."'";	
                                    $info["table"] = "leads";
                                    $info["fields"] = array("count(*) as total"); 
                                    $info["where"]   = "1   $whrstr";
                                    //$info["debug"]   = true;
                                    $arr =  $db->select($info);
                                    echo $arr[0]['total'];
                                     ?>
                                </div>
                                <div class="desc">
                                      Total Leads
                                </div>
                            </div>
                            <a class="more" href="../leads">
                            View more <i class="m-icon-swapright m-icon-white"></i>
                            </a>
                        </div>
                    </div> 
                     <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat purple-plum">
                        <div class="visual">
                            <i class="fa fa-comments"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                 <?php
                                    $whrstr = "AND lead_by_users_id='".$_SESSION['users_id']."'";	
                                    $info["table"] = "leads";
                                    $info["fields"] = array("count(*) as total_pending"); 
                                    $info["where"]   = "1   $whrstr  AND status='pending'";
                                    //$info["debug"]   = true;
                                    $arr =  $db->select($info);
                                    echo $arr[0]['total_pending'];
                                 ?>
                            </div>
                            <div class="desc">
                               Total pending
                            </div>
                        </div>
                        <a class="more" href="../leads">
                        View more <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                     <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="dashboard-stat green-haze">
                            <div class="visual">
                                <i class="fa fa-comments"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                <?php
                                    $whrstr = "AND lead_by_users_id='".$_SESSION['users_id']."'";	
                                    $info["table"] = "leads";
                                    $info["fields"] = array("count(*) as total_approved"); 
                                    $info["where"]   = "1   $whrstr AND  status='approved'";
                                    $arr =  $db->select($info);
                                    echo $arr[0]['total_approved'];
                                 ?>
                                </div>
                                <div class="desc">
                                    Total Approved
                                </div>
                            </div>
                            <a class="more" href="../leads">
                            View more <i class="m-icon-swapright m-icon-white"></i>
                            </a>
                        </div>
                    </div>  
                     <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="dashboard-stat purple-plum">
                            <div class="visual">
                                <i class="fa fa-comments"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <?php
                                    $whrstr = "AND lead_by_users_id='".$_SESSION['users_id']."'";	
                                    $info["table"] = "leads";
                                    $info["fields"] = array("count(*) as total_denied"); 
                                    $info["where"]   = "1   $whrstr AND  status='denied'";
                                    $arr =  $db->select($info);
                                    echo $arr[0]['total_denied'];
                                 ?>
                                </div>
                                <div class="desc">
                                    Total Denied
                                </div>
                            </div>
                            <a class="more" href="../leads">
                            View more <i class="m-icon-swapright m-icon-white"></i>
                            </a>
                        </div>
                    </div> 
</div>
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
						<td align="center" valign="top">
						  <form name="search_frm" id="search_frm" method="post">
							<div class="portlet-body">
					         <div class="table-responsive">	
				                <table align="right">
									  <TR>
										<TD  nowrap="nowrap">
										  <?php
											  $hash    =  getTableFieldsName("leads");
											  $hash    = array_diff($hash,array("id"));
										  ?>
										  Search Key:
										  <select   name="field_name" id="field_name"  class="form-control-static">
											<option value="">--Select--</option>
											<?php
											foreach($hash as $key=>$value)
											{
										    ?>
											<option value="<?=$key?>" <?php if($_SESSION['field_name']==$key) echo "selected"; ?>><?=str_replace("_"," ",$value)?></option>
											<?php
										    }
										  ?>
										  </select>
										</TD>
										<TD  nowrap="nowrap" align="right"><label for="searchbar"><img src="../../images/icon_searchbox.png" alt="Search"></label>
										   <input type="text"    name="field_value" id="field_value" value="<?=$_SESSION["field_value"]?>" class="form-control-static"></TD>
										<td nowrap="nowrap" align="right">
										  <input type="hidden" name="cmd" id="cmd" value="search_leads" >
										  <input type="submit" name="btn_submit" id="btn_submit"  value="Search" class="btn blue-hoki" />
										</td>
									  </TR>
									</table>
							</div>
							</div>
						  </form>
						</td>
				   </tr>
				   <tr>
				   <td> 
				
					 <div class="portlet-body">
				      <div class="table-responsive">	
				          <table class="table">
							<tr bgcolor="#ABCAE0">
                              <td>Email</td>
                              <td>Title</td>
                              <td>First Name</td>
                              <td>Last Name</td>
                              <td>Phone No</td>
                              <td>Dob</td>
                              <td>Paid Amount</td>
                              <td>Paid Status</td>
                              <td>Entry Type</td>
                              <td>Status</td>
							  <td>Action</td>
							</tr>
						 <?php
								
								if($_SESSION["search"]=="yes")
								  {
									$whrstr = " AND ".$_SESSION['field_name']." LIKE '%".$_SESSION["field_value"]."%'";
								  }
								  else
								  {
									$whrstr = "";
								  }
								  $whrstr .= " AND lead_by_users_id='".$_SESSION['users_id']."'";
						 
								$rowsPerPage = 10;
								$pageNum = 1;
								if(isset($_REQUEST['page']))
								{
									$pageNum = $_REQUEST['page'];
								}
								$offset = ($pageNum - 1) * $rowsPerPage;  
						 
						 
											  
								$info["table"] = "leads";
								$info["fields"] = array("leads.*"); 
								$info["where"]   = "1   $whrstr ORDER BY id DESC  LIMIT $offset, $rowsPerPage";
													
								
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
                              <td><?=$arr[$i]['title']?></td>
                              <td><?=$arr[$i]['first_name']?></td>
                              <td><?=$arr[$i]['last_name']?></td>
                              <td><?=$arr[$i]['arrea_code']?>-<?=$arr[$i]['phone_no']?></td>
                              <td><?=$arr[$i]['dob']?></td>
                              <td><?=$arr[$i]['paid_amount']?></td>
                              <td><?=$arr[$i]['paid_status']?></td>
                              <td><?=$arr[$i]['entry_type']?></td>
                              <td><?=$arr[$i]['status']?></td>
                              <td nowrap >
								  <a href="index.php?cmd=edit&id=<?=$arr[$i]['id']?>"  class="btn default btn-xs purple"><i class="fa fa-edit"></i>Edit</a>
								  <a  href="javascript:void();"  onClick="popUp('index.php?cmd=lead_details&id=<?=$arr[$i]['id']?>')" class="btn blue button-next">
									   Details
                                       <i class="m-icon-swapright m-icon-white"></i>                  
                                  </a> 
                                  <a href="index.php?cmd=delete&id=<?=$arr[$i]['id']?>" class="btn btn-sm red filter-cancel"  onClick=" return confirm('Are you sure to delete this item ?');"><i class="fa fa-times"></i>Delete</a> 
							 </td>
						
							</tr>
						<?php
								  }
						?>
						
						<tr>
						   <td colspan="10" align="center">
							  <?php              
									  unset($info);
					
									   $info["table"] = "leads";
									   $info["fields"] = array("count(*) as total_rows"); 
									   $info["where"]   = "1  $whrstr ORDER BY id DESC";
									  
									   $res  = $db->select($info);  
					
												
										$numrows = $res[0]['total_rows'];
										$maxPage = ceil($numrows/$rowsPerPage);
										$self = 'index.php?cmd=list';
										$nav  = '';
										
										$start    = ceil($pageNum/5)*5-5+1;
										$end      = ceil($pageNum/5)*5;
										
										if($maxPage<$end)
										{
										  $end  = $maxPage;
										}
										
										for($page = $start; $page <= $end; $page++)
										//for($page = 1; $page <= $maxPage; $page++)
										{
											if ($page == $pageNum)
											{
												$nav .= "<li>$page</li>"; 
											}
											else
											{
												$nav .= "<li><a href=\"$self&&page=$page\" class=\"nav\">$page</a></li>";
											} 
										}
										if ($pageNum > 1)
										{
											$page  = $pageNum - 1;
											$prev  = "<li><a href=\"$self&&page=$page\" class=\"nav\">[Prev]</a></li>";
									
										   $first = "<li><a href=\"$self&&page=1\" class=\"nav\">[First Page]</a></li>";
										} 
										else
										{
											$prev  = '<li>&nbsp;</li>'; 
											$first = '<li>&nbsp;</li>'; 
										}
									
										if ($pageNum < $maxPage)
										{
											$page = $pageNum + 1;
											$next = "<li><a href=\"$self&&page=$page\" class=\"nav\">[Next]</a></li>";
									
											$last = "<li><a href=\"$self&&page=$maxPage\" class=\"nav\">[Last Page]</a></li>";
										} 
										else
										{
											$next = '<li>&nbsp;</li>'; 
											$last = '<li>&nbsp;</li>'; 
										}
										
										if($numrows>1)
										{
										  echo '<ul id="navlist">';
										   echo $first . $prev . $nav . $next . $last;
										  echo '</ul>';
										}
									?>     
						   </td>
						 </tr>
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









