public ImageController extends CController {
	
	/**
	 * 显示图片
	 * @param string $id
	 */
	public function actionDisplay($id) {
		$pk = new MongoID($id);
		$image = Image::model()->findByPk($pk);
		if($image) {
			header('Content-type:'.$image->metadata['type']);
			echo $image->getBytes();
			die;
		} else {
			// output empty image
		}
	}

}