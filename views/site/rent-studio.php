<?php
    $this->title = 'Заброненные студии';
?>

<h1><?= $this->title ?></h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Название</th>
      <th scope="col">Количество людей</th>
      <th scope="col">Дата</th>
        <th scope="col">Время</th>
    </tr>
  </thead>
  <tbody>

  <?php foreach ($model as $item): $studio = \app\models\Studio::findOne($item['studio_id']); ?>
    <tr>
      <td><?= $studio['name'] ?></td>
      <td><?= $item['members'] ?></td>
      <td><?= $item['time_date'] ?></td>
        <td><?= $item['time_ur'] ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
