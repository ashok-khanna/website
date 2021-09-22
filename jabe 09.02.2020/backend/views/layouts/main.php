<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);
?>
<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="<?=Yii::$app->charset?>">
    <?php $this->registerCsrfMetaTags()?>
    <title><?=Html::encode($this->title)?></title>
    <?php $this->head()?>

    <!-- Custom fonts for this template-->
    <link href="/admin/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet" />
    <!-- Custom styles for this template-->
    <link href="/admin/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/admin/css/select2.css">
    <!-- Bootstrap core JavaScript-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  
    <script src="/admin/vendor/jquery/jquery.min.js"></script>
    <script src="/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/admin/js/sb-admin-2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script> 

</head>
<body id="page-top">
<?php $this->beginBody()?>
<style>
html {
    font-size: 1em !important;
}
</style>

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php if (!Yii::$app->user->isGuest) {?>
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin/site/index">
                <div class="sidebar-brand-text mx-3">Админ панель</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0"><br>

            <li class="nav-item <?php if(Yii::$app->controller->id == 'ad-banners'): echo 'active'; endif; ?>">
              <a class="nav-link" href="/admin/ad-banners">
                <span>Рекламные баннеры</span>
              </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item <?php if(Yii::$app->controller->id == 'cities'): echo 'active'; endif; ?>">
              <a class="nav-link" href="/admin/cities">
                <span>Города</span>
              </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">             
             <li class="nav-item <?php if(Yii::$app->controller->id == 'city-photos' || Yii::$app->controller->id == 'partners' || Yii::$app->controller->id == 'trends'): echo 'active'; endif; ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1" aria-expanded="true" aria-controls="collapsePages1">
                <span>Главная</span>
                </a>
                <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item <?php if(Yii::$app->controller->id == 'city-photos'): echo 'active'; endif; ?>" href="/admin/city-photos">Баннеры городов</a>
                    <a class="collapse-item <?php if(Yii::$app->controller->id == 'partners'): echo 'active'; endif; ?>" href="/admin/partners">Партнеры</a>
                    <a class="collapse-item <?php if(Yii::$app->controller->id == 'trends'): echo 'active'; endif; ?>" href="/admin/trends">Тренды СНГ</a>
                    <div class="collapse-divider"></div>
                </div>
                </div>
            </li>

             <!-- Divider -->
            <hr class="sidebar-divider">

             <li class="nav-item <?php if(Yii::$app->controller->id == 'service-category' || Yii::$app->controller->id == 'services-file' || Yii::$app->controller->id == 'services' || Yii::$app->controller->id == 'service-video' || Yii::$app->controller->id == 'requirements' || Yii::$app->controller->id == 'included-services' || Yii::$app->controller->id == 'feedback'): echo 'active'; endif; ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages1">
                <span>Услуги</span>
                </a>
                <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">        
                    <h6 class="collapse-header">Услуги:</h6>
                    <a class="collapse-item <?php if(Yii::$app->controller->id == 'service-category'): echo 'active'; endif; ?>" href="/admin/service-category">Услуги</a>
                    <a class="collapse-item <?php if(Yii::$app->controller->id == 'services-file'): echo 'active'; endif; ?>" href="/admin/services-file">Файл для скачивание</a>
                    <div class="collapse-divider"></div>
                    <h6 class="collapse-header">Подуслуги:</h6>
                    <a class="collapse-item <?php if(Yii::$app->controller->id == 'services'): echo 'active'; endif; ?>" href="/admin/services">Подуслуги</a>
                    <a class="collapse-item <?php if(Yii::$app->controller->id == 'requirements'): echo 'active'; endif; ?>" href="/admin/requirements">Критерий для подуслугу</a>
                    <a class="collapse-item <?php if(Yii::$app->controller->id == 'included-services'): echo 'active'; endif; ?>" href="/admin/included-services">Включено в подуслугу</a>
                    <a class="collapse-item <?php if(Yii::$app->controller->id == 'feedback'): echo 'active'; endif; ?>" href="/admin/feedback">Отзывы</a>
                    <div class="collapse-divider"></div>
                </div>
                </div>
            </li>

             <!-- Divider
            <hr class="sidebar-divider">

            <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages3" aria-expanded="true" aria-controls="collapsePages3">
                <span>Подуслуги</span>
              </a>
              <div id="collapsePages3" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <a class="collapse-item" href="/admin/services">Подуслуги</a>
                  <a class="collapse-item" href="/admin/service-video">Видео</a>
                  <a class="collapse-item" href="/admin/requirements">Критерий для подуслугу</a>
                  <a class="collapse-item" href="/admin/included-services">Включено в подуслугу</a>
                  <a class="collapse-item" href="/admin/feedback">Отзывы</a>
                  <div class="collapse-divider"></div>
              </div>
              </div>
            </li> -->
            
             <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item <?php if(Yii::$app->controller->id == 'gids'): echo 'active'; endif; ?>">
              <a class="nav-link" href="/admin/gids">
                <span>Гиды</span>
              </a>
            </li>

             <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item <?php if(Yii::$app->controller->id == 'news'): echo 'active'; endif; ?>">
              <a class="nav-link" href="/admin/news">
                <span>Jabe Журнал</span>
              </a>
            </li>

             <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item <?php if(Yii::$app->controller->id == 'contacts'): echo 'active'; endif; ?>">
              <a class="nav-link" href="/admin/contacts">
                <span>Контакты</span>
              </a>
            </li>
                         
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
           

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
        <?php }?>

         <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <?php if (!Yii::$app->user->isGuest) {?>
                <li class="nav-item dropdown no-arrow">
                    <?php $form = ActiveForm::begin(['action' => '/admin/site/logout', 'method' => 'post']);?>
                        <span class="nav-link dropdown-toggle" style="cursor: pointer;" onclick="Logout(event)">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Logout (<?=Yii::$app->user->identity->username?>)</span>
                        </span>
                        <button type="submit" id="submit" class="logout" style="display: none;"></button>
                    <?php ActiveForm::end();?>
                </li>
            <?php }?>
          </ul>

        </nav>
        <!-- End of Topbar -->
      <!-- Main Content -->
      <div id="content">
           <!-- Page Heading -->
          <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>  -->
        <?php if(Yii::$app->requestedRoute != 'site/login'): ?>
          <?=Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
          ])?>
        <?php endif; ?>
        <?=Alert::widget()?>
        <?=$content?>

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; MAINT 2019</span>
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
  <!-- <script src="/admin/vendor/jquery/jquery.min.js"></script> -->
  <!-- <script src="/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

  

  <script>
    function Logout(event){
        event.preventDefault();
        event.stopImmediatePropagation();
        $('#submit').click();
    }
  </script>  
<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage()?>
