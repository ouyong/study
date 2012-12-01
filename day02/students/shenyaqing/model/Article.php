<?php 
class Article extends EMongoDocument{
	public $title;
	public $content;
	public function getCollectionName(){
		return 'article';		
	}
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
}
?>