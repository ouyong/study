请输入查询条件
<?php /* @var $dataProvider CActiveDataProvider */?>
<?php $form = $this->beginWidget('CActiveForm', array(
	'method' => 'get',
	'action' => $this->createUrl('lists'),
))?>

<?php echo $form->label($model, 'title')?>：
<?php echo $form->textField($model, 'title')?>
<?php echo $form->error($model, 'title')?>
<?php echo CHtml::submitButton('查找')?>

<?php $this->endWidget()?>
<?php 
/* @var $model Vote */

$this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider' => $dataProvider,
	'columns' => array(
		'title',
		array(            // display a column with "view", "update" and "delete" buttons
            'class'=>'CButtonColumn',
			'template' => '{audit}',
			'header' => 'dsdsa',
			'buttons' => array(
				'audit' => array( 
					'label' => '审核',
					'url' => 'Yii::app()->controller->createUrl("audit", array("id"=>$data->primaryKey))',
				)
			),
        ),
		array(            // display a column with "view", "update" and "delete" buttons
            'class'=>'CButtonColumn',
        ),

	),
));

/*
foreach($models as $model) {
	echo $model->title."<br>";
}
$this->widget('CListPager', array(
	'pages' => $dataProvider->pagination,
));
$this->widget('CLinkPager', array(
	'pages' => $dataProvider->pagination,
));*/
