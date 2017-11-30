      <div class="modal fade" id="logout-confirm" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <b>คุณต้องการยืนยันการออกจากระบบหรือไม่ ?</b>
            </div>
            <div class="modal-body">
              การออกจากระบบจะทำให้ข้อมูลที่ยังไม่ได้บันทึกสูญหายได้ โปรดตรวจสอบการบันทึกข้อมูลให้เรียบร้อยเสียก่อน
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">ยกเลิก</button>
              <a class="btn btn-danger btn-ok">ออกจากระบบ</a>
            </div>
          </div>
        </div>
      </div>
      <footer class="main-footer hidden-xs">
        <div class="pull-right">
          <b>E-Learning Management System</b> | เวอร์ชัน 1.0.0
        </div>
        <strong>สงวนลิขสิทธิ์การใช้งาน <i class="fa fa-copyright"></i> <a href="http://www.edu.ku.ac.th/default.php">คณะศึกษาศาสตร์และพัฒนศาสตร์ มหาวิทยาลัยเกษตรศาสตร์ วิทยาเขตกำแพงแสน</a></strong>
      </footer>

      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/js/app.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/js/validation.js" type="text/javascript"></script>
      <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
      </script>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/ckeditor/ckeditor.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
      <script type="text/javascript">
      $('#logout-confirm').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
      });
      </script>
  </body>
</html>
