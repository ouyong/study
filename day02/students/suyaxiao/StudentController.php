<?php
class StudentController extends CController{
	public function actionIndex(){
// 		$student = new Student();
// 		$student->name = '小强';
// 		$student->sex = '男';
// 		$student->age = '18';
// 		$student->class = 'B班';
		
// 		$student->save();
		
// 		$criteria = new EMongoCriteria();
// 		$criteria->sex = '男';
// 		$student = Student::model()->findAll($criteria);
// 		var_dump($student);
		
// 		$criteria = new EMongoCriteria();
// 		$criteria->name = new MongoRegex('/[王].*/i');
// 		$student = Student::model()->findAll($criteria);
// 		var_dump($student);

// 		$criteria = new EMongoCriteria();
// 		$criteria->sex('==','男')->class('==','');
// 		$student = Student::model()->findAll($criteria);
// 		var_dump($student);

// 		$criteria = new EMongoCriteria();
// 		$criteria ->age('==','18')->limit(4,9);
// 		$student = Student::model()->findAll($criteria);
// 		var_dump($student);

		$criteria = new EMongoCriteria();
		$criteria ->sort('age',array('age' => EMongoCriteria::SORT_DESC))->limit(1);
		$student = Student::model()->findAll($criteria);
		var_dump($student);		
 		
	}
		

}