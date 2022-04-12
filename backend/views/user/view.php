<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;
$this->registerCss(
    "
        span
        {
            font-weight: bold;
        }
    "
    );
$js = <<<JS
$('.role').change(function(){
    var id =$(this).attr('name');
    var role = $(this).val();
   
    alert(id+ ' - ' + role);
    $.ajax({
        url: 'change-role',
        type:'post',
      
        data:{'id': id,
        'role':role
        },
        success: (function(){
            alert('Role is changed');
        }
        )
    })
})
JS;
$this->registerJs($js);

?>

<div class="panel panel-default ">
    <div class="panel-heading">
        <h4><?=$this->title;?>User</h4>
    </div>
    <?php
    $form=ActiveForm::begin(['id' => 'user-create']);
    ?>
     <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
            <span>Користувач: </span>
                <?=$model->username?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="margin-top: 5px;">
            <span >Email: </span>
                <?=$model->email?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="margin-top: 5px;">
            <span >Поточна роль: </span>
                <?=$role?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="margin-top: 5px;">
            <span >Змінити роль користувача: </span>
            <?=$form->field($model, 'username')->widget(Select2::classname(),[
                    'data' => $role_array,
                    'options' => ['placeholder' => ''],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);?>
           
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?=Html::submitButton('Зберегти',['class'=>'btn btn-success btn-block]'])?>
            </div>
        </div>
        </div>
        
      
    </div>
    <?php
        ActiveForm::end();
    ?>
</div>