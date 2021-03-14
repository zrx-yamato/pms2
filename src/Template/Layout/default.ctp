<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = '案件管理システム';
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
    <!-- css -->
    <?= $this->Html->css('vendor/fontawesome-free/css/all.min') ?>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">
    <?= $this->Html->css('scss/sb-admin-2') ?>
    <?= $this->Html->css('scss/original') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    PMS
                </div>
                <div class="sidebar-brand-text mx-1">案件管理システム</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?=$this->Url->build('/Dashboard/')?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                メニュー
            </div>

            <!-- Nav Item - Pages Collapse Projects -->
            <li class="nav-item">
                <a class="nav-link" href="/pms2/Projects/">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>プロジェクト</span></a>
            </li>
            
            <!-- Nav Item - Pages Collapse Tasks -->
            <li class="nav-item">
                <a class="nav-link" href="/pms2/Tasks/">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>タスク</span></a>
            </li>
            
            <!-- Nav Item - Pages Collapse Companies -->
            <li class="nav-item">
                <a class="nav-link" href="/pms2/Companies/">
                    <i class="fas fa-fw fa-building"></i>
                    <span>関連会社</span></a>
            </li>
            
            <!-- Nav Item - Pages Collapse personnels -->
            <li class="nav-item">
                <a class="nav-link" href="/pms2/Personnels/">
                    <i class="fas fa-user-tie"></i>
                    <span>担当者</span></a>
            </li>
            
            <!-- Nav Item - Pages Collapse Estimates -->
            <li class="nav-item">
                <a class="nav-link" href="/pms2/Estimates/">
                    <i class="fas fa-yen-sign"></i>
                    <span>見積もり</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                管理メニュー
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSetting"
                    aria-expanded="true" aria-controls="collapseSetting">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>設定</span>
                </a>
                <div id="collapseSetting" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">メイン設定:</h6>
                        <?= $this->Html->link('ユーザー', ['controller' => 'Users', 'action' => 'index'], ['class' => 'collapse-item']);?>
                        <?= $this->Html->link('ステータス', ['controller' => 'Statuses', 'action' => 'index'], ['class' => 'collapse-item']);?>
                        <?= $this->Html->link('権限', ['controller' => 'Roles', 'action' => 'index'], ['class' => 'collapse-item']);?>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">その他:</h6>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card">Sidebar Message Area</div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= h($authuser['name']) ?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?php echo $this->Url->build("/img/undraw_profile.svg");?>">
                                    
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?php echo $this->Url->build('/Users/view/'. $authuser['id'])?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h1 class="h3 mb-0 text-gray-800"><a href=""><?= $this->fetch('title') ?></a></h1>
                                </div>
                                <div class="card-body">
                                    <?= $this->Flash->render() ?>
                                    <?= $this->fetch('content') ?>
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
                        <span>Copyright &copy; Your Website 2020</span>
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ログアウトしますか?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">ログアウトする場合は以下の「ログアウトボタン」を<br>押してください。</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">キャンセル</button>
                    <a class="btn btn-primary" href="/pms2/Auth/logout/">ログアウト</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    
    <?= $this->Html->script('vendor/jquery/jquery.min') ?>
    <?= $this->Html->script('vendor/bootstrap/js/bootstrap.bundle.min') ?>

    <!-- Core plugin JavaScript-->
    <?= $this->Html->script('vendor/jquery-easing/jquery.easing.min') ?>

    <!-- Custom scripts for all pages-->
    <?= $this->Html->script('sb-admin-2.min') ?>
    <?= $this->Html->script('original') ?>

    <!-- Page level plugins -->
    <?php //$this->Html->script('vendor/chart.js/Chart.min') ?>

    <!-- Page level custom scripts -->
    <?php //$this->Html->script('demo/chart-area-demo.js') ?>
    <?php //$this->Html->script('demo/chart-pie-demo.js') ?>

</body>
</html>
