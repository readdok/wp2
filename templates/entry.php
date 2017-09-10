<?php require('header.php') ?>

<style type="text/css">
    .comments {
        font-size: 0.8em;
        margin-bottom: 20px;
    }

    .comment-header {
        font-size: 0.8em;
    }

    .comment-content {
        padding-left: 10px;
        margin-bottom: 10px;
    }

    .date, .author {
        margin-right: 10px;
    }

    .content {
        padding-top: 5px;
        padding-left: 15px;
    }

    h2 {
        margin-bottom: 10px;
    }

</style>

<h2><?=$ENTRY['header']?></h2>
<div class="span2">
       <a href="?act=view-entry&id=<?=$row['id']?>">
 <img src="<?=$ENTRY['image']?>">
          
        </a>
      </div>
<p class="content"><?=$ENTRY['content']?></p>

<div class="comments">
    <span class="date"><?=$ENTRY['date']?></span>
    <span class="author"><?=$ENTRY['author']?></span>
	<span class="category"><?=$ENTRY['category_id']?></span>
</div>

<h2>Коментарии</h2>
<?php foreach ($comments as $row): ?>

<div class="comment">
    <div class="comment-header">
        <span class="date"><?=$row['date']?></span>
        <span class="author"><b><?=$row['author']?></b></span>
        <?php if (IS_ADMIN): ?>
        <a href="?act=delete-comment&entry_id=<?=$ENTRY['id']?>&id=<?=$row['id']?>"><i class="icon-trash"></i></a>
        <?php endif ?>
    </div>
    <p class="comment-content"><?=$row['content']?></p>
</div>

<?php endforeach ?>

<h2>Добавить коментарий</h2>

<form action="?act=do-new-comment" method="POST" class="well">
    <input type="hidden" name="entry_id" value="<?=$id?>">
    <label>Автор</label>
    <input name="author" type="text" />
    <label>Содержание</label>
    <textarea name="content"></textarea>
    <div style="padding-top: 10px;">
        <button type="submit" class="btn">
           Отправить
        </button>
    </div>
</form>

<?php require('footer.php') ?>