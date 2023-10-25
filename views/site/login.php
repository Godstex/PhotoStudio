<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Вход';
?>

<h1 align="center"><?= $this->title ?></h1>

  <?php $form = ActiveForm::begin(['id'=>'LoginForm'])?>

<div align="center">
    <?= $form->field($model, 'login')->textInput(['class'=>'form-control login','style'=>'width: 25%'])?>

    <?= $form->field($model, 'password')->passwordInput(['class'=>'form-control password','style'=>'width: 25%']) ?>
    <div class="form-group" style="margin-top: 20px">
        <div>
            <?= Html::submitButton('Вход', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
