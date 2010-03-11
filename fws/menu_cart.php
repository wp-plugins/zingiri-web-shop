<?php
/*  menu_cart.php
 Copyright 2006, 2007, 2008 Elmar Wenners
 Support site: http://www.chaozz.nl

 This file is part of FreeWebshop.org.

 FreeWebshop.org is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 FreeWebshop.org is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with FreeWebshop.org; if not, write to the Free Software
 Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

 */
?>
<?php if ($index_refer <> 1) { exit(); } ?>
<?php
$countCart=CountCart($customerid);
echo "<ul>";
echo "<li"; if ($page == "cart") { echo " id=\"active\""; }; echo "><a href=\"?page=cart&action=show\">".$txt['cart5'].": ".$countCart."<br />";
echo $txt['cart7'].": ".$currency_symbol_pre.myNumberFormat(CalculateCart($customerid), $number_format).$currency_symbol_post."</a></li>";
if ($countCart > 0 && ZING_PROTOTYPE)
{
	echo '<li id="showcart"><a href="#">&#x25BE; ('.z_('show').')</a></li>';
	echo '<li id="hidecart"><a href="#">&#x25B4; ('.z_('hide').')</a></li>';
}
$cart="";
$query = "SELECT * FROM ".$dbtablesprefix."basket WHERE (`CUSTOMERID` = ".$customerid." AND `ORDERID` = 0) ORDER BY ID";
$sql = mysql_query($query) or zfdbexit($query);
while ($row = mysql_fetch_array($sql)) {
	$query = "SELECT * FROM `".$dbtablesprefix."product` where `ID`='" . $row[2] . "'";
	$sql_details = mysql_query($query) or die(mysql_error());
	if ($row_details = mysql_fetch_array($sql_details)) {
		$cart.='<li><a href="?page=details&prod='.$row[2].'">';
		$cart.=substr($row_details['PRODUCTID'],0,20).' (x'.$row['QTY'].')';
		$cart.='</a></li>';
	}
}
if (!empty($cart)) {
	echo '<div id="shoppingcart"><ul>';
	echo $cart;
	echo '</ul></div>';
}
if (ZING_PROTOTYPE) {
?>
<script type="text/javascript" language="javascript">
//<![CDATA[
          sidebarcart=new wsCart();
          sidebarcart.contents();
//]]>
</script>
<?php }?>