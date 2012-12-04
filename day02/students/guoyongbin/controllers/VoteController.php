<?php

class VoteController extends CController{
	
	public function actionAdd(){
		$vote = new Vote();
		$vote->title = '这个你怎么看';
		$vote->save();
	}
	
	public function actionItemAdd(){
		$item = new VoteItem();
	  //$item->vote_id = $voteId;
		$item->vote_id = '50ba3b53d322509014000013';
		$item->title = '不怎么看';
		$item->save();
	}
	
	public function actionGetItem(){
		$vote = Vote::model()->findByPk(new MongoID('50ba3980d32250901400000f'));
		//CVarDumper::dump($vote,2,true);die;
		$item = $vote->gotItems();
		CVarDumper::dump($item,1,true);
	}

}

?>