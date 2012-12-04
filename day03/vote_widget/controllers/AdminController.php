<?php

class AdminController extends Controller {
	
	public function actionLists() {
		
		$model = new Vote();
		
		if(isset($_GET['Vote'])) {
			$model->setAttributes($_GET['Vote']);
		}
		
		$dataProvider = $model->search();
		$models = $dataProvider->getData();
		
		$this->render('lists', array(
			'models' => $models,
			'model' => $model,
			'dataProvider' => $dataProvider,
		));
		
	}
	
	public function actionAudit($id) {
		
		$model = Vote::model()->findByPk($id);
		if(!$model) {
			throw new CHttpException(404, '亲没有了~');
		}
		// $model->status = 1;
		echo '审核通过';
		// $model->save();
		
	}
	
	public function actionDelete($id) {
		
		$model = Vote::model()->findByPk($id);
		if(!$model) {
			throw new CHttpException(404, '亲没有了~');
		}
		$model->delete();
		
	}
	
	public function actionUpdate($id) {
		$this->forward('add');
	}
	
	public function actionAdd($id = null) {
		
		// 1. 判断id == null
		//		true new model
		//		false find model
		// 
		// 2. 判断(is_post)
		//	true:
		// 		3. 赋值
		//		3.5 验证
		// 		4. 保存
		//			true: 成功页面
		// 			false: 输出错误
		//  false: 5.渲染
		// 5.渲染
		
		if($id == null) {
			$model = new Vote();
		} else {
			$model = Vote::model()->findByPk($id);
			if(!$model) {
				throw new CHttpException(404, '亲没有了~');
			}
		}
		
		if(isset($_POST['Vote'])) {
			$model->setAttributes($_POST['Vote']);
			if($model->save()) {
				$successUrl = $this->createUrl('success');
				$this->redirect($successUrl);
				// $this->redirect(array('success'));
			}
		}
		
		$this->render('add', array(
			'model' => $model,
		));
		
	}
	
	public function actionSuccess() {
		echo '保存成功';
	}

}

?>