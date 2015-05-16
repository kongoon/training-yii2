<?php
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
Yii::$app->db->open();
use yii\helpers\Html;
//echo Yii::$app->user->identity->profile->firstname;

?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12 text-center">
                <?php
                if(!Yii::$app->user->isGuest){
                    echo Yii::$app->user->identity->username.'<br>';
                    echo Yii::$app->user->identity->role.'<br>';
                    echo Yii::$app->user->identity->email.'<br>';
                    echo Yii::$app->user->identity->profile->firstname.'<br>';
                    echo Yii::$app->user->identity->profile->lastname.'<br>';
                    //echo Yii::$app->user->identity->profile->photo.'<br>';
                    echo Html::img('@web/uploads/user_photos/'.Yii::$app->user->identity->profile->photo,['class'=>'img-circle']);
                }
                ?>
            </div>
        </div>

    </div>
</div>
