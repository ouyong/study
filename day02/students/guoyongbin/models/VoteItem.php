<?php

class VoteItem extends EMongoDocument{
	public $vote_id;
	public $title;
	
	public static function model($className = __CLASS__){
		return parent::model($className);
	}
	
	public function getCollectionName(){
		return 'voteItme';
		
	}
	
	public function rules(){
		return array(
				array('title','safe'),
		);
	}
	
	public function attributeLabels(){
		return array(
				'vote_id'=>'关联id',
				'title' => '投票项',
				);
		
	}
	
}

?>