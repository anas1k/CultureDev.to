<?php

session_start();
include_once('../model/database.php');

class Crud extends Connection
{

    protected function insert($table, $para)
    {
        $table_columns = implode(',', array_keys($para));
        $table_value = implode("','", array_values($para));

        $sql = "INSERT INTO $table($table_columns) VALUES('$table_value');";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return 1;
    }

    protected function update($table, $para, $where)
    {
        foreach ($para as $key => $value) {
            $args[] = "$key = '$value'";
        }

        $sql = "UPDATE  $table SET " . implode(',', $args);

        $sql .= " WHERE $where ;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([]);

        return 1;
    }

    protected function delete($table, $where = null)
    {
        $sql = "DELETE FROM $table $where ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([]);

        return 1;
    }

    protected function select($table, $rows, $where)
    {
        if ($where != null) {
            $sql = "SELECT $rows FROM $table $where";
        } else {
            $sql = "SELECT $rows FROM $table";
        }
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([]);
        $result = $stmt->fetchAll();
        return $result;
    }
}
