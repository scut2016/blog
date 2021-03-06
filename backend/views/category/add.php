<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<br>
<?$form = ActiveForm::begin([
    'id' => 'login-form',
    'method'=>'post',
    'action'=>'',
    'options' => ['class' => 'form-horizontal'],
]) ?>
<?= $form->field($model, 'cate_name',['options'=>['class'=>'']])->label('分类名称')->hint('Please enter your name')->textInput() ?>

<?= $form->field($model, 'cate_title')->label('分类标题')->textInput() ?>
<?= $form->field($model, 'cate_keywords')->label('分类关键字')->textInput() ?>
<?= $form->field($model, 'cate_description')->label('分类描述')->textarea() ?>

<?//= $form->field($model, 'cate_pid')->label('父分类')->textInput() ?>
<?= $form->field($model, 'cate_pid')->dropDownList(
   $data, ['prompt'=>$data[0],])->label('父分类') ?>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('保存', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>
<?= Html::tag('p', Html::encode($data[1]), ['class' => 'username']) ?>
<?= Html::button('Press me!', ['class' => 'btn btn-warning']) ?>
<?= Html::activeRadio($model, 'cate_name', ['class' => 'agreement'])?>

