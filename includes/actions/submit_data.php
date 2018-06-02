<?php
   //class for API Transactions
   include('../api.php');

   //getting the calling page
   $page = $_GET['page'];

  // print_r($_POST);

   //getting the return page
   $rpage = isset($_GET['rpage']) ? $_GET['rpage'] : $page;

//    print_r($_POST);
   //performing API call
   $results = API::post_data(API::get_api_url($page), $_POST);

   //decoding the results into an array
   $output = json_decode($results, true);

//    print_r($results);
   //redirecting based on the success of the operation
    if($output['status'] == 1){
        header('location:../../public/index.php?page='.$rpage.'&status=success');
    } else {
        header('location:../../public/index.php?page='.$rpage.'&status=fail');
    }
?>
