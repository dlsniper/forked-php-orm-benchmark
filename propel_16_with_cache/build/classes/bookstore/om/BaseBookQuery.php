<?php


/**
 * Base class that represents a query for the 'book' table.
 *
 * Book Table
 *
 * @method     BookQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     BookQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     BookQuery orderByISBN($order = Criteria::ASC) Order by the isbn column
 * @method     BookQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     BookQuery orderByAuthorId($order = Criteria::ASC) Order by the author_id column
 *
 * @method     BookQuery groupById() Group by the id column
 * @method     BookQuery groupByTitle() Group by the title column
 * @method     BookQuery groupByISBN() Group by the isbn column
 * @method     BookQuery groupByPrice() Group by the price column
 * @method     BookQuery groupByAuthorId() Group by the author_id column
 *
 * @method     BookQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     BookQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     BookQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     BookQuery leftJoinAuthor($relationAlias = null) Adds a LEFT JOIN clause to the query using the Author relation
 * @method     BookQuery rightJoinAuthor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Author relation
 * @method     BookQuery innerJoinAuthor($relationAlias = null) Adds a INNER JOIN clause to the query using the Author relation
 *
 * @method     Book findOne(PropelPDO $con = null) Return the first Book matching the query
 * @method     Book findOneOrCreate(PropelPDO $con = null) Return the first Book matching the query, or a new Book object populated from the query conditions when no match is found
 *
 * @method     Book findOneById(int $id) Return the first Book filtered by the id column
 * @method     Book findOneByTitle(string $title) Return the first Book filtered by the title column
 * @method     Book findOneByISBN(string $isbn) Return the first Book filtered by the isbn column
 * @method     Book findOneByPrice(double $price) Return the first Book filtered by the price column
 * @method     Book findOneByAuthorId(int $author_id) Return the first Book filtered by the author_id column
 *
 * @method     array findById(int $id) Return Book objects filtered by the id column
 * @method     array findByTitle(string $title) Return Book objects filtered by the title column
 * @method     array findByISBN(string $isbn) Return Book objects filtered by the isbn column
 * @method     array findByPrice(double $price) Return Book objects filtered by the price column
 * @method     array findByAuthorId(int $author_id) Return Book objects filtered by the author_id column
 *
 * @package    propel.generator.bookstore.om
 */
abstract class BaseBookQuery extends ModelCriteria
{
    
	// query_cache behavior
	protected $queryKey = '';
	protected static $cacheBackend;
				
    /**
     * Initializes internal state of BaseBookQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'bookstore', $modelName = 'Book', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BookQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return    BookQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BookQuery) {
            return $criteria;
        }
        $query = new BookQuery();
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
     * @return    Book|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ((null !== ($obj = BookPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
     * @return    BookQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        return $this->addUsingAlias(BookPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return    BookQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        return $this->addUsingAlias(BookPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return    BookQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }
        return $this->addUsingAlias(BookPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%'); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return    BookQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $title)) {
                $title = str_replace('*', '%', $title);
                $comparison = Criteria::LIKE;
            }
        }
        return $this->addUsingAlias(BookPeer::TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the isbn column
     *
     * Example usage:
     * <code>
     * $query->filterByISBN('fooValue');   // WHERE isbn = 'fooValue'
     * $query->filterByISBN('%fooValue%'); // WHERE isbn LIKE '%fooValue%'
     * </code>
     *
     * @param     string $iSBN The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return    BookQuery The current query, for fluid interface
     */
    public function filterByISBN($iSBN = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($iSBN)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $iSBN)) {
                $iSBN = str_replace('*', '%', $iSBN);
                $comparison = Criteria::LIKE;
            }
        }
        return $this->addUsingAlias(BookPeer::ISBN, $iSBN, $comparison);
    }

    /**
     * Filter the query on the price column
     *
     * Example usage:
     * <code>
     * $query->filterByPrice(1234); // WHERE price = 1234
     * $query->filterByPrice(array(12, 34)); // WHERE price IN (12, 34)
     * $query->filterByPrice(array('min' => 12)); // WHERE price > 12
     * </code>
     *
     * @param     mixed $price The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return    BookQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(BookPeer::PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(BookPeer::PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }
        return $this->addUsingAlias(BookPeer::PRICE, $price, $comparison);
    }

    /**
     * Filter the query on the author_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAuthorId(1234); // WHERE author_id = 1234
     * $query->filterByAuthorId(array(12, 34)); // WHERE author_id IN (12, 34)
     * $query->filterByAuthorId(array('min' => 12)); // WHERE author_id > 12
     * </code>
     *
     * @see       filterByAuthor()
     *
     * @param     mixed $authorId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return    BookQuery The current query, for fluid interface
     */
    public function filterByAuthorId($authorId = null, $comparison = null)
    {
        if (is_array($authorId)) {
            $useMinMax = false;
            if (isset($authorId['min'])) {
                $this->addUsingAlias(BookPeer::AUTHOR_ID, $authorId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($authorId['max'])) {
                $this->addUsingAlias(BookPeer::AUTHOR_ID, $authorId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }
        return $this->addUsingAlias(BookPeer::AUTHOR_ID, $authorId, $comparison);
    }

    /**
     * Filter the query by a related Author object
     *
     * @param     Author|PropelCollection $author The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return    BookQuery The current query, for fluid interface
     */
    public function filterByAuthor($author, $comparison = null)
    {
        if ($author instanceof Author) {
            return $this
                ->addUsingAlias(BookPeer::AUTHOR_ID, $author->getId(), $comparison);
        } elseif ($author instanceof PropelCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
            return $this
                ->addUsingAlias(BookPeer::AUTHOR_ID, $author->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByAuthor() only accepts arguments of type Author or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Author relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return    BookQuery The current query, for fluid interface
     */
    public function joinAuthor($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Author');

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
            $this->addJoinObject($join, 'Author');
        }

        return $this;
    }

    /**
     * Use the Author relation Author object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return    AuthorQuery A secondary query class using the current class as primary query
     */
    public function useAuthorQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinAuthor($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Author', 'AuthorQuery');
    }

    /**
     * Exclude object from result
     *
     * @param     Book $book Object to remove from the list of results
     *
     * @return    BookQuery The current query, for fluid interface
     */
    public function prune($book = null)
    {
        if ($book) {
            $this->addUsingAlias(BookPeer::ID, $book->getId(), Criteria::NOT_EQUAL);
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
		$dbMap = Propel::getDatabaseMap(BookPeer::DATABASE_NAME);
		$db = Propel::getDB(BookPeer::DATABASE_NAME);
	  if ($con === null) {
			$con = Propel::getConnection(BookPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		if (!$this->hasSelectClause() && !$this->getPrimaryCriteria()) {
			$this->addSelfSelectColumns();
		}
	
		$this->configureSelectColumns();
	
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
			$db->bindValues($stmt, $params, $dbMap);
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
			$db->bindValues($stmt, $params, $dbMap);
			$stmt->execute();
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	
		return $stmt;
	}

} // BaseBookQuery