<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

$this->title = 'Producer';
$this->params['breadcrumbs'][] = $this->title;

$i = 1;
?>
<div class="panel panel-default">
  <div class="panel-heading"><h4>Producers</h4></div>

    <div class="col-md-12">
        <?= Html::a(
            'Додати виробника',
            Url::toRoute('producer/create'),
            [
                'class' => 'btn btn-success pull-right',
                'id' => 'producer-create'
            ]
        );?>
    </div>
  
    <table class="table" id="producers">
    <thead style="background-color: #22262A; color: white;">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($producers as $producer) : ?>
          <tr>
              <th scope="row"><?= $i++; ?></th>
              <th scope="row"><?= $producer['id']; ?></th>
              <td><?= $producer['name'] ?></td>
              <td> 
                <?=  Html::a('Update', ['update','id' => $producer['id']], ['class' => 'btn btn-info']);  ?>
                <?=  Html::a('Delete', ['delete','id' => $producer['id']], ['class' => 'btn btn-danger']);  ?>
              </td>
          </tr>
      <?php endforeach ?>
    </tbody>
  </table>
  
</div>