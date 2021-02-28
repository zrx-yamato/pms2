<?php
	$this->layout = false;
	$this->assign('title', 'ログイン');
	$cakeDescription = "ログイン｜案件管理システム"
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('vendor/fontawesome-free/css/all.min') ?>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <?= $this->Html->css('scss/sb-admin-2') ?>
    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">

</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container">

                    <!-- Content Row -->
                    <div class="row justify-content-center">
                        <div class="col-10">
                            <div class="card shadow o-hidden border-0 my-5">
                                <div class="card-header py-3">
                                    <h1 class="h3 mb-0 text-gray-800"><?= $this->fetch('title') ?></h1>
                                </div>
                                <div class="card-body">
									<div class="users form">
									<?= $this->Flash->render('auth') ?>
									<?= $this->Form->create() ?>
										<fieldset>
											<legend>アカウント名とパスワードを入力して下さい。</legend>
											<?= $this->Form->input('name', array('class' => 'form-control')) ?>
											<?= $this->Form->input('password', array('class' => 'form-control mb-5')) ?>
										</fieldset>
									<?= $this->Form->button('Login', array('class' => 'btn btn-primary btn-user btn-block')); ?>
									<?= $this->Form->end() ?>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; PMS <?php echo Date('Y');?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    
    <?= $this->Html->script('vendor/jquery/jquery.min') ?>
    <?= $this->Html->script('vendor/bootstrap/js/bootstrap.bundle.min') ?>

    <!-- Core plugin JavaScript-->
    <?= $this->Html->script('vendor/jquery-easing/jquery.easing.min') ?>

    <!-- Custom scripts for all pages-->
    <?= $this->Html->script('sb-admin-2.min') ?>

    <!-- Page level plugins -->
    <?= $this->Html->script('vendor/chart.js/Chart.min') ?>

    <!-- Page level custom scripts -->
    <?= $this->Html->script('demo/chart-area-demo.js') ?>
    <?= $this->Html->script('demo/chart-pie-demo.js') ?>

</body>
</html>
