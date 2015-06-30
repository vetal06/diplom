<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="shortcut icon" href="/web/images/favicon.ico" type="image/x-icon">
</head>
<body>

<?php $this->beginBody() ?>
<div class="wrap">
    <?php
    if(!Yii::$app->user->isGuest) {
        NavBar::begin([
            'brandLabel' => 'Админка',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                [
                    'label' => 'Пользователи',
                    'items'=>[
                        ['label' => 'Менеджер пользователей', 'url' => ['/admin/user']]
                    ]
                ],
                [
                    'label' => 'Новости',
                    'items'=>[
                        ['label' => 'Менеджер новостей', 'url' => ['/admin/content']]
                    ]
                ],
                [
                    'label' => 'Документы',
                    'items'=>[
                        ['label' => 'Менеджер документов', 'url' => ['/admin/files']]
                    ]
                ],
                [
                    'label' => 'Факультеты',
                    'items'=>[
                        ['label' => 'Менеджер факультетов', 'url' => ['/admin/faculty']]
                    ]
                ],
                [
                    'label' => 'Кафедры',
                    'items'=>[
                        ['label' => 'Менеджер кафедр', 'url' => ['/admin/department']]
                    ]
                ],
                [
                    'label' => 'Предметы',
                    'items'=>[
                        ['label' => 'Менеджер предметов', 'url' => ['/admin/subject']]
                    ]
                ],
                ['label' => 'Главная', 'url' => ['/']],
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
