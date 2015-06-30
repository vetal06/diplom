<?php
$this->title ='Личный кабинет'?>
<div class="profile-default-index">
    <h1>Личный кабинет</h1>
    <p>
        <?= \yii\widgets\DetailView::widget([
            'model' => $model,
            'attributes' => [
                'first_name',
                'last_name',
                'middle_name',
                'birthday',
                'phone',
                'department.department_name'
            ],
        ]) ?>
    </p>
</div>
