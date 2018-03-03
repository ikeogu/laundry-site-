<?php
   /* function  message ($header, $message, $dismisable){
      $alert = '';
    $alert_class = 'alert';                                                                             
    if ( $header ) $alert_class += 'alert-'.$header;
    if ( $dismisable ) $alert_class += ' alert-dismissable';

     $alert = '<div class="'.$alert_class.'">'.$message.'</div>';
     return $alert;
    

  }*/
   function redirect ($location = ''){
   	header("location: $location");
   } 


?>