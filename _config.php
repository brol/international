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

if (!defined('DC_CONTEXT_ADMIN')) { return; }

global $core;

//PARAMS

# Translations
l10n::set(dirname(__FILE__).'/locales/'.$_lang.'/main');

# Default values
$default_menu = 'menucategories';

# Settings
$my_menu = $core->blog->settings->themes->international_menu;

# Menu type
$international_menu_combo = array(
  __('Menu categories') => 'menucategories',
	__('SimpleMenu') => 'simplemenu',
	__('None') => 'menuno'
);

// POST ACTIONS

if (!empty($_POST))
{
	try
	{
		$core->blog->settings->addNamespace('themes');

		# Menu type
		if (!empty($_POST['international_menu']) && in_array($_POST['international_menu'],$international_menu_combo))
		{
			$my_menu = $_POST['international_menu'];

		} elseif (empty($_POST['international_menu']))
		{
			$my_menu = $default_menu;

		}
		$core->blog->settings->themes->put('international_menu',$my_menu,'string','Menu to display',true);

		// Blog refresh
		$core->blog->triggerBlog();

		// Template cache reset
		$core->emptyTemplatesCache();

		dcPage::success(__('Theme configuration has been successfully updated.'),true,true);
	}
	catch (Exception $e)
	{
		$core->error->add($e->getMessage());
	}
}

// DISPLAY

# Menu
echo
'<div class="fieldset"><h4>'.__('Customization').'</h4>'.
'<p class="field"><label>'.__('Menu to display:').'</label>'.
form::combo('international_menu',$international_menu_combo,$my_menu).
'</p>'.
'<p class="info">'.__('Link order for the "Menu categories": Home - Links blog categories (level 1 and 2) - Archive - Contact.').'</p>'.
'</div>';