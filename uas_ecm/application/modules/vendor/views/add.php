<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Vendor</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('')?>dashboard">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('')?>vendor">Vendor</a></li>
              <li class="breadcrumb-item active">Add Vendor</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    
    <section class="content">
      <div class="row">
        <div class="col-md-6">

          <div class="card card-primary">
          <form method="post" action="<?php echo base_url('')?>vendor/tambah_vendor">
            <div class="card-header">
              <h3 class="card-title">Add Vendor</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Vendor ID</label>
                <input type="text" name="catid" value="V<?php echo sprintf("%04s", $vendor_id) ?>" class="form-control" readonly>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Vendor Name</label>
                <input type="text" name="catname" class="form-control">
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <input type="submit" name="submit" class="btn btn-group btn-success" value="Confirm"/>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->