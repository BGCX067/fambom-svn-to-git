<?php
/* SVN FILE: $Id: articles_tag_fixture.php 7945 2008-12-19 02:16:01Z gwoo $ */
/**
 * Short description for file.
 *
 * Long description for file
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) Tests <https://trac.cakephp.org/wiki/Developement/TestSuite>
 * Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 *
 *  Licensed under The Open Group Test Suite License
 *  Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 * @link          https://trac.cakephp.org/wiki/Developement/TestSuite CakePHP(tm) Tests
 * @package       cake.tests
 * @subpackage    cake.tests.fixtures
 * @since         CakePHP(tm) v 1.2.0.4667
 * @version       $Revision: 7945 $
 * @modifiedby    $LastChangedBy: gwoo $
 * @lastmodified  $Date: 2008-12-18 21:16:01 -0500 (Thu, 18 Dec 2008) $
 * @license       http://www.opensource.org/licenses/opengroup.php The Open Group Test Suite License
 */
/**
 * Short description for class.
 *
 * @package       cake.tests
 * @subpackage    cake.tests.fixtures
 */
class ArticlesTagFixture extends CakeTestFixture {
/**
 * name property
 *
 * @var string 'ArticlesTag'
 * @access public
 */
	var $name = 'ArticlesTag';
/**
 * fields property
 *
 * @var array
 * @access public
 */
	var $fields = array(
		'article_id' => array('type' => 'integer', 'null' => false),
		'tag_id' => array('type' => 'integer', 'null' => false),
		'indexes' => array('UNIQUE_TAG' => array('column'=> array('article_id', 'tag_id'), 'unique'=>1))
	);
/**
 * records property
 *
 * @var array
 * @access public
 */
	var $records = array(
		array('article_id' => 1, 'tag_id' => 1),
		array('article_id' => 1, 'tag_id' => 2),
		array('article_id' => 2, 'tag_id' => 1),
		array('article_id' => 2, 'tag_id' => 3)
	);
}

?>
