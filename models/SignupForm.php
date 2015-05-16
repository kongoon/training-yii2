<?php
namespace app\models;
use yii\base\Model;
use app\models\User;
use app\models\Profile;
use Yii;

class SignupForm extends Model{
    public $username;
    public $password;
    public $email;
    public $firstname;
    public $lastname;
    public $photo;
    
    public function rules(){
        return[
            ['username','filter','filter'=>'trim'],
            ['username','required'],
            ['username','unique','targetClass'=>'\app\models\User','message'=>'Username นี้มีคนใช้แล้ว'],
            ['username','string','min'=>4,'max'=>100],
            
            ['email','filter','filter'=>'trim'],
            ['email','required'],
            ['email','email'],
            ['email','unique','targetClass'=>'\app\models\User','message'=>'Email นี้มีในระบบแล้ว'],
            
            ['password','required'],
            ['password','string','min'=>4],
            ['firstname','required'],
            ['lastname','required'],
            ['photo','file','extensions'=>'jpg,gif,png'],
        ];
    }
    public function signup(){
        if($this->validate()){
            $user = new User();
            
            
            $user->username = $this->username;
            $user->password_hash = Yii::$app->security->generatePasswordHash($this->password);
            $user->auth_key = Yii::$app->security->generateRandomString();
            $user->email = $this->email;
            $user->created_at = date('Y-m-d H:i:s');
            
            
            if($user->save()){
                return $user;
            }
            
        }
    }
    
}

