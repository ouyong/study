<?php
class Vote extends EMongoDocument{
	public $title;
	
	public static function model($className = __CLASS__){
		return parent::model($className);
		
	}
	
	public function getCollectionName(){
		return 'vote';
		
	}
	
	public function gotItems(){
		return VoteItem::model()->findAllByAttributes(array(
				'vote_id'=>new MongoID($this->primaryKey),
				));
		
	}
	
	public function rules(){
		return array(
				array('title','safe'),
				);
	}
	
	public function attributeNames(){
		return array(
				'title'=>'标题',
				);
	}

}

?>