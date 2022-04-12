<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

$this->title = 'Lifts';
$this->params['breadcrumbs'][] = $this->title;


$i = 1;

?>

<div class="panel panel-default">
  
  <div class="panel-heading"><h4>Lifts</h4></div>
  <?= Html::a(
            'Add lift',
            Url::toRoute('lift/create'),
            [
                'class' => 'btn btn-success pull-right',
                'id' => 'lift-create',
                'style' => [
                    'margin' => '10px' 
                ]
            ]
        );?>
  <!-- Table -->
  <table class="table" id="lifts">
    <thead style="background-color: #22262A; color: white;">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Id</th>
        <th scope="col">Type</th>
        <th scope="col">Producer</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($lifts as $lift) : ?>
          <tr>
              <th scope="row"><?= $i++; ?></th>
              <th scope="row"><?= $lift['id']; ?></th>
              <th scope="row"><?= $types[$lift['type_id']]['name']; ?></th>
              <th scope="row"><?= $producers[$lift['producer_id']]['name']; ?></th>
              <td> 
                <?=  Html::a('View', ['view','id' => $lift['id']], ['class' => 'btn btn-success']);  ?>
                <?=  Html::a('Update', ['update','id' => $lift['id']], ['class' => 'btn btn-info']);  ?>
                <?=  Html::a('Delete', ['delete','id' => $lift['id']], ['class' => 'btn btn-danger']);  ?>
              </td>
          </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>
