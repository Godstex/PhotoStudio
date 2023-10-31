<?php
    $this->title = 'Бронирование';
?>

<h1><?= $this->title.' '.$id['name'] ?></h1>

<?= \yii\helpers\Html::beginForm('rent','post') ?>
<input type="hidden" name="id_user" value="<?= Yii::$app->user->getId() ?>">
<input type="hidden" name="id_studio" value="<?= $id['id'] ?>">

<label for="members">Количество людей</label>
<input class="form-control" id="members" type="number" max="5" min="1" name="members" required> <br>

<label for="time_date">На какой день</label>
<input class="form-control" id="time_date" type="date" name="time_date" required> <br>
<select class="form-select" name="time_ur">
    <option selected disabled> Выберите на какое время</option>
    <option value="16:00 - 17:00">16:00 - 17:00</option>
    <option value="17:00 - 18:00">17:00 - 18:00</option>
    <option value="18:00 - 19:00">18:00 - 19:00</option>
    <option value="20:00 - 21:00">20:00 - 21:00</option>
</select> <br>

<?= \yii\helpers\Html::submitButton('Забронировать',['class'=>'btn btn-success']) ?>
<?= \yii\helpers\Html::endForm() ?>
