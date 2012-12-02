<?php 

$this->widget('zii.widgets.CListView',array(
		'itemView' => '_item',
		'dataProvider' => $dataProvider,
));


/* 
$this->widget('zii.widgets.grid.CGridView',array(
		
		'dataProvider' => $dataProvider,
		'columns' => array(
				'name','gender','age','classnum'
				),
		));
 */


?>