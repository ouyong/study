<?php

class UserControllers extends CController{
	public function actionUsersave(){
		$model = new User();
		$model->name = '洪泾源';
		$model->gender= '男';
		$model->phone = '1521XXXX805';
		$model->address->city = '北京';

		$user -> save();		
	}
	
	public function actionUserdelete(){
		$model = new User();
		$mosel = User::model()->findByPK(new MongoID('50ba1b1ccd7459900f000000'));
		$del = $model->delete();
	}
}

?>