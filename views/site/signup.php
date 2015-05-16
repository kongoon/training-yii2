<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
$form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]);?>

<?= $form->field($model, 'firstname');?>
<?= $form->field($model, 'lastname');?>
<?= $form->field($model, 'username');?>
<?= $form->field($model, 'password')->passwordInput();?>
<?= $form->field($model, 'email');?>
<?= $form->field($model, 'photo')->fileInput();?>
<?= Html::submitButton('สมัครสมาชิก',['class'=>'btn btn-success']);?>
<?php ActiveForm::end();?>
