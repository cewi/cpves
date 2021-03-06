<?php
/******************************************************************************
* Copyright (C) 2006 Jonas Genannt <jonas.genannt@brachium-system.net>
* 
* This program is free software; you can redistribute it and/or
* modify it under the terms of the GNU General Public License
* as published by the Free Software Foundation; either version 2
* of the License, or (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program; if not, write to the Free Software
* Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
******************************************************************************/
if (isset($_POST['mf_rebuild']) && $_POST['mf_rebuild']==1) {
		$result=&$db->query("UPDATE mailfilter SET active='1' WHERE active!='0' ");
		$smarty->assign('success_msg', 'y');
		$smarty->assign('if_mf_rebuild', 'y');
		
}
if (isset($_POST['web_lang_submit'])) {
	if (is_dir(ROOT . "/includes/localization/" .$_POST['web_lang'] ) || $_POST['web_lang']="en_US") {
		$sql=sprintf("UPDATE adm_users SET web_lang='%s' WHERE id='%d'",
			$db->escapeSimple($_POST['web_lang']),
			$db->escapeSimple($_SESSION['s_uid']));
		$db->query($sql);
		$_SESSION['lang']=$_POST['web_lang'];
	}
}

$smarty->assign('table_lang', get_all_langs());
$smarty->assign('web_lang' , $_SESSION['lang']);
?>