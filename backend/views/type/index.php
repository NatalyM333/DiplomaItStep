<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

$this->title = 'Types';
$this->params['breadcrumbs'][] = $this->title;

$i = 1;
?>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading"><h4>Types</h4></div>
  <?= Html::a(
            'Add type',
            Url::toRoute('type/create'),
            [
                'class' => 'btn btn-success pull-right',
                'id' => 'type-create',
                'style' => [
                    'margin' => '10px' 
                ]
            ]
        );?>
  <!-- Table -->
  <table class="table" id="types">
    <thead style="background-color: #22262A; color: white;">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($types as $type) : ?>
          <tr>
              <th scope="row"><?= $i++; ?></th>
              <th scope="row"><?= $type['id']; ?></th>
              <td><?= $type['name'] ?></td>
              <td> 
                <?=  Html::a('Update', ['update','id' => $type['id']], ['class' => 'btn btn-info']);  ?>
                <?=  Html::a('Delete', ['delete','id' => $type['id']], ['class' => 'btn btn-danger']);  ?>
              </td>
          </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>
