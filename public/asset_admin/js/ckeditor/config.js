/*
Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';

	// 기본 언어
	config.defaultLanguage = 'en';

	// 인터페이스 로드 언어
	config.language = 'en';

	// 엔터키 모드
	// CKEDITOR.ENTER_P (1): new <p> paragraphs are created;
	// CKEDITOR.ENTER_BR (2): lines are broken with <br> elements;
	// CKEDITOR.ENTER_DIV (3): new <div> blocks are created.	
	config.enterMode = CKEDITOR.ENTER_BR;

	// 쉬프트+엔터키 모드
	// CKEDITOR.ENTER_P (1): new <p> paragraphs are created;
	// CKEDITOR.ENTER_BR (2): lines are broken with <br> elements;
	// CKEDITOR.ENTER_DIV (3): new <div> blocks are created.	
	config.shiftEnterMode = CKEDITOR.ENTER_DIV;

	// 기본 글꼴
	config.font_defaultLabel = '굴림';

	// 글꼴 설정
	config.font_names = 
		'굴림;돋움;바탕;궁서;' +
		config.font_names;

	// 하위메뉴 지연 (0:제거)
	config.menu_subMenuDelay = 0;

	// 에디터 리사이즈
	config.resize_enabled = true;

	// 에디터 시작시 툴바 보임 설정
	config.toolbarStartupExpanded = true;

	// 색상 더보기...
	//config.colorButton_enableMore = false;

	// 에디터 시작시 포커스
	//config.startupFocus = true;

	// 에디터 시작시 모드 (source, wysiwyg)
	//config.startupMode = 'wysiwyg';
	///config.startupMode = 'source';

	/*
	// Defines a toolbar with only one strip containing the "Source" button, a
	// separator and the "Bold" and "Italic" buttons.
	config.toolbar_Basic =
	[
		[ 'Source', '-', 'Bold', 'Italic' ]
	];

	// This is actually the default value.
	config.toolbar_Full =
	[
		['Source','-','Save','NewPage','Preview','-','Templates'],
		['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
		['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
		['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
		'/',
		['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
		['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
		['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
		['BidiLtr', 'BidiRtl' ],
		['Link','Unlink','Anchor'],
		['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
		'/',
		['Styles','Format','Font','FontSize'],
		['TextColor','BGColor'],
		['Maximize', 'ShowBlocks','-','About']
	];
	*/

	// 툴바 설정
	config.toolbar = 'Click';

	// 툴바(Basic) 설정
	config.toolbar_Basic =
	[
		['Font','FontSize','-','Bold','Italic','Underline','Strike','-','TextColor','BGColor','-','NumberedList','BulletedList','-','Link','Unlink']
	];

	// 툴바(Full) 설정
	config.toolbar_Full =
	[
		['Source','-','Save','NewPage','Preview','-','Templates'],
		['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
		['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
		['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
		'/',
		['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
		['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
		['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
		['BidiLtr', 'BidiRtl'],
		['Link','Unlink','Anchor'],
		['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
		'/',
		['Styles','Format','Font','FontSize'],
		['TextColor','BGColor'],
		['Maximize', 'ShowBlocks','-','About']
	];

	// 툴바(Click) 설정 (추가)
	config.toolbar_Click = 
	[
		['Font','FontSize'],
		['Bold','Italic','Underline','Strike','-',
		'TextColor','BGColor','-',
		'JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-',
		'SelectAll','RemoveFormat'],
		'/',
		['NumberedList','BulletedList','-',
		'Outdent','Indent','-',
		'Link','Unlink','Anchor','-',
		'Image','Flash'],
		['Table','HorizontalRule','Smiley','SpecialChar','PageBreak','-',
		'Find','Replace','-',
		'Preview','Source']
	];

	// 업로드 설정 (With CKFinder 2.0.1)
	// 설정해야 파일을 업로드 할 수 있음
	// 보안상 파일브라우저는 사용안하는걸로 함
	//config.filebrowserBrowseUrl = '/js/ckfinder/ckfinder.html';
	//config.filebrowserImageBrowseUrl = '/js/ckfinder/ckfinder.html?Type=Images';
	//config.filebrowserFlashBrowseUrl = '/js/ckfinder/ckfinder.html?Type=Flash';
	//config.filebrowserUploadUrl = '/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl = '../js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	config.filebrowserFlashUploadUrl = '../js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
