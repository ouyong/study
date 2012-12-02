<?php

class StudentControllers extends CController{
	public function actionIndexs(){
		
		$model1 = new Student();
		$model1->name='张三';
		$model1->age='18';
		$model1->gender='男';
		$model1->classnum='1';
		
		$model1 = save();
		
		$model2 = new Student();
		$model2->name='李四';
		$model2->age='18';
		$model2->gender='男';
		$model2->classnum='1';
		
		$model2 = save();
		
		$model3 = new Student();
		$model3->name='王二';
		$model3->age='20';
		$model3->gender='男';
		$model3->classnum='1';
		
		$model3 = save();
		
		$model4 = new Student();
		$model4->name='王尼玛';
		$model4->age='18';
		$model4->gender='男';
		$model4->classnum='1';
		
		$model4 = save();
		
		$model7 = new Student();
		$model7->name='张雨';
		$model7->age='18';
		$model7->gender='女';
		$model7->classnum='1';
		
		$model7 = save();
		
		$model5 = new Student();
		$model5->name='赵倩';
		$model5->age='19';
		$model5->gender='女';
		$model5->classnum='2';
		
		$model5 = save();
		
		$model6 = new Student();
		$model6->name='李素';
		$model6->age='19';
		$model6->gender='男';
		$model6->classnum='3';
		
		$model6 = save();
		
		}
		
		public function actionFind(){
			$model = new EMongoCriteria();
// 			a).查询所有男生
// 			$model->addcond('genger','==','男');
// 			$criteria = Student::model()->findAll($model);

// 			b).查询所有姓名以"王"开头的男生 
// 			$model -> name = new MongoRegex('/王.*/');
// 			$criteria = Student::model()->findAll($model);

// 			c).查询所有男生并且没有班级的 
// 			$model->addcond('classnum','==','')->addcond('genger','==','男');
// 			$criteria = Student::model()->findAll($model); 

// 			d).查询年龄在18岁的所有学生，取出第5-10条数据 
// 			$model->addcond('age','==','18');
// 			$model->offset(5);
// 			$model->limit(5);
// 			$criteria = Student::model()->findAll($model);

// 			e).查询年龄最大的学生
// 			$model->sort('age' ,EMongoCriteria::SORT_DESC)->limit(1);
// 			$criteria = Student::model()->findAll($model);
		}
}

?>