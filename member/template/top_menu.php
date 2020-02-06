<?php
 $assets_url = '../../v4.0.1/theme';
?>
<div class="top-menu">
    <ul class="nav navbar-nav pull-right">
        <!-- BEGIN NOTIFICATION DROPDOWN -->
        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
        
        <!-- END TODO DROPDOWN -->
        <!-- BEGIN USER LOGIN DROPDOWN -->
        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
        <li class="dropdown dropdown-user">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
              <?php
			    $whrstr .= "AND id='".$_SESSION['users_id']."'";
		          unset($info);
				  unset($data);
				$info["table"] = "users";
				$info["fields"] = array("users.*"); 
				$info["where"]   = "1   $whrstr";
				$arr_pic =  $db->select($info);
				if(count($arr_pic)>0)
				{
			  ?>
              <img alt="" class="img-circle" src="../../<?=$arr_pic[0]['file_picture']?>"/>        
              <?php
				}
				else
				{
		     ?>
             <img alt="" class="img-circle" src="<?=$assets_url?>/assets/admin/layout/img/avatar.png"/>  
             <?php			
				}
		    ?>		
            <span class="username username-hide-on-mobile"> 
            <?=$_SESSION['email']?> 
            </span>
            <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-default">                
                <li>
                    <a href="../login/index.php?cmd=logout">
                    <i class="icon-key"></i> Log Out </a>
                </li>
            </ul>
        </li>
      
        <!-- END QUICK SIDEBAR TOGGLER -->
    </ul>
</div>