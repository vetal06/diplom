<h1><?=$model->title?></h1>
<div><?=$model->data?></div>
<div><?=$model->getUser()->one()->first_name?></div>
<div class="">
    <?=$model->body?>
</div>