<?php
   //class for API Transactions
   include('../api.php');

   //getting the calling page
   $page = $_GET['page'];

   //performing API call
   $results = API::post_data(API::get_api_url($page), $_POST);

   //decoding the results into an array
   $output = json_decode($results, true);
   //echo API::get_api_url($page);
  // print_r($results);

   //redirecting based on the success of the operation
    if($output['status'] == 1){
        header('location:../../public/index.php?page='.$page.'&status=success');
    } else {
        header('location:../../public/index.php?page='.$page.'&status=fail');
    }
?>
