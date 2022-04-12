<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\widgets\FileInput;

$this->title = ($model->name)? 'Update type' :  'Create type';
$this->params['breadcrumbs'][] = ['label' => 'Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4><?=$this->title;?></h4>
    </div>
    <?php $form = ActiveForm::begin(['id' => 'type-create']); ?>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <?=$form->field($model, 'name')->textInput();?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?=$form->field($model, 'description')->textInput();?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 " style="<?=$dangerStyle?> margin-bottom:5px;">
            <?= $form->field($model, 'imageFile')->widget(FileInput::classname(),[
            'name' => 'attachment_49[]',
            'options'=>[
                'multiple'=>false,
            ],
            'pluginOptions' => [
                'initialPreview'=> $initialPreview,
                'initialPreviewConfig' => $initialConfig,
                'initialPreviewAsData'=>true,
                'showCaption' => false,
                'showUpload' => false,
                'removeClass' => 'btn btn-default pull-right',
                'browseClass' => 'btn btn-primary pull-right',
                'overwriteInitial'=>true,
                'maxFileSize'=>2800,
                'deleteUrl' => Url::to(['/type/' . $type_id . '/file-delete-type']),        
            ]
]); ?>
        <p class="text-danger"><?=$msg?></p>

        </div>
       
    </div>
    
        </div>
        <div class="row">
            <div class="col-md-12">
                <?= Html::submitButton('Save',['class'=>'btn btn-success btn-block]']) ?>
            </div>
        </div>
        
       
    <?php  ActiveForm::end(); ?>
</div>