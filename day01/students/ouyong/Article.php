<?php

class Article extends EMongoDocument {
	
	/*����
	 *   */
	public $title;
	public $content;
	public $sortnum;
	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	/*
	 * �������ݿ��ĳ����
	 * */
	public function getCollectionName() {
		return 'article'; //���ر���
	}
	
	
	/**
	 * �����ֶε���֤
	 * */
	public function rules() {
		return array(
				array('title, content,sortnum', 'safe'), //��ʾtitle��content��sortnum�������������ܱ�����
		
				);
	}
	
	
	/**
	 * �������ֶη��������
	 * */
	public function attributeLabels() {
		return array(
				'title' => '���±���',
				'content' => '��������',
				'sortnum' => '�����'
				);
	}
	
}
