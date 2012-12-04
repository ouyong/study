<?php

class ArticleController extends Controller {
	
	/*
	 * ����һ����ӵķ���add
	 * */
	public function actionAdd() {
		//ʵ����Article���model
		$article = new Article();
		//��Article���model�µ����Ը�ֵ
		$article->title = 'php MongoDB ��ɾ�Ĳ�';
		$article->content = 'php MongoDB ��ɾ�Ĳ�  ����Ϊ300����';
		$article->sortnum = 1;
		
		//����save���淽������
		$result = $article->save();
		//�ж��Ƿ񱣴�ɹ�������ɹ����'��ӳɹ�'���������'���ʧ��'
		if($result) {
			echo '��ӳɹ�';
		} else {
			echo '���ʧ��';
		}
	}
	
	//�������
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
	
	//����һ���޸ĵķ���Update
	public function actionUpdate() {
		//ʵ����EMongoModifier��
		$mondifier = new EMongoModifier();
		//����EMongoModifier���addModifier������Ҫ�޸ĵ����Ը��޸ĵ�ֵ
		$mondifier->addModifier("title", "set", "�޸ĺ�����±���");
		$mondifier->addModifier("content", "set", "�޸ĺ����������");
		$mondifier->addModifier("sortnum", "set", "100");
		
		//ʵ����EMongoCriteria��
		$criterida = new EMongoCriteria();
		//����EMongoCriteria���addCond������������
		$criterida->addCond("_id", "==", "c4ca4238a0b923820dcc509a6f75849b");
		//ʵ����Article����updateAll�����������úõ�$mondifier��$criterida�޸ķ������õ�����
		$result = Article::model()->updateAll($mondifier, $criterida);
		//$resultΪ�޸ĺ�ķ��ز�����updatedExisting����Ϊboolean���ͣ�trueΪ�޸ĳɹ���falseΪ�޸Ĳ��ɹ�
		if($result['updatedExisting']) {
			echo '�޸ĳɹ�';
		} else {
			echo '�޸�ʧ��';
		}
		
	}
	//�����޸�
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
	
	//����һ��ɾ����Delete����
	public function actionDelete() {
		
		//ʵ����EMongoCriteria��
		$criteria = new EMongoCriteria();
		//����EMongoCriteria���addCond������������
		$criteria->addCond("_id", "==", "c4ca4238a0b923820dcc509a6f75849b");
		//ʵ����Article����deleteAll�����������úõ�$criteridaɾ���������õ�����
		$result = Article::model()->deleteAll($criteria);
		//�ж��Ƿ�ɾ���ɹ����ɹ����'ɾ���ɹ�'���������'ɾ��ʧ��'
		if($result) {
			echo 'ɾ���ɹ�';
		} else {
			echo 'ɾ��ʧ��';
		}
	}
	
	����һ����ѯ�ķ���find
	public function actionFind() {
		//ʵ����EMongoCriteria��
		$criteri = new EMongoCriteria();
		//����EMongoCriteria���addCond������������
		$criteri->addCond("sortnum", "==", "1");
		//ʵ����Article����find�����������úõ�$criterida��ѯ�������õ�����
		$result = Article::model()->find($criteri);
		//�ж��Ƿ��ѯ�ɹ����ɹ����$result->title.'���������'���������'��ѯʧ��'
		if(isset($result)) {
			echo $result->title.'���������';
		} else {
		echo '��ѯʧ��';
		}
	}
	
	//����һ����ѯ�������ݵķ���FindAll
	public function actionFindAll() {
		//ʵ����Article����findAll��������ѯ������Article��ȫ������
		$articles = Article::model()->findAll();
		//ѭ��$articles���ÿ������
		foreach ($articles as $article) {
			echo '���±��⣺'.$article->title.'<br/>';
		}
	
	}
	
	//����һ�����򷽷�FindAllBySort
	public function actionFindAllBySort() {
		//ʵ����EMongoCriteria��
		$criteria = new EMongoCriteria();
		//����EMongoCriteria���sort����������������
		$criteria->sort('sortnum', EMongoCriteria::SORT_DESC);
// 		$criteria->sort('sortnum', EMongoCriteria::SORT_ASC);
		////ʵ����Article����findAll�����������봫�����úõ�$criterida��ѯ��������ѯ��Article��ȫ������
		$articles = Article::model()->findAll($criteria);
		//ѭ��$articles���ÿ������
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