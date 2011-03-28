<?php


/**
 * Base class that represents a query for the 'author' table.
 *
 * Author Table
 *
 * @method     AuthorQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     AuthorQuery orderByFirstName($order = Criteria::ASC) Order by the first_name column
 * @method     AuthorQuery orderByLastName($order = Criteria::ASC) Order by the last_name column
 * @method     AuthorQuery orderByEmail($order = Criteria::ASC) Order by the email column
 *
 * @method     AuthorQuery groupById() Group by the id column
 * @method     AuthorQuery groupByFirstName() Group by the first_name column
 * @method     AuthorQuery groupByLastName() Group by the last_name column
 * @method     AuthorQuery groupByEmail() Group by the email column
 *
 * @method     AuthorQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AuthorQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AuthorQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AuthorQuery leftJoinBook($relationAlias = null) Adds a LEFT JOIN clause to the query using the Book relation
 * @method     AuthorQuery rightJoinBook($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Book relation
 * @method     AuthorQuery innerJoinBook($relationAlias = null) Adds a INNER JOIN clause to the query using the Book relation
 *
 * @method     Author findOne(PropelPDO $con = null) Return the first Author matching the query
 * @method     Author findOneOrCreate(PropelPDO $con = null) Return the first Author matching the query, or a new Author object populated from the query conditions when no match is found
 *
 * @method     Author findOneById(int $id) Return the first Author filtered by the id column
 * @method     Author findOneByFirstName(string $first_name) Return the first Author filtered by the first_name column
 * @method     Author findOneByLastName(string $last_name) Return the first Author filtered by the last_name column
 * @method     Author findOneByEmail(string $email) Return the first Author filtered by the email column
 *
 * @method     array findById(int $id) Return Author objects filtered by the id column
 * @method     array findByFirstName(string $first_name) Return Author objects filtered by the first_name column
 * @method     array findByLastName(string $last_name) Return Author objects filtered by the last_name column
 * @method     array findByEmail(string $email) Return Author objects filtered by the email column
 *
 * @package    propel.generator.bookstore.om
 */
abstract class BaseAuthorQuery extends ModelCriteria
{

	// query_cache behavior
	protected $queryKey = '';
	protected static $cacheBackend;
				
	/**
	 * Initializes internal state of BaseAuthorQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'bookstore', $modelName = 'Author', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AuthorQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AuthorQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AuthorQuery) {
			return $criteria;
		}
		$query = new AuthorQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key
	 * Use instance pooling to avoid a database query if the object exists
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    Author|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = AuthorPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
			// the object is alredy in the instance pool
			return $obj;
		} else {
			// the object has not been requested yet, or the formatter is not an object formatter
			$criteria = $this->isKeepQuery() ? clone $this : $this;
			$stmt = $criteria
				->filterByPrimaryKey($key)
				->getSelectStatement($con);
			return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
		}
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(12, 56, 832), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{	
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		return $this
			->filterByPrimaryKeys($keys)
			->find($con);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    AuthorQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(AuthorPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AuthorQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(AuthorPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AuthorQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AuthorPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the first_name column
	 * 
	 * @param     string $firstName The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AuthorQuery The current query, for fluid interface
	 */
	public function filterByFirstName($firstName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($firstName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $firstName)) {
				$firstName = str_replace('*', '%', $firstName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AuthorPeer::FIRST_NAME, $firstName, $comparison);
	}

	/**
	 * Filter the query on the last_name column
	 * 
	 * @param     string $lastName The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AuthorQuery The current query, for fluid interface
	 */
	public function filterByLastName($lastName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($lastName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $lastName)) {
				$lastName = str_replace('*', '%', $lastName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AuthorPeer::LAST_NAME, $lastName, $comparison);
	}

