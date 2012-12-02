<?php
class Student extends EMongoDocument{
	public $name;
	public $sex;
	public $age;
	public $class;
	
	public function getCollectionName(){
		return 'student';
	}
	
	public static function model($className=__CLASS__){
		return parent::model($className);
	}
}