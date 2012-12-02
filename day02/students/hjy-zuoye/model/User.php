<?php

class User extends EMongoDocument{
	public $name;
	public $gender;
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getCollectionName(){
		return 'user';
	}
	
	public function embeddedDocuments(){
		return array(
			'address' => 'UserAddress',
		);
		
	}
	public function rules(){
	
		return array(
				array('name,gender','safe'),
		);
	}
	
	public function attributeLabels(){
		return array (
				'name' => '姓名',
				'gender' => '性别'
		);
	}
}

?>