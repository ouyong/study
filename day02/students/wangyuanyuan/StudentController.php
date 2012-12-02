<?php
	class StudentController extends CController{
		
		public function actionCreate(){
			
			$student1 = new Student();
			$student1->name = "张三";
			$student1->age = 15;
			$student1->gender = "男";
			$student1->save();
			
			$student2 = new Student();
			$student2->name = "李四";
			$student2->age = 14;
			$student2->gender = "男";
			$student2->grade = "八年级二班";
			$student2->save();
			
			$student3 = new Student();
			$student3->name = "柳眉";
			$student3->age = 12;
			$student3->gender = "女";
			$student3->grade = "六年级三班";
			$student3->save();
			
			$student4 = new Student();
			$student4->name = "王楠";
			$student4->age = 11;
			$student4->gender = "女";
			$student4->grade = "六年级一班";
			$student4->save();
			
			$student5 = new Student();
			$student5->name = "王宁";
			$student5->age = 15;
			$student5->gender = "男";
			$student5->grade = "八年级五班";
			$student5->save();
			
			$student6 = new Student();
			$student6->name = "王思";
			$student6->age = 15;
			$student6->gender = "男";
			$student6->save();
			
			$student7 = new Student();
			$student7->name = "旺旺";
			$student7->age = 21;
			$student7->gender = "男";
			$student7->grade = "大三";
			$student7->save();
			
			$student8 = new Student();
			$student8->name = "many";
			$student8->age = 22;
			$student8->gender = "男";
			$student8->grade = "大四";
			$student8->save();
			
			$student9 = new Student();
			$student9->name = "jen";
			$student9->age = 18;
			$student9->gender = "女";
			$student9->grade = "大一";
			$student9->save();
			
			$student10 = new Student();
			$student10->name = "张米";
			$student10->age = 15;
			$student10->gender = "男";
			$student10->save();
			
			$student1 = new Student();
			$student1->name = "妞妞";
			$student1->age = 8;
			$student1->gender = "女";
			$student1->grade = "二年级";
			$student1->save();		
		}
		
		public function actionSelect(){
			//查询所有男生
			$student = Student::model()->findByAttributes(array('gender'=>'男'));
			var_dump($student);
			//查询所有姓王的男生
			$criteria = new EMongoCriteria;			
			$criteria->name = new MongoRegex('/王.*/');
			$criteria->gender = "男";
			$students = Student::model()->findAll($criteria);
			var_dump($students);
			//查询所有无班级的男生
			$criteria = new EMongoCriteria;
			$criteria->grade = null;
			$criteria->gender = "男";
			$noGrade = Student::model()->findAll($criteria);
			var_dump($noGrade);
			//查询年龄最大的男生
			$criteria = new EMongoCriteria;
			$criteria->addCond('gender','==','男');
			$criteria->sort(array("age"=>EMongoCriteria::SORT_DESC));
			$criteria->limit(1);
			$max = Student::model()->find($criteria);
			var_dump($max);
			//取所有18岁学生中的5-10条
			$criteria = new EMongoCriteria;
			$criteria->addCond('age','==','18');
			$criteria->limit(6)-offset(4);	
		}
	}