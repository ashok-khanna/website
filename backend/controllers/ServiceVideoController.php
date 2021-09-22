<?php

namespace backend\controllers;

use Yii;
use common\models\ServiceVideo;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use backend\services\Unlink;
use yii\filters\AccessControl;
/**
 * ServiceVideoController implements the CRUD actions for ServiceVideo model.
 */
class ServiceVideoController extends Controller
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
     * Lists all ServiceVideo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ServiceVideo::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ServiceVideo model.
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
     * Creates a new ServiceVideo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ServiceVideo();
        $dir = Yii::getAlias('@frontend/web');
        $model->scenario = "create";
        if ($model->load(Yii::$app->request->post())) {
            $model->video = UploadedFile::getInstance($model, 'video');

            if (isset($model->video)) {
                $model->file_name = $model->video->baseName;
                $model->file_size = $model->video->size;
                $model->file_mime = $model->video->type;
                $model->file_ext = $model->video->extension;
                $time = strtotime(date('Y-m-d H:i:s'));
                $url_c = $model->video->baseName . '_' . $time . '.' . $model->video->extension;
                $model->file_path = Unlink::fileUrl($url_c);              
                if (!empty($model->video_link)) {
                    $model->file_path = null;
                }
            }            

            if (!$model->save()) {                
                return $this->render('create', [
                    'model' => $model,
                ]);        
            }
            if (isset($model->video)) {                
                $checker = $model->video->saveAs($dir . $model->file_path);
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
     * Updates an existing ServiceVideo model.
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
        $oldfile_c = $model->file_path;
        if ($model->load(Yii::$app->request->post())) {
            $model->video = UploadedFile::getInstance($model, 'video');
            if (isset($model->video)) {
                $model->file_name = $model->video->baseName;
                $model->file_ext = $model->video->extension;
                $model->file_mime = $model->video->type;
                $model->file_size = $model->video->size;

                $time = strtotime(date('Y-m-d H:i:s'));
                $url_c = $model->video->baseName . '_' . $time . '.' . $model->video->extension;
                $file_c = Unlink::fileUrl($url_c); 
                $model->file_path = $file_c;
                if (!empty($model->video_link)) {
                    $model->file_path = null;
                }
            }

            if (!$model->save()) {
                return $this->render('create', [
                    'model' => $model,
                ]);        
            }

            if (isset($model->video)) {
                Unlink::unlinkPhoto($oldfile_c);                                       
                $checker = $model->video->saveAs($dir . $file_c);
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
     * Deletes an existing ServiceVideo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $dir = Yii::getAlias('@frontend/web');
        $model = $this->findModel($id);
        Unlink::unlinkPhoto($model->file_path);
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ServiceVideo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ServiceVideo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ServiceVideo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
