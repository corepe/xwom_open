<?php
use yii\helpers\Html;
use yii\helpers\Url;
use backend\assets\AppAsset;
AppAsset::register($this);

/* @var $this yii\web\View */
/* @var $model backend\modules\xpaper\models\XpComment */

$this->title = Yii::t('app', 'Update Xp Comment: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Xp Comments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="layui-card-body">
    <div class="update xp-comment-update">
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