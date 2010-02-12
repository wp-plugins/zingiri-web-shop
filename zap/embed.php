<?php
/*  zingiri_apps_player.php
 Copyright 2008,2009 Erik Bogaerts
 Support site: http://www.zingiri.com

 This file is part of Zingiri Apps.

 Zingiri Apps is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 Zingiri Apps is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with Zingiri Apps; if not, write to the Free Software
 Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
?>
<?php
// Pre-2.6 compatibility for wp-content folder location
if (!defined("WP_CONTENT_URL")) {
	define("WP_CONTENT_URL", get_option("siteurl") . "/wp-content");
}
if (!defined("WP_CONTENT_DIR")) {
	define("WP_CONTENT_DIR", ABSPATH . "wp-content");
}

if (!defined("ZING_APPS_EMBED")) {
	define("ZING_APPS_EMBED","");
}

if (!defined("ZING_APPS_PLAYER_PLUGIN")) {
	$zing_apps_player_plugin=str_replace(WP_CONTENT_DIR."/plugins/","",dirname(__FILE__));;
	define("ZING_APPS_PLAYER_PLUGIN", $zing_apps_player_plugin);
}

if (!defined("ZING_APPS_PLAYER")) {
	define("ZING_APPS_PLAYER", true);
}

if (!defined("ZING_APPS_PLAYER_URL")) {
	define("ZING_APPS_PLAYER_URL", WP_CONTENT_URL . "/plugins/".ZING_APPS_PLAYER_PLUGIN."/");
}
if (!defined("ZING_APPS_PLAYER_DIR")) {
	define("ZING_APPS_PLAYER_DIR", WP_CONTENT_DIR . "/plugins/".ZING_APPS_PLAYER_PLUGIN."/");
}
if (!defined("FACES_DIR")) {
	define("FACES_DIR", WP_CONTENT_URL . "/plugins/".ZING_APPS_PLAYER_PLUGIN."/fields/");
}

$dbtablesprefix = $wpdb->prefix."zing_";
$dblocation = DB_HOST;
$dbname = DB_NAME;
$dbuser = DB_USER;
$dbpass = DB_PASSWORD;

if (get_option("zing_apps_player_version")) {
	add_action("init","zing_apps_player_init");
	add_filter('the_content', 'zing_apps_player_content', 11, 3);
	add_action('wp_head','zing_apps_player_header',100);
}

function zing_apps_player_error_handler($severity, $msg, $filename, $linenum) {
	echo $severity."-".$msg."-".$filename."-".$linenum;
}


/**
 * Output activation messages to log
 * @param $stringData
 * @return unknown_type
 */
function zing_apps_player_echo($stringData) {
	$myFile = ZING_LOC."/log.txt";
	$fh = fopen($myFile, 'a') or die("can't open file");
	fwrite($fh, $stringData);
	fclose($fh);
}

/**
 * Activation of web shop: creation of database tables & set up of pages
 * @return unknown_type
 */
function zing_apps_player_activate() {
	global $wpdb;
	global $dbtablesprefix;

	$zing_version=get_option("zing_apps_player_version");
	if (!$zing_version)
	{
		add_option("zing_apps_player_version",ZING_APPS_PLAYER_VERSION);
	}
	else
	{
		update_option("zing_apps_player_version",ZING_APPS_PLAYER_VERSION);
	}

	$wpdb->show_errors();
	$prefix=$dbtablesprefix;

	if ($handle = opendir(dirname(__FILE__).'/db')) {
		while (false !== ($file = readdir($handle))) {
			if (strstr($file,".sql")) {
				$f=explode("-",$file);
					
				$v=str_replace(".sql","",$f[1]);
				if ($zing_version < $v) {
					$file_content = file(dirname(__FILE__).'/db/'.$file);
					$query = "";
					foreach($file_content as $sql_line) {
						$tsl = trim($sql_line);
						if (($sql_line != "") && (substr($tsl, 0, 2) != "--") && (substr($tsl, 0, 1) != "#")) {
							$sql_line = str_replace("`##", "`".$prefix, $sql_line);
							$query .= $sql_line;

							if(preg_match("/;\s*$/", $sql_line)) {
								$wpdb->query($query);
								$query = "";
							}
						}

					}
				}
			}
		}
		closedir($handle);
	}

}

