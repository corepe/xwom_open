<?php

use yii\helpers\Html;
use backend\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\log\ConfigFunctionlog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="config-functionlog-form create_box">

    <?php $form = ActiveForm::begin([
    'options' => ['class' => 'layui-form'],
    //'fieldConfig' => [
    //         'template' => "{label}\n<div class=\"col-lg-3 layui-input-inline\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
    //         'labelOptions' => ['class' => 'col-lg-1 layui-form-label'],
    //     ],
    ]); ?>
    <!--ActiveForm 常用表单示例 ：https://www.yii-china.com/post/detail/297.html-->
    
    <?= $form->field($model, 'app_id')->textInput(['maxlength' => true])->textInput(['class'=>'layui-input']) ?>

    <?= $form->field($model, 'merchant_id')->textInput()->textInput(['class'=>'layui-input']) ?>

    <?= $form->field($model, 'user_id')->textInput()->textInput(['class'=>'layui-input']) ?>

    <?= $form->field($model, 'method')->textInput(['maxlength' => true])->textInput(['class'=>'layui-input']) ?>

    <?= $form->field($model, 'module')->textInput(['maxlength' => true])->textInput(['class'=>'layui-input']) ?>

    <?= $form->field($model, 'controller')->textInput(['maxlength' => true])->textInput(['class'=>'layui-input']) ?>

    <?= $form->field($model, 'action')->textInput(['maxlength' => true])->textInput(['class'=>'layui-input']) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true])->textInput(['class'=>'layui-input']) ?>

    <?= $form->field($model, 'get_data')->textInput()->textInput(['class'=>'layui-input']) ?>

    <?= $form->field($model, 'post_data')->textInput()->textInput(['class'=>'layui-input']) ?>

    <?= $form->field($model, 'header_data')->textInput()->textInput(['class'=>'layui-input']) ?>

    <?= $form->field($model, 'ip')->textInput(['maxlength' => true])->textInput(['class'=>'layui-input']) ?>

    <?= $form->field($model, 'error_code')->textInput()->textInput(['class'=>'layui-input']) ?>

    <?= $form->field($model, 'error_msg')->textInput(['maxlength' => true])->textInput(['class'=>'layui-input']) ?>

    <?= $form->field($model, 'error_data')->textInput()->textInput(['class'=>'layui-input']) ?>

    <?= $form->field($model, 'req_id')->textInput(['maxlength' => true])->textInput(['class'=>'layui-input']) ?>

    <?= $form->field($model, 'user_agent')->textInput(['maxlength' => true])->textInput(['class'=>'layui-input']) ?>

    <?= $form->field($model, 'device')->textInput(['maxlength' => true])->textInput(['class'=>'layui-input']) ?>

    <?= $form->field($model, 'device_uuid')->textInput(['maxlength' => true])->textInput(['class'=>'layui-input']) ?>

    <?= $form->field($model, 'device_version')->textInput(['maxlength' => true])->textInput(['class'=>'layui-input']) ?>

    <?= $form->field($model, 'device_app_version')->textInput(['maxlength' => true])->textInput(['class'=>'layui-input']) ?>

    <?= $form->field($model, 'status')->textInput()->textInput(['class'=>'layui-input']) ?>

    <?= $form->field($model, 'created_at')->textInput()->textInput(['class'=>'layui-input']) ?>

    <?= $form->field($model, 'updated_at')->textInput()->textInput(['class'=>'layui-input']) ?>

    <div align='right'>
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'layui-btn' : 'layui-btn layui-btn-normal']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
