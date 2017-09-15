<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <i class="fa fa-users"></i> รายการบัญชีผู้ใช้ - User List
    </h1>
  </section>
  <section class="content">
    <div class="box box-info">
      <div class="box-header with-border">
        <div class="pull-left">
          <a class="btn btn-success btn-sm" href="<?=base_url()?>c_user_detail/index"><i class="fa fa-plus"></i>&nbsp;&nbsp;เพิ่มบัญชี</a>
        </div>
        <div class="pull-right">
          ค้นหา: &nbsp;&nbsp;<input type="text" name="in_search_keyword" value=""></input>
        </div>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-responsive table-hover">
          <thead class="thead-inverse">
            <tr class="bg-info">
              <th class="text-left"><a href="" class="asc">#</a></th>
              <th class="text-center col-md-2">ชื่อผู้ใช้งาน</th>
              <th class="text-center col-md-2 hidden-xs hidden-sm">ชื่อจริง</th>
              <th class="text-center col-md-3 hidden-xs hidden-sm">นามสกุล</th>
              <th class="text-center col-md-2">บทบาท</th>
              <th class="text-center col-md-1">สถานะ</th>
              <th class="col-md-2"></th>
            </tr>
          </thead>
          <?php foreach ($user_arr as $key => $value) { ?>
          <tr>
            <td class="text-center"><b><?=$value['user_id']?></b></td>
            <td><?=$value['user_name']?></td>
            <td class="hidden-xs hidden-sm"><?=$value['user_first_name']?></td>
            <td class="hidden-xs hidden-sm"><?=$value['user_last_name']?></td>
            <td class="text-center">
              <?php
              if($value['user_role'] == "A"){
                echo "<span class='label label-danger'>Administrator</span>";
              }
              else if($value['user_role'] == "T"){
                echo "<span class='label label-success'>Lecturer</span>";
              }
              else{
                echo "<span class='label label-info'>Student</span>";
              }
              ?>
            </td>
            <td class="text-center">
              <?php
              if($value['user_status'] == "A"){
                echo '<span class="text-green"><i class="fa fa-check"></i> Active</span>';
              }
              else{
                echo '<span class="text-red"><i class="fa fa-remove"></i> Inactive</span>';
              }
              ?>
            </td>
            <td>
              <a class="btn btn-warning btn-sm" href="<?=base_url()?>c_user_detail/index/<?=$value['user_id']?>">
                <i class="fa fa-edit"></i> แก้ไข
              </a>
              <a class="btn btn-danger btn-sm" href="<?=base_url()?>c_user_management/delete/<?=$value['user_id']?>">
                <i class="fa fa-remove"></i> ลบ
              </a>
            </td>
          </tr>
        <?php } ?>
        </table>
      </div>
      <div class="box-footer">
        <div class="pull-left pageDetail">
          <label>กำลังแสดงรายการที่ <span class="text text-blue"><?=($start+1)?></span> ถึง <span class="text text-blue"><?=(($start + $limit > $user_count)? $user_count : ($start + $limit)) ?></span> จากทั้งหมด <span class="text text-blue"><?=$user_count?></span> รายการ</label>
          <br/>
          <label>ใช้เวลาค้นหา <span class="text text-red">{elapsed_time}</span> วินาที</label>
        </div>
        <div class="pull-right">
          <?php echo $links; ?>
        </div>
      </div>
    </div>
  </section>
</div>
