<?php

class VoteItem extends EMongoDocument{
	public $title;
	public $vote_id;
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getCollectionName(){
		return 'VoteItem';
	}
}

?>