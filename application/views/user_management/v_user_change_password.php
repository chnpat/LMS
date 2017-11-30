<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <i class="fa fa-users"> เปลี่ยนรหัสผ่าน - Change Password</i>
    </h1>
  </section>
  <section class="content">
    <div class="col-12">
      <?php if($this->session->flashdata('change_password_msg')){ ?>
        <div class="alert alert-dismissible alert-success">
            <button class="close" data-dismiss="alert">&times;</button>
            <strong class="text text-black"><?=$this->session->flashdata('change_password_msg');?></strong>
        </div>
      <?php } ?>
      <?php if($this->session->flashdata('change_password_err')){ ?>
        <div class="alert alert-dismissible alert-danger">
            <button class="close" data-dismiss="alert">&times;</button>
            <strong class="text text-black"><?=$this->session->flashdata('change_password_err');?></strong>
        </div>
      <?php } ?>
    </div>
    <div class="box box-info">
      <div class="box-header with-border">
        คุณกำลังเปลี่ยนรหัสผ่านของ <b><?=$user_obj['user_first_name']?> <?=$user_obj['user_last_name']?></b>
      </div>
      <div class="box-body">
        <form method="post" action="<?=base_url()?>c_user_management/change_password_proc/<?=$user_obj['user_id']?>">
          <div class="row">
            <div class="col-md-7">
              <div class="form-group">
                <label for="old_password">รหัสผ่านเก่า - Old Password <span class="text-red">*</span></label>
                <input type="password" class="form-control required" id="in_cp_old" name="in_cp_old" placeholder="กรอกรหัสผ่านเดิม" oninvalid="this.setCustomValidity('กรุณากรอกรหัสผ่านเก่า')" oninput="setCustomValidity('')" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-7">
              <div class="form-group">
                <label for="new_password">รหัสผ่านใหม่ - New Password <span class="text-red">*</span></label>
                <input type="password" class="form-control required" id="in_cp_new" name="in_cp_new" placeholder="กรอกรหัสผ่าน" aria-describedby="password_help" onkeyup="check();" oninvalid="this.setCustomValidity('กรุณากรอกรหัสผ่าน')" oninput="setCustomValidity('')" required>
                <small id="password_help" class="form-text text-muted">รหัสผ่านต้องประกอบด้วยตัวเลข ตัวอักษร<span class="text text-danger"><u><b>ภาษาอังกฤษ</b></u></span> (ตัวพิมพ์เล็กและตัวพิมพ์ใหญ่) และ<span class="text text-danger"><u><b>ความยาว 6-12 ตัวอักษร</b></u></span> เท่านั้น</small>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-7">
              <div class="form-group">
                <label for="new_password_conf">ยืนยันรหัสผ่านใหม่ - New Password Confirmation <span class="text-red">*</span></label>
                <input type="password" class="form-control required" id="in_cp_new_conf" name="in_cp_new_conf" placeholder="กรอกรหัสผ่านอีกครั้ง" onkeyup='check();' oninvalid="this.setCustomValidity('กรุณายืนยันรหัสผ่าน')" oninput="setCustomValidity('')" required>
                <div id="password_error_msg"></div>
              </div>
            </div>
          </div>
          <br/>
          <br/>
          <div class="row">
            <div class="col-md-7">
              <div class="pull-right">
                <a href="<?php echo base_url()?>c_dashboard/index" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> กลับหน้าหลัก</a>
                <button type="submit" class="btn btn-warning"><i class="fa fa-check-square-o"></i> เปลี่ยนรหัสผ่าน</a>
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
    var password = document.getElementById('in_cp_new').value;
    var password_conf = document.getElementById('in_cp_new_conf').value;
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
