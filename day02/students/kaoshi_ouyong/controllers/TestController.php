<?php

class TestController extends Controller {

	/**
	 * EMongoGridFS 传递数据显示
	 */
	public function actionList() {
		
		$dataProvider = new EMongoDocumentDataProvider('Student',array(
					'pagination' => array(
							'pageSize' => 5,
							),
				));
		
		$this->render('list', 
				array(
					'dataProvider' => $dataProvider
					));
	}
	
	public function actionIndex7() {
		/* 
// 		1.1查询所有性别为男的学生
		$students = Student::model()->findAllByAttributes(array('gender'=>'男'));
// 		1.2查询所有性别为男的学生
		$criteria = new EMongoCriteria();
		$criteria->addCond('gender', '==', '男');
		$students = Student::model()->findAll($criteria);
		 */
// 		2查询所有姓名以"王"开头的男生 
// 		$criteria = new EMongoCriteria();
// 		$criteria->name = new MongoRegex('/王.*/i');
// 		$students = Student::model()->findAll($criteria);
// 		var_dump($students);
// 		3查询所有男生并且没有班级的
// 		$criteria = new EMongoCriteria();
// 		$criteria->addCond('classnum', '==', '');
// 		$students = Student::model()->findAll($criteria);
// 		var_dump($students);

// 		4查询年龄在18岁的所有学生，取出第5-10条数据 
// 		$criteria = new EMongoCriteria();
// 		$criteria->addCond('age', '==', '18');
// 		$criteria->offset(5);
// 		$criteria->limit(5);
// 		$students = Student::model()->findAll($criteria);
// 		var_dump($students);
// 		5查询年龄最大的学生
		$criteria = new EMongoCriteria();
		$criteria->sort('age', EMongoCriteria::SORT_DESC);
		$criteria->limit(1);
		$students = Student::model()->findAll($criteria);
		foreach ($students as $student) {
			var_dump($student);
		}
		
	}
	
	/**
	 * 添加学生数据 测试
	 */
	public function actionIndex6() {
		
		$student = new Student();
		$student->name = '李明明';
		$student->gender = '男';
		$student->age = "18";
		$student->classnum = '';
		$student->save();
		
		$student = new Student();
		$student->name = '王长老';
		$student->gender = '男';
		$student->age = "18";
		$student->classnum = '';
		$student->save();
		
		$student = new Student();
		$student->name = '武帝';
		$student->gender = '女';
		$student->age = "18";
		$student->classnum = '123';
		$student->save();
		
		$student = new Student();
		$student->name = '欧雯雯';
		$student->gender = '女';
		$student->age = "20";
		$student->classnum = '56';
		$student->save();
		
		$student = new Student();
		$student->name = '王程序';
		$student->gender = '男';
		$student->age = "18";
		$student->classnum = '';
		$student->save();
		
		$student = new Student();
		$student->name = '笑三少';
		$student->gender = '男';
		$student->age = "20";
		$student->classnum = '432';
		$student->save();
		
	}
	
	/**
	 * Vote 是投票主表 VoteItem 是投票项，关系为一对多
	 */
	public function actionIndex5() {
		
		//Relations HAS_ONE relation 
		$vote = Vote::model()->findByPk(new MongoID("50ba1d9dcd7459900f00000d"));
		//Vote model 里定义的根据vote_id级联voteItem的数据
		var_dump($vote->getItems());
		
	}
	
	/**
	 * Vote 投票主表
	 * VoteItem 投票项表
	 * 添加数据
	 */
	public function actionIndex4() {
		
		$vote = new Vote();
		$vote->title = "你觉得这个可以有吗？";
		$vote->save();
		
		$voteItem = new VoteItem();
		$voteItem->title = "可以";
		$vote = Vote::model()->
					findByAttributes(
					array(
							'title'=>'你觉得这个可以有吗？'
							));
		$voteItem->vote_id = $vote->getPrimaryKey();
		$voteItem->save();
		
		$voteItem2 = new VoteItem();
		$voteItem2->title = "不可以";
		$vote = Vote::model()->
					findByAttributes(
					array(
							'title'=>'你觉得这个可以有吗？'
							));
		$voteItem2->vote_id = $vote->getPrimaryKey();
		$voteItem2->save();
		
	}
	
	public function actionUserFind() {
		$user = User::model()->findByPk(new MongoID("50ba1b1ccd7459900f000000"));
		var_dump($user->address['city']);
	}
	
	public function actionUserDelete() {
		$user = User::model()->findByPk(new MongoID("50b9d4f7cd74599415000002"));
		$user->delete();
	}
	
	public function actionUserUpdate() {
		
		$user = User::model()->findByPk(new MongoID("50ba1b1ccd7459900f000000"));
		$user->address['city'] = "北京";
		$user->save();
		
	}
	
	/**
	 * 以数组添加User address字段下数据
	 */
	public function actionUserAdd3() {
		
		$address = array(
				'city' => '衡阳',
				'street' => '黄茶岭',
				'zip' => '421001'
				);
		
		$user = new User();
		$user->username = '欧勇';
		$user->password = '888888';
		$user->address = $address;
		$user->save();
		
	}
	
	/**
	 * 以数组添加User myArray字段下数据
	 */
	
	public function actionUserAdd2() {
	
		$myArray = array(
					'our','simple','example','array'
				);
		
		$user = new User();
		$user->myArray = $myArray;
		$user->save();
		
	}
	
	/**
	 * EMongoEmbeddedDocument 
	 * 保存User 下 address字段数据
	 */
	public function actionUserAdd() {
		
		$user = new User();
		$user->username = '张三丰';
		$user->password = '123456';
		$user->address->city = '北京';
		$user->address->street = '长安街';	
		$user->address->zip = '100042';
		
		$user->save();
		
	}
	
}

?>