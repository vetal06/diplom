<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Department */

$this->title = 'Изменение кафедры : ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Кафедры', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'faculty_id' => $model->faculty_id]];
$this->params['breadcrumbs'][] = 'Изменение';
?>
<div class="department-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
