<?php
namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\data\Pagination;
use \yii\web\Response;


use common\models\ServiceCategory;
use common\models\Services;
use common\models\News;


class SearchController extends Controller
{    
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function beforeAction($action)
    {                    
        $this->layout = false;
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionSearch() {
      \Yii::$app->response->format = Response::FORMAT_JSON;
      if (Yii::$app->request->isAjax) {
        $data = Yii::$app->request->get();
        if ($data['data'] != null) {
          $condition = "`service_category`.`name_rus`" . " LIKE '%" . $data['data'] . "%'  OR `service_category`.`name_eng`" . " LIKE '%" . $data['data'] . "%' ";
          $condition_services = "`services`.`name_rus`" . " LIKE '%" . $data['data'] . "%' OR `services`.`name_eng`" . " LIKE '%" . $data['data'] . "%'";
          $condition_news = "`news`.`name_eng`" . " LIKE '%" . $data['data'] . "%' OR `news`.`name_rus`" . " LIKE '%" . $data['data'] . "%'";
        }
        else {
          $condition = "";
          $condition_services = "";
          $condition_news = "";
        }        
        $service_category = ServiceCategory::find()->andWhere($condition)->all();
        $services = Services::find()->andWhere($condition_services)->all();
        $news = News::find()->andWhere($condition_news)->all();        
        return ['service_category' => $service_category, 'services' => $services, 'news' => $news];
      }
      return 'error';
    }
}

?>