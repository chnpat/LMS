<section class="login-block">
  <div class="container">
    <br/>
    <div class="panel panel-info">
      <div class="panel-heading">
        <h4><i class="fa fa-user-circle-o"></i> สมัครเข้าใช้งาน - Registration Form</h4>
      </div>
      <div class="panel-body">
        <form method="post" action="<?php echo base_url() ?>c_user_register/register_process">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="user_name">ชื่อผู้ใช้งาน - Username <span class="asterisk">*</span></label>
                <input type="text" class="form-control required" id="in_reg_username" name="in_reg_username" placeholder="กรอกชื่อผู้ใช้งาน เช่น abc001" aria-describedby="username_help" oninvalid="this.setCustomValidity('กรุณากรอกชื่อผู้ใช้งาน')" oninput="setCustomValidity('')" required>
                <small id="username_help" class="form-text text-muted">ชื่อผู้ใช้งานจะต้องประกอบด้วยตัวเลข ตัวอักษร<span class="text text-danger"><u><b>ภาษาอังกฤษ</b></u></span> (ตัวพิมพ์เล็กและตัวพิมพ์ใหญ่) เท่านั้น</small>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="user_email">ที่อยู่อีเมล - Email Address <span class="asterisk">*</span></label>
                <input type="email" class="form-control required" id="in_reg_email" name="in_reg_email" placeholder="กรอกที่อยู่อีเมล เช่น abc@lms.com" oninvalid="this.setCustomValidity('กรุณากรอกที่อยู่อีเมลให้ถูกรูปแบบ')" oninput="setCustomValidity('')" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="user_password">รหัสผ่าน - Password <span class="asterisk">*</span></label>
                <input type="password" class="form-control required" id="in_reg_password" name="in_reg_password" placeholder="กรอกรหัสผ่าน" aria-describedby="password_help" onkeyup="check();" oninvalid="this.setCustomValidity('กรุณากรอกรหัสผ่าน')" oninput="setCustomValidity('')" required>
                <small id="password_help" class="form-text text-muted">รหัสผ่านต้องประกอบด้วยตัวเลข ตัวอักษร<span class="text text-danger"><u><b>ภาษาอังกฤษ</b></u></span> (ตัวพิมพ์เล็กและตัวพิมพ์ใหญ่) และ<span class="text text-danger"><u><b>ความยาว 6-12 ตัวอักษร</b></u></span> เท่านั้น</small>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="user_password_conf">ยืนยันรหัสผ่าน - Password Confirmation <span class="asterisk">*</span></label>
                <input type="password" class="form-control required" id="in_reg_password_conf" name="in_reg_password_conf" placeholder="กรอกรหัสผ่านอีกครั้ง" onkeyup='check();' oninvalid="this.setCustomValidity('กรุณายืนยันรหัสผ่าน')" oninput="setCustomValidity('')" required>
                <div id="password_error_msg"></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="user_firstname">ชื่อจริง - First Name <span class="asterisk">*</span></label>
                <div class="input-group">
                  <div class="input-group-btn">
                    <select id="in_reg_title" name="in_reg_title" class="selectpicker form-control dropdown-menu">
                      <option value="M">นาย</option>
                      <option value="F">นางสาว</option>
                      <option value="O">นาง</option>
                    </select>
                  </div>
                  <input type="firstname" class="form-control required" id="in_reg_firstname" name="in_reg_firstname" placeholder="กรอกชื่อจริง" aria-describedby="firstname_help" oninvalid="this.setCustomValidity('กรุณากรอกชื่อจริง')" oninput="setCustomValidity('')" required>
                </div>
                <small id="firstname_help" class="form-text text-muted">ชื่อจริงตามที่ระบุไว้ในบัตรประจำตัวนิสิตเท่านั้น</small>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="user_lastname">นามสกุล - Last Name <span class="asterisk">*</span></label>
                <input type="text" class="form-control required" id="in_reg_lastname" name="in_reg_lastname" placeholder="กรอกนามสกุล" oninvalid="this.setCustomValidity('กรุณากรอกนามสกุล')" oninput="setCustomValidity('')" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="user_std_no">รหัสประจำตัวนิสิต - Student Number <span class="asterisk">*</span></label>
                <input type="text" class="form-control required" id="in_reg_std_no" name="in_reg_std_no" placeholder="กรอกรหัสประจำตัวนิสิต" aria-describedby="password_help" oninvalid="this.setCustomValidity('กรุณากรอกรหัสประจำตัวนิสิต')" oninput="setCustomValidity('')" required>
                <small id="password_help" class="form-text text-muted">รหัสประจำตัวนิสิตจะต้องเป็น<span class="text text-danger"><u><b>ตัวเลข</b></u></span>เท่านั้น</small>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 text-right"></div>
            <div class="col-md-6 text-right">
              <a href="<?php echo base_url()?>c_user_auth" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> กลับหน้าแรก</a>
              <button type="submit" class="btn btn-warning"><i class="fa fa-check-square-o"></i> สมัครเข้าใช้งาน</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="copy-text center-align hidden-sm hidden-xs" id="copy-text">เวอร์ชัน <a href="#">1.0.0</a> - สงวนลิขสิทธิ์การใช้งาน <i class="fa fa-copyright"></i> <a href="http://www.edu.ku.ac.th/default.php">คณะศึกษาศาสตร์และพัฒนศาสตร์ มหาวิทยาลัยเกษตรศาสตร์ วิทยาเขตกำแพงแสน</a></div>
</section>
<script type="text/javascript">
  var check = function() {
    var password = document.getElementById('in_reg_password').value;
    var password_conf = document.getElementById('in_reg_password_conf').value;
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
