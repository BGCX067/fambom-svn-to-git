<?php
class PeopleController extends AppController
{	
	var $name = 'People';
	
	var $uses = array('Person', 'Household');
	
	var $paginate = array(
		'limit' => 10, 
		'order' => array(
			'Person.first_name' => 'desc',
			'Person.last_name' => 'desc'));
	
	function index()
	{
		$this->set('people', $this->paginate('Person'));
	}
	
	function view($id=null)
	{		
		if (intval($id) > 0) {
			$this->Person->id = $id;
			$this->set('person', $this->Person->read());
		} else {
			list($first_name, $last_name) = split(' ', $id);
			$people = $this->Person->findByFirstNameAndLastName($first_name, $last_name);
			$this->data = array_shift($people);
			$this->set('person', $this->data);
		}
		
		$father = new Person();
		$father->id = $this->data['Person']['father_id'];
		$this->set('father', $father->read());
		
		$mother = new Person();
		$mother->id = $this->data['Person']['mother_id'];
		$this->set('mother', $mother->read());
		
		$spouse = new Person();
		$spouse->id = $this->data['Person']['spouse_id'];
		$this->set('spouse', $spouse->read());
	}
	
	function add()
	{
		if (!empty($this->data)) {
			if ($this->Person->save($this->data)) {
				$this->flash('Person has been added.', '/people');
			}
		} else {
			$this->set('households', $this->Household->find('list'));
		}		
	}
	
	function delete($id)
	{
		$this->Person->del($id);
		$this->flash('Person has been deleted.', '/people');
	}
	
	function edit($id=null)
	{
		$this->Person->id = $id;
		
		if (empty($this->data)) { // Load data.
			$this->data = $this->Person->read();
			$this->set('person', $this->data);
			
			$father = new Person();
			$father->id = $this->data['Person']['father_id'];
			$this->set('father', $father->read());
			
			$mother = new Person();
			$mother->id = $this->data['Person']['mother_id'];
			$this->set('mother', $mother->read());
			
			$spouse = new Person();
			$spouse->id = $this->data['Person']['spouse_id'];
			$this->set('spouse', $spouse->read());
			
			// Household list.
			$this->set('households', $this->Household->find('list', array('order' => 'name DESC')));
		} else { // Save data.
			if ($this->Person->save($this->data)) {
				$this->flash('Person updated.', '/people');
			} else {
				$this->flash('Error saving personal information');
			}
		}
	}
	
	function autoComplete()
	{
		// jQuery request parameters.
		$q = $_REQUEST['q'];
		$limit = $_REQUEST['limit'];
		$timestamp = $_REQUEST['timestamp'];
		
		$people = $this->Person->findByNameFragment($q);
		
		foreach ($people as $person) {
			$this->output .= $person['Person']['first_name'] . ' ' . $person['Person']['last_name'] . "\n";
		}
		
		$this->autoRender = false;
	}
	
	function lookup($entityId, $name=null)
	{
		$this->layout = 'fragment';
		$this->set('entityId', $entityId);
		
		if ($name == null) {
			$this->render('/people/lookup_dialog');
		} else {
			$this->set('people', $this->Person->findByNameFragment($name));
			$this->render('/people/lookup_results');
		}
	}
}
?>