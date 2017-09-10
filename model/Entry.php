<?php
require_once(__DIR__ . "/Database.php");

class Entry extends Database
{
    private $num_per_page = null;

    public function __construct($num_per_page = null)
    {
        $this->num_per_page = $num_per_page;
    }

    public function getCount()
    {
        return $this->getOne("SELECT COUNT(*) AS cnt FROM entry");
    }

    public function getPagesCount()
    {
        $count = $this->getCount();
        return ceil($count / $this->num_per_page);
    }

    public function getEntry($id)
    {
        return $this->getRow("SELECT * FROM entry WHERE id = ?", $id);
    }
	 public function getEntryCat($category_id)
    {
        return $this->getRow("SELECT * FROM entry WHERE category_id = ?", $category_id);
    }

    public function getEntries($page = 1)
    {
        $offset = intval(($page - 1) * $this->num_per_page);
        $limit = intval($this->num_per_page);
        return $this->getAll(
            "SELECT entry.*, COUNT(comment.id) AS comments
            FROM entry
            LEFT JOIN comment ON entry.id = comment.entry_id
            GROUP BY entry.id
            ORDER BY date DESC
            LIMIT $offset, $limit"
        );
    }

    public function add($author, $header, $content)
    {
        return $this->query(
            "INSERT INTO entry(author, date, header, content) VALUES(?, ?, ?, ?)",
            $author, time(), $header, $content
        );
    }

    public function remove($id)
    {
        if (!$this->query("DELETE FROM entry WHERE id = ?", $id)) return false;
        return $this->query("DELETE FROM comment WHERE entry_id = ?", $id);
    }

    public function update($id, $author, $header, $content)
    {
        return $this->query(
            "UPDATE entry SET author = ?, header = ?, content = ? WHERE id = ?",
            $author, $header, $content, $id
        );
    }
}
