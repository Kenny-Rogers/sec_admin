<?php 

   //class for API Transactions
   include('../api.php');
   include('../functions.php');
   $col  = $_GET['col'];
   $value  = $_GET['value'];

   //performing API call
   $secretariats = API::get_data(API::get_api_url('sec_info')."&col=$col&val=$value");


   if( $col == 'region') {
     $display = 
     "<select class='form-control' onchange=\"get_details('type', this.value, 'station_name')\">";
       foreach($secretariats as $secretariat){
        $display .= "<option value='".$secretariat['type']."'>".get_type($secretariat['type'])."</option>";
         }
    } elseif($col == 'type'){
     $display = 
     "<select class='form-control' name='sec_id' required>";
       foreach($secretariats as $secretariat){
       $display .= "<option value='".$secretariat['id']."'>".ucwords($secretariat['name'])."</option>";
      }
   }

   $display .= "</select>";

    echo $display;
?>