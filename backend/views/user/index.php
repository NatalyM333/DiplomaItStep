<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

$this->title = 'User';
$this->params['breadcrumbs'][] = $this->title;



?>
<div class="row">

     <div class="col-md-12">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'username',
                'email',
                [
                    'class' => 'yii\grid\ActionColumn', 'template' => '{view}{delete}',
                    'contentOptions' => ['style' => 'width: 30%'],
                    'buttons' => [
                        
                        'view' => function ($url, $model, $key){
                            return Html::a('View', ['view','id' => $model->id], ['class' => 'btn btn-info','style'=>'margin-right:5px;']);
                        },
                        
                        'delete' => function ($url, $model, $key){
                            return Html::a('Delete', ['delete','id' => $model->id], ['class' => 'btn btn-danger']);
                        }
                    ]
                ]
            ]
        ]);
        ?>
    </div> 
   
</div>