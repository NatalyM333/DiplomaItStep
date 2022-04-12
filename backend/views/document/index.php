<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

$this->title = 'Document';
$this->params['breadcrumbs'][] = $this->title;


$i = 1;

?>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading"><h4>Documents</h4></div>
  <?= Html::a(
            'Add document',
            Url::toRoute('document/create'),
            [
                'class' => 'btn btn-success pull-right',
                'id' => 'document-create',
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
        <th scope="col">Name</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($document as $s) : ?>
          <tr>
              <th scope="row"><?= $i++; ?></th>
              <th scope="row"><?= $s['id']; ?></th>
              <th scope="row"><?= $s['name']; ?></th>
              <td> 
                <?=  Html::a('View', ['view','id' => $s['id']], ['class' => 'btn btn-success']);  ?>
                <?=  Html::a('Update', ['update','id' => $s['id']], ['class' => 'btn btn-info']);  ?>
                <?=  Html::a('Delete', ['delete','id' => $s['id']], ['class' => 'btn btn-danger']);  ?>
              </td>
          </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>
