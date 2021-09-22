<?php

namespace backend\controllers;

use Yii;
use common\models\Trends;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use backend\services\Unlink;
/**
 * TrendsController implements the CRUD actions for Trends model.
 */
class TrendsController extends Controller
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
     * Lists all Trends models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Trends::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Trends model.
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
     * Creates a new Trends model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Trends();
        $dir = Yii::getAlias('@frontend/web');
        $model->scenario = "create";
        if ($model->load(Yii::$app->request->post())) {
            $model->image = UploadedFile::getInstance($model, 'image');

            if (isset($model->image)) {
                $time = strtotime(date('Y-m-d H:i:s'));
                $url_c = $model->image->baseName . '_' . $time . '.' . $model->image->extension;
                $model->img = Unlink::fileUrl($url_c);    
            }

            if (!$model->save()) {                
                return $this->render('create', [
                    'model' => $model,
                ]);        
            }
            if (isset($model->image)) {                
                $checker = $model->image->saveAs($dir . $model->img);
                if (!$checker) {
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Trends model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $dir = Yii::getAlias('@frontend/web');
        $model->scenario="update";
        $oldfile_c = $model->img;
        if ($model->load(Yii::$app->request->post())) {
            $model->image = UploadedFile::getInstance($model, 'image');
            if (isset($model->image)) {
                $time = strtotime(date('Y-m-d H:i:s'));
                $url_c = $model->image->baseName . '_' . $time . '.' . $model->image->extension;
                $file_c = Unlink::fileUrl($url_c);
                $model->img = $file_c;
            }

            if (!$model->save()) {
                return $this->render('create', [
                    'model' => $model,
                ]);        
            }

            if (isset($model->image)) {
                Unlink::unlinkPhoto($oldfile_c);                                      
                $checker = $model->image->saveAs($dir . $file_c);
                if (!$checker) {
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Trends model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $dir = Yii::getAlias('@frontend/web');
        $model = $this->findModel($id);
        Unlink::unlinkPhoto($model->img);           
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Trends model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Trends the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Trends::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
