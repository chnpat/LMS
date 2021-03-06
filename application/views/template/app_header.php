<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LMS - <?=$title?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionic-framework/2.0.0-beta.2/ionic.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/css/AdminLTE.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.0/css/responsive.dataTables.min.css">
    <!-- For DataTables Plugin -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/responsive/2.2.0/js/dataTables.responsive.js"></script>

    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/adminSkin/_all-skins.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/app_style.css" />
  </head>
  <body class="skin-blue fixed sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <a href="<?php echo base_url()?>c_dashboard/index" class="logo">
          <span class="logo-mini"><b>LMS</b></span>
          <span class="logo-lg"><b>E</b>-Learning</span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">เปิดเมนู</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu hidden-xs">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span><i class="fa fa-user-o"></i> <?=$user_obj['user_first_name']?> <?=$user_obj['user_last_name']?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <p>
                      <b><?=$user_obj['user_first_name']?> <?=$user_obj['user_last_name']?></b><br/><br/>
                      <small><b>ชื่อผู้ใช้งาน:</b> <?=$user_obj['user_name']?></small><br/>
                      <small>
                        <?php if($user_obj['user_role'] == 'A'){
                          echo "<span class='label label-success'>ผู้ดูแลระบบ</span>";
                        }
                        else if($user_obj['user_role'] == 'S'){
                          echo "<span class='label label-warning'>นิสิต/นักศึกษา</span>";
                        }
                        else{
                          echo "<span class='label label-danger'>อาจารย์ผู้สอน</span>";
                        }
                        ?>
                      </small>
                    </p>
                  </li>
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?=base_url()?>c_user_management/change_password" class="btn btn-default btn-flat"><i class="fa fa-key"></i> เปลี่ยนรหัสผ่าน</a>
                    </div>
                    <div class="pull-right">
                      <a href="#" data-href="<?=base_url()?>c_user_management/logout" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#logout-confirm"><i class="fa fa-sign-out"></i> ออกจากระบบ</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <aside class="main-sidebar">
        <section class="sidebar">
          <ul class="sidebar-menu">
            <li class="header">เมนู</li>
            <!-- Dashboard -->
            <li class="treeview">
              <a href="<?=base_url()?>c_dashboard/index">
                <i class="fa fa-dashboard"></i> <span>แดชบอร์ด</span>
              </a>
            </li>
            <?php if($user_obj['user_role'] != "T") : ?>
            <!-- Course -->
            <li class="treeview menu-open">
              <a href="#">
                <i class="fa fa-book text-yellow"></i> <span>รายวิชาเรียน</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <!-- Course Registration -->
                <li>
                  <a href="<?=base_url()?>c_course_enrollment/index">
                    <i class="fa fa-circle-o text-yellow"></i> <span>สมัครเรียน</span>
                  </a>
                </li>
                <!-- Course List -->
                <li>
                  <a href="<?=base_url()?>c_course_list/index">
                    <i class="fa fa-circle-o text-blue"></i> <span>รายวิชาที่กำลังเรียน</span>
                  </a>
                </li>
              </ul>
            </li>
            <? endif ?>
            <?php if($user_obj['user_role'] != "S") : ?>
            <!-- Course Management -->
            <li class="treeview menu-open">
              <a href="#">
                <i class="fa fa-book text-red"></i> <span>จัดการรายวิชา</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <!-- Teacher Course List -->
                <li>
                  <a href="<?=base_url()?>c_course_management/index">
                    <i class="fa fa-circle-o text-red"></i> <span>รายวิชา</span>
                  </a>
                </li>
                <!-- Teacher Question List -->
                <li>
                  <a href="<?=base_url()?>c_question_management/index">
                    <i class="fa fa-circle-o text-red"></i> <span>ข้อสอบ</span>
                  </a>
                </li>
                <!-- Teacher Question Set List  -->
                <li>
                  <a href="<?=base_url()?>c_question_set_management/index">
                    <i class="fa fa-circle-o text-red"></i> <span>ชุดข้อสอบ</span>
                  </a>
                </li>
              </ul>
            </li>
            <!-- News Management -->
            <li class="treeview">
              <a href="<?=base_url()?>c_news_management/index">
                <i class="fa fa-newspaper-o text-red"></i> <span>จัดการข่าวสาร</span>
              </a>
            </li>
            <?php endif ?>
            <!-- Report -->
            <?php if($user_obj['user_role'] == "S"): ?>
            <li class="treeview">
              <a href="<?=base_url()?>c_report/index">
                <i class="fa fa-line-chart text-yellow"></i>
                <span>รายงานผลการเรียนของตนเอง</span>
              </a>
            </li>
            <?php else: ?>
            <li class="treeview">
              <a href="<?=base_url()?>c_report/teacher">
                <i class="fa fa-line-chart text-red"></i>
                <span>รายงานผลการเรียน</span>
              </a>
            </li>
            <?php endif ?>
            <?php if($user_obj['user_role'] == "A"): ?>
            <!-- User Management -->
            <li class="treeview">
              <a href="<?=base_url()?>c_user_management/index">
                <i class="fa fa-users text-green"></i> <span>จัดการบัญชีผู้ใช้งาน</span>
              </a>
            </li>
            <!-- Admin Config. -->
            <li class="treeview">
              <a href="<?=base_url()?>c_admin_config/index">
                <i class="fa fa-gears text-green"></i> <span> ตั้งค่าระบบ</span>
              </a>
            </li>
            <?php endif ?>
            <!-- User Management when the screen is small -->
            <!-- Menu Group Header-->
            <li class="header visible-xs">ผู้ใช้งาน</li>
            <li class="treeview visible-xs">
              <a href="#">
                <i class="fa fa-user-o"></i> สวัสดี, <?=$user_obj['user_name']?>
              </a>
            </li>
            <!-- Change Password -->
            <li class="treeview visible-xs">
              <a href="<?=base_url()?>c_user_management/change_password" >
                <i class="fa fa-key"></i><span> เปลี่ยนรหัสผ่าน</span>
              </a>
            </li>
            <!-- Logout -->
            <li class="treeview visible-xs">
              <a href="#" data-href="<?=base_url()?>c_user_management/logout" data-toggle="modal" data-target="#logout-confirm">
                <i class="fa fa-sign-out text-red"></i><span> ออกจากระบบ</span>
              </a>
            </li>
          </ul>
        </section>
      </aside>
