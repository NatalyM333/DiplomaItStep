<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
//Yii::$app->language = 'uk-UA';
AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100" style = "background-color:#66a3ff;">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('../../images/logo/logo.jpg', ['alt'=>'Монітор-Україна','width'=>"50" ,'height'=>"50",]). ' Монітор-Україна',
        //'brandLabel' => 'Монітор-Україна',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Головна', 'url' => ['/site/index']],
        ['label' => 'Ліфти', 'url' => ['/site/types']],
        ['label' => 'Зворотній зв\'язок', 'url' => ['/site/contact']],
       
    ];
    if(Yii::$app->user->can('support')){
        $menuItems[] = ['label' => 'Технічна підтримка', 'url' => ['/site/producers-support']];
        $menuItems[] = ['label' => 'Ліцензії та дозволи', 'url' => ['/site/document']];
    }
    if(Yii::$app->user->can('admin')){
        $menuItems[] = ['label' => 'Технічна підтримка', 'url' => ['/site/producers-support']];
        $menuItems[] = ['label' => 'Ліцензії та дозволи', 'url' => ['/site/document']];
    }
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Реєстрація', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Вхід', 'url' => ['/site/login']];
    } else {
        $menuItems[] = ['label' => 'Профіль', 'url' => ['/site/profile']];
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
            . Html::submitButton(
                'Вихід (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'homeLink' => [ 
                'label' => Yii::t('yii', 'Головна'),
                'url' => Yii::$app->homeUrl,
           ],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted" style="height: fit-content; background-color:#a3c2c2;font-weight: bold !important;">
    <div class="container">
    <div class="container">
  <div class="row align-items-start">
    <div class="col">
    ТзОВ “Монітор-Україна”<br>
Юридична адреса: 79021 м.Львів, вул. Кульпарківська,130б/22<br>
Фактична адреса : 79020 м.Львів, вул. П.Панча,5
    </div>
    <div class="col">
    ЄДРПОУ 31442776<br>
ІПН 314427731030
    </div>
    <div class="col">
    Аварійна служба : +380676794844<br>
Технічні питання : +380676738389<br>
Фінансові  питання:+380673148712
    </div>
  </div>
        
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
