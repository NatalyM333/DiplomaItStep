<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\select2\Select2;
use kartik\widgets\FileInput;
use kartik\editors\Summernote;
use yii\widgets\ActiveForm;

$this->title = 'Створення ліфта';
$this->params['breadcrumbs'][] = ['label' => 'Ліфт', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4><?=$this->title;?></h4>
    </div>
    <?php
    $form=ActiveForm::begin(['id' => 'lift-create']);
    ?>
     <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                
                <?=$form->field($model, 'type_id')->widget(Select2::classname(),[
                    'language' => 'uk-UA',
                    'data' => $types,
                    'options' => ['placeholder' => 'Виберіть ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);?>
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
            <?= $form->field($model, 'description')->widget(Summernote::classname(),[
            'useKrajeePresets' => true,
            'pluginOptions' => [
                'height' => 300,
                'maxHeight' => 600,
                'dialogsFade' => true,
                'toolbar' => [
                    ['style1', ['style']],
                    ['style2', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript']],
                    ['font', ['fontname', 'fontsize', 'color', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph', 'height']],
                    ['insert', ['link', 'picture', 'video', 'table', 'hr']],
                ],
                'fontSizes' => ['8', '9', '10', '11', '12', '13', '14', '16', '18', '20', '24', '36', '48'],
                
            ]
]); ?>
</div>
        </div>
    
        <div class="row">
            <div class="col-md-12" style="<?=$dangerStyle?> margin-bottom:5px;">
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
                'deleteUrl' => Url::to(['/lift/' . $lift_id . '/file-delete-lift']),        
            ]
]); ?>
<p class="text-danger"><?=$msg?></p>
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



