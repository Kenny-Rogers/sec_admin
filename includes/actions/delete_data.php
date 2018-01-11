<?php
   //class for API Transactions
   include('../api.php');

   //getting the calling page
   $page = 'man_users';

   //performing API call
   $results = API::get_data(API::get_api_url('delete_personnel_info')."&uid=".$_GET['uid']);

   //decoding the results into an array
   $output = json_decode($results, true);

   //redirecting based on the success of the operation
    if($output['status'] == 1){
        header('location:../../public/index.php?page='.$page.'&status=success');
    } else {
        header('location:../../public/index.php?page='.$page.'&status=fail');
    }
?>
