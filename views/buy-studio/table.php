
<table class="table">
  <thead>
    <tr>
        <th>Логин</th>
      <th scope="col">Название</th>
      <th scope="col">Количество людей</th>
      <th scope="col">Дата</th>
        <th scope="col">Время</th>
    </tr>
  </thead>
  <tbody>

  <?php foreach ($model as $item): $studio = \app\models\Studio::findOne($item['studio_id']); $user = new \app\models\BuyStudio(); $user->user_id = $item['user_id']; $user->getUser();  ?>
    <tr>
        <td><?= \app\models\User::find()->where(['id'=>$user['user_id']])->asArray()->all()[0]['login'] ?></td>
      <td><?= $studio['name'] ?></td>
      <td><?= $item['members'] ?></td>
      <td><?= $item['time_date'] ?></td>
        <td><?= $item['time_ur'] ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
