<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <i class="fa fa-users"></i> รายการบัญชีผู้ใช้ - User List
    </h1>
  </section>
  <section class="content">
    <div class="col-12">
      <?php if($this->session->flashdata('user_list_msg')){ ?>
        <div class="alert alert-dismissible alert-success">
            <button class="close" data-dismiss="alert">&times;</button>
            <strong class="text text-black"><?=$this->session->flashdata('user_list_msg');?></strong>
        </div>
      <?php } ?>
      <?php if($this->session->flashdata('user_list_err')){ ?>
        <div class="alert alert-dismissible alert-danger">
            <button class="close" data-dismiss="alert">&times;</button>
            <strong class="text text-black"><?=$this->session->flashdata('user_list_err');?></strong>
        </div>
      <?php } ?>
    </div>
    <div class="box box-info">
      <div class="box-header with-border">
        <div class="pull-left">
          <a class="btn btn-success btn-sm" href="<?=base_url()?>c_user_management/add"><i class="fa fa-plus"></i>&nbsp;&nbsp;เพิ่มบัญชี</a>
        </div>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table id="user-table" class="table table-responsive table-bordered display responsive nowrap" cellspacing="0">
            <thead>
              <tr class="bg-info">
                <th class="text-center col-md-1">#</th>
                <th class="text-center col-md-2">ชื่อผู้ใช้งาน</th>
                <th class="text-center col-md-2">ชื่อจริง</th>
                <th class="text-center col-md-2">นามสกุล</th>
                <th class="text-center col-md-1">บทบาท</th>
                <th class="text-center col-md-1">สถานะ</th>
                <th class="col-md-1"></th>
                <th class="col-md-1"></th>
                <th class="col-md-1"></th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>
<div class="modal fade" id="delete-user-confirm" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <b>คุณต้องการยืนยันการลบบัญชีผู้ใช้นี้หรือไม่ ?</b>
      </div>
      <div class="modal-body">
        การลบบัญชีผู้ใช้จะลบข้อมูลส่วนบุคคลทั้งหมดของผู้ใช้งาน โปรดตรวจสอบให้ถูกต้อง หากยืนยันแล้วจะไม่สามารถกู้คืนข้อมูลได้ ไม่ว่ากรณีใด ๆ
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">ยกเลิก</button>
        <a class="btn btn-danger btn-ok">ยืนยันการลบ</a>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$('#delete-user-confirm').on('show.bs.modal', function(e) {
  $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#user-table').DataTable({
      "responsive":true,
      "autoWidth":false,
      "pageLength":20,
      "lengthMenu":[[5, 10, 20, 50, 100], [5, 10, 20, 50, 100]],
      "order":[],
      "ajax":{
        url   : "<?=site_url("c_user_management/fetch_user")?>",
        type  : 'GET'
      },
      "columnDefs":[
           {
                "targets":[5, 6, 7, 8],
                "orderable":false,
                "searchable":false
           }
      ],
      "columns": [
        { responsivePriority: 1 },
        { responsivePriority: 2 },
        { responsivePriority: 8 },
        { responsivePriority: 7 },
        { responsivePriority: 6 },
        { responsivePriority: 3 },
        { responsivePriority: 4 },
        { responsivePriority: 5 }
      ],
      "language":{
        "emptyTable":     "ไม่พบข้อมูลบัญชีผู้ใช้งาน",
        "info":           "กำลังแสดงรายการที่ <b>_START_</b> ถึง <b>_END_</b> จากทั้งหมด <span class='text text-red'><b>_TOTAL_</b></span> รายการ",
        "infoEmpty":      "ไม่มีรายการให้แสดง",
        "infoFiltered":   "(คัดกรองจากทั้งหมด _MAX_ รายการ)",
        "lengthMenu":     "แสดงข้อมูลบัญชีผู้ใช้งานหน้าละ  _MENU_  รายการ",
        "search":         "ค้นหา: ",
        "zeroRecords":    "ไม่พบรายการตามคำค้นที่กรอก",
        "paginate":{
          "first":        "หน้าแรก",
          "last":         "สุดท้าย",
          "next":         "ถัดไป",
          "previous":     "ก่อนหน้า"
        },
        "aria":{
          "sortAscending":  ": เรียงจากน้อยไปหามาก",
          "sortDescending": ": เรียงจากมากไปหาน้อย"
        }
      }
    });

  });
</script>
