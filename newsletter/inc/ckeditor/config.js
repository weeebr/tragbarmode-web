/*
Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/



CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	
	config.skin = 'v2'; 
	config.height = '300px';
	//config.width = '754px';
	
	config.resize_maxWidth = '100%';
	config.resize_maxHeight = 1000;
	
    config.toolbar = 'USOLVED';
	
	//to allow html and body tags in editor
	config.fullPage = true;

    config.toolbar_USOLVED =
    [
	
		['Maximize','Source','-','Bold','Italic','Underline','Strike','-','TextColor','BGColor','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','NumberedList','BulletedList','-','Outdent','Indent','-','Table'],
		
		['Link','Unlink','-','RemoveFormat'],
		'/',
		['Scayt','-','Format','Font','FontSize']
        
    ];
	


	
};



