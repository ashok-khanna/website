<?php

namespace backend\controllers;

use Yii;
use common\models\Services;
use common\models\ServicesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use backend\services\Unlink;
use yii\filters\AccessControl;
/**
 * ServicesController implements the CRUD actions for Services model.
 */
class ServicesController extends Controller
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
     * Lists all Services models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ServicesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Services model.
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
     * Creates a new Services model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Services();
        $dir = Yii::getAlias('@frontend/web');
        $model->scenario = "create";
        if ($model->load(Yii::$app->request->post())) {            
            $model->image = UploadedFile::getInstance($model, 'image');

            $model->images = UploadedFile::getInstances($model, 'images');            
            $model->has_tags = $model->convertHash();
            if (isset($model->images) && !$model->saveImg()) {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
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

            if (!$model->upload()) {
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
     * Updates an existing Services model.
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
        $old_photos = json_decode($model->photos);
        if ($model->load(Yii::$app->request->post())) {
            $model->image = UploadedFile::getInstance($model, 'image');
            $model->images = UploadedFile::getInstances($model, 'images');
            $model->has_tags = $model->convertHash();
            if (isset($model->images) && !$model->saveImg()) {
                return $this->render('create', [
                    'model' => $model,
                ]);                
            }
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
            
            if (isset($model->images)) {                
                $model->upload();
                Unlink::unlinkPhotos($old_photos);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $model->renegateHash();

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Services model.
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
        Unlink::unlinkPhotos(json_decode($model->photos));
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Services model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Services the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Services::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
