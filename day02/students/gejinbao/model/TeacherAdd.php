<?php
class TeacherAdd extends EMongoEmbeddedDocument{
	public $homeAddress;
	
	public function rules(){
		return array(
			array('homeAddress','safe'),
		);
	}
	
}
	
?>