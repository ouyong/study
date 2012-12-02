<?php

class UserAddress extends EMongoEmbeddedDocument{
	public $city;
	public $province;
	public $phone;
	
	public function rules(){
		return array(
				array('city, province, phone', 'required'),
		);
	}
	
	public function attributeNames(){
		return array(
				'city'=>'城市',
				'province' => '省',
				'phone' => '电话'，
				);
	}
	
}

?>