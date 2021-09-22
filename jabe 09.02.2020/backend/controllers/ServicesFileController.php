<?php

namespace backend\controllers;

use Yii;
use common\models\ServicesFile;
use common\models\ServicesFileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use backend\services\Unlink;
use yii\filters\AccessControl;
/**
 * ServicesFileController implements the CRUD actions for ServicesFile model.
 */
class ServicesFileController extends Controller
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
     * Lists all ServicesFile models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ServicesFileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ServicesFile model.
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
     * Creates a new ServicesFile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ServicesFile();
        $dir = Yii::getAlias('@frontend/web');
        $model->scenario = "create";
        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            if (isset($model->file)) {
                $model->file_name = $model->file->baseName;
                $model->file_size = $model->file->size;
                $model->file_mime = $model->file->type;
                $model->file_ext = $model->file->extension;
                $time = strtotime(date('Y-m-d H:i:s'));
                $url_c = $model->file->baseName . '_' . $time . '.' . $model->file->extension;
                $model->file_path = Unlink::fileUrl($url_c);            
            }
            if (!$model->save()) {                
                return $this->render('create', [
                    'model' => $model,
                ]);        
            }
            if (isset($model->file)) {                
                $checker = $model->file->saveAs($dir . $model->file_path);
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
     * Updates an existing ServicesFile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $dir = Yii::getAlias('@frontend/web');
        $model->scenario = "update";
        $oldfile_c = $model->file_path;
        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            if (isset($model->file)) {
                $model->file_name = $model->file->baseName;
                $model->file_ext = $model->file->extension;
                $model->file_mime = $model->file->type;
                $model->file_size = $model->file->size;

                $time = strtotime(date('Y-m-d H:i:s'));
                $url_c = $model->file->baseName . '_' . $time . '.' . $model->file->extension;
                $file_c = Unlink::fileUrl($url_c);
                $model->file_path = $file_c;
            }

            if (!$model->save()) {
                return $this->render('create', [
                    'model' => $model,
                ]);        
            }

            if (isset($model->file)) {
                Unlink::unlinkPhoto($oldfile_c);                                   
                $checker = $model->file->saveAs($dir . $file_c);
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
     * Deletes an existing ServicesFile model.
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
     * Finds the ServicesFile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ServicesFile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ServicesFile::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
