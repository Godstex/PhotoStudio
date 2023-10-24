<?php

$this->title = 'Главная страница';

?>

<img style="margin-left: 5%" src="<?= \yii\helpers\Url::to('img/SavePhoto.png') ?>" alt="Фото">
<img style="margin-left: 15%; margin-top: 87px" src="<?= \yii\helpers\Url::to('img/SimpleInfo.png') ?>" alt="Фото">

<p style="font-size: 42px; margin-top: 50px">Залы нашей фотостудии</p>

<?php if (!Yii::$app->user->isGuest): ?>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
          <div class="feature col" style="background: #D9D9D9; padding: 10px">
            <img width="420" height="300" src="<?= \yii\helpers\Url::to('img/Male.png') ?>" alt="Male">
            <div style="background: black; border-radius: 0 0 10px 10px "  align="center">
                <p style="color: white; font-size: 42px; font-family: Inter;">Мале</p>
            </div>
              <div style="background: black; border-radius: 10px"  align="center">
                <p style="color: white; font-size: 42px; font-family: Inter;">Забронировать</p>
            </div>
          </div>
          <div class="feature col" style="background: #D9D9D9; padding: 10px">
            <img width="420" height="300" src="<?= \yii\helpers\Url::to('img/Tony.png') ?>" alt="Male">
            <div style="background: black; border-radius: 0 0 10px 10px "  align="center">
                <p style="color: white; font-size: 42px; font-family: Inter;">Тони</p>
            </div>
              <div style="background: black; border-radius: 10px"  align="center">
                <p style="color: white; font-size: 42px; font-family: Inter;">Забронировать</p>
            </div>
          </div>

            <div class="feature col" style="background: #D9D9D9; padding: 10px">
            <img width="420" height="300" src="<?= \yii\helpers\Url::to('img/Kair.png') ?>" alt="Male">
            <div style="background: black; border-radius: 0 0 10px 10px "  align="center">
                <p style="color: white; font-size: 42px; font-family: Inter;">Каир</p>
            </div>
              <div style="background: black; border-radius: 10px"  align="center">
                <p style="color: white; font-size: 42px; font-family: Inter;">Забронировать</p>
            </div>
          </div>
    </div>
    <?php else: ?>

    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
          <div class="feature col" style="background: #D9D9D9; padding: 10px">
            <img width="420" height="300" src="<?= \yii\helpers\Url::to('img/Male.png') ?>" alt="Male">
            <div style="background: black; border-radius: 0 0 10px 10px "  align="center">
                <p style="color: white; font-size: 42px; font-family: Inter;">Мале</p>
            </div>
          </div>
          <div class="feature col" style="background: #D9D9D9; padding: 10px">
            <img width="420" height="300" src="<?= \yii\helpers\Url::to('img/Tony.png') ?>" alt="Male">
            <div style="background: black; border-radius: 0 0 10px 10px "  align="center">
                <p style="color: white; font-size: 42px; font-family: Inter;">Тони</p>
            </div>
          </div>

            <div class="feature col" style="background: #D9D9D9; padding: 10px">
            <img width="420" height="300" src="<?= \yii\helpers\Url::to('img/Kair.png') ?>" alt="Male">
            <div style="background: black; border-radius: 0 0 10px 10px "  align="center">
                <p style="color: white; font-size: 42px; font-family: Inter;">Каир</p>
            </div>
          </div>
    </div>
<?php endif; ?>

