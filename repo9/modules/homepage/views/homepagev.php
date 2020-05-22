<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin 2 - Landing Page</title>
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/SBAdmin2/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('assets/SBAdmin2/css/sb-admin-2.min.css')?>" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-8 col-lg-8 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-8 d-none d-lg-block">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang <?php echo ucfirst($this->session->userdata('username')); ?> di Situs kami.</h1>
                  </div>
                    <a href="<?php echo base_url('login')?>" class="btn btn-primary btn-user btn-block">
                    <i class="fas fa-key fa-fw"></i>  Login
                    </a>
                    <a href="<?php echo base_url('login/logout')?>" class="btn btn-google btn-user btn-block">
                      <i class="fas fa-sign-out-alt fa-fw"></i> Logout
                    </a>
                    <hr>
                    <a href="<?php echo base_url('register')?>" class="btn btn-facebook btn-user btn-block">
                      <i class="fas fa-clipboard fa-fw"></i> Register
                    </a>
                    <a href="<?php echo base_url('dashboard')?>" class="btn btn-facebook btn-user btn-block">
                      <i class="fas fa-home fa-fw"></i> Dashboard
                    </a>
                  </form>
                  <hr>
              </div>
            </div>
          </div>
          <!-- Row End -->
        </div>
      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/SBAdmin2/jquery/jquery.min.js')?>"></script>
  <script src="<?php echo base_url('assets/SBAdmin2/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/SBAdmin2/jquery-easing/jquery.easing.min.js')?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/SBAdmin2/js/sb-admin-2.min.js')?>"></script>

</body>

</html>

