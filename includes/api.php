<?php

class API {
  //web protocol address
  private static $PROTOCOL = "http://localhost/final_proj_api/";//"http://127.0.0.1/final_proj_api/";

  //URL CONSTANTS
  /* PERSONNEL */
  private static $PERSONNEL_REGISTRATION_URL = "public/register_user.php?user_type=personnel";
  private static $PERSONNEL_LIST_URL = "public/get_users_list.php?user_type=personnel";
  private static $PERSONNEL_DELETE_URL = "public/delete_user.php?user_type=personnel";
  private static $PERSONNEL_DELETE_URL1 = "public/delete_data.php?user_type=personnel";
  private static $PERSONNEL_EDIT_URL = "public/edit_user.php?user_type=personnel";
  private static $PERSONNEL_EDIT_URL1 = "public/update_data.php?user_type=personnel";
  private static $PERSONNEL_INFO_URL = "public/get_user.php?user_type=personnel";

  /* SYSTEM USER */
  private static $USERS_LIST_URL = "public/get_users_list.php?user_type=system_user";
  private static $USER_INFO_URL = "public/get_user.php?user_type=personnel";
  private static $NON_USER_LIST_URL = "public/get_users_list.php?user_type=non_user_personnel";
  private static $USER_REGISTRATION_URL = "public/register_user.php?user_type=system_user";

  /* SECRETARIAT  */
  private static $SECRETARIAT_REGISTRATION_URL = "public/register_user.php?user_type=secretariat";
  private static $SECRETARIAT_LIST_URL = "public/get_users_list.php?user_type=secretariat";
  private static $SECRETARIAT_INFO_URL = "public/get_user.php?user_type=secretariat";
  private static $SECRETARIAT_REP_LIST_URL = "public/get_users_list.php?user_type=sec_rep";
  private static $SECRETARIAT_DELETE_URL = "public/delete_data.php?user_type=secretariat";

  /*PATROL TEAM */
  private static $NON_LEADER_LIST_URL = "public/get_users_list.php?user_type=non_leader_personnel";
  private static $PATROL_TEAM_REGISTRATION_URL = "public/register_user.php?user_type=patrol_team";
  private static $NON_TEAM_MEMBERS_LIST_URL = "public/get_users_list.php?user_type=non_team_member";
  private static $PATROL_TEAM_LIST_URL = "public/get_users_list.php?user_type=patrol_team";
  private static $PATROL_TEAM_MEMBER_REG_URL = "public/register_user.php?user_type=patrol_team_assign";

  /*DEPLOYMENT PLAN */
  private static $DEPLOYMENT_PLAN_REG_URL = "public/register_user.php?user_type=dep_plan";
  private static $DEPLOYMENT_PLAN_LIST_URL = "public/get_users_list.php?user_type=dep_plan";
  private static $DEPLOYMENT_PLAN_ENLIST_URL = "public/register_user.php?user_type=enroll_team";
  private static $DEPLOYMENT_PLAN_INFO_URL = "public/get_user.php?user_type=dep_plan";
  private static $DEPLOYMENT_PLAN_EDIT_URL = "public/update_data.php?user_type=dep_plan";
  private static $DEPLOYMENT_PLAN_DELETE_URL = "public/delete_data.php?user_type=dep_plan";

  /* COMPLAINT */
  private static $COMPLAINT_LIST_URL = "public/get_users_list.php?user_type=complaint";
  private static $COMPLAINANT_LIST_URL = "public/get_users_list.php?user_type=complainant";

  /* COMPLAINT_ACTION */
  private static $COMPLAINT_ACTION_REGISTRATION_URL = "public/register_user.php?user_type=complain_action";

  /* COMPLAINT MEDIA */
  private static $COMPLAINT_MEDIA_LIST_URL = "public/get_users_list.php?user_type=complaint_media";
  private static $COMPLAINT_MEDIA_URL = "public/complaint_media/";

  //$url is the api url to post the data to
  //$data is the information to be sent to API
  //returns the results from the operation
  public static function post_data($url="", $data){
    //Initiate cURL.
    $connection = curl_init($url);

    //Encode the array into JSON.
    $jsonDataEncoded = json_encode($data);

    //Tell cURL that we want to send a POST request.
    curl_setopt($connection, CURLOPT_POST, 1);

    //Attach our encoded JSON string to the POST fields.
    curl_setopt($connection, CURLOPT_POSTFIELDS, $jsonDataEncoded);

    //return the transfer as a string
    curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);

    //Set the content type to application/json
    curl_setopt($connection, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    //Execute the request
    $result = curl_exec($connection);

    //return the data
    return $result;
  }

