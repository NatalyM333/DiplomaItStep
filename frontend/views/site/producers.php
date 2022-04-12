<?php
use yii\helpers\Url;
$this->params['breadcrumbs'][] = ['label' => 'Види', 'url' => ['types']];
$this->params['breadcrumbs'][] = ['label' => $type];

?>

<div class="row row-cols-1 row-cols-md-3">
  <?php
  foreach ($producers as $key => $value) {
    $images= json_decode($value->url_image,true);
?>
  <div class="col mb-4">
    <div class="card">
      <img src="<?= $images?>" class="card-img-top w-100" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?=$value->name?></h5>
        <p class="card-text"><?=$value->description?></p>
        <a href="<?= Url::to(["lifts", 'type_id' => $type_id, 'producer_id' => $value->id])?>" class="btn btn-dark">Перейти</a>
      </div>
    </div>
  </div>
<?php
  }
?>