<?php

class Student extends EMongoDocument{
	
	public $name;
	public $gender;
	public $age;
	public $classnum;
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getCollectionName() {
		return 'student';
	}
	
	public function rules() {
		return array(
				array('name,gender,age,classnum', 'safe'),
		);
	}
	
	public function attributeLabels() {
		return array(
				'name' => '姓名',
				'gender' => '性别',
				'age' => '年龄',
				'classnum' => '班级',
		);
	}


}

?>