	/**
	 * Filter the query on the email column
	 * 
	 * @param     string $email The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AuthorQuery The current query, for fluid interface
	 */
	public function filterByEmail($email = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($email)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $email)) {
				$email = str_replace('*', '%', $email);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AuthorPeer::EMAIL, $email, $comparison);
	}

	/**
	 * Filter the query by a related Book object
	 *
	 * @param     Book $book  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AuthorQuery The current query, for fluid interface
	 */
	public function filterByBook($book, $comparison = null)
	{
		return $this
			->addUsingAlias(AuthorPeer::ID, $book->getAuthorId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Book relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AuthorQuery The current query, for fluid interface
	 */
	public function joinBook($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Book');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Book');
		}
		
		return $this;
	}

	/**
	 * Use the Book relation Book object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    BookQuery A secondary query class using the current class as primary query
	 */
	public function useBookQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinBook($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Book', 'BookQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Author $author Object to remove from the list of results
	 *
	 * @return    AuthorQuery The current query, for fluid interface
	 */
	public function prune($author = null)
	{
		if ($author) {
			$this->addUsingAlias(AuthorPeer::ID, $author->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

	// query_cache behavior
	
	public function setQueryKey($key)
	{
		$this->queryKey = $key;
		return $this;
	}
	
	public function getQueryKey()
	{
		return $this->queryKey;
	}
	
	public function cacheContains($key)
	{
		return isset(self::$cacheBackend[$key]);
	}
	
	public function cacheFetch($key)
	{
		return isset(self::$cacheBackend[$key]) ? self::$cacheBackend[$key] : null;
	}
	
	public function cacheStore($key, $value, $lifetime = 3600)
	{
		self::$cacheBackend[$key] = $value;
	}
	
	protected function getSelectStatement($con = null)
	{
		$dbMap = Propel::getDatabaseMap(AuthorPeer::DATABASE_NAME);
		$db = Propel::getDB(AuthorPeer::DATABASE_NAME);
	  if ($con === null) {
			$con = Propel::getConnection(AuthorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		
		if (!$this->hasSelectClause()) {
			$this->addSelfSelectColumns();
		}
		
		$con->beginTransaction();
		try {
			$this->basePreSelect($con);
			$key = $this->getQueryKey();
			if ($key && $this->cacheContains($key)) {
				$params = $this->getParams();
				$sql = $this->cacheFetch($key);
			} else {
				$params = array();
				$sql = BasePeer::createSelectSql($this, $params);
				if ($key) {
					$this->cacheStore($key, $sql);
				}
			}
			$stmt = $con->prepare($sql);
			BasePeer::populateStmtValues($stmt, $params, $dbMap, $db);
			$stmt->execute();
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
		
		return $stmt;
	}
	
	protected function getCountStatement($con = null)
	{
		$dbMap = Propel::getDatabaseMap($this->getDbName());
		$db = Propel::getDB($this->getDbName());
	  if ($con === null) {
			$con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
		}
	
		$con->beginTransaction();
		try {
			$this->basePreSelect($con);
			$key = $this->getQueryKey();
			if ($key && $this->cacheContains($key)) {
				$params = $this->getParams();
				$sql = $this->cacheFetch($key);
			} else {
				if (!$this->hasSelectClause() && !$this->getPrimaryCriteria()) {
					$this->addSelfSelectColumns();
				}
				$params = array();
				$needsComplexCount = $this->getGroupByColumns() 
					|| $this->getOffset()
					|| $this->getLimit() 
					|| $this->getHaving() 
					|| in_array(Criteria::DISTINCT, $this->getSelectModifiers());
				if ($needsComplexCount) {
					if (BasePeer::needsSelectAliases($this)) {
						if ($this->getHaving()) {
							throw new PropelException('Propel cannot create a COUNT query when using HAVING and  duplicate column names in the SELECT part');
						}
						$db->turnSelectColumnsToAliases($this);
					}
					$selectSql = BasePeer::createSelectSql($this, $params);
					$sql = 'SELECT COUNT(*) FROM (' . $selectSql . ') propelmatch4cnt';
				} else {
					// Replace SELECT columns with COUNT(*)
					$this->clearSelectColumns()->addSelectColumn('COUNT(*)');
					$sql = BasePeer::createSelectSql($this, $params);
				}
				if ($key) {
					$this->cacheStore($key, $sql);
				}
			}
			$stmt = $con->prepare($sql);
			BasePeer::populateStmtValues($stmt, $params, $dbMap, $db);
			$stmt->execute();
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	
		return $stmt;
	}

} // BaseAuthorQuery
