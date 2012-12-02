<?php

class VoteController extends CController{
	public function actionIndex(){
		$model = new Vote();
		$model->title = '你喜欢玩网络游戏吗？';
		$model->save();
	}
	public function actionCreateOptions(){
		$model = new VoteItem();
		$model->vote_id = new MongoID('50b9ccdff36d462010000001');
		$model->title = '不喜欢';
		$model->save();
	}
	public function actionGetOptions(){
		$questions = Vote::model()->find();
		$items = $questions->getItems();
		CVarDumper::dump($items,2,true);
	}
}

?>