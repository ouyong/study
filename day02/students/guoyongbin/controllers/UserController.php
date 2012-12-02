<?php

class UserController extends CController{
	
	public function actionAdd(){
		$user = new User();
		$user->name = '洪警员';
		$user->email = 'hjy@163.com';
		$user->age = 22;
		$user->address->province = '北京';
		$user->address->city = '北京';
		$user->address->phone = '15244445555';
		$user->save();
		
		$user1 = new User();
		$user1->name = '好基友';
		$user1->email = 'hjy@163.com';
		$user1->age = 22;
		$user1->address->province = '北京';
		$user1->address->city = '北京';
		$user1->address->phone = '15244445555';
		$user1->save();
		
	}
	
	public function actionUpdate(){
		$modifier = new EMongoModifier();
		$modifier->addModifier('name', 'set', '泾源');
		$modifier->addModifier('age', 'set', '22');
	//	$modifier->addModifier('province', 'set', '东北');
		
		$criteria = new EMongoCriteria();
		$criteria->addCond('-id', '==', '50ba4a1cd322506406000000');
		
 		User::model()->updateAll($modifier,$criteria);

	}
	
	public function actionDelete(){
		$user = new User();
		$model = $user->findByPk(new mongoID('50ba4a1dd322506406000001'));
		$model->delete();
		
	}
	
	public function cationFind(){
		$criteria = new EMongoCriteria();
		$criteria->addCond('name', '==', '洪警员');
		
		$user = new User();
		$model = $user->findAll($criteria);
		
	}
	
	
}

?>