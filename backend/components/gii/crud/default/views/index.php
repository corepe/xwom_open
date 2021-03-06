<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();

echo "<?php\n";
?>
/**
 * This is the view;
 * @author  Womtech  email:chareler@163.com
 * @DateTime <?= date("Y-m-d H:i",time()) ?>
 */
use yii\helpers\Html;
use yii\helpers\Url;
use backend\assets\AppAsset;
use <?= $generator->indexWidgetType === 'grid' ? "backend\\grid\\GridView" : "backend\\widgets\\ListView" ?>;
<?= $generator->enablePjax ? 'use backend\widgets\Pjax;' : '' ?> <?php echo "\n";?>
AppAsset::register($this); <?php echo "\n";?>
//$this->registerJs($this->render('js/index.js'));
/* @var $this yii\web\View */
<?= !empty($generator->searchModelClass) ? "/* @var \$searchModel " . ltrim($generator->searchModelClass, '\\') . " */\n" : '' ?>
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Xp Specials'), 'url' => ['/xpaper/xp-special/index']];//上级菜单示例
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- 面包屑 -->
<?php  echo "<?";?>
= \Yii::$app->view->renderFile('@app/views/public/breadcrumb.php')<?php echo "?>\n";?>
<!-- 面包屑 -->
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body ">
                            <form class="layui-form layui-col-space5">
                                <!--下面不需要，则需要删除-->
                                <!--<div class="layui-inline layui-show-xs-block">
                                    <input class="layui-input"  autocomplete="off" placeholder="开始日" name="start" id="start">
                                </div>
                                <div class="layui-inline layui-show-xs-block">
                                    <input class="layui-input"  autocomplete="off" placeholder="截止日" name="end" id="end">
                                </div>
                                <div class="layui-inline layui-show-xs-block">
                                    <input type="text" name="username"  placeholder="请输入用户名" autocomplete="off" class="layui-input">
                                </div>
                                <div class="layui-inline layui-show-xs-block">
                                    <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                                </div>
                                -->
                                <?php if(!empty($generator->searchModelClass)): echo "\n";?>
                                <?= "    <?php " . ($generator->indexWidgetType === 'grid' ? "// " : "") ?>echo $this->render('_search', ['model' => $searchModel]); ?>
                                <?php endif;echo "\n"; ?>
                            </form>
                        </div>
                        <div class="layui-card-header">
                            <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
                            <?= "<?= " ?>Html::Button('<i class="layui-icon"></i>添加',
                                    [
                                       'onclick' => 'xadmin.open("添加", "'.Url::toRoute(['create']).'",500,550)',
                                       'data-target' => '#create-modal',
                                       'class' => 'layui-btn',
                                       'id' => 'modalButton',
   
                                    ]
                                ) 
                            ?>
                            <?= "<!--<?= " ?>Html::a(<?= $generator->generateString('<i class= layui-icon></i>' . '添加 ' . Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>, ['create'], ['class' => 'layui-btn layui-default-add']) ?> <?= "-->" ?>
                        </div>
                        <div class="layui-card-body layui-table-body layui-table-main">
<?= $generator->enablePjax ? '<?php Pjax::begin(); ?>' : '' ?>
<?php if ($generator->indexWidgetType === 'grid'): ?>
    <?= "<?= " ?>GridView::widget([
        'dataProvider' => $dataProvider,
		'options' => ['class' => 'layui-table-box ','style'=>'overflow:auto', 'id' => 'grid'],
                //'layout'=> '{items}<div class="layui-table-page"><div id="layui-table-page1"><div class="layui-box layui-laypage layui-laypage-default" id="layui-laypage-1">{pager}</div></div></div>',
                'layout'=> '{items}<div style="margin: 10px 0 0 10px;">{pager}</div>',
		'tableOptions'=> ['class'=>'layui-table','style'=>'width: 100%; '],
		'pager' => [
                        //'options'=>['class'=>'hidden'],//关闭自带分页
			'options'=>['class'=>'layuipage pull-left'],
				'prevPageLabel' => '上一页',
				'nextPageLabel' => '下一页    ',
				'firstPageLabel'=>'首页    ',
				'lastPageLabel'=>'尾页',
				'maxButtonCount'=>5,
                ],
                //GridView控制行样式 rowOptions属性
                
                //'showFooter'=>true,//显示底部（就是多了一栏），默认是关闭的
                //'filterModel' => $searchModel,
		'columns' => [
                        //['class' => 'yii\grid\SerialColumn'],
			[
				'class' => 'backend\grid\CheckboxColumn',
				'checkboxOptions' => ['lay-skin'=>'primary','lay-filter'=>'choose'],
				'headerOptions' => ['width'=>'20','style'=> 'text-align: center;'],
				'contentOptions' => ['style'=> 'text-align: center;']
			],
                        <?php
                        $count = 0;
                        if (($tableSchema = $generator->getTableSchema()) === false) {
                            foreach ($generator->getColumnNames() as $name) {
                                if (++$count < 6) {
                                    echo "                    '" . $name . "',\n";
                                } else {
                                    echo "                   // '" . $name . "',\n";
                                }
                            }
                        } else {
                            foreach ($tableSchema->columns as $column) {
                                $format = $generator->generateColumnFormat($column);
                                if ($column->type === 'date') {
                                    $columnDisplay = "            ['attribute' => '$column->name','format' => ['date',(isset(Yii::\$app->modules['datecontrol']['displaySettings']['date'])) ? Yii::\$app->modules['datecontrol']['displaySettings']['date'] : 'd-m-Y']],";

                                } elseif ($column->type === 'time') {
                                    $columnDisplay = "            ['attribute' => '$column->name','format' => ['time',(isset(Yii::\$app->modules['datecontrol']['displaySettings']['time'])) ? Yii::\$app->modules['datecontrol']['displaySettings']['time'] : 'H:i:s A']],";
                                } elseif ($column->type === 'datetime' || $column->type === 'timestamp') {
                                    $columnDisplay = "            ['attribute' => '$column->name','format' => ['datetime',(isset(Yii::\$app->modules['datecontrol']['displaySettings']['datetime'])) ? Yii::\$app->modules['datecontrol']['displaySettings']['datetime'] : 'd-m-Y H:i:s A']],";
                                } else {
                                    $columnDisplay = "            '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',";
                                }
                                if (++$count < 10) {
                                    echo $columnDisplay ."\n";
                                } else {
                                    echo "//" . $columnDisplay . " \n";
                                }
                            }
                        }
                        ?>

            [
            'header' => '<div class="layui-table-cell">操作</div>',
				'class' => 'yii\grid\ActionColumn',
				'headerOptions' => [
					'width' => '20%'
				],
                                'template' =>'<div class="layui-table-cell"> {view} {update} {delete} </div>',
				'buttons' => [
                                        'view' => function ($url, $model, $key){
                                            //return Html::a('查看', Url::to(['view','id'=>$model->id]), ['class' => "layui-btn layui-btn-xs layui-default-view"]);
                                            return Html::Button(Yii::t('app', 'View'),
                                                    [
                                                    'onclick' => 'xadmin.open("'.Yii::t('app', 'View').'", "'.$url.'",500,550)',
                                                    'data-target' => '#view-modal',
                                                    'class' => 'layui-btn layui-btn-xs layui-default-view',
                                                    'id' => 'modalButton',
                                                    ]
                                                ); 
                                                    
                                        },
                                        'update' => function ($url, $model, $key) {
                                            //return Html::a('修改', Url::to(['update','id'=>$model->id]), ['class' => "layui-btn layui-btn-normal layui-btn-xs layui-default-update"]);
                                            return Html::Button(Yii::t('app', 'Update'),
                                                    [
                                                    'onclick' => 'xadmin.open("'.Yii::t('app', 'Update').'", "'.$url.'",500,550)',
                                                    'data-target' => '#update-modal',
                                                    'class' => 'layui-btn layui-btn-normal layui-btn-xs layui-default-update',
                                                    'id' => 'modalButton',
                                                    ]
                                                );  
                                                    
                                        },

                                        'delete'=>function($url,$model,$key)
                                            {
                                                $options=[
                                                    'title'=>Yii::t('app', 'Delete'),
                                                    'aria-label'=>Yii::t('app','Delete'),
                                                    'data-confirm'=>Yii::t('app','Are you sure you want to delete this item?'),
                                                    'data-method'=>'post',
                                                    'data-pjax'=>'0',
                                                    'class'=>'layui-btn layui-btn-danger layui-btn-xs layui-default-delete'
                                                    ];
                                                    return Html::a(Yii::t('app','Delete'),$url,$options); 
                                                //if($model->status == 0){//不同的视图，需要修改这里字段名称 或者不用判断，直接 return
                                                    //return Html::a('删除',$url,$options); 
                                                    //} else {
                                                     //  return Html::a('已审',$url,$options);  
                                                   // }
                                            },
                                        //接手 如果不需要，调试后必须删除
                                        /*
                                        'approve'=>function($url,$model,$key)
                                        {
                                                $options=[
                                                        'title'=>Yii::t('app', 'rove task'),
                                                        'aria-label'=>Yii::t('app','rove task'),
                                                        'data-confirm'=>Yii::t('app','Are you sure you want to rove this item?'),
                                                        'data-method'=>'post',
                                                        'data-pjax'=>'0',
                                                        'class'=>'layui-btn layui-btn-normal layui-btn-xs layui-default-approve'
                                                                ];
                                                if($model->status ==1){
                                                  return Html::a('接手任务', $url, $options); 
                                                } else {
                                                   return Html::a('已委派',$url,$options);

                                                }

                                        },
                                        */
				]
            ],
        ],
    ]); ?>
<?php else: ?>
    <?= "<?= " ?>ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model-><?= $nameAttribute ?>), ['view', <?= $urlParams ?>]);
        },
    ]) ?>
<?php endif; ?>
<?= $generator->enablePjax ? '<?php Pjax::end(); ?>' : '' ?>   
                        </div>

                    </div>
                </div>
            </div>
        </div> 

    <script>
      layui.use(['laydate','form'], function(){
        var laydate = layui.laydate;
        var  form = layui.form;


        // 监听全选
        form.on('checkbox(checkall)', function(data){

          if(data.elem.checked){
            $('tbody input').prop('checked',true);
          }else{
            $('tbody input').prop('checked',false);
          }
          form.render('checkbox');
        }); 
        
        //执行一个laydate实例
        laydate.render({
          elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
          elem: '#end' //指定元素
        });


      });
      /*用户-删除*/
      function delAll (argument) {
        var ids = [];

        // 获取选中的id 
        $('tbody input').each(function(index, el) {
            if($(this).prop('checked')){
               ids.push($(this).val())
            }
        });
  
        layer.confirm('确认要删除吗？'+ids.toString(),function(index){
            //捉到所有被选中的，发异步进行删除
            layer.msg('删除成功', {icon: 1});
            $(".layui-form-checked").not('.header').parents('tr').remove();
        });
      }
    </script>