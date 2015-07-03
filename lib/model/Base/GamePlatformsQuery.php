<?php

namespace Base;

use \GamePlatforms as ChildGamePlatforms;
use \GamePlatformsQuery as ChildGamePlatformsQuery;
use \Exception;
use \PDO;
use Map\GamePlatformsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'game_platforms' table.
 *
 * 
 *
 * @method     ChildGamePlatformsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildGamePlatformsQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildGamePlatformsQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildGamePlatformsQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildGamePlatformsQuery orderByGbId($order = Criteria::ASC) Order by the gb_id column
 *
 * @method     ChildGamePlatformsQuery groupById() Group by the id column
 * @method     ChildGamePlatformsQuery groupByName() Group by the name column
 * @method     ChildGamePlatformsQuery groupByTitle() Group by the title column
 * @method     ChildGamePlatformsQuery groupByDescription() Group by the description column
 * @method     ChildGamePlatformsQuery groupByGbId() Group by the gb_id column
 *
 * @method     ChildGamePlatformsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildGamePlatformsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildGamePlatformsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildGamePlatformsQuery leftJoinRatingHeaders($relationAlias = null) Adds a LEFT JOIN clause to the query using the RatingHeaders relation
 * @method     ChildGamePlatformsQuery rightJoinRatingHeaders($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RatingHeaders relation
 * @method     ChildGamePlatformsQuery innerJoinRatingHeaders($relationAlias = null) Adds a INNER JOIN clause to the query using the RatingHeaders relation
 *
 * @method     \RatingHeadersQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildGamePlatforms findOne(ConnectionInterface $con = null) Return the first ChildGamePlatforms matching the query
 * @method     ChildGamePlatforms findOneOrCreate(ConnectionInterface $con = null) Return the first ChildGamePlatforms matching the query, or a new ChildGamePlatforms object populated from the query conditions when no match is found
 *
 * @method     ChildGamePlatforms findOneById(string $id) Return the first ChildGamePlatforms filtered by the id column
 * @method     ChildGamePlatforms findOneByName(string $name) Return the first ChildGamePlatforms filtered by the name column
 * @method     ChildGamePlatforms findOneByTitle(string $title) Return the first ChildGamePlatforms filtered by the title column
 * @method     ChildGamePlatforms findOneByDescription(string $description) Return the first ChildGamePlatforms filtered by the description column
 * @method     ChildGamePlatforms findOneByGbId(string $gb_id) Return the first ChildGamePlatforms filtered by the gb_id column *

 * @method     ChildGamePlatforms requirePk($key, ConnectionInterface $con = null) Return the ChildGamePlatforms by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGamePlatforms requireOne(ConnectionInterface $con = null) Return the first ChildGamePlatforms matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildGamePlatforms requireOneById(string $id) Return the first ChildGamePlatforms filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGamePlatforms requireOneByName(string $name) Return the first ChildGamePlatforms filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGamePlatforms requireOneByTitle(string $title) Return the first ChildGamePlatforms filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGamePlatforms requireOneByDescription(string $description) Return the first ChildGamePlatforms filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGamePlatforms requireOneByGbId(string $gb_id) Return the first ChildGamePlatforms filtered by the gb_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildGamePlatforms[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildGamePlatforms objects based on current ModelCriteria
 * @method     ChildGamePlatforms[]|ObjectCollection findById(string $id) Return ChildGamePlatforms objects filtered by the id column
 * @method     ChildGamePlatforms[]|ObjectCollection findByName(string $name) Return ChildGamePlatforms objects filtered by the name column
 * @method     ChildGamePlatforms[]|ObjectCollection findByTitle(string $title) Return ChildGamePlatforms objects filtered by the title column
 * @method     ChildGamePlatforms[]|ObjectCollection findByDescription(string $description) Return ChildGamePlatforms objects filtered by the description column
 * @method     ChildGamePlatforms[]|ObjectCollection findByGbId(string $gb_id) Return ChildGamePlatforms objects filtered by the gb_id column
 * @method     ChildGamePlatforms[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class GamePlatformsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\GamePlatformsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\GamePlatforms', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildGamePlatformsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildGamePlatformsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildGamePlatformsQuery) {
            return $criteria;
        }
        $query = new ChildGamePlatformsQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildGamePlatforms|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = GamePlatformsTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(GamePlatformsTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildGamePlatforms A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, name, title, description, gb_id FROM game_platforms WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);            
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildGamePlatforms $obj */
            $obj = new ChildGamePlatforms();
            $obj->hydrate($row);
            GamePlatformsTableMap::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildGamePlatforms|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildGamePlatformsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(GamePlatformsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildGamePlatformsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(GamePlatformsTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildGamePlatformsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(GamePlatformsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(GamePlatformsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GamePlatformsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGamePlatformsQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $name)) {
                $name = str_replace('*', '%', $name);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(GamePlatformsTableMap::COL_NAME, $name, $comparison);
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
     * @return $this|ChildGamePlatformsQuery The current query, for fluid interface
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

        return $this->addUsingAlias(GamePlatformsTableMap::COL_TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%'); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGamePlatformsQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $description)) {
                $description = str_replace('*', '%', $description);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(GamePlatformsTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the gb_id column
     *
     * Example usage:
     * <code>
     * $query->filterByGbId(1234); // WHERE gb_id = 1234
     * $query->filterByGbId(array(12, 34)); // WHERE gb_id IN (12, 34)
     * $query->filterByGbId(array('min' => 12)); // WHERE gb_id > 12
     * </code>
     *
     * @param     mixed $gbId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGamePlatformsQuery The current query, for fluid interface
     */
    public function filterByGbId($gbId = null, $comparison = null)
    {
        if (is_array($gbId)) {
            $useMinMax = false;
            if (isset($gbId['min'])) {
                $this->addUsingAlias(GamePlatformsTableMap::COL_GB_ID, $gbId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($gbId['max'])) {
                $this->addUsingAlias(GamePlatformsTableMap::COL_GB_ID, $gbId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GamePlatformsTableMap::COL_GB_ID, $gbId, $comparison);
    }

    /**
     * Filter the query by a related \RatingHeaders object
     *
     * @param \RatingHeaders|ObjectCollection $ratingHeaders the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildGamePlatformsQuery The current query, for fluid interface
     */
    public function filterByRatingHeaders($ratingHeaders, $comparison = null)
    {
        if ($ratingHeaders instanceof \RatingHeaders) {
            return $this
                ->addUsingAlias(GamePlatformsTableMap::COL_ID, $ratingHeaders->getGamePlatformId(), $comparison);
        } elseif ($ratingHeaders instanceof ObjectCollection) {
            return $this
                ->useRatingHeadersQuery()
                ->filterByPrimaryKeys($ratingHeaders->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRatingHeaders() only accepts arguments of type \RatingHeaders or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RatingHeaders relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildGamePlatformsQuery The current query, for fluid interface
     */
    public function joinRatingHeaders($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RatingHeaders');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'RatingHeaders');
        }

        return $this;
    }

    /**
     * Use the RatingHeaders relation RatingHeaders object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \RatingHeadersQuery A secondary query class using the current class as primary query
     */
    public function useRatingHeadersQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRatingHeaders($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RatingHeaders', '\RatingHeadersQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildGamePlatforms $gamePlatforms Object to remove from the list of results
     *
     * @return $this|ChildGamePlatformsQuery The current query, for fluid interface
     */
    public function prune($gamePlatforms = null)
    {
        if ($gamePlatforms) {
            $this->addUsingAlias(GamePlatformsTableMap::COL_ID, $gamePlatforms->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the game_platforms table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(GamePlatformsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            GamePlatformsTableMap::clearInstancePool();
            GamePlatformsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(GamePlatformsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(GamePlatformsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            GamePlatformsTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            GamePlatformsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // GamePlatformsQuery