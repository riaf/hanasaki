<?php
/**
 * Hanasaki.php
 *
 * @author Keisuke SATO <riaf@me.com>
 * @package hanasaki
 * @license New BSD License
 */

namespace hanasaki;

require_once 'HanasakiStatement.php';
require_once 'HanasakiExceptions.php';

/**
 * Hanasaki
 *
 * @author Keisuke SATO <riaf@me.com>
 */
class Hanasaki
{
    /** @var PDO $pdo */
    protected $pdo;

    /**
     * Hanasaki initialize
     *
     * @param PDO $pdo
     */
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * prepare
     *
     * @param string $sql
     * @return HanasakiStatement
     */
    public function prepare($sql)
    {
        return new HanasakiStatement($this->pdo->prepare($sql));
    }
}

