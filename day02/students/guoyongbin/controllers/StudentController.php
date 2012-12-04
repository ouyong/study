<?php

class StudentController extends CController{
	
	public function actionAdd(){
		$student = new Student();
		$student->name = '洪尼玛';
		$student->gender = '男';
		$student->age = 23;
		$student->class = '';
		
		$student->save();
		
		$student1 = new Student();
		$student1->name = '洪指导';
		$student1->gender = '女';
		$student1->age = 19;
		$student1->class = '';
		
		$student1->save();
		
		$student2 = new Student();
		$student2->name = '杨教授';
		$student2->gender = '男';
		$student2->age = 22;
		$student2->class = '';
		
		$student2->save();
		
	}
	
	public function actionGetStudent(){
		$criteria = new EMongoCriteria();
		
// 		$criteria->addCond('gender', '==', '男'); 
// 		$criteria->name = new MongoRegex('/王.*/');//查询姓王的全部男生
		
// 		$criteria->addCond('class', '==', '');//查询没有班级的学生
		
// 		$criteria->age('==',18)->limit(5)->offset(5);//查询年龄在18岁的所有学生，取出第5-10的条数据
		
		$criteria->sort('age' ,EMongoCriteria::SORT_DESC)->limit(1);////查询年龄最大的学生
		
		
		$student = new Student();
		$user = $student->findAll($criteria);
		CVarDumper::dump($user,2,true);
	}

}

?>