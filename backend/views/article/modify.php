<?
use yii\helpers\Html;
use common\components\ueditor\UEditor;
use yii\widgets\ActiveForm;
?>
<?//= Html::beginForm('','post',['id'=>'modify-art'])?>
<?$form = ActiveForm::begin([
    'id' => 'login-form',
    'method'=>'post',
    'action'=>'',
    'options' => ['class' => 'form-horizontal'],
]) ?>
<div class="form-group">
    <?= $form->field($data, 'art_title')->label('文章标题')->hint('Please enter your name')->textInput() ?>
</div>
<div class="form-group">
    <?= $form->field($data, 'art_tag')->label('文章关键字')->hint('Please enter your name')->textInput() ?>
</div>
<div class="form-group">
    <?= $form->field($data, 'art_description')->label('文章描述')->hint('Please enter your name')->textInput() ?>

</div>
<div class="form-group">
    <?= $form->field($data, 'art_cate_id')->label('文章分类')->hint('Please enter your name')->textInput() ?>

</div>
<div class="form-group">

    <?= $form->field($data,'art_content')->label('文章内容')->widget(UEditor::className(),['clientOptions' => [
        //编辑区域大小
//    'initialFrameHeight' => '200',
        //设置语言
        'lang' =>'zh-cn', //中文为 zh-cn  en
        //定制菜单
//    'toolbars' => [
//        [
//            'fullscreen', 'source', 'undo', 'redo', '|',
//            'fontsize',
//            'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'removeformat',
//            'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|',
//            'forecolor', 'backcolor', '|',
//            'lineheight', '|',
//            'indent', '|'
//        ],
//    ]
    ]]);?>
</div>
<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('保存', ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<?php ActiveForm::end() ?>
<?//=Html::endForm()
//
//?>

