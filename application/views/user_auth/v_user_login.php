<section class="login-block">
  <div class="container">
	   <div class="row">
       <div class="col-md-4 login-sec">
         <h2 class="text-center">เข้าสู่ระบบ</h2>
         <form class="login-form">
           <div class="form-group">
             <label for="in_user_name" class="text-uppercase">ชื่อผู้ใช้ - Username</label>
             <input type="text" class="form-control" id="in_user_name" name="in_user_name" placeholder="" required="" oninvalid="this.setCustomValidity('กรุณากรอกชื่อผู้ใช้งาน')" oninput="setCustomValidity('')">
           </div>
           <div class="form-group">
             <label for="in_user_password" class="text-uppercase">รหัสผ่าน - Password</label>
             <input type="password" class="form-control" id="in_user_password" name="in_user_password" placeholder="" required="" oninvalid="this.setCustomValidity('กรุณากรอกรหัสผ่าน')" oninput="setCustomValidity('')">
           </div>
           <div class="form-check">
             <label class="form-check-label">
               <input type="checkbox" class="form-check-input">
               <small>จดจำฉันไว้</small>
             </label>
             <button type="submit" class="btn btn-login float-right">ลงชื่อเข้าใช้งาน</button>
           </div>
         </form>
       </div>
       <div class="col-md-8 banner-sec">
         <div class="carousel-item active">
           <div class="carousel-caption d-none d-md-block">
             <div class="banner-text">
               <h2>E-Learning Management System</h2>
               <p>ระบบจัดการเรียนการสอนอิเล็กทรอนิกส์ เป็นระบบซึ่งเป็นสื่อกลางระหว่างผู้เรียน และอาจารย์ผู้สอน โดยระบบจะอนุญาตให้อาจารย์ผู้สอนกำหนดเนื้อหา แบบฝึกหัด และข้อสอบในแต่ละรายวิชา เพื่อให้ผู้เรียนสามารถเข้าสู่ระบบเพื่อศึกษา ฝึกฝน และทำข้อสอบตามบทเรียนที่กำหนดไว้ได้</p>
               <button class="btn btn-primary">สมัครสมาชิก</button>
               <button class="btn btn-warning">ลืมรหัสผ่าน</button>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
   <div class="copy-text center-align" id="copy-text">เวอร์ชัน <a href="#">1.0.0</a> - สงวนลิขสิทธิ์การใช้งาน <i class="fa fa-copyright"></i> <a href="http://www.edu.ku.ac.th/default.php">คณะศึกษาศาสตร์และพัฒนศาสตร์ มหาวิทยาลัยเกษตรศาสตร์ วิทยาเขตกำแพงแสน</a></div>
</section>
