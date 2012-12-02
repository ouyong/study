<?php

class UserController extends CController{
	function actionCreate(){
		$model = new User();
		$model->username = '关杰';
		$model->sex = '男';
		$model->address->province = '四川省';
		$model->address->city = '成都市';
		$model->address->area = '威化县';
		$model->address->address = '青年桥27号';
		$model->save();
	}
	
	function actionUpdate(){
		$model = User::model()->findByPk(new MongoID('50b9c905f36d462010000000'));
		$model->address->address = '青年桥12号';
		$model->save();
		CVarDumper::dump($model->attributes,2,true);
	}
	function actionDelete(){
		$model = User::model()->findByPk(new MongoID('50b9c905f36d462010000000'));
		$r = $model->delete();
		CVarDumper::dump($r,1,true);
	}
}

?>