<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <i class="fa fa-users"></i> <?php echo (($user_obj_edit != NULL)? "แก้ไขบัญชีผู้ใช้งาน - Edit User Account": "เพิ่มบัญชีผู้ใช้งาน - Add a User Account"); ?>
    </h1>
  </section>
  <section class="content">
    <div class="col-12">
      <?php if($this->session->flashdata('user_det_msg')): ?>
        <div class="alert alert-dismissible alert-success">
            <button class="close" data-dismiss="alert">&times;</button>
            <strong class="text text-black"><?=$this->session->flashdata('user_det_msg');?></strong>
        </div>
      <?php endif ?>
      <?php if($this->session->flashdata('user_det_err')): ?>
        <div class="alert alert-dismissible alert-danger">
            <button class="close" data-dismiss="alert">&times;</button>
            <strong class="text text-black">ข้อผิดพลาด: <?=$this->session->flashdata('user_det_err');?></strong>
        </div>
      <?php endif ?>
    </div>
    <div class="box box-info">
      <div class="box-body">
        <form method="post" action="
          <?php if(empty($user_obj_edit)){
              echo base_url()."c_user_detail/create_user";
            }
            else{
              echo base_url()."c_user_detail/update_user/".$user_obj_edit['user_id'];
            }
          ?>
        ">
          <div class="row">
            <!-- Username -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="user_name">ชื่อผู้ใช้งาน - Username <span class="text-red">*</span></label>
                <input type="text" class="form-control required" id="in_det_username" name="in_det_username" value="<?php echo $user_obj_edit['user_name']; ?>" placeholder="กรอกชื่อผู้ใช้งาน เช่น abc001" aria-describedby="username_help" oninvalid="this.setCustomValidity('กรุณากรอกชื่อผู้ใช้งาน')" oninput="setCustomValidity('')" <?php echo ($user_obj_edit != NULL)? "disabled":""?> required>
                <small id="username_help" class="form-text text-muted">ชื่อผู้ใช้งานจะต้องประกอบด้วยตัวเลข ตัวอักษร<span class="text text-danger"><u><b>ภาษาอังกฤษ</b></u></span> (ตัวพิมพ์เล็กและตัวพิมพ์ใหญ่) เท่านั้น</small>
              </div>
            </div>
            <!-- Email Address -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="user_email">ที่อยู่อีเมล - Email Address <span class="text-red">*</span></label>
                <input type="email" class="form-control required" id="in_det_email" name="in_det_email" value="<?=$user_obj_edit['user_email']?>" placeholder="กรอกที่อยู่อีเมล เช่น abc@lms.com" oninvalid="this.setCustomValidity('กรุณากรอกที่อยู่อีเมลให้ถูกรูปแบบ')" oninput="setCustomValidity('')" required>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- Gender & First Name -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="user_first_name">ชื่อจริง - First Name <span class="text-red">*</span></label>
                <div class="input-group">
                  <div class="input-group-btn">
                    <select id="in_det_title" name="in_det_title" class="selectpicker form-control dropdown-menu">
                      <option value="M" <?=(($user_obj_edit['user_gender']=="M")?"selected":"") ?>>นาย</option>
                      <option value="F" <?=(($user_obj_edit['user_gender']=="F")?"selected":"") ?>>นางสาว</option>
                      <option value="O" <?=(($user_obj_edit['user_gender']=="O")?"selected":"") ?>>นาง</option>
                    </select>
                  </div>
                  <input type="text" class="form-control required" id="in_det_firstname" name="in_det_firstname" value="<?=$user_obj_edit['user_first_name']?>" placeholder="กรอกชื่อจริง" aria-describedby="firstname_help" oninvalid="this.setCustomValidity('กรุณากรอกชื่อจริง')" oninput="setCustomValidity('')" required>
                </div>
                <small id="firstname_help" class="form-text text-muted">ชื่อจริงตามที่ระบุไว้ในบัตรประจำตัวนิสิตเท่านั้น</small>
              </div>
            </div>
            <!-- Last Name -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="user_last_name">นามสกุล - Last Name <span class="text-red">*</span></label>
                <input type="text" class="form-control required" id="in_det_lastname" name="in_det_lastname" value="<?=$user_obj_edit['user_last_name']?>" placeholder="กรอกนามสกุล" oninvalid="this.setCustomValidity('กรุณากรอกนามสกุล')" oninput="setCustomValidity('')" required>
              </div>
            </div>
          </div>
          <?php if($user_obj_edit == NULL): ?>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="user_password">รหัสผ่าน - Password <span class="text-red">*</span></label>
                <input type="password" class="form-control required" id="in_det_pass" name="in_det_pass" placeholder="กรอกรหัสผ่าน" aria-describedby="password_help" onkeyup="check();" oninvalid="this.setCustomValidity('กรุณากรอกรหัสผ่าน')" oninput="setCustomValidity('')" required>
                <small id="password_help" class="form-text text-muted">รหัสผ่านต้องประกอบด้วยตัวเลข ตัวอักษร<span class="text text-danger"><u><b>ภาษาอังกฤษ</b></u></span> (ตัวพิมพ์เล็กและตัวพิมพ์ใหญ่) และ<span class="text text-danger"><u><b>ความยาว 6-12 ตัวอักษร</b></u></span> เท่านั้น</small>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="user_password_conf">ยืนยันรหัสผ่าน - Password Confirmation <span class="text-red">*</span></label>
                <input type="password" class="form-control required" id="in_det_pass_conf" name="in_det_pass_conf" placeholder="กรอกรหัสผ่านอีกครั้ง" onkeyup='check();' oninvalid="this.setCustomValidity('กรุณายืนยันรหัสผ่าน')" oninput="setCustomValidity('')" required>
                <div id="password_error_msg"></div>
              </div>
            </div>
          </div>
          <?php endif ?>
          <div class="row">
            <!-- Role -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="user_role">บทบาท - Role <span class="text-red">*</span></label>
                <select name="in_det_role" id="in_det_role" class="form-control"
                <?=(($user_obj_edit['user_id'] == "1")?"disabled":"")?>>
                  <option value="A" <?=(($user_obj_edit['user_role'] == "A")?"selected":"")?>>ผู้ดูแลระบบ - Administrator</option>
                  <option value="T" <?=(($user_obj_edit['user_role'] == "T")?"selected":"")?>>อาจารย์ผู้สอน - Instructor</option>
                  <option value="S" <?=(($user_obj_edit['user_role'] == "S")?"selected":"")?>>นิสิต - Student</option>
                </select>
              </div>
            </div>
            <!-- Student ID -->
            <div class="col-md-6">
              <div class="form-group <?=(($user_obj_edit['user_role'] != "S")? "hidden":"")?>" id="div_for_id">
                <label for="user_student_id">รหัสประจำตัวนิสิต - Student ID <span class="text-red">*</span></label>
                <input type="text" class="form-control required" id="in_det_studentid" name="in_det_studentid" value="<?=$user_obj_edit['user_std_id']?>" placeholder="กรอกรหัสประจำตัวนิสิต เช่น 59XXXXXX" oninvalid="this.setCustomValidity('กรุณากรอกนามสกุล')" oninput="setCustomValidity('')">
              </div>
            </div>
          </div>
          <div class="row <?=(($user_obj_edit['user_id'] == "1")?"hidden":"")?>">
            <!-- User Status -->
            <div class="col-md-6">
              <div class="form-group form-check">
                <label for="user_status">สถานะ - Status <span class="text-red">*</span></label>
                <div class="well well-sm">
                  <div class="checkbox">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" name="in_det_status" id="in_det_status" <?=(($user_obj_edit['user_status'] == "A")? "checked":"")?>> <span id="status_label"></span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6">
              <div class="pull-right">
                <a href="<?php echo base_url()?>c_user_management/index" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> กลับหน้าหลัก</a>
                <button type="submit" class="btn btn-warning"> <?=(($user_obj_edit == NULL)?"<i class='fa fa-user-plus'></i> เพิ่มบัญชีผู้ใช้งาน":"<i class='fa fa-edit'></i> แก้ไขบัญชีผู้ใช้งาน")?></button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>
