<?php
class PhotosController extends AppController
{	
	var $name = 'Photos';
	
	var $helpers = array('Html', 'Form', 'Javascript');
	
	var $components = array('ImageRenderer');
	
	var $paginate = array(
		'limit' => 100, 
		'order' => array(
			'Photo.upload_date' => 'desc'));
	
	function index()
	{
		$this->set('photos', $this->paginate('Photo'));
	}
	
	function view($id=null)
	{
		$this->Photo->id = $id;
		$this->set('photo', $this->Photo->read());
	}
	
	function upload()
	{
		$this->layout = 'ajax';
		
		if (!empty($this->data['Photo'])) {
			if (!$this->data['Photo']['image_file']) {
				$this->set('error', 'You must select an image file before you can upload.');
			} else {
				$tmpName = $this->data['Photo']['image_file']['tmp_name'];
				
				$thumbnailPath = $this->ImageRenderer->render($tmpName, 100, 100);
				$thumbnailUrl = $this->ImageRenderer->pathToUrl($thumbnailPath);
				
				$originalPath = $this->ImageRenderer->render($tmpName);
				$originalUrl = $this->ImageRenderer->pathToUrl($originalPath);
				
				$this->data['Photo']['upload_date'] = date("Y:m:d H:i:s", time());
				$this->data['Photo']['thumbnail_url'] = $thumbnailUrl;
				$this->data['Photo']['original_url'] = $originalUrl;
				
				$this->data = $this->Photo->save($this->data);
				$this->set('data', $this->data);
			}
		}
	}
	
	function delete($id)
	{
		$this->Photo->del($id);
		$this->flash('Photo has been deleted.', '/photos');
	}
}
?>