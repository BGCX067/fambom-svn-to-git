<?php
class HouseholdsController extends AppController
{	
	var $name = 'Households';
	
	var $paginate = array(
		'limit' => 10, 
		'order' => array(
			'Household.name' => 'desc'));
	
	function index()
	{
		$this->set('households', $this->paginate('Household'));
	}
	
	function view($id=null)
	{
		$this->Household->id = $id;
		$this->set('household', $this->Household->read());
	}
	
	function add()
	{
		if (!empty($this->data)) {
			if ($this->Household->save($this->data)) {
				$this->flash('Household has been added.', '/households');
			}
		}	
	}
	
	function delete($id)
	{
		$this->Household->del($id);
		$this->flash('Household has been deleted.', '/households');
	}
	
	function edit($id=null)
	{
		$this->Household->id = $id;
		if (empty($this->data)) { // Load data.
			$this->data = $this->Household->read();
			$this->set('household', $this->data);
		} else { // Save data.
			if ($this->Household->save($this->data)) {
				$this->flash('Household updated.', '/households');
			}
		}
	}
}
?>