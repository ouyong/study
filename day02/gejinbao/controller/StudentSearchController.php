<?php

class StudentSearchController extends Controller{
	
	/**
	 * 添加数据
	 * Enter description here ...
	 */
	public function actionAdd(){
		$model = new Student();
		$model->name = '葛进宝';
		$model->age = '18';
		$model->gender  = '男';
		$model->classId = '';
		$model->save();
	}
	
	public function actionSearch(){
		$model = new Student();
		$criteria = new EMongoCriteria();
		
		/**
		 * 查询所有男生
		 */
//		$criteria->addCond('gender','==','男');
//		$boys = $model->findAll($criteria);
//		var_dump($boys);

		/**
		 * 查询所有以王姓开头的男生
		 */
//		$criteria->addCond('gender','==','男');
//		$name = new MongoRegex("/王.*/");
//		$criteria->addCond('name','==',$name);
//		$boys = $model->findAll($criteria);
//		var_dump($boys);
		
		/**
		 * 查询所有的男生，并且没有班级
		 */
//		$criteria->addCond('gender','==','男');
//		$criteria->addCond('classId','==','');
//		$stus = $model->findAll($criteria);
//		var_dump($stus);
		
		
		/**
		 * 查询所有18的学生,取出第5-10条          //还没有完成
		 */
//		$criteria->addCond('age','==','18');
//		$criteria->limit(5);
//		$criteria->offset(2);
//		$stus = $model->findAll($criteria);
//		var_dump($stus);
		
		/**
		 * 查询年龄最大的学生
		 */
//		$criteria->sort('age', EMongoCriteria::SORT_DESC);
//		$maxAge = $model->findAll($criteria);
//		var_dump($maxAge[0]);
	}
	
	
	
	
}