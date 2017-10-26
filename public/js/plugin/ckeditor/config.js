/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    // config.uiColor = '#AADC6E';
    config.filebrowserBrowseUrl = 'public/js/plugin/ckfinder/ckfinder.html';
    // config.filebrowserImageBrowseUrl = 'public/js/plugin/ckfinder/ckfinder.html?type=Images';
    config.filebrowserImageBrowseUrl = 'public/post/images?type=Images';
    config.filebrowserFlashBrowseUrl = 'public/js/plugin/ckfinder/ckfinder.html?type=Flash';
    config.filebrowserUploadUrl = 'public/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.filebrowserImageUploadUrl = 'public/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
    config.filebrowserFlashUploadUrl = 'public/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';

};