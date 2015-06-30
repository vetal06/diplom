<h1><?=$model->name?></h1>
<div id="file-info">
    <ul>
        <li>Документ добавил: <?=$model->user->first_name?> <?=$model->user->last_name?> <?=$model->user->middle_name?></li>
        <?php if(!empty($model->subject->subject_name)) ?>
        <li>Предмет: <?=$model->subject->subject_name?></li>
        <li>Размер: <?=$model->size?> байт</li>
    </ul>
</div>
<div id="file_description">
    <?=$model->description?>
</div>
<div id="file-download">Скачать: <a class="glyphicon glyphicon-download-alt" href="<?=\yii\helpers\Url::to(['/files/download','id'=>$model->id])?>"></a></div>