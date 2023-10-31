<?php

$this->title = 'Главная страница';

?>

<?= $user !='' ? '<h1 style="margin-bottom: 20px">Добро пожаловать '.$user['last_name'].' '.$user['first_name'].'</h1>' : '' ?>

<img style="margin-left: 5%" src="<?= \yii\helpers\Url::to('img/SavePhoto.png') ?>" alt="Фото">
<img style="margin-left: 15%; margin-top: 87px" src="<?= \yii\helpers\Url::to('img/SimpleInfo.png') ?>" alt="Фото">

<p style="font-size: 42px; margin-top: 50px"><strong>Залы нашей фотостудии</strong></p>

<?php if (!Yii::$app->user->isGuest): ?>
    <section id="studio">
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
            <?php foreach ($studio as $item): ?>
                <div class="feature col" style="background: #D9D9D9; padding: 10px">
                    <img width="420" height="300" src="<?= \yii\helpers\Url::to('img/'.unserialize($item['img'])) ?>" alt="<?= $item['name'] ?>">
                    <div style="background: black; border-radius: 0 0 10px 10px "  align="center">
                        <p style="color: white; font-size: 42px; font-family: Inter,serif;"><?= $item['name'] ?></p>
                    </div>
                      <div style="background: black; border-radius: 10px"  align="center">
                          <a href="<?= \yii\helpers\Url::to(['../buy-studio','id'=>$item['id']]) ?>" style="color: white; font-size: 42px; font-family: Inter,serif; text-decoration: none">Забронировать</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <?php else: ?>

    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
        <?php foreach ($studio as $item): ?>
            <div class="feature col" style="background: #D9D9D9; padding: 10px">
                <img width="420" height="300" src="<?= \yii\helpers\Url::to('img/'.unserialize($item['img'])) ?>" alt="<?= $item['name'] ?>">
                <div style="background: black; border-radius: 0 0 10px 10px "  align="center">
                    <p style="color: white; font-size: 42px; font-family: Inter,serif;"><?= $item['name'] ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<p style="font-size: 42px; margin-top: 50px"><strong>Наше оборудование</strong></p>

<p style="font-size: 30px; margin-top: 50px">Наше оборудование специально куплено для профессиональной съемки<br>Мы фотографируем вас только лучшим!</p>

<div class="row g-4 py-5 row-cols-1 row-cols-lg-3">

    <div class="feature col" style="padding: 10px">
        <img width="420" height="300" src="<?= \yii\helpers\Url::to('img/CanonPhoto.png') ?>" alt="Male">
        <div style="background: black; border-radius: 0 0 10px 10px "  align="center">
            <p style="color: white; font-size: 20px; font-family: Inter,serif; padding: 15px">Canon EOS 6D Mark II Body<br>Профессиональная зеркальная камера</p>
        </div>
    </div>

    <div class="feature col" style="padding: 10px">
        <img width="420" height="300" src="<?= \yii\helpers\Url::to('img/CanonObjective.png') ?>" alt="Male">
        <div style="background: black; border-radius: 0 0 10px 10px "  align="center">
            <p style="color: white; font-size: 20px; font-family: Inter,serif; padding: 15px">Canon RF 24-70mm f/2.8L IS USM<br>Профессиональный зум-объектив</p>
        </div>
    </div>

    <div class="feature col" style="padding: 10px">
        <img width="420" height="300" src="<?= \yii\helpers\Url::to('img/NovaLight.png') ?>" alt="Male">
        <div style="background: black; border-radius: 0 0 10px 10px "  align="center">
            <p style="color: white; font-size: 20px; font-family: Inter,serif;">NOVA P300C<br>Диодная панель с регулировкой RGBWW, управлением DMX</p>
        </div>
    </div>
</div>

<p style="font-size: 42px; margin-top: 50px"><strong>Наши фотографы</strong></p>

<p style="font-size: 30px; margin-top: 50px">Наши фотографы квалифицированны и используют<br>только профессиональное оборудование</p>

<div class="container px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="<?= \yii\helpers\Url::to('img/Bersik.png') ?>" style="border-radius: 20px" class="d-block mx-lg-auto" height="400">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Берсенев Данил Алексеевич</h1>
        <p class="lead">"Всё что не было запечатлено фотографией - нельзя считать воспоминанием"</p>
      </div>
    </div>
</div>

<div class="container">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-lg-6">
        <h1 class="display-4 fw-bold text-body-emphasis lh-1 mb-3">Корпуков Даниил Владиславович</h1>
        <p class="lead">"Фотография может быть искусством только тогда, когда она говорит правду, независимо от того, насколько странной или неприятной эта правда может быть."</p>
      </div>
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="<?= \yii\helpers\Url::to('img/Kachok.png') ?>" style="border-radius: 20px" class="d-block mx-lg-auto" height="400">
      </div>
    </div>
</div>
