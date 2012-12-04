<?php /* @var $model Vote */?>
<?php /* @var $form CActiveForm */?>

<?php if(!$model->isNewRecord) {
	echo '您正在修改：'.$model->primaryKey;
} else {
	echo '新增：';
}?>

<?php $form = $this->beginWidget('CActiveForm', array(
	'method' => 'post',
))?>

<?php echo $form->label($model, 'title')?>：
<?php echo $form->textField($model, 'title')?>
<?php echo $form->error($model, 'title')?>
<?php echo CHtml::submitButton('就大声哭的撒', array(
	'size' => 222,
	'class' => 'zs_btn',
))?>

<?php $this->endWidget()?>

