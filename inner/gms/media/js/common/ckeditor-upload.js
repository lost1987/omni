/**
 * Created by shameless on 15/2/10.
 */
$(function(){
    CKEDITOR.replace(  'content',
    {
        filebrowserBrowseUrl :  '/editor/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl :  '/editor/ckfinder/ckfinder.html?Type=Images',
        filebrowserFlashBrowseUrl :  '/editor/ckfinder/ckfinder.html?Type=Flash',
        filebrowserUploadUrl :  '/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl  :  '/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl  :  '/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    });
})
