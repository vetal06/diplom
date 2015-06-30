<p>Документы</p>
<?= \yii\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'name',
        [
            'attribute' => 'first_name',
            'value' => 'user.first_name'
        ],
        [
            'attribute' => 'last_name',
            'value' => 'user.last_name'
        ],
        [
            'attribute' => 'department_name',
            'value' => 'user.department.department_name'
        ],
        [
            'attribute' => 'faculty_name',
            'value' => 'user.department.faculty.faculty_name'
        ],
        [
            'attribute' => 'subject_name',
            'value' => 'subject.subject_name'
        ],
        [
            'header' => 'Просмотр',
            'format' =>'html',
            'value'  => function ($model, $index, $widget) {
                return \yii\helpers\Html::a('Просмотреть',\yii\helpers\Url::to(['/files/view','id'=>$model->id]));
            },
        ],
    ],
]); ?>