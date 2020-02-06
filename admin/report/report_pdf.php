<table class="table" align="center" width="100%">    
    <tr>
        <td width="30%">
           <img src="../../<?=$rescompany[0]['file_company_logo']?>" style="width:100px;">
        </td>
        <td align="center">      
          <h3><?=$rescompany[0]['company_name']?></h3>
          <?=$rescompany[0]['city']?>,<?=$rescompany[0]['state']?>,<?=$rescompany[0]['zip']?>,<?=$rescompany[0]['country']?><br>
        </td>
        <td  width="30%">
        </td>
    </tr>
</table>


<br><br><br>
 <!--mpdf
					
                    <htmlpageheader name="firstpage" style="display:none">
                    </htmlpageheader>
                    
                    <htmlpageheader name="otherpages" style="display:none;">
                        <span style="float:left;">Invoice no:<?=$arr[0]['invoice_no']?></span>
						<span  style="padding:5px;"> &nbsp; &nbsp; &nbsp;
						 &nbsp; &nbsp; &nbsp;</span>
                        <span style="float:right;"></span>         
                    </htmlpageheader>  
                    
                    <sethtmlpageheader name="firstpage" value="on" show-this-page="1" />
                    <sethtmlpageheader name="otherpages" value="on" />
                    
                    
                      <htmlpagefooter name="myfooter"  style="display:none">                          
                   		 <div align="center">
                         	    <?=$rescompany[0]['report_footer']?> 
                                   <br><span style="padding:10px;">Page {PAGENO} of {nbpg}</span> 
                         </div>
					
					</htmlpagefooter>
					
					<sethtmlpagefooter name="myfooter" value="on" />
                    
                    
                    <style>
                    
                    
                    @page :first {
                    header: firstpage;
                    }
                    
                    @page {
                    header: otherpages;
                    }
                    
                    @page {
                    footer: myfooter;
                    }
                    </style>
                    
                  mpdf--> 
<?php
   if($total>0)
   {
?>
   Total : <?=$total?>
<?php	   
   }
?>
<table class="table">
        <tr bgcolor="#ABCAE0">
            <td>Customers</td>
            <td>Invoice No</td>
            <td>Date Of Service</td>
            <td>Tech Users</td>
            <td>Service</td>
            <td>Item Cost</td>    
        </tr>
		 <?php
            
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
               <td>
                    <?php
                        unset($info2);        
                        $info2['table']    = "customers";	
                        $info2['fields']   = array("customer_name");	   	   
                        $info2['where']    =  "1 AND id='".$arr[$i]['customers_id']."' LIMIT 0,1";
                        $res2  =  $db->select($info2);
                        echo $res2[0]['customer_name'];	
                    ?>
               </td>
               <td><?=$arr[$i]['invoice_no']?></td>
               <td><?=$arr[$i]['date_of_service']?></td>
               <td>
                    <?php
                        unset($info2);        
                        $info2['table']    = "users";	
                        $info2['fields']   = array("*");	   	   
                        $info2['where']    =  "1 AND id='".$arr[$i]['tech_users_id']."' LIMIT 0,1";
                        $res2  =  $db->select($info2);
                        echo $res2[0]['first_name']." ".$res2[0]['last_name'];	
                    ?>
               </td>
               <td>
                    <?php
                        unset($info2);        
                        $info2['table']    = "service";	
                        $info2['fields']   = array("service_name");	   	   
                        $info2['where']    =  "1 AND id='".$arr[$i]['service_id']."' LIMIT 0,1";
                        $res2  =  $db->select($info2);
                        echo $res2[0]['service_name'];	
                    ?>
               </td>
              <td><?=$arr[$i]['item_cost']?></td>
            </tr>
        <?php
                  }
        ?>
        <tr><td colspan="5" align="right">Sub Total</td><td><?=$total?></td></tr>    
</table>