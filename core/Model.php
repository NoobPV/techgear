<?php

namespace app\core;

class Model
{
    private $pdo;
    private $table;
    private $primaryKey;

    public function __construct(\PDO $pdo, string $table, string $primaryKey)
    {
        $this->pdo = $pdo;
        $this->table = $table;
        $this->primaryKey = $primaryKey;
    }

    public function query($sql, $parameters = [])
    {
        $query = $this->pdo->prepare($sql);
        $query->execute($parameters);
        return $query;
    }

    private function processDates($fields)
    {
        foreach ($fields as $key => $value) {
            if ($value instanceof \DateTime) {
                $fields[$key] = $value->format("Y-m-d");
            }
        }
        return $fields;
    }

    public function total($field = null, $value = null, $where = null)
    {
        $query = "SELECT COUNT(*) FROM $this->table";
        $parameters = [];

        if (!empty($field)) {
            $query .= " WHERE $field = :value";
            $parameters = ["value" => $value];

            if (!empty($where)) {
                $query .= " AND $where";
            }
        }

        $query = $this->query($query, $parameters);
        $row = $query->fetch();
        return $row[0];
    }

    public function average($column, $field = null, $value = null, $where = null)
    {
        $query = "SELECT AVG($column) FROM $this->table";
        $parameters = [];

        if (!empty($field)) {
            $query .= " WHERE $field = :value";
            $parameters = ["value" => $value];

            if (!empty($where)) {
                $query .= " AND $where";
            }
        }

        $query = $this->query($query, $parameters);
        $row = $query->fetch();
        return $row[0];
    }

    public function groupBy($select, $where = null, $groupBy = null, $having = null, $orderBy = null, $limit = null)
    {
        // $sql =  "SELECT product_id, sum(quantity) FROM exports GROUP BY product_id having product_id > 1 order by sum(quantity) asc";
        $query =  "SELECT $select FROM $this->table";

        if ($where != null) {
            $query .= " WHERE $where";
        }

        if ($groupBy != null) {
            $query .= " GROUP BY $groupBy";
        }

        if ($having != null) {
            $query .= " HAVING $having";
        }

        if ($orderBy != null) {
            $query .= " ORDER BY $orderBy";
        }

        if ($limit != null) {
            $query .= " LIMIT $limit";
        }

        $result = $this->query($query);

        return $result->fetchAll(\PDO::FETCH_CLASS);
    }

    public function findAll($where = null, $orderBy = null, $limit = null, $offset = null)
    {
        $query = "SELECT * FROM $this->table";

        if ($where != null) {
            $query .= " WHERE $where";
        }

        if ($orderBy != null) {
            $query .= " ORDER BY $orderBy";
        }

        if ($limit != null) {
            $query .= " LIMIT $limit";
        }

        if ($offset != null) {
            $query .= " OFFSET $offset";
        }

        $result = $this->query($query);

        return $result->fetchAll(\PDO::FETCH_CLASS);
    }

    public function findById($value)
    {
        $query = "SELECT * FROM $this->table WHERE $this->primaryKey = :value";

        $parameters = [
            "value" => $value
        ];

        $query = $this->query($query, $parameters);

        return $query->fetchObject();
    }

    public function find($column, $value, $where = null, $orderBy = null, $limit = null, $offset = null)
    {
        $query = "SELECT * FROM $this->table WHERE $column = :value";

        $parameters = [
            "value" => $value
        ];

        if ($where != null) {
            $query .= " AND $where";
        }

        if ($orderBy != null) {
            $query .= " ORDER BY $orderBy";
        }

        if ($limit != null) {
            $query .= " LIMIT $limit";
        }

        if ($offset != null) {
            $query .= " OFFSET $offset";
        }

        $query = $this->query($query, $parameters);

        return $query->fetchAll(\PDO::FETCH_CLASS);
    }

    private function insert($fields)
    {
        $query = "INSERT INTO $this->table (";

        foreach ($fields as $key => $value) {
            $query .= "$key,";
        }

        $query = rtrim($query, ",");

        $query .= ") VALUES (";

        foreach ($fields as $key => $value) {
            $query .= ":$key,";
        }

        $query = rtrim($query, ",");

        $query .= ")";

        $fields = $this->processDates($fields);

        $this->query($query, $fields);

        return $this->pdo->lastInsertId();
    }

    private function update($fields)
    {
        $query = " UPDATE $this->table SET ";

        foreach ($fields as $key => $value) {
            $query .= "$key = :$key,";
        }

        $query = rtrim($query, ",");

        $query .= " WHERE $this->primaryKey = :primaryKey";

        $fields["primaryKey"] = $fields[$this->primaryKey];

        $fields = $this->processDates($fields);

        $this->query($query, $fields);
    }

    public function save($record)
    {
        try {
            if ($record[$this->primaryKey] == "") {
                $record[$this->primaryKey] = null;
            }
            $insertId = $this->insert($record);
            return $insertId;
        } catch (\PDOException $e) {
            $this->update($record);
        }
    }

    public function delete($id)
    {
        $parameters = [":id" => $id];

        $this->query("DELETE FROM $this->table WHERE $this->primaryKey = :id", $parameters);
    }

    public function deleteWhere($column, $value)
    {
        $query = "DELETE FROM $this->table WHERE $column = :value";

        $parameters = [
            "value" => $value
        ];

        $query = $this->query($query, $parameters);
    }
}
