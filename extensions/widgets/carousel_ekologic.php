<?php
class widget_carousel_ekologic {
	function init($args) {
		global $txt;
		//zing_main("init");
		extract($args);
		//echo $before_widget;
		//echo $before_title;
		//echo $txt['menu2'];
		//echo $after_title;
		echo '<div id="zing-carousel_ekologic" style="clear:both">';
		$this->display();
		echo '</div>';
		//echo $after_widget;
	}

	function display() {
		require(ZING_GLOBALS);
		require(dirname(__FILE__).'/carousel_ekologic/init.php');
		require(dirname(__FILE__).'/carousel_ekologic/index.php');
	}
}
$wsWidgets[]=array('class'=>'widget_carousel_ekologic','name'=>'Zingiri Product Carousel');
?>