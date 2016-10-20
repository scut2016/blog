<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\components\ueditor\UEditor;
?>
<?$form = ActiveForm::begin([
    'id' => 'login-form',
    'method'=>'post',
    'action'=>'',
    'options' => ['class' => 'form-horizontal'],
]) ?>
<?= $form->field($model, 'art_title',['options'=>['value'=>'123']])->label('文章标题')->hint('Please enter your name')->textInput() ?>

<?= $form->field($model, 'art_tag')->label('文章关键字')->textInput() ?>
<?= $form->field($model, 'art_description')->label('文章描述')->textInput() ?>
<?//= $form->field($model, 'art_content')->label('文章内容')->textarea() ?>
<?= $form->field($model,'art_content')->label('文章内容')->widget(UEditor::className(),['clientOptions' => [
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
]]);
?>
<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('保存', ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<?php ActiveForm::end() ?>

