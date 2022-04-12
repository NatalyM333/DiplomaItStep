<?php
use yii\helpers\Url;

$this->params['breadcrumbs'][] = ['label' => 'Технічна підтримка'];
$this->params['breadcrumbs'][] = ['label' => 'Виробники', 'url' => ['producers-support']];
$this->params['breadcrumbs'][] = ['label' =>$producer ];
?>
<?php
foreach ($support as $key => $value) {
?>
    <div class="m-3">
    <?=$value->description?>
          <div><?=$value->name?> <a href ='<?=Url::to(["file", 'filename' => $value->url_file])?>')>Завантажити</a></div>
    </div>
      
<?php
}
?>