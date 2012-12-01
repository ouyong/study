<?php

class StudentController extends CController
{
	function actionIndex(){
		$model = new Student();
		$model->name = '王小草';
		$model->sex = '女';
		$model->age = '9';
		$model->grade = '二年级';
		$model->save();
	}
	function actionGetStudent(){
		$model = new Student();
		$criteria = new EMongoCriteria();
//		$criteria->sex('==','男');    //查出所有男生
//		$criteria->name = new MongoRegex('/^王.{2}$/');  //查出姓王并且名字有两个字的同学
		
//		$criteria->sex('==','男');
//		$criteria->grade('==','');   //查询没有班级的男生
		
//		$criteria->age('==','18');
//		$criteria->limit(10);
//		$criteria->offset(5);  //查询年龄在18的第5-10条数据

		
//		$criteria->sort('age',EMongoCriteria::SORT_DESC);
//		$criteria->limit(1);        //查询年龄最大的学生
		$manStatus = $model->findAll($criteria);
		CVarDumper::dump($manStatus,2,true);
	}
}

?>