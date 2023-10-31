<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Регистрация';
?>

<h1 align="center"><?= $this->title ?></h1>

<?= Html::beginForm('','post') ?>
    <div align="center">
    <label for="last_name" class="form-label">Фамилия</label>
    <input id="last_name" type="text" class="form-control" name="last_name" required>

        <label for="first_name" class="form-label">Имя</label>
    <input id="first_name" type="text" class="form-control" name="first_name" required>


    <label for="patronymic" class="form-label">Отчество</label>
    <input id="patronymic" type="text" class="form-control" name="patronymic" required>

    <label for="login" class="form-label" >Логин</label>
    <input id="login" type="text" class="form-control" name="login" required>

    <label for="password" class="form-label">Пароль</label>
    <input id="password" type="text" class="form-control" name="password" required>
        <?= Html::submitButton('Зарегистрироваться',['class'=>'btn btn-primary','style'=>'margin-top: 10px']) ?>
    </div>
<?= Html::endForm() ?>
