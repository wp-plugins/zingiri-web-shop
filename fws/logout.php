<?php
/*  logout.php
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
<?php
	 include ("./includes/startmodules.inc.php");

     if(setcookie ("fws_cust","", time() - 3600)==TRUE)
			{
				?>
                 <html><head><link href="<?php echo $template_dir."/".$template."/stylesheet.css"; ?>" rel="stylesheet" type="text/css">
                 <META HTTP-EQUIV="Refresh" CONTENT="1; URL=index.php"></head>
                 <body><br /><br /><br /><br /><br /><br /><br />
                 <h4><?php echo $txt['logout1'] ?></h4></body></html>
				<?php

			}
?>