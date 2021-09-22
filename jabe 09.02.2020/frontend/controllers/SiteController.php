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

use common\models\AdBanners;
use common\models\Cities;
use common\models\CityPhotos;
use common\models\Contacts;
use common\models\Feedback;
use common\models\Gids;
use common\models\IncludedServices;
use common\models\Langs;
use common\models\News;
use common\models\Partners;
use common\models\Requirements;
use common\models\ServiceCategory;
use common\models\Services;
use common\models\ServicesFile;
use common\models\Trends;
use common\models\ServiceVideo;
use \yii\web\Response;


/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [            
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

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

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $banner = CityPhotos::find()->all();        
        if (isset($_SESSION['city_id'])) {
            $services = [];
            $services_city = ServiceCategory::find()->andWhere(['is_popular' => 1])->all();
            foreach ($services_city as $service) {
                $city = json_decode($service->cities);
                // var_dump($city);die;
                foreach ($city as $ct) {
                    if ($ct->city == $_SESSION['city_id']){
                        array_push($services,$service);
                    }
                }
                if (count($services) == 4){
                    break;
                }
            }            
        }
        else {
            $services = ServiceCategory::find()->andWhere(['is_popular' => 1])->limit(4)->all();
        }
        $adds = AdBanners::find()->andWhere(['is_active' => 1])->andWhere(['page_name' => 'main'])->one();
        $all_services = ServiceCategory::find()->all();        
        $trends = Trends::find()->andWhere(['is_active' => 1])->limit(4)->all(); 
        $cities = Cities::find()->all();
        $lang = Yii::$app->language;       
        foreach ($services as $service) {
            if (isset($_SESSION['city_id'])) {
                $sub_tours = Services::find()->andWhere(['category_id' => $service->id])->andWhere(['city_id' => $_SESSION['city_id']])->limit(4)->all();    
            }
            else {
                $sub_tours = Services::find()->andWhere(['category_id' => $service->id])->limit(4)->all();
            }            
            $service->sub_tours = $sub_tours;            
        }
        $partners = Partners::find()->andWhere(['is_active' => 1])->all();
        return $this->render('index', [
            'banner' => $banner,
            'partners' => $partners,
            'services' => $services,
            'trends' => $trends,
            'all_services' => $all_services,
            'cities' => $cities,
            'adds' => $adds,
        ]);
    }

    public function actionCities($id) {        
        if (($city = Cities::findOne($id)) !== null) {
            $_SESSION['city_id'] = $id;
            $_SESSION['city_rus'] = $city->city_rus;
            $_SESSION['city_eng'] = $city->city_eng;
            if(Yii::$app->request->referrer) {
                return $this->redirect(Yii::$app->request->referrer);
            } else {
                return $this->goHome();
            }
        }
        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContacts()
    {
        $contacts = Contacts::find()->all();
        $cities = Cities::find()->all();        
        $services = ServiceCategory::find()->all();
        $cities = Cities::find()->all();
        foreach ($contacts as $contact) {
            foreach ($cities as $city) {
                if ($contact->city_id == $city->id) {
                    $contact->city = $city->city;
                }
            }
        }
        return $this->render('contacts', [
            'all_services' => $services,
            'contacts' => $contacts,
            'cities' => $cities,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        $services = ServiceCategory::find()->all();
        $cities = Cities::find()->all();
        return $this->render('about', [
            'all_services' => $services,
            'cities' => $cities,
        ]);
    }

    /**
     * Displays tours page.
     *
     * @return mixed
     */
    public function actionTours($id)
    {
        if (($service = ServiceCategory::findOne($id)) !== null) {
            $file = ServicesFile::find()->one();
            $services = ServiceCategory::find()->all();            
            $adds = AdBanners::find()->andWhere(['is_active' => 1])->andWhere(['page_name' => 'service_category'])->limit(2)->all();
            $cities = Cities::find()->all();
            $service->sub_header = '';
            $lang = Yii::$app->language;
            if (isset($_SESSION['city_id'])) {
                $city = json_decode($service->cities);                
                $sub_service = Services::find()->andWhere(['category_id' => $id])->andWhere(['city_id' => $_SESSION['city_id']])->limit(6)->all();
                foreach ($city as $ct) {
                    if ($_SESSION['city_id'] == $ct->city) {
                        if ($lang == 'en')
                            $service->sub_header = $ct->heng;
                        else
                            $service->sub_header = $ct->hrus;
                    }
                }
            }
            else {
                $city = Cities::find()->one();                
                $sub_service = Services::find()->andWhere(['category_id' => $id])->andWhere(['city_id' => $city->id])->limit(6)->all();
            }
            return $this->render('tours',[
                'one_service' => $service,
                'file' => $file,
                'sub_services' => $sub_service,
                'all_services' => $services,
                'adds' => $adds,
                'cities' => $cities
            ]);
        }        
        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }


    /**
     * Displays sub-tours page.
     *
     * @return mixed
     */
    public function actionSub_tours($id)
    {
        
        if (($sub_tours = Services::findOne($id)) !== null) {
            $services = ServiceCategory::find()->all();
            $requirements = Requirements::find()->andWhere(['services_id' => $sub_tours->id])->one();
            $included_services = IncludedServices::find()->andWhere(['services_id' => $sub_tours->id])->one();
            $feedback = Feedback::find()->andWhere(['services_id' => $sub_tours->id])->all();
            if (isset($_SESSION['city_id'])) {
                $all_sub_tours = Services::find()->andWhere(['category_id' => $sub_tours->category_id])->andWhere(['city_id' => $_SESSION['city_id']])->all();    
            }
            else {
                $city = Cities::find()->one();
                $all_sub_tours = Services::find()->andWhere(['category_id' => $sub_tours->category_id])->all();            
            }            
            $cities = Cities::find()->all();
            return $this->render('sub-tours',[
                'all_services' => $services,
                'sub_tour' => $sub_tours,
                'requirements' => $requirements,
                'inc_services' => $included_services,
                'feedbacks' => $feedback,
                'all_sub_tours' => $all_sub_tours,
                'cities' => $cities,
            ]);
        }        
        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));        
    }

    /**
     * Displays articles page.
     *
     * @return mixed
     */
    public function actionArticles($id, $category = null)
    {
        $services = ServiceCategory::find()->all();
        $from = ($id-1) * 10;
        if ($category != null) {
            $articles = News::find()->andWhere(['is_active' => 1])->andWhere(['category_news' => $category])->limit(10)->offset($from)->all();    
        }
        else {
            $articles = News::find()->andWhere(['is_active' => 1])->all();
        }
        $count = News::find()->count();
        $pageNumber = (float) $count/10;        
        $pageNumber = ceil($pageNumber);
        $adds = AdBanners::find()->andWhere(['is_active' => 1])->andWhere(['page_name' => 'news'])->limit(2)->all();
        $cities = Cities::find()->all();
        return $this->render('articles',[
            'all_services' => $services,
            'category' => $category,
            'news' => $articles,
            'pageNumber' => $pageNumber,
            'current' => (int) $id,
            'adds' => $adds,
            'cities' => $cities,
        ]);
    }

    public function actionArticle($id) {
        $services = ServiceCategory::find()->all();
        $news = News::find()->andWhere(['id' => $id])->one();
        $cities = Cities::find()->all();
        if (isset($_SESSION['city_id'])) {
            $all_sub_tours = Services::find()->andWhere(['city_id' => $_SESSION['city_id']])->all();    
        }
        else {
            $city = Cities::find()->one();
            $all_sub_tours = Services::find()->all();            
        } 
        return $this->render('articleOpen',[
            'all_services' => $services,
            'cities' => $cities,
            'news' => $news,
            'all_sub_tours' => $all_sub_tours,
        ]);
    }

    /**
    * Displays guides page.
    *
    * @return mixed
    */
    public function actionCategoryArticle()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        if (Yii::$app->request->isAjax) { 
            // $data = Yii::$app->request->post();
            // $data = json_decode($data['data']);
            $news = News::find()->all();
            return $news;           
        }
        else {
            return 'error';
        }     
    }
    
    /**
     * Displays guides page.
     *
     * @return mixed
     */
    public function actionGuides($id)
    {
        $services = ServiceCategory::find()->all();        
        $cities = Cities::find()->all();
        $from = ($id-1) * 9;        
        $gids = Gids::find()->limit(9)->offset($from)->all();
        $count = Gids::find()->count();
        $pageNumber = (float) $count/9;        
        $pageNumber = ceil($pageNumber);                        
        return $this->render('guides',[
            'all_services' => $services,
            'gids' => $gids,
            'pageNumber' => $pageNumber,
            'current' => (int) $id,
            'cities' => $cities
        ]);
    }

    /**
     * Displays guides page.
     *
     * @return mixed
     */
    public function actionBasket()
    {
        $services = ServiceCategory::find()->all();
        $cities = Cities::find()->all();
        $city = Cities::find()->one();
        return $this->render('basket',[
            'all_services' => $services,
            'cities' => $cities,
            'CurrentCity' => $city
        ]);
    }
    
    /**
    * Displays guides page.
    *
    * @return mixed
    */
    public function actionGetservices()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        if (Yii::$app->request->isAjax) { 
            $data = Yii::$app->request->post();
            $data = json_decode($data['data']);
            $services = Services::find()->andWhere(['id' => $data])->all();  
            return $services;           
        }
        else {
            return 'error';
        }     
    }

    public function actionChosedGuide()
    {   
        if (Yii::$app->request->isPost) {
            // $posts = json_decode(Yii::$app->request->getRawBody());            
            $posts = Yii::$app->request->post();            
            $this->sendEmail('<div>'.'<p> Имя: '.$posts['name'].'</p> <p> Контакт: '. $posts['phone'].'</p> <p> Страница: Гиды </p> <p> Гид: '. $posts['gid'].'</p> </div>','(Выбор гида)');
            // Yii::$app->session->setFlash('success', 'Спасибо за ответы');            
            return "success";
        }    
        return "error";
    }

    public function actionMail()
    {   
        if (Yii::$app->request->isPost) {
            // $posts = json_decode(Yii::$app->request->getRawBody());            
            $posts = Yii::$app->request->post();            
            $this->sendEmail('<div>'.'<p> Имя: '.$posts['name'].'</p> <p> Контакт: '. $posts['phone'].'</p> <p> Страница: '. $posts['page'].'</p> <p> Кнопка: '. $posts['btn'].'</p> </div>','(Записаться на консультацию)');
            // Yii::$app->session->setFlash('success', 'Спасибо за ответы');            
            return "success";
        }    
        return "error";
    }

    protected function sendEmail($data, $subject)
    {
        return Yii::$app
            ->mailer
            ->compose()
            ->setFrom([Yii::$app->params['supportEmail'] => 'Jabe mailer'])
            ->setTo('sadykov.r@maint.kz')
            // ->setTo('Concierge@jabe.kz')
            ->setSubject('Заявка от сайта ' . $subject)
            ->setHtmlBody($data)
            ->send();
    }

    public function actionMd()
    {
        $headers = Yii::$app->request->headers->toArray();
        if (!isset($headers['content-hmac'])) {
            Yii::error("XXXXXXXXXXXXXXXXXXXXXXX");
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        $hmac = $headers['content-hmac'][0];
        $requestBody = Yii::$app->request->rawBody;
        $str = hash_hmac('sha256', $requestBody, Yii::$app->params['cloudpayments_secret'], true);
        if (base64_encode($str) != $hmac) {
            Yii::error("WWWWWWWWWWWWWWWWWWWWWWWWW");
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        $data = json_decode(Yii::$app->request->post()['Data']);   
        var_dump($data);die; 
    }
}
