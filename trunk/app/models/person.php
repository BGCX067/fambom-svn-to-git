<?php
class Person extends AppModel
{
	var $name = 'Person';
	
	var $validate = array(
		'first_name' => array(
			'rule' => array('minLength', 1)
		),
		'last_name' => array(
			'rule' => array('minLength', 1)
		)
	);

	function findByNameFragment($nameFragment)
	{
		$sql = 	"select distinct * from people " . 
				"where lower(first_name) like lower('%$nameFragment%') " . 
				"or lower(last_name) like lower('%$nameFragment%');";
		$ret = $this->query($sql);
		
		$people = array();
		foreach ($ret as $rs) {
			$people[$rs['people']['id']] = array('Person' => $rs['people']);
		}
		
		return $people;
	}
	
	function findByFirstNameAndLastName($firstName, $lastName)
	{
		$sql = 	"select distinct * from people " . 
				"where lower(first_name) = lower('$firstName') " . 
				"and lower(last_name) = lower('$lastName');";
		$ret = $this->query($sql);
		
		$people = array();
		foreach ($ret as $rs) {
			$people[$rs['people']['id']] = array('Person' => $rs['people']);
		}
		
		return $people;
	}
}
?>