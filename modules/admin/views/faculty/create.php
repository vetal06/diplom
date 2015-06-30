<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Faculty */

$this->title = 'Создание факультета';
$this->params['breadcrumbs'][] = ['label' => 'Факультеты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faculty-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
