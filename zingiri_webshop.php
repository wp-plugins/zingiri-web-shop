<?php
/*  zingiri_webshop.php
 Copyright 2008,2009 Erik Bogaerts
 Support site: http://www.zingiri.com

 This file is part of Zingiri Web Shop.

 Zingiri Web Shop is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 Zingiri Web Shop is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with FreeWebshop.org; if not, write to the Free Software
 Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
?>
<?php
/*
 Plugin Name: Zingiri Web Shop
 Plugin URI: http://www.zingiri.com/web-shop
 Description: Zingiri Web Shop is a full featured software package that allows you to set up your own online webshop within minutes.
 Author: EBO
 Version: 1.4.8
 Author URI: http://www.zingiri.com/
 */
define("ZING_VERSION","1.5.0");

@include(dirname(__FILE__)."/fixme.php");
require(dirname(__FILE__)."/load.php");
define("ZING_APPS",dirname(__FILE__)."/fws/fields/");
define("ZING_APPS_CUSTOM",dirname(__FILE__)."/fws/");
define("ZING_GLOBALS",dirname(__FILE__)."/fws/globals.php");
define("ZING_APPS_EMBED","zap/");
define("ZING_APPS_TRANSLATE",'z_');
define("ZING_APPS_CAPTCHA",dirname(__FILE__)."/fws/addons/captcha/");
define("ZING_APPS_EDITABLES","'register','customer'");

if (get_option('zing_ws_effects')=="Prototype" || get_option('zing_ws_effects')=="") {
	define("ZING_PROTOTYPE",true);
	define("ZING_JQUERY",false);
} elseif (get_option('zing_ws_effects')=="jQuery") {
	define("ZING_JQUERY",true);
	define("ZING_PROTOTYPE",false);
} else {
	define("ZING_PROTOTYPE",false);
	define("ZING_JQUERY",false);
}

require(dirname(__FILE__)."/zap/embed.php");

require(dirname(__FILE__)."/zing.inc.php");

require(dirname(__FILE__)."/extensions/index.php");

register_activation_hook(__FILE__,'zing_activate');
register_deactivation_hook(__FILE__,'zing_deactivate');
?>