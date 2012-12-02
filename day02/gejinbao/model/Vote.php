<?php
/**
 * มทฯฐาป
 * Enter description here ...
 * @author Administrator
 *
 */
class Vote extends EMongoDocument{
	
	public $title;
	
	public function getCollectionName(){
		return 'vote';
	}
	
	public static function model($className = __CLASS__){
		return parent::model($className);
	}
	
	public function getItems(){
		return VoteItem::model()->findAllByAttributes(array(
			'vote_id'=>new MongoID($this->primaryKey),
		)
		);
	}
	
}


?>