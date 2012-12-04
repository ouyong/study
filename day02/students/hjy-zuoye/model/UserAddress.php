<?php

class UserAddress extends EMongoEmbeddedDocument{
	public $phone;
	public $city;
	
	public function rules(){
	
		return array(
				array('phone,city','safe'),
		);
	}
	
	public function attributeLabels(){
		return array (
				'phone' => '联系电话',
				'city' => '所在城市'
		);
	}
}

?>