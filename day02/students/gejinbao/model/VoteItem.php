<?php
/**
 * มทฯฐาป
 * Enter description here ...
 * @author Administrator
 *
 */
class VoteItem extends EMongoDocument{
	
	public $vote_id;
	public $title;
	
	public function getCollectionName(){
		return 'vote_items';
	}
	
	public static function model($className = __CLASS__){
		return parent::model($className);
	}
	
	
}





?>