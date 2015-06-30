<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <link rel="shortcut icon" href="/web/images/favicon.ico" type="image/x-icon">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>ОНМУ: Электронная библиотека учебных материалов</title>
    <?php $this->head() ?>
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
        if(!Yii::$app->user->isGuest) {
            NavBar::begin([
                'brandLabel' => 'ОНМУ',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Личный кабинет', 'url' => ['/profile']],
                    Yii::$app->user->isGuest ?
                        ['label' => 'Вход', 'url' => ['/site/login']] :
                        ['label' => 'Выход (' . Yii::$app->user->getIdentity()->first_name . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],
                ],
            ]);
            NavBar::end();
        }
        ?>

        <div id="header_wrapper">
            <div id="header">

            </div>
        </div>
        <div id="menu_wrapper">
            <div id="menu">
                <ul class="navigation">
                    <li><?=Html::a('Главная',Url::toRoute(['/']), ['class'=>Yii::$app->request->getUrl()==Url::toRoute(['/'])?'selected':""])?></li>
                    <li><?=Html::a('Документы', Url::toRoute(['/site/files']), ['class'=>Yii::$app->request->getUrl()=='/web/teacher'?'selected':""]) ?></li>
                    <li><?=Html::a('Новости', Url::toRoute(['/site/news']), ['class'=>Yii::$app->request->getUrl()=='/web/news'?'selected':""])?></li>
                    <?php if(Yii::$app->user->isGuest){?>
                    <li><?=Html::a('Регистрация',Url::toRoute(['site/registration']), ['class'=>Yii::$app->request->getUrl()==Url::toRoute(['site/registration'])?'selected':""])?></li>
                    <?php }?>
                    <li><?=Yii::$app->user->isGuest ?Html::a('Войти', '/web/site/login', ['class'=>Yii::$app->request->getUrl()=='/web/site/login'?'selected':""]):Html::a('Выйти', '/web/site/logout', ['data-method' => 'post'])?></li>

                </ul>
            </div>
        </div>
        <div id="content_wrapper" class="container">
            <div id="content">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= $content ?>
            </div> <!-- end of content -->
        </div>
    </div>
    <div id="footer">
        Copyright © <?=date("Y")?> <a href="#">ОНМУ</a>
    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
