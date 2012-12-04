<?php

class Student extends EMongoDocument{
	//姓名
	public $name;
	//性别
	public $sex;
	//年龄
	public $year;
	//班级
	public $class;
	public static function model($className = __CLASS__){
		return parent::model($className);
	}
	
	public function getCollectionName() {
		return 'student';
	}


}

?>