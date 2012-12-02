<?php

class Vote extends EMongoDocument{
	
	public $title;
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getCollectionName() {
		return "vote";
	}
	
	public function rules() {
		return array(
				array('title', 'safe'),
		);
	}
	
	
	//ralations 根据vote_id查询VoteItem表中的所有数据
	public function getItems(){
		return VoteItem::model()->findAllByAttributes(
				array(
// 					'vote_id'=>new MongoID($this->primaryKey),
					'vote_id'=>$this->getPrimaryKey()
		));
	}
	
	public function attributeLabels() {
		return array(
				'title' => '投票标题',
		);
	}


}

?>