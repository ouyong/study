<?php
class Votecontroller extends CController{
	
	public function actionSaveVote(){
		
		$vote = new Vote();
		$vote->title = '葛进宝';
		$vote->save();
		
		$voteItems  = new VoteItem();
		$voteItems->title = '好！';
		$voteItems->vote_id = $vote->_id;
		$voteItems->save();
		
		$voteItems1  = new VoteItem();
		$voteItems1->title = '不好！';
		$voteItems1->vote_id = $vote->_id;
		$voteItems1->save();
		
		
		$items = $vote->items;
		var_dump($items);
	}
	
	
	
	
}