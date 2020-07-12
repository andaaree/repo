<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Category</h1>
                    <?php if($this->session->flashdata('error') == TRUE): ?>
                    <div class="alert alert-danger alert-dismissible fade show ml-5" role="alert">
                    <?= $this->session->flashdata('error'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('')?>dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Category</li>
                    </ol>
                </div>
            </div>
        </div>
                <!-- /.container-fluid -->
    </section>
        <!-- Main content -->
        
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">         
                    <div class="card">
                    <!-- general form elements -->
                        <div class="card-header">
                            <h3 class="card-title">Category list</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                 <?php foreach ($cat as $c) : ?>
                                 <tr>
                                 <td><?= $c['category_id'] ?></td>
                                 <td><?= $c['category_name'] ?></td>
                                 <td colspan="2">
                                 <center>
                                  <a class="btn btn-success" href="<?= base_url('category/edit/'), $c['category_id'] ?>">Edit</a>
                                  <a class="btn btn-danger" href="<?= base_url('category/delete/'), $c['category_id'] ?>">Delete</a>
                                 </center>
                                 </td>
                                 </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col (left) -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->