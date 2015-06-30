
<?= \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    //'layout' => "{sorter}\n{summary}\n{items}\n{pager}",
    'itemOptions' => ['class' => 'item'],
    'itemView' => '_news_item',
    'separator' => '<hr>',

]) ?>