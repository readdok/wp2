<?php require('header.php') ?>

<style type="text/css">
    .comments {
        font-size: 0.8em;
        margin-bottom: 20px;
    }

    .date, .author {
        margin-right: 10px;
    }

    .content {
        padding-top: 5px;
        padding-left: 15px;
    }

    .entry {
        padding-left: 20px;
    }

    h1 {
        margin-bottom: 10px;
    }

    .pages {
        margin-bottom: 20px;
    }

    .content-textarea {
        height: 100px;
    }

</style>



<h1>Мои записи</h1>

<?php foreach ($records as $row): ?>

    <div class="entry">
	
<div class="row">
  <div class="span12">
    <div class="row">
      <div class="span8">
        <h3><strong>
		 <a href="?act=view-entry&id=<?=$row['id']?>"><?=$row['header']?></a>
            <?php if (IS_ADMIN): ?>
            <a href="?act=edit-entry&id=<?=$row['id']?>"><i class="icon-edit"></i></a>
            <a href="?act=delete-entry&id=<?=$row['id']?>"><i class="icon-trash"></i></a>
            <?php endif ?>
		</strong></h3>
      </div>
    </div>
    <div class="row">
      <div class="span2">
       <a href="?act=view-entry&id=<?=$row['id']?>">
 <img src="<?=$row['image']?>">
          
        </a>
      </div>
      <div class="span10">      
        <p class="content"><?=$row['content']?></p>
       
      </div>
    </div>
    <div class="row">
      <div class="span8">
        <p></p>
        <p>
         <span class="author"><?=$row['author']?></span>
          | <span class="date"><?=$row['date']?></span>
          |  <a href="?act=view-entry&id=<?=$row['id']?>"><?=$row['comments']?> comment(s)</a>
		  | <span class="category"><?=$row['category_id']?></span>
          <hr>
        
        </p>
      </div>
    </div>
</div>


 



<?php endforeach ?>

<div class="pages">
<strong>Страницы:</strong>
<?php for ($i = 1; $i <= $pages; $i++): ?>
    <?php if ($i == $page): ?><b><?=$i?></b>
    <?php else: ?><a href="?page=<?=$i?>"><?=$i?></a>
    <?php endif ?>

<?php endfor ?>


<?php if (IS_ADMIN): ?>
<h1>Добавить новую запись</h1>

<form action="?act=do-new-entry" method="POST" class="well">
    <label>Автор</label>
    <input name="author" type="text" />
    <label>Заголовок</label>
    <input name="header" type="text" />
    <label>Содержание</label>
	
	
    <textarea name="content" class="content-textarea"  cols="80"  id="mess" cols="48" rows="10" ></textarea>
	
	<script>
CKEDITOR.replace( 'mess', {
uiColor: '#dddddd',
toolbar: [

['Source','-','Save','NewPage','Preview','-','Templates'] ,
['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print'] ,
['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
['BidiLtr', 'BidiRtl'],
['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
['Link','Unlink','Anchor'],
['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
['Styles','Format','Font','FontSize'],
['TextColor','BGColor'],
['Maximize', 'ShowBlocks','-','About']
]
} );
</script>
    <div style="padding-top: 10px;">
        <button type="submit" class="btn">
           Отправить
        </button>
    </div>
</form>

<?php endif ?>

<?php require('footer.php') ?>