<script type="text/javascript">
var check = function() {
  var password = document.getElementById('in_det_pass').value;
  var password_conf = document.getElementById('in_det_pass_conf').value;
  if(password != "" || password_conf != ""){
    if (password != password_conf ) {
      document.getElementById('password_error_msg').innerHTML = '<div class="label label-danger label-sm">รหัสผ่านไม่ตรงกัน</div>';
    }
    else {
      document.getElementById('password_error_msg').innerHTML = '<div class="label label-success label-sm">รหัสผ่านถูกต้อง</div>';
    }
  }
  else{
    document.getElementById('password_error_msg').innerHTML = '';
  }
}
</script>
<script type="text/javascript">
$('#in_det_role').on('change', function() {
  var $this = $(this),
    $div2 = $('#div_for_id');

  if ($this.val() == 'S') {
    $div2.removeClass('hidden');
  } else {
    $div2.addClass('hidden');
  }
});

$('#in_det_status').on('change', function(){
  var $this = $(this),
    $span = $('#status_label');

  if($this.prop('checked') == true){
    $span.removeClass();
    $span.addClass('text-green');
    $span.html('<i class="fa fa-check"></i> <b>เปิดการใช้งาน</b>บัญชีผู้ใช้งานนี้');
  }
  else{
    $span.removeClass();
    $span.addClass('text-red');
    $span.html('<i class="fa fa-times"></i> <b>ปิดการใช้งาน</b>บัญชีผู้ใช้งานนี้');
  }
});
function loadStatus(){
  var $this = $('#in_det_status'),
    $span = $('#status_label');

  if($this.prop('checked') == true){
    $span.removeClass();
    $span.addClass('text-green');
    $span.html('<i class="fa fa-check"></i> <b>เปิดการใช้งาน</b>บัญชีผู้ใช้งานนี้');
  }
  else{
    $span.removeClass();
    $span.addClass('text-red');
    $span.html('<i class="fa fa-times"></i> <b>ปิดการใช้งาน</b>บัญชีผู้ใช้งานนี้');
  }
}
$(loadStatus);
</script>
