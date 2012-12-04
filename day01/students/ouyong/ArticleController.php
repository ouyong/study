<?php

class ArticleController extends Controller {
	
	/*
	 * 定义一个添加的方法add
	 * */
	public function actionAdd() {
		//实例化Article这个model
		$article = new Article();
		//给Article这个model下的属性赋值
		$article->title = 'php MongoDB 增删改查';
		$article->content = 'php MongoDB 增删改查  内容为300个字';
		$article->sortnum = 1;
		
		//调用save保存方法保存
		$result = $article->save();
		//判断是否保存成功，如果成功输出'添加成功'，否则输出'添加失败'
		if($result) {
			echo '添加成功';
		} else {
			echo '添加失败';
		}
	}
	
	//批量添加
	public function actionAddAll() {
		
		for($i=1; $i<=19; $i++) {
			$article = new Article();
			$article->title = 'php MongoDB 增删改查'.'第'.$i.'篇';
			$article->content = 'php MongoDB 增删改查  内容为300'.$i.'个字';
			$article->sortnum = $i;
			$result = $$article->save();
		}
		if($result) {
			echo '添加成功';
		} else {
			echo '添加失败';
		}
	}
	
	//定义一个修改的方法Update
	public function actionUpdate() {
		//实例化EMongoModifier类
		$mondifier = new EMongoModifier();
		//调用EMongoModifier类的addModifier方法给要修改的属性赋修改的值
		$mondifier->addModifier("title", "set", "修改后的文章标题");
		$mondifier->addModifier("content", "set", "修改后的文章内容");
		$mondifier->addModifier("sortnum", "set", "100");
		
		//实例化EMongoCriteria类
		$criterida = new EMongoCriteria();
		//调用EMongoCriteria类的addCond方法设置条件
		$criterida->addCond("_id", "==", "c4ca4238a0b923820dcc509a6f75849b");
		//实例化Article调用updateAll方法传入设置好的$mondifier，$criterida修改符合设置的数据
		$result = Article::model()->updateAll($mondifier, $criterida);
		//$result为修改后的返回参数，updatedExisting参数为boolean类型，true为修改成功，false为修改不成功
		if($result['updatedExisting']) {
			echo '修改成功';
		} else {
			echo '修改失败';
		}
		
	}
	//批量修改
	public function actionUpdateAll() {
	
		$articles = Article::model()->findAll();
	
	
		$count = 1;
		foreach ($articles as $article) {
			$modifier = new EMongoModifier();
			$modifier->addModifier("sortnum", "set", $count);
			$count++;
			$criteria = new EMongoCriteria();
			$criteria->addCond("sortnum", "==", $article->phonenum);
			$result = Article::model()->updateAll($modifier, $criteria);
			if($result['updatedExisting']) {
				echo '修改成功';
			} else {
				echo '修改失败';
			}
		}
	
	}
	
	//定义一个删除的Delete方法
	public function actionDelete() {
		
		//实例化EMongoCriteria类
		$criteria = new EMongoCriteria();
		//调用EMongoCriteria类的addCond方法设置条件
		$criteria->addCond("_id", "==", "c4ca4238a0b923820dcc509a6f75849b");
		//实例化Article调用deleteAll方法传入设置好的$criterida删除符合设置的数据
		$result = Article::model()->deleteAll($criteria);
		//判断是否删除成功，成功输出'删除成功'，否则输出'删除失败'
		if($result) {
			echo '删除成功';
		} else {
			echo '删除失败';
		}
	}
	
	定义一个查询的方法find
	public function actionFind() {
		//实例化EMongoCriteria类
		$criteri = new EMongoCriteria();
		//调用EMongoCriteria类的addCond方法设置条件
		$criteri->addCond("sortnum", "==", "1");
		//实例化Article调用find方法传入设置好的$criterida查询符合设置的数据
		$result = Article::model()->find($criteri);
		//判断是否查询成功，成功输出$result->title.'被查出来了'，否则输出'查询失败'
		if(isset($result)) {
			echo $result->title.'被查出来了';
		} else {
		echo '查询失败';
		}
	}
	
	//定义一个查询多条数据的方法FindAll
	public function actionFindAll() {
		//实例化Article调用findAll方法传查询出数据Article的全部数据
		$articles = Article::model()->findAll();
		//循环$articles输出每条数据
		foreach ($articles as $article) {
			echo '文章标题：'.$article->title.'<br/>';
		}
	
	}
	
	//定义一个排序方法FindAllBySort
	public function actionFindAllBySort() {
		//实例化EMongoCriteria类
		$criteria = new EMongoCriteria();
		//调用EMongoCriteria类的sort方法设置排序条件
		$criteria->sort('sortnum', EMongoCriteria::SORT_DESC);
// 		$criteria->sort('sortnum', EMongoCriteria::SORT_ASC);
		////实例化Article调用findAll方法传，传入传入设置好的$criterida查询条件，查询出Article的全部数据
		$articles = Article::model()->findAll($criteria);
		//循环$articles输出每条数据
		foreach ($articles as $article) {
			echo '文章标题：'.$article->title.'<br/>';
		}
	
	}
	
	public function actionFindAllByPaging() {
	
		$totalCount = Article::model()->count();
		$offsetnum = 0;
		$limitnum = 10;
		$totalPage = $this->getTotalPage($totalCount, $limitnum);
	
		$count = 1;
		for($i=0; $i<$totalPage; $i++) {
			$criteria = new EMongoCriteria();
			$criteria->offset($limitnum*$i + $offsetnum);
			$criteria->limit($limitnum);
				
			$articles = Article::model()->findAll($criteria);
			foreach ($articles as $article) {
				echo $count.'用户名：'.$article->title.'<br/>';
			}
			$count++;
		}
	
	}
	
	public function getTotalPage($totalCount, $limitnum) {
		if($totalCount/$limitnum>0) {
			if($totalCount%$limitnum == 0) {
				return intval($totalCount/$limitnum);
			} else {
				return intval($totalCount/$limitnum) + 1;
			}
		} else {
			return 0;
		}
		return null;
	
	}
	
}