  //fetch data from the API url ($url)
  public static function get_data($url=""){
    //  Initiate curl
    $connection = curl_init();
    // Disable SSL verification
    curl_setopt($connection, CURLOPT_SSL_VERIFYPEER, false);
    //Tell cURL that we want to send a POST request.
    //curl_setopt($connection, CURLOPT_GET, 1);
    // Will return the response, if false it print the response
    curl_setopt($connection, CURLOPT_RETURNTRANSFER, true);
    // Set the url
    curl_setopt($connection, CURLOPT_URL, $url);
    // Execute
    $result=curl_exec($connection);
    // Closing
    curl_close($connection);

    //Attempt to decode the incoming RAW post data from JSON.
    $decoded = json_decode($result, true);

    return $decoded;
  }

  //returns the API URL for a given page ($page)
  public static function get_api_url($page=""){
    //the given web url
    $url = self::$PROTOCOL;

    //the path to exact file
    switch ($page) {
      case 'edit_user':
        $url .= self::$PERSONNEL_EDIT_URL;
        break;

      case 'create_user':
        $url .= self::$USER_REGISTRATION_URL;
        break;
      
      case 'man_users':
        $url .= self::$USERS_LIST_URL;
        break;

      case 'user_info':
        $url .= self::$USER_INFO_URL;
        break;

      case 'delete_personnel_info':
        $url .= self::$PERSONNEL_DELETE_URL;
        break;

      case 'reg_personnel':
        $url .= self::$PERSONNEL_REGISTRATION_URL;
        break;

      case 'list_personnel':
        $url .= self::$PERSONNEL_LIST_URL;
        break;

      case 'edit_personnel':
        $url .= self::$PERSONNEL_EDIT_URL1;
        break;

      case 'delete_personnel':
        $url .= self::$PERSONNEL_DELETE_URL1;
        break;

      case 'create_sec':
        $url .= self::$SECRETARIAT_REGISTRATION_URL;
        break;
      
      case 'man_sec':
        $url .= self::$SECRETARIAT_LIST_URL;
        break;

      case 'delete_sec':
        $url .= self::$SECRETARIAT_DELETE_URL;
        break;

      case 'sec_info':
        $url .= self::$SECRETARIAT_INFO_URL;
        break;

      case 'list_non_user_personnel':
        $url .= self::$NON_USER_LIST_URL;
        break;
      
      
      case 'list_sec_rep':
        $url .= self::$SECRETARIAT_REP_LIST_URL;
        break;

        

      case 'list_non_leader_personnel':
        $url .= self::$NON_LEADER_LIST_URL;
        break;

      

      case 'create_patrol_team':
        $url .= self::$PATROL_TEAM_REGISTRATION_URL;
        break;

      case 'list_non_team_members':
        $url .= self::$NON_TEAM_MEMBERS_LIST_URL;
        break;

        
      case 'list_patrol_team':
        $url .= self::$PATROL_TEAM_LIST_URL;
        break;
        
      case 'personnel_info':
        $url .= self::$PERSONNEL_INFO_URL;
        break;

      case 'assign_patrol_team':
        $url .= self::$PATROL_TEAM_MEMBER_REG_URL;
        break;

      case 'create_dep_plan':
        $url .= self::$DEPLOYMENT_PLAN_REG_URL;
        break;
      
      case 'view_dep_plan':
        $url .= self::$DEPLOYMENT_PLAN_LIST_URL;
        break;

      case 'enroll_team':
        $url .= self::$DEPLOYMENT_PLAN_ENLIST_URL;
        break;
      
      case 'dep_plan_info':
        $url .= self::$DEPLOYMENT_PLAN_INFO_URL;
        break;

      case 'edit_dep_plan':
        $url .= self::$DEPLOYMENT_PLAN_EDIT_URL;
        break;

      case 'delete_dep_plan':
        $url .= self::$DEPLOYMENT_PLAN_DELETE_URL;
        break;

      case 'get_complaint':
        $url .= self::$COMPLAINT_LIST_URL;
        break;

      case 'get_complainant':
        $url .= self::$COMPLAINANT_LIST_URL;
        break;

      case 'answer_complaint':
        $url .= self::$COMPLAINT_ACTION_REGISTRATION_URL;
        break;

      case 'get_media':
        $url .= self::$COMPLAINT_MEDIA_LIST_URL;
        break;

      case 'get_media_file':
        $url .= self::$COMPLAINT_MEDIA_URL;
        break;

      default:
        $url = "";
        break;
    }
    
    return $url;
  }

}

?>
