<?php
/**
 * 练习二 
 * Enter description here ...
 * @author Administrator
 *
 */
class TaskTwoController extends Controller{
	
	//增
	public function actionCreate(){
		$model = new Teacher();
		$model->name = '葛进宝';
		$model->address->homeAddress = '河北省保定市';
		$model->save();
	}
	//改
	public function actionUpdate(){
		echo '<pre>';
		$model = Teacher::model()->findByPk(new MongoID('50bad380b7a535f009000013'));
		$model->address = array('homeAddress'=>'河北省shijiazhuang市');
		var_dump($model);
		$model->save();
	}
	
//	//删
	public function actionDelete(){
		$model = Teacher::model()->findByPk(new MongoID(new MongoID('50bad380b7a535f009000014')));
		$model->delete();
	}

	//查
	public function  actionFind(){
		$model = new Teacher();
		$critera = new EMongoCriteria();
		$critera->addCond('address','==',array('homeAddress'=>'河北省保定市'));
		$models = $model->findAll($critera);
		var_dump($models);
	}
}





