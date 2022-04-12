<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\select2\Select2;
use kartik\widgets\FileInput;

use yii\widgets\ActiveForm;

$this->title = 'Створення';
$this->params['breadcrumbs'][] = ['label' => 'Технічна підтримка', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$obj = new class{};
$obj->type = 'pdf';
$obj->url = '../../../../files/support/7ed9f50d40308a637b8b77e73d4e07c3.pdf';
$obj->key = 10;

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
                
                <?=$form->field($model, 'producer_id')->widget(Select2::classname(),[
                    'language' => 'uk-UA',
                    'data' => $producers,
                    'options' => ['placeholder' => 'Виберіть ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <?= $form->field($model, 'supportFile')->widget(FileInput::classname(),[
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
                'maxFileSize'=>20000,
                'deleteUrl' => Url::to(['/support/' . $support_id . '/file-delete-support']),        
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