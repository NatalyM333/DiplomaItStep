<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\select2\Select2;
use kartik\widgets\FileInput;

use yii\widgets\ActiveForm;

$this->title = 'ліфт';
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
            <p>Вид</p>
                <?=$type?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
            <p>Виробник</p>
                <?=$producer?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <p>Опис товару</p>
                <?=$model->description?>
            </div>
        </div>
        
       
        <div class="row">
                    <div class="col-md-12">
                    <?php
                        foreach ($initialPreview as $key ) {  
                            
                    ?>
                    <div>
                    <img src='<?=$key?>' style="width:400px; height:300px; margin:10px;" >
                    </div>
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