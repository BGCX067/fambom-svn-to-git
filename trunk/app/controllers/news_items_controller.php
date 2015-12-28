<?php
class NewsItemsController extends AppController
{	
	var $name = 'NewsItems';
	
	var $paginate = array(
		'limit' => 3, 
		'order' => array(
			'NewsItem.date' => 'desc'));
	
	function index()
	{
		$this->set('news_items', $this->paginate('NewsItem'));
	}
	
	function view($id=null)
	{
		$this->NewsItem->id = $id;
		$this->set('news_item', $this->NewsItem->read());
	}
	
	function add()
	{
		if (!empty($this->data)) {
			if ($this->NewsItem->save($this->data)) {
				$this->flash('News item has been added.', '/news_items/');
			}
		}	
	}
	
	function delete($id)
	{
		$this->NewsItem->del($id);
		$this->flash('News item has been deleted.', '/news_items/');
	}
	
	function edit($id=null)
	{
		$this->NewsItem->id = $id;
		if (empty($this->data)) { // Load data.
			$this->data = $this->NewsItem->read();
			$this->set('news_item', $this->data);
		} else { // Save data.
			if ($this->NewsItem->save($this->data)) {
				$this->flash('News item updated.', '/news_items/');
			}
		}
	}
}
?>