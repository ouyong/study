<?php

class ArticleController extends Controller {
	
	public function actionAdd() {
		$article = new Article();
		$article->title = 'php MongoDB ��ɾ�Ĳ�';
		$article->content = 'php MongoDB ��ɾ�Ĳ�  ����Ϊ300����';
		$article->sortnum = 1;
		
		$result = $article->save();
		if($result) {
			echo '��ӳɹ�';
		} else {
			echo '���ʧ��';
		}
	}
	
	public function actionAddAll() {
		
		for($i=1; $i<=19; $i++) {
			$article = new Article();
			$article->title = 'php MongoDB ��ɾ�Ĳ�'.'��'.$i.'ƪ';
			$article->content = 'php MongoDB ��ɾ�Ĳ�  ����Ϊ300'.$i.'����';
			$article->sortnum = $i;
			$result = $$article->save();
		}
		if($result) {
			echo '��ӳɹ�';
		} else {
			echo '���ʧ��';
		}
	}
	
	public function actionUpdate() {
		
		$mondifier = new EMongoModifier();
		$mondifier->addModifier("title", "set", "�޸ĺ�����±���");
		$mondifier->addModifier("content", "set", "�޸ĺ����������");
		$mondifier->addModifier("sortnum", "set", "100");
		$criterida = new EMongoCriteria();
		$criterida->addCond("_id", "==", "c4ca4238a0b923820dcc509a6f75849b");
		$result = Article::model()->updateAll($mondifier, $criterida);
		
		if($result['updatedExisting']) {
			echo '�޸ĳɹ�';
		} else {
			echo '�޸�ʧ��';
		}
		
	}
	
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
				echo '�޸ĳɹ�';
			} else {
				echo '�޸�ʧ��';
			}
		}
	
	}
	
	public function actionDelete() {
	
		$criteria = new EMongoCriteria();
		$criteria->addCond("_id", "==", "c4ca4238a0b923820dcc509a6f75849b");
	
		$result = Article::model()->deleteAll($criteria);
		if($result) {
			echo 'ɾ���ɹ�';
		} else {
			echo 'ɾ��ʧ��';
		}
	}
	
	public function actionFind() {
	
		$criteri = new EMongoCriteria();
		$criteri->addCond("sortnum", "==", "1");
	
		$result = Article::model()->find($criteri);
	
		if(isset($result)) {
			echo $result->title.'���������';
		} else {
		echo '��ѯʧ��';
		}
	}
	
	public function actionFindAll() {
	
		$articles = Article::model()->findAll();
		foreach ($articles as $article) {
			echo '���±��⣺'.$article->title.'<br/>';
		}
	
	}
	
	public function actionFindAllBySort() {
	
		$criteria = new EMongoCriteria();
		$criteria->sort('sortnum', EMongoCriteria::SORT_DESC);
// 		$criteria->sort('sortnum', EMongoCriteria::SORT_ASC);
		$articles = Article::model()->findAll($criteria);
		foreach ($articles as $article) {
			echo '���±��⣺'.$article->title.'<br/>';
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
				echo $count.'�û�����'.$article->title.'<br/>';
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