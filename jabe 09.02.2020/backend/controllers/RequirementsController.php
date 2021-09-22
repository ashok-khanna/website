<?php

namespace backend\controllers;

use Yii;
use common\models\Requirements;
use common\models\RequirementsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * RequirementsController implements the CRUD actions for Requirements model.
 */
class RequirementsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Requirements models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RequirementsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Requirements model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Requirements model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Requirements();

        if ($model->load(Yii::$app->request->post())) {            
            $model->winter_recommend_rus = json_encode($model->winter_recommend_rus);
            // $model->winter_recommend_kaz = json_encode($model->winter_recommend_kaz);
            $model->winter_recommend_eng = json_encode($model->winter_recommend_eng);
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Requirements model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->winter_recommend_rus = json_encode($model->winter_recommend_rus);
            // $model->winter_recommend_kaz = json_encode($model->winter_recommend_kaz);
            $model->winter_recommend_eng = json_encode($model->winter_recommend_eng);

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }            
        }

        $model->winter_recommend_rus = json_decode($model->winter_recommend_rus);
        // $model->winter_recommend_kaz = json_decode($model->winter_recommend_kaz);
        $model->winter_recommend_eng = json_decode($model->winter_recommend_eng);

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Requirements model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Requirements model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Requirements the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Requirements::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
