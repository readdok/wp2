<?php

class DatabaseException extends Exception {}

class Database
{
    private static $dbh = null;

    private static function getDbh()
    {
        if (isset(self::$dbh)) return self::$dbh;

        $mysqli = new mysqli('127.0.0.1', 'root', '');
        if ($mysqli->connect_error) throw new DatabaseException("Could not connect to db");
        if (!$mysqli->select_db('blog')) throw new DatabaseException("Could not select db");
        if (!$mysqli->set_charset('utf8')) throw new DatabaseException("Could not select charset");

        self::$dbh = $mysqli;

        return $mysqli;
    }

    private function prepareQuery($args)
    {
        $query = array_shift($args);
        $query = str_replace(array("%", "?"), array("%%", "%s"), $query);
        $dbh = Database::getDbh();
        foreach ($args as &$v) {
            if (is_null($v)) {
                $v = 'NULL';
            } else if (is_scalar($v)) {
                $v = "'" . $dbh->real_escape_string($v) . "'";
            } else {
                $arr = array();
                foreach ($v as $p) {
                    $arr[] = "'" . $dbh->real_escape_string($p) . "'";
                }
                if (!count($arr)) $arr[] = 'NULL';
                $v = implode(", ", $arr);
            }
        }

        return call_user_func_array('sprintf', array_merge(array($query), $args));
    }

    protected function query($query)
    {
        $dbh = Database::getDbh();
        return $dbh->query($this->prepareQuery(func_get_args()));
    }

    protected function getOne($query)
    {
        $result = call_user_func_array(array($this, 'getAll'), func_get_args());
        if (!$result) return false;

        return current($result[0]);
    }

    protected function getRow($query)
    {
        $result = call_user_func_array(array($this, 'getAll'), func_get_args());
        if (!$result) return false;

        return $result[0];
    }

    protected function getAll($query)
    {
        $sel = call_user_func_array(array($this, 'query'), func_get_args());
        if (!$sel) return false;

        $result = array();
        while ($row = $sel->fetch_assoc()) {
            $result[] = $row;
        }
        return $result;
    }
}
