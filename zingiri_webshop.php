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
 Description: This plugin integrates the fabulous Free Web Shop e-commerce solution with Wordpress.
 Author: EBO
 Version: 1.3.0
 Author URI: http://www.zingiri.com/
 */
define("ZING_VERSION","1.3.0");

require(dirname(__FILE__)."/load.php");
define("ZING_APPS_PLAYER_VERSION","0.9.0");
define("ZING_APPS",dirname(__FILE__)."/fws/fields/");
define("ZING_APPS_CUSTOM",dirname(__FILE__)."/fws/");
define("ZING_APPS_EMBED","zap/");
define("ZING_APPS_TRANSLATE",'z_');
define("ZING_APPS_CAPTCHA",dirname(__FILE__)."/fws/addons/captcha/");

if (get_option('zing_ws_effects')=="Prototype" || get_option('zing_ws_effects')=="") {
	define("ZING_PROTOTYPE",true);
} else {
	define("ZING_PROTOTYPE",false);
}

require(dirname(__FILE__)."/zap/embed.php");

require(dirname(__FILE__)."/zing.inc.php");

register_activation_hook(__FILE__,'zing_activate');
register_deactivation_hook(__FILE__,'zing_deactivate');
?>