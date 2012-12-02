<?php 
class User extends EMongoDocument
{
	public $username;
	public $sex;
	
	public function embeddedDocuments()
    {
        return array(
            'address' => 'UserAddress',
        );
    }
	public function getCollectionName()
	{
		return 'user';
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	
}
?>