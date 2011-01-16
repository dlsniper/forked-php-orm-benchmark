<?php

require_once dirname(__FILE__) . '/../AbstractTestSuite.php';

class Propel15WithCacheTestSuite extends AbstractTestSuite
{
	function initialize()
	{
		set_include_path(
			realpath(dirname(__FILE__) . '/build/classes') . PATH_SEPARATOR .
			realpath(dirname(__FILE__) . '/../propel_15/vendor/propel/runtime/lib') . PATH_SEPARATOR .
			get_include_path()
		);

		require_once 'Propel.php';
		$conf = include realpath(dirname(__FILE__) . '/build/conf/bookstore-conf.php');
		$conf['log'] = null;
		Propel::setConfiguration($conf);
		Propel::initialize();
		Propel::disableInstancePooling();
		
		$this->con = Propel::getConnection('bookstore');
		$this->con->setAttribute(PropelPDO::PROPEL_ATTR_CACHE_PREPARES, true);
		$this->initTables();
	}
	
	function clearCache()
	{
		BookPeer::clearInstancePool();
		AuthorPeer::clearInstancePool();
	}
	
	function beginTransaction()
	{
		$this->con->beginTransaction();
	}
	
	function commit()
	{
		$this->con->commit();
	}
	
	function runAuthorInsertion($i)
	{
		$author = new Author();
		$author->setFirstName('John' . $i);
		$author->setLastName('Doe' . $i);
		$author->save($this->con);
		$this->authors[]= $author->getId();
	}

	function runBookInsertion($i)
	{
		$book = new Book();
		$book->setTitle('Hello' . $i);
		$book->setAuthorId($this->authors[array_rand($this->authors)]);
		$book->setISBN('1234');
		$book->setPrice($i);
		$book->save($this->con);
		$this->books[]= $book->getId();
	}
	
	function runPKSearch($i)
	{
		$author = AuthorQuery::create()
			->setQueryKey('a')
			->findPk($this->authors[array_rand($this->authors)], $this->con);
	}
	
	function runComplexQuery($i)
	{
		AuthorQuery::create()
			->setQueryKey(1)
			->where('Author.Id > ?', $this->authors[array_rand($this->authors)])
			->orWhere('(Author.FirstName || Author.LastName) = ?', 'John Doe')
			->count($this->con);
	}

	function runHydrate($i)
	{
		$books = BookQuery::create()
			->setQueryKey(2)
			->filterByPrice(array('min' => $i))
			->limit(5)
			->find($this->con);
		foreach ($books as $book) {
		}
	}
	
	function runJoinSearch($i)
	{
		$books = BookQuery::create()
			->setQueryKey(3)
			->filterByTitle('Hello' . $i)
			->leftJoinWith('Book.Author')
			->findOne($this->con);
	}
	
}