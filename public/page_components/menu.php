
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <!--li class="header"></li>
        < Optionally, you can add icons to the links -->
    <?php //if($user == 'dispatcher') {?>
        <li class="active"><a href="?page=answer_complaint"><i class="fa fa-link"></i> <span>Answer Complaint</span></a></li>
        <li><a href="?page=answer_complaint"><i class="fa fa-link"></i> <span>Find Patrol Team</span></a></li>
        <li><a href="?page=answer_complaint"><i class="fa fa-link"></i> <span>Send Message</span></a></li>
    <?php //} elseif($user == 'sec_rep') { ?>
        <!--li><a href="?page=create_dep_plan"><i class="fa fa-link"></i> <span>Create Deployment Plan</span></a></li>
        <li><a href="?page=generate_report"><i class="fa fa-link"></i> <span>Generate Reports</span></a></li>
        <li><a href="?page=view_dep_plan"><i class="fa fa-link"></i> <span>View Deployment Plan</span></a></li>
        <li><a href="?page=reg_personnel"><i class="fa fa-link"></i> <span>Register Personnel</span></a></li-->
         <li><a href="?page=list_personnel"><i class="fa fa-link"></i> <span>Manage Personnel</span></a></li>
    <?php //} elseif($user == 'director') { ?>
         <li><a href="?page=generate_report"><i class="fa fa-link"></i> <span>Generate Reports</span></a></li>
         <li><a href="?page=view_dep_plan"><i class="fa fa-link"></i> <span>Manage Deployment Plans</span></a></li>
    <?php // } elseif($user == 'sys_admin') { ?>
        <li><a href="?page=man_sec"><i class="fa fa-link"></i> <span>Manage Secretariat</span></a></li>
        <!--li><a href="?page=create_sec"><i class="fa fa-link"></i> <span>Create Secretariat</span></a></li>
        <li><a href="?page=view_dep_plan"><i class="fa fa-link"></i> <span>View Deployment Plan</span></a></li-->
        <li><a href="?page=man_users"><i class="fa fa-link"></i> <span>Manage Users</span></a></li>
    <?php //} ?>
        <!--li><a href="?page=create_patrol_team"><i class="fa fa-link"></i> <span>Create Patrol Team</span></a></li>
        <li><a href="?page=assign_patrol_team"><i class="fa fa-link"></i> <span>Assign Patrol Team</span></a></li>
        <li><a href="?page=enroll_team"><i class="fa fa-link"></i> <span>Enroll Patrol Team</span></a></li-->
        <li><a href="?page=manage_patrol_team"><i class="fa fa-link"></i> <span>Manage Patrol Team</span></a></li>
        <li><a href="?page=map_view"><i class="fa fa-link"></i> <span>View Patrol Teams</span></a></li>
        <li><a href="?page=make_ann"><i class="fa fa-link"></i> <span>Make Announcement</span></a></li>
        <li><a href="?page=log_out"><i class="fa fa-link"></i> <span>Logout</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title; ?>
        <!--small>Optional description</small-->
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
    <?php 
        $status=isset($_GET["status"])?$_GET["status"]:"";
        if($status == "success"){
            output_message("Operation Successful", "success");
        }elseif($status == ""){} else{
          output_message("Operation failed", "fail");
        }
    ?>