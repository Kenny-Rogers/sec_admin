<?php

    include('../includes/page_loader.php');

    include('page_components/header.php');

    include('page_components/menu.php');

    include($main_content);

    include('page_components/footer.php');
?>

<script type="text/javascript">
    $(document).ready(function(){
        // var page = jQuery.url().param("page");
        // if(page == 'answer_complaint') {
            setInterval(function(){
                $('#data_returned').load('../includes/actions/get_complaints.php');
            }, 7000);
       // } else {
        //    alert("hello");
        //}

        setInterval(function(){
                $('#mapview').load('contents/dispatcher/map.php');
            }, 10000);        
    });

    $(document).ready(function () {
      window.setTimeout(function() {
          $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
              $(this).remove(); 
          });
      }, 5000);
    });
</script>