<?php
    session_start();

    require_once("../includes/api.php");

    include('../includes/page_loader.php');

    include('page_components/header.php');

    include('page_components/menu.php');

    include($main_content);

    include('page_components/footer.php');

?>