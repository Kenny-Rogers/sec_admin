<?php
  include('functions.php');
  //loads the configurations of the system

    $page = "";
    if(isset($_SESSION['uid']) && isset($_GET['page'])) {
       $page = $_GET['page'];  
       $uid = $_SESSION['uid'];
      //things to specify for every case
      $results = API::get_data(API::get_api_url('user_info1') . "&uid=$uid");
      $user_response = array_shift($results);
      $personnel = $user_response["personnel"];
      $user = $user_response["system_user"];
      $user_type = $user['role'];

    } elseif ($_GET['page'] == "default") {
       //$page = "default";
       $uid = $_GET['uid'];
       $_SESSION['uid'] = $uid;
      //things to specify for every case
      $results = API::get_data(API::get_api_url('user_info1') . "&uid=$uid");
      $user_response = array_shift($results);
      $personnel = $user_response["personnel"];
      $user = $user_response["system_user"];
      $user_type = trim($user['role']);
      
      if ($user_type == "secretariat representative") {
          $page = "manage_patrol_team";
      } elseif ($user_type == "dispatcher") {
          $page = "map_view";
      } elseif ($user_type == "admin") {
         $page = "man_sec";
      }

    } else {
      $page = "log_out"; 
    }

    switch ($page){
      case 'log_out':
        session_destroy();
        header('location:../index.php?status=logout');
      break;
  
      case 'generate_report':
        $title = "Generate Report";
        $main_content = 'contents/general/generate_report.php';
      break;

      /** Admin requests**/
       case 'create_sec':
        $title = "Create Secretariat";
        $main_content = 'contents/sys_admin/secretariat/create_sec.php';
      break;

      case 'man_sec':
        $title = "Manage Secretariat";
        $main_content = 'contents/sys_admin/secretariat/manage_sec.php';
      break;

      case 'create_sec':
        $title = "Add Secretariat";
        $main_content = 'contents/sys_admin/create_sec.php';
      break;

      case 'man_users':
        $title = "Manage Users";
        $main_content = 'contents/sys_admin/manage_users.php';
      break;

      case 'create_user':
        $title = "Add System User";
        $main_content = 'contents/sys_admin/create_user.php';
      break;

      case 'delete_user':
        header('location:../includes/actions/delete_data.php?uid='.$_GET['uid']);
      break;

      case 'reg_personnel':
        $title = "Register Personnel";
        $main_content = 'contents/general/reg_personnel.php';
      break;

      case 'list_personnel':
        $title = "List Personnel";
        $main_content = 'contents/general/list_personnel.php';
      break;

      case 'edit_user':
        if(!isset($_GET['uid'])) {header('location:?page=man_users&status=fail');}
        $title = "Edit System User Information";
        $main_content = 'contents/sys_admin/edit_user.php';
      break;

      case 'create_patrol_team':
        $title = "Create Patrol Team";
        $main_content = 'contents/secretariat/create_patrol_team.php';
      break;

      case 'assign_patrol_team':
        $title = "Assign Patrol Team";
        $main_content = 'contents/secretariat/add_team_member.php';
      break;
      
      case 'manage_patrol_team':
        $title = "Manage Patrol Team";
        $main_content = 'contents/secretariat/manage_patrol_team.php';
      break;

      case 'create_dep_plan':
        $title = "Create Deployment Plan";
        $main_content = 'contents/secretariat/create_deployment_plan.php';
      break;

      case 'view_dep_plan':
        $title = "Manage Deployment Plan";
        $main_content = 'contents/secretariat/manage_deployment_plans.php';
      break;

      case 'enroll_team':
        $title = "Enroll Patrol Team On Deployment Plan";
        $main_content = 'contents/secretariat/enroll_team.php';
      break;
      /** End of Admin request**/

      /** Secretariat**/
      // case 'create_user':
      //   $title = "Add System User";
      //   $main_content = 'contents/sys_admin/create_user.php';
      // break;
      /** End of Secretariat**/


      case 'answer_complaint':
        $title = "Answer Complaint";
        $main_content = 'contents/dispatcher/contact.php';
      break;

      case 'map_view':
        $title = "View Patrol Teams Locations";
        $main_content = 'contents/dispatcher/map_view.php';
      break;

      case 'make_ann':
        $title = "View Patrol Teams Locations";
        $main_content = 'contents/secretariat/make_ann.php';
      break;


      default :
        $title = "Dashboard";
        $main_content =  'contents/main_content/basic.php';
      break;
    }

?>
