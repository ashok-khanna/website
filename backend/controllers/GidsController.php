<?php

namespace backend\controllers;

use Yii;
use common\models\Gids;
use common\models\GidsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use backend\services\Unlink;
use yii\filters\AccessControl;
/**
 * GidsController implements the CRUD actions for Gids model.
 */
class GidsController extends Controller
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
     * Lists all Gids models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GidsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Gids model.
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
     * Creates a new Gids model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Gids();
        $dir = Yii::getAlias('@frontend/web');
        $model->scenario = "create";
        if ($model->load(Yii::$app->request->post())) {
            $model->lang = is_array($model->langs) ? json_encode($model->langs) : null;
            $model->image_sad = UploadedFile::getInstance($model, 'image_sad');
            $model->image_smile = UploadedFile::getInstance($model, 'image_smile');

            if (isset($model->image_sad)) {
                $time = strtotime(date('Y-m-d H:i:s'));
                $url_c = $model->image_sad->baseName . '_' . $time . '.' . $model->image_sad->extension;
                $model->img_sad = Unlink::fileUrl($url_c);            
            }

            if (isset($model->image_smile)) {
                $time = strtotime(date('Y-m-d H:i:s'));
                $url_c = $model->image_smile->baseName . '_' . $time . '.' . $model->image_smile->extension;
                $model->img_smile = Unlink::fileUrl($url_c);                
            }

            if (!$model->save()) {                
                return $this->render('create', [
                    'model' => $model,
                ]);        
            }

            if (isset($model->image_sad) && isset($model->image_smile)) {                
                $checker = $model->image_sad->saveAs($dir . $model->img_sad);
                $checker = $model->image_smile->saveAs($dir . $model->img_smile);
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
     * Updates an existing Gids model.
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
        $old_image_sad = $model->img_sad;
        $old_image_smile = $model->img_smile;
        if ($model->load(Yii::$app->request->post())) {
            $model->lang = is_array($model->langs) ? json_encode($model->langs) : null;
            $model->image_sad = UploadedFile::getInstance($model, 'image_sad');
            $model->image_smile = UploadedFile::getInstance($model, 'image_smile');

            if (isset($model->image_sad)) {
                $time = strtotime(date('Y-m-d H:i:s'));
                $url_c = $model->image_sad->baseName . '_' . $time . '.' . $model->image_sad->extension;
                $file_c = Unlink::fileUrl($url_c);  
                $model->img_sad = $file_c;
            }

            if (isset($model->image_smile)) {
                $time = strtotime(date('Y-m-d H:i:s'));
                $url_c = $model->image_smile->baseName . '_' . $time . '.' . $model->image_smile->extension;
                $file_c = Unlink::fileUrl($url_c);  
                $model->img_smile = $file_c;
            }

            if (!$model->save()) {
                return $this->render('create', [
                    'model' => $model,
                ]);     
            }

            if (isset($model->image_sad)) {
                Unlink::unlinkPhoto($old_image_sad);                              
                $checker = $model->image_sad->saveAs($dir . $model->img_sad);
                if (!$checker) {
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }
            }

            if (isset($model->image_smile)) {
                Unlink::unlinkPhoto($old_image_smile);                                   
                $checker = $model->image_smile->saveAs($dir . $model->img_smile);
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
     * Deletes an existing Gids model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        // $this->findModel($id)->delete();
        $dir = Yii::getAlias('@frontend/web');
        $model = $this->findModel($id);
        Unlink::unlinkPhoto($model->img_sad);  
        Unlink::unlinkPhoto($model->img_smile);          
        $model->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Gids model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Gids the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Gids::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
