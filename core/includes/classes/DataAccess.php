<?php
class DataAccess
{
	private $host = "localhost";
	private $user = "event";
	private $password = "hjz7Y#80";
	private $schema = "event";

	private $connection;

    public function __construct()
    {
        $this->connection = $this->BuildConnection($this->host, $this->user);
    }

	private function BuildConnection($host,$user)
	{
		return new PDO("mysql:host=" . $host . ";mysql:charset=utf8mb4;" . "dbname=" . $this->schema, $user, $this->password);
	}

    public function Fetch($sql, $params = null)
    {
        $con = $this->connection->prepare($sql);

        if ($params != null)
        {
            foreach($params as $key => $val)
            {
                $con->bindValue($key, $val, PDO::PARAM_STR);
            }
        }

        $con->execute($params);

        return $con->fetchAll(PDO::FETCH_OBJ);
    }

    public function DBOps($sql, $params)
    {
        return $this->Fetch($sql, $params);
    }

    public function lastInsertId($name = NULL) {

        return $this->connection->lastInsertId($name);

    }


}

