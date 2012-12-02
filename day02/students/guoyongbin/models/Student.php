<?php
class Student extends EMongoDocument{
	public $name;
	public $gender;
	public $age;
	public $class;
	
	public static function model($className = __CLASS__){
		parent::model($className);
	}
	
	public function getCollectionName(){
		return 'student';
	}
	
	public function rules(){
		return array(
				array('name,gender,age,class','safe'),
		);
	}
	
	public function attributeNames(){
		return array(
				'name'=>'姓名',
				'gender'=>'性别',
				'age'=>'年龄',
				'class'=>'班级',
		);
	}
}

?>