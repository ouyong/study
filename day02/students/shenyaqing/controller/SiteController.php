<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$criteria = new EMongoCriteria();
//		查询		
//		$criteria->addCond('title','==','沈亚晴1');
//		$re = Article::model()->find($criteria);
//		CVarDumper::dump($re,2,true);

//		添加		
		$model = new Article();
//		$model->title = '111';
//		$model->content = '222';
//		$model->save();
//		修改
//		$criteria->addCond('title', '==', '沈亚晴2');
//		$model = $model->find($criteria);
//		$model->title = '哇哈哈';
//		$model->save();
//		删除
		$criteria->addCond('title', '==', '沈亚晴2');
		$model = $model->find($criteria);
		$model->delete();
		$this->render('index');
	}
}