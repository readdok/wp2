<?php
session_start();
header('Content-type: text/html; charset=UTF-8');
mb_internal_encoding('UTF-8');
$act = isset($_GET['act']) ? $_GET['act'] : 'list';

define('IS_ADMIN', isset($_SESSION['IS_ADMIN']));

switch ($act) {
    case 'list':
        $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
        $max_length = 100;
        require_once(__DIR__ . "/model/Entry.php");
        $Entry = new Entry(10);
        $pages = $Entry->getPagesCount();
        $records = $Entry->getEntries($page);

        foreach ($records as &$row) {
            $row['date'] = date('Y-m-d H:i:s', $row['date']);
            if (mb_strlen($row['content']) > $max_length) {
                $row['content'] = mb_substr(strip_tags($row['content']), 0, $max_length - 3) . '...';
            }
            $row['content'] = nl2br($row['content']);
            $row['header'] = htmlspecialchars($row['header']);
        }
        unset($row);

        require('templates/list.php');
        break;
    case 'view-entry':
        if (!isset($_GET['id'])) die("Missing id parameter");
        $id = intval($_GET['id']);

        require_once(__DIR__ . "/model/Entry.php");
        require_once(__DIR__ . "/model/Comment.php");
        $entry_model = new Entry();
        $comment_model = new Comment();

        $ENTRY = $entry_model->getEntry($id);
        if (!$ENTRY) die("No such entry");

        $ENTRY['date'] = date('Y-m-d H:i:s', $ENTRY['date']);
        $ENTRY['content'] = nl2br($ENTRY['content']);
        $ENTRY['header'] = htmlspecialchars($ENTRY['header']);

        $comments = $comment_model->getCommentsForEntry($id);
        foreach ($comments as &$row) {
            $row['date'] = date('Y-m-d H:i:s', $row['date']);
            $row['content'] = nl2br(htmlspecialchars($row['content']));
            $row['author'] = htmlspecialchars($row['author']);
        }
        unset($row);

        require('templates/entry.php');
        break;
    case 'do-new-entry':
        if (!IS_ADMIN) die("You must be admin to add entry");
        require_once(__DIR__ . "/model/Entry.php");
        $Entry = new Entry();
        if ($Entry->add($_POST['author'], $_POST['header'], $_POST['content'])) {
            header('Location: .');
        } else {
            die("Cannot insert entry");
        }
        break;
    case 'delete-entry':
        if (!IS_ADMIN) die("You must be admin to delete entry");
        require_once(__DIR__ . "/model/Entry.php");
        $Entry = new Entry();
        $Entry->remove($_GET['id']) or die("Cannot delete entry");
        header('Location: .');
        break;
    case 'delete-comment':
        if (!IS_ADMIN) die("You must be admin to delete entry");
        require_once(__DIR__ . "/model/Comment.php");
        $Comment = new Comment();
        $Comment->remove($_GET['id']) or die("Cannot delete comment");
        header('Location: ?act=view-entry&id=' . intval($_GET['entry_id']));
        break;
    case 'edit-entry':
        if (!IS_ADMIN) die("You must be admin to edit entry");
        $id = intval($_GET['id']);
        require_once(__DIR__ . "/model/Entry.php");
        $Entry = new Entry();
        $row = array_map('htmlspecialchars', $Entry->getEntry($id));
        require('templates/edit-entry.php');
        break;
    case 'apply-edit-entry':
        if (!IS_ADMIN) die("You must be admin to edit entry");
        require_once(__DIR__ . "/model/Entry.php");
        $Entry = new Entry();
        if ($Entry->update($_POST['id'], $_POST['author'], $_POST['header'], $_POST['content'])) {
            header('Location: .');
        } else {
            die("Cannot insert entry");
        }
        break;
    case 'do-new-comment':
        require_once(__DIR__ . "/model/Comment.php");
        $Comment = new Comment();
        if ($Comment->add($_POST['entry_id'], $_POST['author'], $_POST['content'])) {
            header('Location: ?act=view-entry&id=' . intval($_POST['entry_id']));
        } else {
            die("Cannot insert entry");
        }
        break;
    case 'login':
        require('templates/login.php');
        break;
    case 'logout':
        unset($_SESSION['IS_ADMIN']);
        header('Location: .');
        break;
    case 'do-login':
        if ($_POST['login'] == 'admin' && $_POST['password'] == '12345') {
            $_SESSION['IS_ADMIN'] = true;
            header('Location: .');
        } else {
            header('Location: ?act=login');
        }


        break;
    default:
        die("No such action");
}