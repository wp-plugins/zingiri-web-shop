<?php
function ws_upgrade_1_5_1_set_category_images() {
	$images=array();
	$dbUpgrade=new db();
	if ($dbUpgrade->select("select id from ##category")) {
		while ($dbUpgrade->next()) {
			$id=$dbUpgrade->get('ID');
			foreach (array('.jpg','.gif','.png') as $ext) {
				if (file_exists(ZING_WS_CATS_DIR.$id.$ext)) $images[$id]=$id.$ext;
			}
		}
	}
	if (count($images) > 0) {
		foreach ($images as $id => $image) {
			$dbUpgrade->update("update ##category set image=".qs($image)." where id=".qs($id));
		}
	}
}
function ws_upgrade_1_5_1_set_templates() {
	$db=new db();
	$db->update('truncate ##template');
	$prompts=new zingPrompts();
	foreach ($prompts->langs as $lang => $label) {
		//if ($prompts->isLanguageActive($lang)) {
		//	$txt=$prompts->loadlang($lang,true);
		//} else {
			$txt=$prompts->loadOldLangFile($lang);
		//}
		$title = $txt['checkout10'];
		$message = $txt['checkout3'];
		$message.= "<table width=\"100%\" class=\"borderless\">";
		$message.= "<tr><td>[QTY]".$txt['checkout4']."</td><td>".'[DESCRIPTION]'."<br />".'[PRICE]'.$txt['checkout5']."</td><td style=\"text-align: right\">".'[LINETOTAL]'."</tr>";
		$message.= '<tr><td>'.$txt['checkout14'].'</td><td>'.$txt['checkout18'].' '.'[DISCOUNTCODE]'.'<br />';
		$message.= '([DISCOUNTRATE])'.'</td><td style="text-align: right"><strong>-'.'[DISCOUNTAMOUNT]'.'</strong></td></tr>';
		$message.= '<tr><td>'.$txt['checkout16'].'</td><td>'.'[SHIPPINGMETHOD]'.'</td><td style="text-align: right">'.'[SHIPPINGCOSTS]'.'</td></tr>';
		$message.= '<tr><td>'.$txt['checkout102'].'</td><td>'.'[TAXLABEL]'.' '.'[TAXRATE]'.'%</td><td style="text-align: right">'.'[TAXTOTAL]'.'</td></tr>';
		$message.= '<tr><td>'.$txt['checkout24'].'</td><td>'.$txt['checkout25'].'</td><td style="text-align: right"><big><strong>'.'[TOTAL]'.'</strong></big></td></tr>';
		$message.= "</table><br /><br />";
		$message.= $txt['shipping3']."<br />".'[NOTES]';
		$message .= "<br /><br />".$txt['checkout17']; // shipping address
		$message .= '<br /><br />'.$txt['checkout19'].$payment_descr; // Payment method:
		$message .= $txt['checkout6']; // line break
		$message .='[PAYMENTCODE]';
		$message .= $txt['checkout9']; // direct link to customer order for online status checking

		foreach ($prompts->vars as $var) {
			$message=str_replace('$'.$var,"[".strtoupper($var)."]",$message);
			$title=str_replace('$'.$var,"[".strtoupper($var)."]",$title);
		}
		$db->insertRecord('template','',array('CONTENT'=>$message,'LANG'=>$lang,'NAME'=>'order','TITLE'=>$title));
	}
}

if ($zing_version) ws_upgrade_1_5_1_set_category_images();
ws_upgrade_1_5_1_set_templates();
?>