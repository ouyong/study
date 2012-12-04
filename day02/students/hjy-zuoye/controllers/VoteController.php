<?php

class VoteController extends CController{
	
	public function actionIndex1(){
		$vote = new Vote();
		$vote->title='投票标题';
		$vote->save();
		
 		$VoteItemA = new VoteItem();
 		$VoteItemA->title='投票选项A';
 		$VoteItemA->vote_id = new MongoID("50bb078610ef876414000002");
 		$VoteItemA->save();
		
 		$VoteItemB = new VoteItem();
 		$VoteItemB->vote_id = new MongoID("50bb078610ef876414000002");
 		$VoteItemB->title='投票选项B';
 		$VoteItemB->save();
	}
	
	public function actionGetItem(){
		$vote = Vote::model()->find();
		$items = $vote->getItmes();
	}
	
}

?>