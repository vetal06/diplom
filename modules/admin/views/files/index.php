<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FilesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Документы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="files-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'size',
            'description:ntext',
            [
                'attribute' => 'visable_type',
                'value' => function ($model, $index, $widget) {
                    return $model->visable_type ==1?"ДА":"НЕТ";
                },
            ],
            // 'password',
            'user.first_name',
            'subject.subject_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
