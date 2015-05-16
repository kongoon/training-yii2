<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>

<?php $form = ActiveForm::begin();?>
<?php echo $form->field($model, 'firstname');?>
<?= $form->field($model, 'lastname');?>
<?= $form->field($model, 'email');?>

<?= Html::submitButton('ส่งข้อมูล',['class'=>'btn btn-warning']);?>
<?php ActiveForm::end();?>
