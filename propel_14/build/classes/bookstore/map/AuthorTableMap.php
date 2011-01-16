<?php


/**
 * This class defines the structure of the 'author' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    bookstore.map
 */
class AuthorTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'bookstore.map.AuthorTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('author');
		$this->setPhpName('Author');
		$this->setClassname('Author');
		$this->setPackage('bookstore');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('FIRST_NAME', 'FirstName', 'VARCHAR', true, 128, null);
		$this->addColumn('LAST_NAME', 'LastName', 'VARCHAR', true, 128, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', false, 128, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Book', 'Book', RelationMap::ONE_TO_MANY, array('id' => 'author_id', ), 'SET NULL', 'CASCADE');
	} // buildRelations()

} // AuthorTableMap
