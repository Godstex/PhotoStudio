<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\widgets\ActiveForm;

const URL = 'http://localhost:8081/';

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
<?php $this->beginBody() ?>

<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <div class="col-md-3 mb-2 mb-md-0">
        <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
            <img width="110" height="100" src="<?= \yii\helpers\Url::to('img/logo.png')?>" alt="Logo">
        </a>
      </div>

        <div>
            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <?php if ((yii\helpers\Url::current([], true) == URL)): ?>
                    <li><a href="/" style="font-size: 22px; font-family: Inter; font-weight: 400; text-decoration: underline; word-wrap: break-word; color: black" class="px-2 nav-link">Главная</a></li>
                    <?php if (!Yii::$app->user->isGuest): ?>
                        <li><a href="#" style="font-size: 22px; font-family: Inter; font-weight: 400; word-wrap: break-word; color: black" class="nav-link px-2">Забронировать</a></li>
                    <?php endif; ?>
                    <li><a href="<?= \yii\helpers\Url::to('contact') ?>" style="font-size: 22px; font-family: Inter; font-weight: 400; word-wrap: break-word; color: black" class="nav-link px-2">Контакты</a></li>
                <?php endif;?>

                <?php if ((yii\helpers\Url::current([], true) == URL.'contact')): ?>
                    <li><a href="/" style="font-size: 22px; font-family: Inter; font-weight: 400; word-wrap: break-word; color: black" class="px-2 nav-link">Главная</a></li>
                    <?php if (!Yii::$app->user->isGuest): ?>
                        <li><a href="#" style="font-size: 22px; font-family: Inter; font-weight: 400; word-wrap: break-word; color: black" class="nav-link px-2">Забронировать</a></li>
                    <?php endif; ?>
                    <li><a href="<?= \yii\helpers\Url::to('contact') ?>" style="font-size: 22px; font-family: Inter; font-weight: 400; text-decoration: underline; word-wrap: break-word; color: black" class="nav-link px-2">Контакты</a></li>
                <?php endif;?>
            </ul>
        </div>

      <?php if (!Yii::$app->user->isGuest): ?>
          <div class="col-md-3 text-end">
              <p><?php $user = \app\models\User::findOne(Yii::$app->user->getId()); echo $user['last_name'].' '.$user['first_name']  ?></p>
            <a href="<?= \yii\helpers\Url::to('logout') ?>"><button type="button" style="width: 100px" class="btn btn btn-dark">Выйти</button></a>
        </div>
      <?php else: ?>
          <div class="col-md-3 text-end">
              <a href="<?= \yii\helpers\Url::to('login') ?>"><button type="button" style="width: 100px" class="btn btn btn-dark">Войти</button></a>
          </div>
      <?php endif; ?>
    </header>
  </div>

    <div class="container">
        <?= $content ?>
    </div>

<div class="container">
  <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
    <div class="col mb-3">
      <a href="/" class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
        FOTOCHKA STUDIO
      </a>
      <p class="text-body-secondary">Воплощай мечты в фотографии!</p>
    </div>


    <div class="col mb-3">

    </div>

    <div class="col mb-3">

    </div>

      <div class="col mb-3">

    </div>

      <div class="col mb-3">
      <h5>Разделы</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="/" style="font-size: 22px; font-family: Inter; font-weight: 400; word-wrap: break-word; color: gray"  class="nav-link p-0 text-body-secondary">Главная</a></li>
          <?php if (!Yii::$app->user->isGuest): ?>
              <li class="nav-item mb-2"><a href="#" style="font-size: 22px; font-family: Inter; font-weight: 400; word-wrap: break-word; color: gray"  class="nav-link p-0 text-body-secondary">Бронирование</a></li>
          <?php endif; ?>
        <li class="nav-item mb-2"><a href="<?= \yii\helpers\Url::to('contact') ?>" style="font-size: 22px; font-family: Inter; font-weight: 400; word-wrap: break-word; color: gray"  class="nav-link p-0 text-body-secondary">Контакты</a></li>
      </ul>
    </div>
  </footer>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