/**
 * Deactivation of web shop: removal of database tables
 * @return unknown_type
 */
function zing_apps_player_deactivate() {
	global $wpdb;
//	zing_apps_player_uninstall();
}

/**
 * Uninstallation of web shop: removal of database tables
 * @return void
 */
function zing_apps_player_uninstall() {
	global $wpdb;
	global $dbtablesprefix;

	$rows=$wpdb->get_results("show tables like '".$dbtablesprefix."%'",ARRAY_N);
	if (count($rows) > 0) {
		foreach ($rows as $id => $row) {
			$query="drop table ".$row[0];
			$wpdb->query($query);
		}
	}
	delete_option("zing_apps_player_version");
}

/**
 * Page content filter
 * @param $content
 * @return unknown_type
 */
function zing_apps_player_content($content) {

	global $post;
	global $dbtablesprefix;
	
	error_reporting(E_ALL & ~E_NOTICE);
	ini_set('display_errors', '1');
	
	if (defined("ZING_APPS_CUSTOM")) { require(ZING_APPS_CUSTOM."globals.php"); }

	$cf=get_post_custom();

	error_reporting(E_ALL & ~E_NOTICE);
	ini_set('display_errors', '1');

	if (!isset($_GET['zfaces']) && ($post->ID == get_option("zing_apps_player_page"))) {
		$zfaces="summary";
	} elseif (isset($_GET['zfaces'])) {
		$zfaces=$_GET['zfaces'];
	} elseif (isset($cf['zfaces'])) {
		$zfaces=$cf['zfaces'][0];
	} else {
		return $content;
	}

	switch ($zfaces)
	{
		case "form":
			require(dirname(__FILE__)."/includes/all.inc.php");
			require(dirname(__FILE__)."/scripts/form.php");
			break;
		case "list":
			require(dirname(__FILE__)."/includes/all.inc.php");
			require(dirname(__FILE__)."/scripts/list.php");
			break;
	}

	return "";

}


/**
 * Header hook: loads FWS addons and css files
 * @return unknown_type
 */
function zing_apps_player_header()
{
	if (defined("ZING_APPS_BUILDER")) {
		echo '<script type="text/javascript" language="javascript">';
		echo "var zfurl='".ZING_APPS_BUILDER_URL."ajax/';";
		if (defined("ZING_APPS_CUSTOM")) echo "var zfAppsCustom='".ZING_APPS_CUSTOM."';";
		else echo "var zfAppsCustom='';";
		echo "var zfAppsSystem='".ZING_APPS_PLAYER_DIR."';";
		echo '</script>';
	}

	echo '<link rel="stylesheet" href="' . ZING_APPS_PLAYER_URL . 'css/integrated_view.css" type="text/css" media="screen" />';
	if (defined("ZING_APPS_BUILDER")) {
		echo '<script type="text/javascript" src="' . ZING_APPS_BUILDER_URL . 'js/form.js"></script>';
		echo '<script type="text/javascript" src="' . ZING_APPS_BUILDER_URL . 'js/face.js"></script>';
		echo '<script type="text/javascript" src="' . ZING_APPS_BUILDER_URL . 'js/dragtable.js"></script>';
	}
	echo '<script type="text/javascript" src="' . ZING_APPS_PLAYER_URL . 'js/sorttable.js"></script>';
	echo '<script type="text/javascript" src="' . ZING_APPS_PLAYER_URL . 'js/stack.js"></script>';
}

/**
 * Initialization of page, action & page_id arrays
 * @return unknown_type
 */
function zing_apps_player_init()
{
	wp_enqueue_script('prototype');
	wp_enqueue_script('scriptaculous');
	
	ob_start();
	if (isset($_GET['zfaces']))
	{
		$_GET['page_id']=get_option("zing_apps_player_page");
	}
}

if (!function_exists("ZingAppsIsAdmin")) {
	function ZingAppsIsAdmin() {
		if (function_exists("IsAdmin")) { return IsAdmin(); }
		return true;
	}
}

?>