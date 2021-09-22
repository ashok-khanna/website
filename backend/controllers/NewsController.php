<?php

namespace backend\controllers;

use Yii;
use common\models\News;
use common\models\NewsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use backend\services\Unlink;
use yii\filters\AccessControl;
/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
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
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single News model.
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
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new News();
        $dir = Yii::getAlias('@frontend/web');
        $model->scenario = "create";
        if ($model->load(Yii::$app->request->post())) {

            $model->image = UploadedFile::getInstance($model, 'image');

            if ($model->date != null)
                $model->date = strtotime($model->date) . "";
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
     * Updates an existing News model.
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
            if ($model->date != null)
                $model->date = strtotime($model->date) . "";
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
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        Unlink::unlinkPhoto($model->img);          
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
