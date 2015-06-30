<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\UserDb */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-db-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 256]) ?>

    <?= $form->field($model, 'birthday')->textInput() ?>

    <?= $form->field($model, 'paul')->radioList([1=>'М',2=>'Ж']) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => 16]) ?>

    <? //yii\jui\DatePicker::widget(['name' => 'attributeName', 'clientOptions' => ['defaultDate' => '2014-01-01']])  ?>
    <?= $form->field($model, 'department_id')->dropDownList(
        yii\helpers\ArrayHelper::map(app\models\Department::find()->all(), 'id', 'department_name'),
        ['prompt'=>'Выберите кафедру']) ?>

    <div class="form-group">
        <?= Html::submitButton('Регистрация', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
