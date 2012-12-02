<?php

class VoteItem extends EMongoDocument {
	
	public $title;
	public $vote_id;
	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public function getCollectionName() {
		return "vote_item";
	}
	
	public function rules() {
		return array(
				array('title,vote_id', 'safe'),
		);
	}
	
	public function attributeLabels() {
		return array(
				'title' => '投票项标题',
				'vote_id' => '投票id'
		);
	}
		


}

?>