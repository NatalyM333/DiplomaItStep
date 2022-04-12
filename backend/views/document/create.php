<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\select2\Select2;
use kartik\widgets\FileInput;

use yii\widgets\ActiveForm;

$this->title = 'Створення';
$this->params['breadcrumbs'][] = ['label' => 'Document', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;;
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4><?=$this->title;?></h4>
    </div>
    <?php
    $form=ActiveForm::begin(['id' => 'support-create']);
    ?>
     <div class="panel-body">
     <div class="row">
            <div class="col-md-12">
            <?=$form->field($model, 'name')->textInput();?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?=$form->field($model, 'description')->textarea(['row' => '3'])->label('Опис');?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <?= $form->field($model, 'documentFile')->widget(FileInput::classname(),[
            'name' => 'attachment_49[]',
            
            'options'=>[
                'multiple'=>false,
            ],
            'pluginOptions' => [
                'initialPreview'=> $initialPreview,
                'initialPreviewConfig' => $initialConfig,
                'initialPreviewAsData'=>true,
                'initialPreviewFileType' => 'pdf',
                'showCaption' => false,
                'showUpload' => false,
                'removeClass' => 'btn btn-default pull-right',
                'browseClass' => 'btn btn-primary pull-right',
                'overwriteInitial'=>true,
                'maxFileSize'=>11000,
                'deleteUrl' => Url::to(['/document/' . $document_id . '/file-delete-document']),        
            ]
]); ?>

</div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?=Html::submitButton('Зберегти',['class'=>'btn btn-success btn-block]'])?>
            </div>
        </div>
    </div>
    <?php
        ActiveForm::end();
    ?>
</div>