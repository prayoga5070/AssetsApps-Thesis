<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- /.content-wrapper -->
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Navigation</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>qr/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Edit navigation</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit Navigation</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="<?= base_url('Navigation/update'); ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
              <input type="hidden" name="id" value="<?php echo $row->id; ?>">
              <div class="form-group">
                <label class="col-md-3 col-form-label">Type</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <input type="radio" name="myradio" value="1" <?= $row->type == '1' ? 'checked' : ''; ?> >&nbsp; Menu &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="myradio" value="2" <?= $row->type == '2' ? 'checked' : ''; ?> >&nbsp; Sub Menu &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </div>
                  <?php echo '<div style="color: red;font-size: 14px">' . form_error('myradio') . '</div>'; ?>
                </div>
              </div>
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $row->name; ?>" placeholder="Input Nama Menu">
                <?php echo '<div style="color: red;font-size: 14px">' . form_error('name') . '</div>'; ?>
              </div>
              <div class="form-group">
                <label>Route</label>
                <input type="text" name="route" class="form-control" value="<?php echo $row->route; ?>" placeholder="Input Route Menu">
                <?php echo '<div style="color: red;font-size: 14px">' . form_error('route') . '</div>'; ?>
              </div>
              <div class="form-group">
                <label>Order No</label>
                <input type="text" name="order" class="form-control" value="<?php echo $row->urutan; ?>" placeholder="Input Urutan Menu">
                <?php echo '<div style="color: red;font-size: 14px">' . form_error('order') . '</div>'; ?>
              </div>
              <div class="form-group">
                <label class="col-md-3 col-form-label">Visible?</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <input type="radio" name="myradio2" value="1" <?= $row->isvisible == '1' ? 'checked' : ''; ?> >&nbsp; True &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="myradio2" value="0" <?= $row->isvisible == '0' ? 'checked' : ''; ?> >&nbsp; False &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </div>
                  <?php echo '<div style="color: red;font-size: 14px">' . form_error('myradio2') . '</div>'; ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 col-form-label">Parent Menu</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select class="js-example-placeholder-single js-states form-control" id="ParentNavigationId" name="ParentNavigationId" style="width:100%">
                    <?php foreach ($parent as $item) {?>
                        <option value="<?php echo $item->id;?>" selected><?php echo $item->text;?></option>
                    <?php }?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 col-form-label">Roles</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select class="js-example-placeholder-multiple js-states form-control" id="Roles" name="Roles[]" multiple style="width:100%">
                    <?php foreach ($roles as $role) {?>
                        <option value="<?php echo $role->id;?>" selected><?php echo $role->text;?></option>
                    <?php }?>
                    </select>
                  </div>
                  <?php echo '<div style="color: red;font-size: 14px">' . form_error('Roles') . '</div>'; ?>
                </div>
              </div>
              
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <a href="<?php echo base_url(); ?>Configuration/Navigation/index"><button type="button" class="btn btn-info">Back</button></a>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </section>
      <!-- /.Left col -->
    </div>
    <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<script>
  $(document).ready(function () {
    var dropdownRoles = $("#" + "Roles").select2({
          ajax: {
              url: "<?= base_url('/Configuration/Navigation/getAllDataRole')?>",
              dataType: 'json',
              delay: 250,
              multiple: true,
              allowClear: true,
              data: function (params) {
                  return {
                      q: params.term || '', // search term
                      page: params.page || 1,
                      rowPerPage: 10
                  };
              },
              processResults: function (data, params) {
                  //debugger
                  params.page = params.page || 1;

                  return {
                      results: data.items,
                      pagination: {
                          more: (params.page * 10) < data.total_count
                      }
                  };
              },
              cache: true
           },
          placeholder: '-Silahkan pilih-',
          escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
          minimumInputLength: 0
           //templateResult: formatRepoPegawai
    });
    var select2Instance = $('#' + "Roles").data('select2');
    select2Instance.on('results:message', function (params) {
        this.dropdown._resizeDropdown();
        this.dropdown._positionDropdown();
    });
    var dropdownParent = $("#" + "ParentNavigationId").select2({
          ajax: {
              url: "<?= base_url('/Configuration/Navigation/getAllDataParentMenu')?>",
              dataType: 'json',
              delay: 250,
              multiple: true,
              allowClear: true,
              data: function (params) {
                  return {
                      q: params.term || '', // search term
                      page: params.page || 1,
                      rowPerPage: 10
                  };
              },
              processResults: function (data, params) {
                  //debugger
                  params.page = params.page || 1;

                  return {
                      results: data.items,
                      pagination: {
                          more: (params.page * 10) < data.total_count
                      }
                  };
              },
              cache: true
           },
          placeholder: '-Silahkan pilih-',
          escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
          minimumInputLength: 0
           //templateResult: formatRepoPegawai
    });
    var select2Instance2 = $('#' + "ParentNavigationId").data('select2');
    select2Instance.on('results:message', function (params) {
        this.dropdown._resizeDropdown();
        this.dropdown._positionDropdown();
    });
    
  });

</script>