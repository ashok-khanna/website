<?php

namespace backend\controllers;

use Yii;
use common\models\AdBanners;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use backend\services\Unlink;
use yii\filters\AccessControl;

/**
 * AdBannersController implements the CRUD actions for AdBanners model.
 */
class AdBannersController extends Controller
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
     * Lists all AdBanners models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => AdBanners::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AdBanners model.
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
     * Creates a new AdBanners model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AdBanners();
        $dir = Yii::getAlias('@frontend/web');
        $model->scenario = "create";

        if ($model->load(Yii::$app->request->post())) {

            $model->img = UploadedFile::getInstance($model, 'img');

            if (isset($model->img)) {
                $model->file_name = $model->img->baseName;
                $model->file_size = $model->img->size;
                $model->file_mime = $model->img->type;
                $model->file_ext = $model->img->extension;
                $time = strtotime(date('Y-m-d H:i:s'));
                $url_c = $model->img->baseName . '_' . $time . '.' . $model->img->extension;
                $model->file_path = Unlink::fileUrl($url_c);            
            }

            if (!$model->save()) {
                var_dump($model->getErrors());die;                
                return $this->render('create', [
                    'model' => $model,
                ]);        
            }
            if (isset($model->img)) {                
                $checker = $model->img->saveAs($dir . $model->file_path);
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
     * Updates an existing AdBanners model.
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

            $model->img = UploadedFile::getInstance($model, 'img');
            if (isset($model->img)) {
                $model->file_name = $model->img->baseName;
                $model->file_ext = $model->img->extension;
                $model->file_mime = $model->img->type;
                $model->file_size = $model->img->size;

                $time = strtotime(date('Y-m-d H:i:s'));
                $url_c = $model->img->baseName . '_' . $time . '.' . $model->img->extension;
                $file_c = Unlink::fileUrl($url_c);     
                $model->file_path = $file_c;
            }

            if (!$model->save()) {
                return $this->render('create', [
                    'model' => $model,
                ]);        
            }

            if (isset($model->img)) {
                Unlink::unlinkPhoto($oldfile_c);                                
                $checker = $model->img->saveAs($dir . $file_c);
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
     * Deletes an existing AdBanners model.
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
     * Finds the AdBanners model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AdBanners the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AdBanners::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
