<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\xpaper\models\XpMember */

$this->title = Yii::t('app', 'Create Xp Member');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Xp Members'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="layui-card-body">
    <div class="create xp-member-create">
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
