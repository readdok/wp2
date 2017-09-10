<?php
require_once(__DIR__ . "/Database.php");

class Comment extends Database
{
    public function getCommentsForEntry($entry_id)
    {
        return $this->getAll(
            "SELECT * FROM comment WHERE entry_id = ? ORDER BY date",
            $entry_id
        );
    }

    public function remove($id)
    {
        return $this->query("DELETE FROM comment WHERE id = ?", $id);
    }

    public function add($entry_id, $author, $content)
    {
        return $this->query(
            "INSERT INTO comment(entry_id, author, date, content) VALUES(?, ?, ?, ?)",
            $entry_id, $author, time(), $content
        );
    }
}
