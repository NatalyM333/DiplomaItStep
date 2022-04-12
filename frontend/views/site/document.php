<?php
use yii\helpers\Url;

$this->params['breadcrumbs'][] = ['label' => 'Ліцензії та дозволи'];
?>
<?php
foreach ($document as $key => $value) {
?>
    <div class="m-3">
    <?=$value->description?>
          <div><?=$value->name?> <a href ='<?=Url::to(["file", 'filename' => $value->url_file])?>')>Завантажити</a></div>
    </div>
      
<?php
}
?>