<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<style>
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: red;
 
  text-align: center;
}
</style>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' =>  ' Монітор-Україна',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
            'style' => 'position:relative;'
        ],
    ]);
    $menu_home = [
        'label' => 'Home',
        'url' => ['/site/index'],
    ];
    $menu_producer = [
        'label' => 'Producer',
        'url' => ['/producer/index'],
    ];
    $menu_type = [
        'label' => 'Type',
        'url' => ['/type/index'],
    ];
    $menu_lift = [
        'label' => 'Lift',
        'url' => ['/lift/index'],
    ];
    $menu_support = [
        'label' => 'Support',
        'url' => ['/support/index'],
    ];
    $menu_document = [
        'label' => 'Document',
        'url' => ['/document/index'],
    ];
    $menu_user=[
        'label' => 'User',
        'url' => ['/user/index'],
    ];

  
    $menuItems = [];     
    if (Yii::$app->user->isGuest)
    {
      $menuItems[] = $menu_home;   
      $menuItems[] = ['label' => 'Login','url' => ['/site/index']];     
    }else{
        $menu_logout =  '<li>'
        . Html::beginForm(['/site/logout'], 'post')
        . Html::submitButton(
            'Logout (' . Yii::$app->user->identity->username . ')',
            ['class' => 'btn btn-link logout']
        )
        . Html::endForm()
        . '</li>';
        if(Yii::$app->user->can('admin'))
        {
            $menuItems[] = $menu_producer;
            $menuItems[] = $menu_type;
            $menuItems[] = $menu_lift;
            $menuItems[] = $menu_support;
            $menuItems[] = $menu_document;
            $menuItems[] = $menu_user;
           
        }
        
        $menuItems[] = $menu_logout ;
    }
    
   
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container" style = "margin-bottom:100px;">
        <?= Breadcrumbs::widget([ 'homeLink' => [
            'label' => 'Головна',
         ],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        
        <?= $content ?>
    </div>
</div>

<footer class="footer ">
    <div class="container">
        <p class="pull-left" style="margin-top:20px" >&copy; ТзОВ «Монітор-Україна» <?= date('Y') ?></p>

        <p class="pull-right"></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


<script>
    //delete link that destroy menu
    window.onload=function(){
        
    let links = document.getElementsByTagName('link');
    for( let i = 0 ; i < links.length; i++){
        
        console.log(links[i].getAttribute("href"));
        if(links[i].getAttribute("href").localeCompare('/CoursesSite/backend/web/assets/d092983b/css/bootstrap.css')==0)
        links[i].remove();
    }
    }
    </script>

