<?php
namespace app\controllers;
use yii\web\Controller;
use app\models\HelloForm;
use Yii;

class HelloWorldController extends Controller{
    public function actionSay($fname=null,$lname=null){
        $a = "Manop";
        $b = "Kongoon";
        return $this->render('say',['va'=>$fname,'vb'=>$lname]);
    }
    public function actionHello(){
        $model = new HelloForm();
        if($model->load(Yii::$app->request->post())){
            echo $model->firstname.'<br>';
            echo $model->lastname.'<br>';
            echo $model->email;
        }else{
            return $this->render('hello',['model'=>$model]);
        }
    }
}
