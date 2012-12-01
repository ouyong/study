<?php

class Article extends EMongoDocument {
	
	public $title;
	public $content;
	public $sortnum;
	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public function getCollectionName() {
		return 'article';
	}
	
	public function rules() {
		return array(
				array('title, content,sortnum', 'safe'),
				);
	}
	
	public function attributeLabels() {
		return array(
				'title' => '���±���',
				'content' => '��������',
				'sortnum' => '�����'
				);
	}
	
}
