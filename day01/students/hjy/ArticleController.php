<?php

class ArticleController extends CController{
	
	public function actionSave(){
		$save = new Article();
		$save->title='此处是标题';
		$save->content='此处是内容题';
		
		$save -> save();
		
		$save = new Article();
		$save->title='2';
		$save->content='第2个';
		
		$save -> save();
	}
	
	public function  actionDelete(){
		$delete = new EMongoCriteria();
		$delete->addCond('title', '==', '2');
		
		$model = Article::model()->find($delete);
		
		$model->delete();
		
	}
	
	public function actionFind(){
		$find = new EMongoCriteria();
		$find->addCond('title', '==', '2');
		
		$model = Article::model()->find($find);
		$model->find();
	}
	
	public function  actionUpdate(){
		
		$update = new EMongoModifier();
		$update->addModifier('title','set','改后的标题');
		$update->addModifier('content','set','改后的内容');
		
		$model = new EMongoCriteria();
		$model->addCond("_id","==","50ba4d3510ef87d007000000");
		
		$modifier = Article::model()->updateAll($update,$model);
	}

}

?>