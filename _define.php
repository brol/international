<?php
# -- BEGIN LICENSE BLOCK ----------------------------------
#
# This file is part of International, a theme for Dotclear 2.
#
# Licensed under the GPL version 2.0 license.
# See LICENSE file or
# http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
#
# -- END LICENSE BLOCK ------------------------------------
if (!defined('DC_RC_PATH')) { return; }

$this->registerModule(
	/* Name */			"International",
	/* Description*/		"Thème magazine en noir et blanc",
	/* Author */			"David YIM, Pierre Van Glabeke",
	/* Version */			'1.6',
	array(
		'type'	 =>	'theme',
		'tplset' => 'mustek',
		'dc_min' => '2.15'
	)
);