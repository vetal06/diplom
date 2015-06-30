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
            'brandLabel' => 'Личный кабинет',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
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
        <?php
        echo yii\widgets\Menu::widget([
            'options'=> [
                'id' => 'skyrim-menu',
            ],

            'items' => [
                ['label' => 'Личные данные', 'url' => ['/profile/'], 'items' => [
                    ['label' => 'Смена пароля', 'url' => ['/profile/default/password_change' ]],
                ]],
                ['label' => 'Документы', 'url' => ['/profile/files'], 'items' => [
                    ['label' => 'Менеджер документов', 'url' => ['/profile/files']],
                    ['label' => 'Добавить документ', 'url' => ['/profile/files/create']],
                ]],
                ['label' => 'Новости', 'url' => ['/profile/content'], 'items' => [
                    ['label' => 'Менеджер новостей', 'url' => ['/profile/content']],
                    ['label' => 'Добавить новость', 'url' => ['/profile/content/create']],
                ]],
                ['label' => 'Предметы', 'url' => ['/profile/subject'], 'items' => [
                    ['label' => 'Менеджер предметов', 'url' => ['/profile/subject']],
                    ['label' => 'Добавить предмет', 'url' => ['/profile/subject/create']],
                ]],
            ],
        ]);?>
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
