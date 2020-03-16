<?php
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = '会员列表';
?>
<!-- 顶部菜单开始 -->
<?= \Yii::$app->view->renderFile('@app/views/public/breadcrumb.php')?>
<div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body ">
                            <form class="layui-form layui-col-space5">
                                <div class="layui-inline layui-show-xs-block">
                                    <input class="layui-input" autocomplete="off" placeholder="开始日" name="start" id="start"></div>
                                <div class="layui-inline layui-show-xs-block">
                                    <input class="layui-input" autocomplete="off" placeholder="截止日" name="end" id="end"></div>
                                <div class="layui-inline layui-show-xs-block">
                                    <input type="text" name="username" placeholder="请输入用户名" autocomplete="off" class="layui-input"></div>
                                <div class="layui-inline layui-show-xs-block">
                                    <button class="layui-btn" lay-submit="" lay-filter="sreach">
                                        <i class="layui-icon">&#xe615;</i></button>
                                </div>
                            </form>
                        </div>
                        <div class="layui-card-body ">
                            <table class="layui-table" lay-data="{url:'<?=\yii\helpers\Url::toRoute(['member/user'])?>',page:true,toolbar: '#toolbarDemo',id:'test'}" lay-filter="test">
                                <thead>
                                    <tr>
                                        <th lay-data="{type:'checkbox'}">ID</th>
                                        <th lay-data="{field:'id', width:80, sort: true}">ID</th>
                                        <th lay-data="{field:'username', width:120, sort: true, edit: 'text'}">用户名</th>
                                        <th lay-data="{field:'email', edit: 'text', minWidth: 150}">邮箱</th>
                                        <th lay-data="{field:'sex', width:80,templet: '#switchTpl'}">性别</th>
                                        <th lay-data="{field:'city', edit: 'text', minWidth: 100}">城市</th>
                                        <th lay-data="{field:'experience', sort: true, edit: 'text'}">积分</th>
                                        <th lay-data="{field:'dw_xinzhi',templet: function(d){ return d.dw_xinzhi.titel;}}">学校</th></tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
    <script type="text/html" id="toolbarDemo">
        <div class = "layui-btn-container" >
            <button class = "layui-btn layui-btn-sm" lay-event = "getCheckData" > 获取选中行数据 </button>
            <button class="layui-btn layui-btn-sm" lay-event="getCheckLength">获取选中数目</button >
            <button class = "layui-btn layui-btn-sm" lay-event = "isAll" > 验证是否全选</button>
        </div >
    </script>
    <script type="text/html" id="switchTpl">
        <!-- 这里的checked的状态只是演示 -->
        <input type = "checkbox" name = "sex" value = "{{d.id}}" lay-skin = "switch"lay-text = "女|男" lay-filter = "sexDemo" {{ d.id == 10003 ? 'checked': ''}} >
    </script>
    <script>
        $(function  () {
            layui.use('laydate',
                function() {
                    var laydate = layui.laydate;

                    //执行一个laydate实例
                    laydate.render({
                        elem: '#start' //指定元素
                    });

                    //执行一个laydate实例
                    laydate.render({
                        elem: '#end' //指定元素
                    });

                });
        });
    </script>
    <script>
        $(function  () {
            layui.use('table',
                function() {
                    var table = layui.table;

                    //监听单元格编辑
                    table.on('edit(test)',
                        function(obj) {
                            var value = obj.value //得到修改后的值
                                ,
                                data = obj.data //得到所在行所有键值
                                ,
                                field = obj.field; //得到字段
                            layer.msg('[ID: ' + data.id + '] ' + field + ' 字段更改为：' + value);
                        });

                    //头工具栏事件
                    table.on('toolbar(test)',
                        function(obj) {
                            var checkStatus = table.checkStatus(obj.config.id);
                            switch (obj.event) {
                                case 'getCheckData':
                                    var data = checkStatus.data;
                                    layer.alert(JSON.stringify(data));
                                    break;
                                case 'getCheckLength':
                                    var data = checkStatus.data;
                                    layer.msg('选中了：' + data.length + ' 个');
                                    break;
                                case 'isAll':
                                    layer.msg(checkStatus.isAll ? '全选': '未全选');
                                    break;
                            };
                        });
                }
            );
        });
    </script>
</html>