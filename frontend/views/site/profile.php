<?php
    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
    use kartik\select2\Select2;
    use kartik\widgets\FileInput;
    use yii\helpers\Url;
    
    $this->title = 'Профіль';

?>

<div class="panel panel-default" >
    <div class="panel-heading">
        <h4><?= $this->title;?></h4>
    </div>
    <?php  $form = ActiveForm::begin(['id' => 'site-profile']);  ?>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($model, 'username')->textInput()->label('Ім\'я користувача'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($model, 'email')->textInput()->label('Електронна пошта'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($model, 'password')->passwordInput()->label('Пароль'); ?>
                </div>
            </div>
        
        
            <div class="row">
                <div class="col-md-12">
                    <?= Html::submitButton('Підтвердити', ['class' => 'btn btn-success btn-block m-2']); ?>
                </div>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>