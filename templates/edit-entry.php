<?php require('header.php') ?>

<h1>Edit entry</h1>

<form action="?act=apply-edit-entry" method="POST" class="well">
    <input type="hidden" name="id" value="<?=$id?>" />
    <label>Author</label>
    <input name="author" type="text" value="<?=$row['author']?>" />
    <label>Header</label>
    <input name="header" type="text" value="<?=$row['header']?>" />
    <label>Content</label>
    <textarea cols="80" name="content" id="mess" cols="48" rows="10"><?=$row['content']?></textarea>

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
            Post
        </button>
    </div>
</form>

<?php require('footer.php') ?>