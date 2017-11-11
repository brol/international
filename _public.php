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

l10n::set(dirname(__FILE__).'/locales/'.$_lang.'/public');

$core->addBehavior('templateBeforeBlock',array('behaviorsExcludeCurrentPost','templateBeforeBlock'));
class behaviorsExcludeCurrentPost
{
  public static function templateBeforeBlock($core,$b,$attr)
  {
    if ($b == 'Entries' && isset($attr['exclude_current']) && $attr['exclude_current'] == 1)
    {
      return
      "<?php\n".
      '$params["sql"] = "AND P.post_url != \'".$_ctx->posts->post_url."\' ";'."\n".
      "?>\n";
    }
  }
}

# appel css menu
$core->addBehavior('publicHeadContent','internationalmenu_publicHeadContent');

function internationalmenu_publicHeadContent($core)
{
	$style = $core->blog->settings->themes->international_menu;
	if (!preg_match('/^menucategories|simplemenu|menuno$/',$style)) {
		$style = 'menucategories';
	}

	$url = $core->blog->settings->system->themes_url.'/'.$core->blog->settings->system->theme;
	echo '<link rel="stylesheet" type="text/css" media="screen" href="'.$url."/".$style.".css\" />\n";
}