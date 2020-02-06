 http://www.hbeci.com
 <h3>Invoice</h3><br>
 To:<br>
    <?=$first_name?> <?=$last_name?><br>
	<?=$email?><br>	
 Total Paid:<?=$amount?>
 
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
            for($j=0;$j<count($res);$j++)
            {
               $rowColor;
    
                if($j % 2 == 0)
                {
                    
                    $row="#C8C8C8";
                }
                else
                {
                    
                    $row="#FFFFFF";
                }
            
     ?>
        <tr bgcolor="<?=$row?>" onmouseover=" this.style.background='#ECF5B6'; " onmouseout=" this.style.background='<?=$row?>'; ">
            <td><?=$res[$j]['email']?></td>
            <td><?=$res[$j]['first_name']?></td>
            <td><?=$res[$j]['last_name']?></td>
            <td><?=$res[$j]['arrea_code']?>-<?=$res[$j]['phone_no']?></td>
            <td><?=$res[$j]['paid_amount']?></td>
            <td><?=$res[$j]['paid_status']?></td>
            <td><?=$res[$j]['entry_type']?></td>
            <td><?=$res[$j]['status']?></td>						
        </tr>
    <?php
              }
    ?>
</table>