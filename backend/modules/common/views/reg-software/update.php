<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\reg\RegSoftware */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Reg Software',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Reg Softwares'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');

?>


<div class="layui-card-body">
    <div class="update reg-software-update">
            <div class="layui-fluid layui-card" style="padding: 30px 30px;">
            <div class="layui-row">
                <!--<h3><?= Html::encode($this->title) ?></h3>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

            </div>
       </div>
    </div>  
</div>
