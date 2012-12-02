<?php

class User extends EMongoDocument{
	public $name;
	public $email;
	public $age;
	/**
	 * 
	 * @var UserAddress
	 */
	public $address;
	
	public static function model($className = __CLASS__){
		return parent::model($className);
	}
	
	public function getCollectionName(){
		return 'user';
	}
	
	public function embeddedDocuments()
	{
		return array(
				// property field name => class name to use for this embedded document
				'address' => 'UserAddress',
		);
	}
	
	
	public function rules(){
		return array(
				array('name,email,age','safe'),
				array('email', 'email'),
		);
	}
	
	public function attributeNames(){
		return array(
				'name'=>'姓名',
				'email'=>'邮箱',
				'age'=>'年龄',
		);
	}
}

?>