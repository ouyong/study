<?php

class User extends EMongoDocument {
	
	public $username;
	public $password;
	
	/* @var UserAddress */
	public $address;
	
	public $myArray;
	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public function getCollectionName() {
		return "user";
	}
	
	/* 
//	embeddedDocuments：说明address字段对于UserAddress类
	public function embeddedDocuments()
	{
		return array(
				'address' => 'UserAddress',
		);
	}
	 */
	
	public function rules() {
		return array(
				array('username,password,address', 'safe'),
		);
	}
	
	public function attributeLabels() {
		return array(
				'username' => '用户名',
				'password' => '密码',
				'address' => '地址'
		);
	}

}

?>