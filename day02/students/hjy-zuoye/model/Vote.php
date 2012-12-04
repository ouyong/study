<?php

class Vote extends EMongoDocument{
	public $title;
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getCollectionName(){
		return 'vote';
	}
	
	public function getItems(){
		return VoteItem::model()->findAllByAttributes(
				array(
						'vote_id'=>new MongoID($this->pirmarykey()),
						)
				);
	}
}


?>