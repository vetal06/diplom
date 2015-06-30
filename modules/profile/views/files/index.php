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

    <p>
        <?= Html::a('Добавить документ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'size',
            'visable_type'=>[
                'attribute' => 'visable_type',
                'value'=> function ($model, $index, $widget) {
                    return ($model->visable_type ==1)?'ДА':'НЕТ';
                },
            ],
            'subject.subject_name',
            'path' => [
                'format' =>'html',
                'value'  => function ($model, $index, $widget) {
                    return Html::a('скачать',\yii\helpers\Url::to(['/profile/files/download','id'=>$model->id]));
                },
            ],

            // 'password',
            // 'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
