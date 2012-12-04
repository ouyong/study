<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Yii::setPathOfAlias('actions', Yii::getPathOfAlias('application.controllers.actions'));

class Admin extends CI_Controller {
	
	public $modelClass = 'Student';
	
	public function createUrl($route, $params) {
		if(!isset($params['md5'])) {
			$params['md5'] = Yii::app()->config->load('ZS_WIDGET_MD5');
		}
		return parent::createUrl($route, $params);
	}
	
	public function beforeAction(CAction $action) {

		$this->load->helper('api');
		$result = check_admin_auth();
		
	}
	
	public function actions() {
		return array(
			// 随便对应名字
			'add' => array(
				'class' => 'actions.CModelSaveAction',
				'modelClass' => $this->modelClass,
			),
			'dele' => 'actions.CModelDeleteAction',
		);
	}
	
	/**
	 * 数据添加页面
	 */
	public function add()
	{
		//安全验证
		$this->load->helper('api');
		$result = check_admin_auth();
		if( $result['state'] != 1) {
			exit('auth error');
		}
		
		$data = array();
		$data['md5'] =  $this->input->get('md5');
		$data['return_url'] = urldecode( isset($_GET['return_url']) ? $_GET['return_url'] : '' );
		
		$this->load->view('class/add.html', $data);
	}
	
	
	/**
	 * 处理数据的添加
	 */
	public function addSave()
	{
		$data = array();
		$data['name'] = $this->input->get_post('name');
		$data['logo'] = $this->input->get_post('logo');
		$data['create_time'] = $this->input->get_post('create_time');
		$data['description'] = $this->input->get_post('description');
		$data['md5'] = $this->input->get_post('md5');
		$data['state'] = 0;
		$data['dateline'] = time();
		
		//load model写入数据
		$this->load->model('class_model');
		$return = $this->class_model->add( $data );
		
		//输出状态码,1=>添加碾，0=>添加失败
		echo (int)$return;
	}
	
	
	/**
	 * 数据列表
	 */
	public function lists()
	{
		//安全验证
		$this->load->helper('api');
		$result = check_admin_auth();
		if( $result['state'] != 1) {
			exit('auth error');
		}
		
		
		$md5 = $this->input->get_post('md5');
		
		//取数据
		$data = array();
		$this->load->model('class_model');
		$data['list'] = $this->class_model->get_limit($md5, 5);
		
		$data['md5'] = $md5;
		$data['return_url'] = $this->input->get_post('return_url');
		
		$this->load->view('class/lists.html', $data);
	}
	
	
	/**
	 * 删除一条数据
	 */
	public function dele()
	{
		$id = $this->input->get_post('id');
		$return_url = $this->input->get_post('return_url');
		
		if( $id ) {
			$this->load->model('class_model');
			$this->class_model->dele( $id );
		}
		
		if( !$return_url ) {
			header("Location:{$_SERVER['HTTP_REFERER']}");
		} else {
			header("Location:$return_url");
		}
	}
	
	
	/**
	 *  检查班级名重复--AJAX
	 *  @return 1=>重复, 0=>重复
	 */
	public function ajax_check_name_repeat()
	{
		
		if(Yii::app()->request->isAjaxRequest) {
			$model = new Student();
			$model->attributes = $_POST['Student'];
			echo CActiveForm::validate($model, array(
				'username',
			));
			Yii::app()->end();
		}
		
	}
	
	public function rules() {
		return array(
			array('username', 'unique', '{attribute}不能重复!'),
		);
	}
	
	
	/**
	 * 文件上传
	 */
	public function upload()
	{
		$data = array();

		if ( !empty($_FILES) )
		{
			$this->load->helper('upload');
		
			//fileToUpload为表单name,调用后返回http格式路径
			$path = upload( 'fileToUpload' );

			if( $path ) {
				$data['state'] = 1;
				$data['path'] = $path;
			} else {
				$data['state'] = -1;
			}
		} else {
			$data['state'] = -1;
		}
	
		echo json_encode( $data );
	}
	
	
	/**
	 * 编辑器文件上传
	 */
	public function editorUpload()
	{
		$data = array();
		
		if ( !empty($_FILES) )
		{
			$this->load->helper('upload');
		
			$path = upload( 'filedata' );
		
			if( $path ) {
				$data['err'] = '';
				$data['msg'] = $path;
			} else {
				$data['err'] = '-1';
			}
		} else {
			$data['err'] = '-1';
		}
		
		echo json_encode( $data );
	}
	
	
	/**
	 * memcache调用 
	 */
	public function memcache()
	{
		$this->load->memcache();
		
		$key = 'admin_memcache';
		$this->mc->set($key, time());
		echo $this->mc->get( $key );
	}
	
}

