<?php

class Student extends EMongoDocument{
	
	public $name;
	public $age;
	public $gender;
	public $classnum;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}	
	
	public function getCollectionName()
	{
		return 'student';
	}
	
	public function rules(){
	
		return array(
				array('name,age,gender,classnum','safe'),
		);
	}
	
	public function attributeLabels(){
		return array (
				'name' => '姓名',
				'age' => '年龄',
				'gender' => '性别',
				'classnum' => '所在班级'
		);
	}
}

?>