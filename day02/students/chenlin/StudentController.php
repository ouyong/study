<?php
class StudentController extends CController{
	public function actionIndex(){
		$model = new Student();
		/**
		添加信息到student中
		 */
//		$model = new Student();
//	    $model ->name='花哨';
//		$model ->sex ='男';
//		$model ->year ='18';
//		$model->save();
		/**
		查出所有男生
		 */
//		$critria=new EMongoCriteria();
//		$critria->addCond('sex', '==', '男');		
//		$model=$model->findAll($critria);		
//		var_dump($model);
		/**
			查出所有姓名王开头的男生
		 */
//		$critria=new EMongoCriteria();
//		$critria->addCond('sex', '==', '男');
//		$critria->name = new MongoRegex('/王.*/');
//		$model = Student::model()->findAll($critria);
//		var_dump($model);
		/**
			查出所有男生，并且没有班级的
		 */
//		$critria=new EMongoCriteria();
//		$critria->addCond('sex', '==', '男');
//		$critria->class=null ;
//		$model = Student::model()->findAll($critria);
//		var_dump($model);
		/**
			查出年龄在18岁的所有学生中，取出5-10条
		 */
//		$criteria=new EMongoCriteria();	
//		$criteria->year('==', '18')->limit(5)->offset(4);		
//		$model = Student::model()->findAll($criteria);
//		var_dump($model);
		/**
			查出年龄在18岁的所有学生中，取出5-10条
		*/
		$array = array(
	    'sort'=>array('year' => EMongoCriteria::SORT_DESC),'limit'=>1,
		);		
			$criteria = new EMongoCriteria($array);	
			$clients = Student::model()->findAll($array);
			var_dump($clients);					
		}
}

?>