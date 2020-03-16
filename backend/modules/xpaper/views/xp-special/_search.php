<?php

use yii\helpers\Html;
use backend\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\xpaper\models\XpSpecialSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="xp-special-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'siteid') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'thumb') ?>

    <?php // echo $form->field($model, 'banner') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'url') ?>

    <?php // echo $form->field($model, 'ishtml') ?>

    <?php // echo $form->field($model, 'ispage') ?>

    <?php // echo $form->field($model, 'filename') ?>

    <?php // echo $form->field($model, 'adminid') ?>

    <?php // echo $form->field($model, 'userid') ?>

    <?php // echo $form->field($model, 'createtime') ?>

    <?php // echo $form->field($model, 'listorder') ?>

    <?php // echo $form->field($model, 'elite') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'cache') ?>

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
