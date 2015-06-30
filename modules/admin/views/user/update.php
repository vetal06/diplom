<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserDb */

$this->title = 'Изменение пользователя: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'department_id' => $model->department_id]];
$this->params['breadcrumbs'][] = 'Изменение';
?>
<div class="user-db-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
