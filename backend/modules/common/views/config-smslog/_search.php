<?php

use yii\helpers\Html;
use backend\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\log\ConfigSmslogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="config-smslog-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'merchant_id') ?>

    <?php // echo $form->field($model, 'member_id') ?>

    <?php // echo $form->field($model, 'mobile') ?>

    <?php // echo $form->field($model, 'code') ?>

    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'error_code') ?>

    <?php // echo $form->field($model, 'error_msg') ?>

    <?php // echo $form->field($model, 'error_data') ?>

    <?php // echo $form->field($model, 'usage') ?>

    <?php // echo $form->field($model, 'used') ?>

    <?php // echo $form->field($model, 'use_time') ?>

    <?php // echo $form->field($model, 'ip') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <!--开发调试后，请删除如上注释部分-->
    <!--用法示例，开发调试后，请删除如下 start-->
    <?php  //echo (, 'username')->textInput(['maxlength' => 20]) ?>

    <?php  //echo (, 'password')->passwordInput(['maxlength' => 20])  ?>

    <?php  //echo (, 'sex')->radioList(['1'=>'男','0'=>'女'])   ?>

    <?php  //echo (, 'edu')->dropDownList(['1'=>'大学','2'=>'高中','3'=>'初中'],['prompt'=>'请选择','style'=>'width:120px'])  ?>

    <?php  //echo (, 'file')->fileInput()  ?>

    <?php  //echo (, 'hobby')->checkboxList(['0'=>'篮球','1'=>'足球','2'=>'羽毛球','3'=>'乒乓球'])  ?>

    <?php  //echo (, 'info')->textarea(['rows'=>3])  ?>

    <?php  //echo (, 'userid')->hiddenInput(['value'=>3])  ?>

 <!--用法示例，开发调试后，请删除如上，end-->
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
