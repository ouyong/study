<?php

class Article extends EMongoDocument {
	
	/*属性
	 *   */
	public $title;
	public $content;
	public $sortnum;
	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	/*
	 * 加载数据库的某个表
	 * */
	public function getCollectionName() {
		return 'article'; //返回表名
	}
	
	
	/**
	 * 属性字段的验证
	 * */
	public function rules() {
		return array(
				array('title, content,sortnum', 'safe'), //表示title、content、sortnum这三个属性是受保护的
		
				);
	}
	
	
	/**
	 * 将属性字段翻译成中文
	 * */
	public function attributeLabels() {
		return array(
				'title' => '文章标题',
				'content' => '文章内容',
				'sortnum' => '排序号'
				);
	}
	
}
