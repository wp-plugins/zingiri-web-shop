<?php
/*  sub.htmlarea.class.php
 Copyright 2008,2009 Erik Bogaerts
 Support site: http://www.zingiri.com

 This file is part of APhPS.

 APhPS is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 APhPS is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with APhPS; if not, write to the Free Software
 Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
?>
<?php
class language_textZfSubElement extends zfSubElement {

	function output($mode="edit",$input="")
	{
		return $this->ext;
			
	}

	function verify()
	{
		$stripped=stripslashes($this->int);
		$this->ext=$stripped;
		$this->int=$stripped;
		return true;
	}
	
	function display(&$field_markup,&$subscript_markup) {
		$e=$this->element;
		$i=$this->subid;
		$xmlf=$this->xmlf;
		
		$editor=$e->populated_value['element_'.$e->id.'_'.($i+1)];
		//echo 'editor='.$editor;
		//var_dump($e->populated_value);
		if ($editor) $mceNoEditor='';
		else $mceNoEditor='mceNoEditor'; 
		
		if ($e->populated_value['element_'.$e->id.'_'.($i+2)]==1) {
			$field_markup.="<input id=\"element_{$e->id}_{$i}{$this->ail}\" name=\"element_{$e->id}_{$i}\" class=\"element text\" size=\"{$this->size}\" value=\"{$e->populated_value['element_'.$e->id.'_'.$i]}\" maxlength=\"{$this->maxlength}\" type=\"text\" {$e->readonly}/>";
		} else {
			$size=$xmlf->fields->{'field'.$i}->size;
			$sizes=explode(",",$size);
			if (!is_numeric($sizes[0])) $sizes[0]=40;
			if (!is_numeric($sizes[1])) $sizes[1]=3;
			$field_markup.="<textarea id=\"element_{$e->id}_{$i}\" name=\"element_{$e->id}_{$i}\" class=\"{$mceNoEditor} element text\" cols=\"{$sizes[0]}\" rows=\"{$sizes[1]}\" {$e->readonly}>{$e->populated_value['element_'.$e->id.'_'.$i]}</textarea>";
		}
		$subscript_markup.="<label id=\"label_{$e->id}_{$i}\"for=\"element_{$e->id}_{$i}\">".z_($xmlf->fields->{'field'.$i}->label)."</label>";
		$field_markup.="<div id=\"helper_{$e->id}_{$i}\" name=\"helper_{$e->id}_{$i}\" style=\"display:none\" >{$e->populated_value['element_'.$e->id.'_'.($i+1)]}</div>";
		
	}
}
?>