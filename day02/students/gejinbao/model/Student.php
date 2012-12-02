<?php

class Student extends EMongoDocument {

	public $name;
	public $age;
	public $gender;//0代表女生，1代表男生
	public $classId;
	
	public function getCollectionName() {
		return 'student';
	}
	
	public static  function model($className = __CLASS__){
		return parent::model($className);
	} 

	public function rules(){
		return array(
			array('name , age , gender , classId','safe'),
		);
	}
}

?>