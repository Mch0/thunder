<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>dif_images</title>
	<script type="text/javascript" src="../../tiny_mce_popup.js"></script>



	<script type="text/javascript" src="lolteams.js">


tinyMCEPopup.requireLangPack();

var dif_imagesDialog = {
	addKeyboardNavigation: function(){
		var tableElm, cells, settings;
			
		cells = tinyMCEPopup.dom.select("a.emoticon_link", "emoticon_table");
			
		settings ={
			root: "emoticon_table",
			items: cells
		};
		cells[0].tabindex=0;
		tinyMCEPopup.dom.addClass(cells[0], "mceFocus");
		if (tinymce.isGecko) {
			cells[0].focus();		
		} else {
			setTimeout(function(){
				cells[0].focus();
			}, 100);
		}
		tinyMCEPopup.editor.windowManager.createInstance('tinymce.ui.KeyboardNavigation', settings, tinyMCEPopup.dom);
	}, 
	init : function(ed) {
		tinyMCEPopup.resizeToInnerSize();
		this.addKeyboardNavigation();
	},

	insert : function(file, title) {
		var ed = tinyMCEPopup.editor, dom = ed.dom;

		tinyMCEPopup.execCommand('mceInsertContent', false, file);

		tinyMCEPopup.close();
	}
};

tinyMCEPopup.onInit.add(dif_imagesDialog.init, dif_imagesDialog);




	</script>


</head>
<body  role="application" aria-labelledby="app_title">
<span style="display:none;" id="app_title">dif_images</span>
<?php 



$dirname_img = '/home/thunder/public_html/app/webroot/guide/img/champion/';
$dir_dif_images = opendir($dirname_img); 

while($test = readdir($dir_dif_images)) {
$extension=pathinfo($test,PATHINFO_EXTENSION);
	if($test != '.' && $test != '..' && !is_dir($dirname_img.$test))
	{
		echo "<div style='float:left; width:30px; height:30px;'><a role='button' href=\"javascript:dif_imagesDialog.insert('<img src=http://www.thunderbot.gg/guide/img/champion/$test />','$test')\">";
		echo "<img width='20' src='http://www.thunderbot.gg/guide/img/champion/$test' />";
		echo "</a></div>";
	}
}
closedir($dir_dif_images);
//echo realpath('./lolteams.php')








?>


</body>
</html>
