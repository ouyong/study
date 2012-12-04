<?php

class Article extends EMongoDocument {
	
	public $title;
	public $content;
	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public function getCollectionName() {

		return 'article';
		
		}

	public function rules(){
		
		return array(
				array('title,content','safe'),
				);
	}
	
	public function attributeLabels(){
		return array (
				'title' => '标题',
				'content' => '内容'
				);
	}


}

?>