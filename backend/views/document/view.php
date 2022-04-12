<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\select2\Select2;
use kartik\widgets\FileInput;

use yii\widgets\ActiveForm;

$this->title = 'Документи';
$this->params['breadcrumbs'][] = ['label' => 'Документи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4><?=$this->title;?></h4>
    </div>
    <?php
    $form=ActiveForm::begin(['id' => 'support-create']);
    ?>
     <div class="panel-body">
        <div class="row ">
            <div class="col-md-12 " style="margin:5px;">
            <p >Назва</p>
                <?=$model->name?>
            </div>
        </div>
       
        <div class="row ">
            <div class="col-md-12" style="margin:5px;">
            <p>Опис</p>
                <?=$model->description?>
            </div>
        </div>
        
       
        <div class="row">
                    <div class="col-md-12" style="margin:5px;">
                    <?php
                        foreach ($initialPreview as $key ) {  
                            
                    ?>  
                    <div><a href ='<?=Url::to(["file", 'filename' => $key])?>')>view</div>
                     <?php
                        }
                    ?>
                  

                    </div>
        </div>
      
    </div>
    <?php
        ActiveForm::end();
    ?>
</div>