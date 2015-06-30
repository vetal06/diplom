<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserDb */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-db-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="form-group field-files-name">
        <label class="control-label" for="password">Пароль</label>
        <?= Html::textInput('password','',['class'=> 'form-control']) ?>

        <div class="help-block"></div>
    </div>


    <div class="form-group">
        <?= Html::submitButton('Скачать', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
