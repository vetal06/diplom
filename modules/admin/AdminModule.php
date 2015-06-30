<?php

namespace app\modules\admin;

class AdminModule extends \yii\base\Module
{
    public $layout= "admin_lauouts";
    public $controllerNamespace = 'app\modules\admin\controllers';
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
