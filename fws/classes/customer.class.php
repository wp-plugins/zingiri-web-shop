<?php
class wsCustomer {
	var $data;
	var $loggedin=false;
	var $id=0;

	function wsCustomer() {
		global $dbtablesprefix;

		if (!isset($_COOKIE['fws_cust'])) { return false; }
		$fws_cust = explode("-", $_COOKIE['fws_cust']);
		$customerid = $fws_cust[1];
		$md5pass = $fws_cust[2];
		if (is_null($customerid)) { return false; }
		$query = "SELECT * FROM ".$dbtablesprefix."customer WHERE ID = '" . $customerid. "'";
		$sql = mysql_query($query) or die(mysql_error());
		if ($row = mysql_fetch_array($sql)) {
			if (md5($row[2]) == $md5pass && $row[6] == GetUserIP()) $this->loggedin=true;
			$this->data=$row;
			return true;
		}
		return false;
	}
}
?>