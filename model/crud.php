<?php
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

    protected function update($table, $para, $id)
    {
        foreach ($para as $key => $value) {
            $args[] = "$key = '$value'";
        }

        $sql = "UPDATE  $table SET " . implode(',', $args);

        $sql .= " WHERE id=$id ;";
        $this->connect()->prepare($sql);

        return 1;
    }

    protected function delete($table, $id)
    {
        $sql = "DELETE FROM $table";
        $sql .= " WHERE $id ";
        $this->connect()->prepare($sql);

        return 1;
    }

    protected function select($table, $rows, $where)
    {
        if ($where != null) {
            $sql = "SELECT $rows FROM $table WHERE $where";
        } else {
            $sql = "SELECT $rows FROM $table";
        }
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([]);
        $result = $stmt->fetch();
        return $result;
    }
}
