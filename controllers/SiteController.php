<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

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

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionSignup(){
        $model = new \app\models\SignupForm();
        
        if($model->load(Yii::$app->request->post())){
            if($user = $model->signup()){//ส่งข้อมูลประมวลผลที่ signup() อยู่ใน SignupForm
                $profile = new \app\models\Profile();
                $profile->user_id = $user->id;
                $profile->firstname = $model->firstname;
                $profile->lastname = $model->lastname;
                
                $photo = \yii\web\UploadedFile::getInstance($model, 'photo');
                $newname = time().'-'.$photo->baseName.'.'.$photo->extension;
                $photo->saveAs('uploads/user_photos/' . $newname);
                
                $profile->photo = $newname;
                $profile->save();
                
                if(Yii::$app->getUser()->login($user)){
                    return $this->goHome();
                }
            }
        }
        
        return $this->render('signup',['model'=>$model]);
    }
}
