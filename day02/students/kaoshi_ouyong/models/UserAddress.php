<?php

/**
 * UserAddress 继承 EMongoEmbeddedDocument
 * 说明此类是一个嵌入式的字段数据
 */
class UserAddress extends EMongoEmbeddedDocument {

    public $street;
    public $city;
    public $zip;
	
    public function rules()
    {
    	return array(
    			array('apartment, house, street, city, zip', 'safe'),
    	);
    }
   
    
    public function attributeLabels() {
    	return array(
    			'street' => '街',
    			'city' => '城市',
    			'zip' => '邮编'
    	);
    }
}

?>