<?php

namespace app\controllers;

use Yii;
use app\models\UserDb;
use app\models\UserDbSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserDbController implements the CRUD actions for UserDb model.
 */
class UserDbController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all UserDb models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserDbSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('//user-db/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserDb model.
     * @param integer $id
     * @param integer $department_id
     * @return mixed
     */
    public function actionView($id, $department_id)
    {
        return $this->render('//user-db/view', [
            'model' => $this->findModel($id, $department_id),
        ]);
    }

    /**
     * Creates a new UserDb model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserDb();

        if ($model->load(Yii::$app->request->post())) {
            $model->data_added = date("Y-m-d H:i:s");
            if ($model->save())
                return $this->redirect(['//user-db/view', 'id' => $model->id, 'department_id' => $model->department_id]);
        } else {
            return $this->render('//user-db/create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing UserDb model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $department_id
     * @return mixed
     */
    public function actionUpdate($id, $department_id)
    {
        $model = $this->findModel($id, $department_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['//user-db/view', 'id' => $model->id, 'department_id' => $model->department_id]);
        } else {
            return $this->render('//user-db/update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing UserDb model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $department_id
     * @return mixed
     */
    public function actionDelete($id, $department_id)
    {
        $this->findModel($id, $department_id)->delete();

        return $this->redirect(['//user-db/index']);
    }

    /**
     * Finds the UserDb model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $department_id
     * @return UserDb the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $department_id)
    {
        if (($model = UserDb::findOne(['id' => $id, 'department_id' => $department_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
