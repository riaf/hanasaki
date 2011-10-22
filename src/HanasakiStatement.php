<?php
/**
 * HanasakiStatement.php
 *
 * @author Keisuke SATO <riaf@me.com>
 * @package hanasaki
 * @license New BSD License
 */

namespace hanasaki;

/**
 * HanasakiStatement
 *
 * @author Keisuke SATO <riaf@me.com>
 */
class HanasakiStatement
{
    /** @var PDOStatement $statement */
    protected $statement;

    /** @var string $entity */
    protected $entity;

    /**
     * @param PDOStatement $statement
     */
    public function __construct(\PDOStatement $statement)
    {
        $this->statement = $statement;
    }

    /**
     * @param array $args
     * @return HanasakiStatement $this
     */
    public function execute(array $args = array())
    {
        $this->statement->execute($args);

        return $this;
    }

    /**
     * @param string $entity [null]
     * @return array $entities
     */
    public function fetchEntities($entity = null)
    {
        $entity = $entity ?: $this->entity;

        if (is_null($entity)) {
            $entity = 'stdClass';
        }

        return $this->statement->fetchAll(\PDO::FETCH_CLASS, $entity);
    }

    /**
     * @param string $entity [null]
     * @return $entity
     */
    public function fetchEntity($entity = null)
    {
        $entities = $this->fetchEntities($entity);

        if (count($entities) == 0) {
            return null;
        }

        return array_shift($entities);
    }

    /**
     * @param string $entity
     * return void
     */
    public function setEntity($entity)
    {
        $this->entity = $entity;
    }
}

