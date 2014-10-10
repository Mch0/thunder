<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Lolsummons</title>
	<script type="text/javascript" src="../../tiny_mce_popup.js"></script>
	<script type="text/javascript" src="js/lolsummons.js"></script>
</head>

<span style="display:none;" id="app_title">Lolsummons</span>
<?php 
$url_json = "http://ddragon.leagueoflegends.com/cdn/3.8.3/data/fr_FR/summoner.json";
$get_json = file_get_contents($url_json);
$json = json_decode($get_json, 1);
$sortie ='';
foreach ($json['data'] as $ikey => $item) {
$x = $item['image']['x'].'px';
$y = $item['image']['y'].'px';
$name= addslashes($item['name']);
$image = "<div style=\"background: url('http://ddragon.leagueoflegends.com/cdn/3.8.3/img/sprite/spell0.png') -$x -$y no-repeat; display:block; width:48px; height:48px;\" /></div>";
$id = "<input style='width: 48px' type='text' onclick='select()' value='%-SU:$ikey-%' />";
$sortie .= "<div style='float:left; width:50px;'><a class=\"lolitem_link\" role=\"button\" title=\"\" href=\"javascript:lolsummonsDialog.insert('%-SU:$ikey-%','$name');\">".$image.$id."</a></div>";
}
echo "<div width='100%'>";
echo $sortie;
echo "</div>";
?>



</html>
