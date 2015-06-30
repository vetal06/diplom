<?php

namespace app\modules\profile\controllers;

use Yii;
use app\models\UserDb;
use app\modules\profile\models\ChangePasswordModel;
use yii\web\Controller;

class DefaultController extends Controller
{
    public $layout= "profile";
    public function actionIndex()
    {
        $id = \Yii::$app->user->id;
        $model = UserDb::find()->where('id = :id',array(':id'=>$id))->one();

        return $this->render('index', ['model'=>$model]);
    }
    public function actionPassword_change(){
        $model = new ChangePasswordModel();
        if (Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post())&& $model->validate() ) {
                $user = UserDb::find()->where(['id'=>Yii::$app->user->getId()])->one();
                $user->setPassword($model->newPassword);
                if($user->save()){
                    Yii::$app->getSession()->setFlash('success', 'New password was saved.');
                    return $this->render('success_change_password');
                }else{
                    \yii\helpers\VarDumper::dump($user->getErrors());
                    exit;
                }


            }
        }
        return $this->render('form_change_password', ['model'=> $model]);
    }

}
