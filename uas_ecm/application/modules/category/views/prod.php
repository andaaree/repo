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
                            <!-- general form elements -->
                            <?php foreach ($cat as $c) : ?>
                                <div class="card-body">
                                    <div class="card mb-4 border-left-primary">
                                        <div class="card-body">
                                            <h4><?= $c['category_name']; ?></h4>

                                            <a href="<?= base_url('category/list/'), $c['category_id']; ?>" class="btn btn-info btn-icon-split float-right">
                                                <span class="text">Lihat Barang</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <!-- /.card -->
                        <?php endforeach; ?>
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