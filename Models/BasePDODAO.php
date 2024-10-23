<?php

namespace Models;

use Config\Config;
use PDO;
use PDOStatement;

abstract class BasePDODAO
{
    /**
     * @var PDO|null The PDO instance for database connection.
     */
    private ?PDO $db;

    /**
     * Executes a SQL query with optional parameters.
     *
     * @param string $sql The SQL query to execute.
     * @param array $params The parameters to bind to the SQL query.
     * @return PDOStatement|false The resulting PDOStatement object, or false on failure.
     */
    protected function execRequest(string $sql, array $params = []): PDOStatement|false
    {
        $stmt = $this->getDb()->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    /**
     * Retrieves the PDO instance, creating it if it does not exist.
     *
     * @return PDO The PDO instance for database connection.
     */
    private function getDb(): PDO
    {
        if ($this->db == null) {
            $dsn = Config::get("dsn");
            $user = Config::get("user");
            $dbname = Config::get("pass");
            $this->db = new PDO($dsn, $user, $dbname);
        }
        return $this->db;
    }
}