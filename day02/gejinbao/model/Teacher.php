<?php
class Teacher extends EMongoDocument{
	
	public $name;
	public $address;
	
	public function getCollectionName(){
		return 'teacher';
	}
	
	public static function model($calssName = __CLASS__){
		return parent::model($calssName);
	}
	
	public function  embededDocument(){
		return array(
			'address'=>'TeacherAdd',
		);
	}
}