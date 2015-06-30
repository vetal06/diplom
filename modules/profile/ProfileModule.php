<?php

namespace app\modules\profile;

class ProfileModule extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\profile\controllers';
    public $layout= "profile";
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
