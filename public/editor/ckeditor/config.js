/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
config.height = 320;
config.width = '100%';   // CSS unit (percent).
config.language = 'tr';



   config.filebrowserBrowseUrl		 	= '../../../editor/kcfinder/browse.php?type=files';
   config.filebrowserImageBrowseUrl 	= '../../../editor/kcfinder/browse.php?type=images';
   config.filebrowserFlashBrowseUrl 	= '../../../editor/kcfinder/browse.php?type=flash';
   config.filebrowserUploadUrl 			= '../../../editor/kcfinder/upload.php?type=files';
   config.filebrowserImageUploadUrl 	= '../../../editor/kcfinder/upload.php?type=images';
   config.filebrowserFlashUploadUrl 	= '../../../editor/kcfinder/upload.php?type=flash';


   
   
	config.toolbarGroups = [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] }
	];

	config.removeButtons = 'NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Form,Checkbox,TextField,Textarea,Select,Button,ImageButton,HiddenField,Anchor,Flash,PageBreak,About,Save,Scayt,ShowBlocks,Undo,Redo';
   
/*config.filebrowserBrowseUrl = 'ckfinder/ckfinder.html';
config.filebrowserUploadUrl = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';*/



config.extraPlugins = 'autosave';
config.extraPlugins = 'notification';

   
};



 