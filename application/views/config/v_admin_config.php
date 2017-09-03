<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <i class="fa fa-gears"></i> ตั้งค่าระบบ - Administrative Configuration
    </h1>
  </section>
  <section class="content">
    <div class="box box-info">
      <div class="box-body">
        <form method="post" action="<?=base_url()?>c_admin_config/update_config">
          <?php
          $index = 1;
          if(count($configs) > 0 && !is_bool($configs)){
            foreach ($configs as $key => $value) {
              echo '<div class="row">';
              echo '<div class="col-md-4">';
              echo '<label>'.$value['config_id'].'. '.$value['config_title'].'</p>';
              echo '<small>'.$value['config_detail'].'</small>';
              echo '</div>';
              echo '<div class="col-md-8">';
              if($value['config_value_type'] == 'text'){
                echo '<input type="text" class="form-control" id="admin_config_val_'.$value['config_id'].'" name="admin_config_val_'.$value['config_id'].'" required value="'.$value['config_value'].'" />';
              }
              else{
                echo '<textarea class="ckeditor" name="admin_config_val_'.$value['config_id'].'" id="admin_config_val_'.$value['config_id'].'" >'.$value['config_value'].'</textarea>';
              }
              echo '</div>';
              echo '</div><br/';
              echo '<legend></legend>';
              $index++;
            }
          }
          else{
            echo "<div class='well well-sm'>There is no config available.</div>";
          }
          ?>`
          <div class="row">
            <div class="col-md-12 text-right">
              <a href="<?=base_url()?>c_dashboard/index" class="btn btn-primary"><i class="fa fa-arrow-left"></i> กลับสู่หน้าแรก</a>
              <button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> บันทึกการตั้งค่า</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>
