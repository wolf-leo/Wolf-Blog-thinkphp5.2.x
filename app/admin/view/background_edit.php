<link rel="stylesheet" href="/src/admin/wangEditor/css/wangEditor.min.css">
<script type="text/javascript" src="/src/admin/wangEditor/js/wangEditor.min.js"></script>
<div class="aright">
    <fieldset class="layui-elem-field layui-field-title" style="margin: 20px 30px 20px 20px;">
        <legend><?php echo isset($info['id']) ? '修改' : '添加'; ?>文章</legend>
    </fieldset>
    <form class="layui-form bform" method="post" enctype="multipart/form-data">
        <div class="layui-form-item">
            <label class="layui-form-label">头部背景图</label>
            <div class="layui-input-block">
                <div class="file-box">
                    <i class="layui-icon">&#xe61f;</i>
                    <input class="file-btn" type="button" value="选择图片"> 
                    <input class="file-txt" type="text" autocomplete="off"  id="textfield">
                    {if ($info['head_back_img'])}<img src="{$info.head_back_img|default=''}" width="150">{else/}{/if}
                    <input class="file-file" type="file" name="head_back_img" id="pic" size="28" onchange="document.getElementById('textfield').value = this.value" /> 
                </div>
            </div>
        </div>
        <div class="layui-form-item" style="width: 300px;">
            <label class="layui-form-label">显示头背景</label>
            <div class="layui-input-block">
                <select name="status">
                    {foreach $notes['is_head'] as $key=>$vo} 
                    <option  {if ($info['is_head']==$key)}selected="selected"{/if} value="{$key}">{$vo}</option>
                    {/foreach}
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">主背景图</label>
            <div class="layui-input-block">
                <div class="file-box">
                    <i class="layui-icon">&#xe61f;</i>
                    <input class="file-btn" type="button" value="选择图片"> 
                    <input class="file-txt" type="text" autocomplete="off"  id="textfield2">
                    {if ($info['main_back_img'])}<img src="{$info.main_back_img|default=''}" width="120">{else/}{/if}
                    <input class="file-file" type="file" name="main_back_img" id="pic" size="28" onchange="document.getElementById('textfield2').value = this.value" /> 
                </div>
            </div>
        </div>
        <div class="layui-form-item" style="width: 300px;">
            <label class="layui-form-label">显示主背景</label>
            <div class="layui-input-block">
                <select name="status">
                    {foreach $notes['is_main'] as $key=>$vo} 
                    <option {if ($info['is_main']==$key)}selected="selected"{/if}  value="{$key}">{$vo}</option>
                    {/foreach}
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <input type="hidden" name="id" value="{$info.id}">
                <button class="layui-btn" lay-filter="formDemo" >立即提交</button> 
            </div>
        </div>
    </form>
</div>
<script>
    layui.use('form', function () {
        var form = layui.form();
    });
</script>