<?php
namespace app\models;
use yii\base\Model;

class HelloForm extends Model{
    public $firstname;
    public $lastname;
    public $email;
    
    public function rules(){
        return[
            [['firstname','lastname'],'required'],
            [['firstname','lastname'],'string','max'=>100],
            [['email'],'email'],
        ];
    }
    public function attributeLabels() {
        return [
            'firstname'=>'ชื่อ',
            'lastname'=>'นามสกุล',
            'email'=>'อีเมลล์'
        ];
    }
}

