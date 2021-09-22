<?php

namespace backend\controllers;

use Yii;
use common\models\ServiceCategory;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use backend\services\Unlink;
/**
 * ServiceCategoryController implements the CRUD actions for ServiceCategory model.
 */
class ServiceCategoryController extends Controller
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
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'check_active'],
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
     * Lists all ServiceCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ServiceCategory::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ServiceCategory model.
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
     * Creates a new ServiceCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ServiceCategory();
        $dir = Yii::getAlias('@frontend/web');
        $model->scenario = "create";
        if ($model->load(Yii::$app->request->post())) {
            $model->video = UploadedFile::getInstance($model, 'video');
            $model->cities = $model->convertHash();            
            if (isset($model->video) && $model->video_link == null) {
                $model->video_name = $model->video->baseName;
                $model->video_size = $model->video->size;
                $model->video_mime = $model->video->type;
                $model->video_ext = $model->video->extension;
                $time = strtotime(date('Y-m-d H:i:s'));
                $url_c = $model->video->baseName . '_' . $time . '.' . $model->video->extension;
                $model->video_path = Unlink::fileUrl($url_c);                              
            }            
            if (!empty($model->video_link)) {
                $model->video_path = null;
            }

            if (!$model->save()) {                
                return $this->render('create', [
                    'model' => $model,
                ]);        
            }
            if (isset($model->video)) {                
                $checker = $model->video->saveAs($dir . $model->video_path);
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
     * Updates an existing ServiceCategory model.
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
        $oldfile_c = $model->video_path;
        if ($model->load(Yii::$app->request->post())) {
            $model->video = UploadedFile::getInstance($model, 'video');
            $model->cities = $model->convertHash();
            if (isset($model->video)) {
                $model->video_name = $model->video->baseName;
                $model->video_ext = $model->video->extension;
                $model->video_mime = $model->video->type;
                $model->video_size = $model->video->size;

                $time = strtotime(date('Y-m-d H:i:s'));
                $url_c = $model->video->baseName . '_' . $time . '.' . $model->video->extension;
                $file_c = Unlink::fileUrl($url_c); 
                $model->video_path = $file_c;
                if (!empty($model->video_link)) {
                    $model->video_path = null;
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
        $model->renegateHash();

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionCheck_active(){
        $is_popular = 1;
        $model = ServiceCategory::find()->andWhere($is_popular)->count();
        return $model;
    }

    /**
     * Deletes an existing ServiceCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $dir = Yii::getAlias('@frontend/web');
        $model = $this->findModel($id);
        Unlink::unlinkPhoto($model->video_path);
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ServiceCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ServiceCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ServiceCategory::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
