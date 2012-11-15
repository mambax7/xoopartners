<?php
/**
 * Xoopartners module
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license         GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @package         Xoopartners
 * @since           2.6.0
 * @author          Laurent JEN (Aka DuGris)
 * @version         $Id$
 */

include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'header.php';

if ($Partners_config['xoopartners_category']['use_categories']) {
    $xoops->tpl->assign('categories', $categories_handler->GetCategories() );
    $xoops->tpl->assign('category_id', $category_id);
    $xoops->tpl->assign('partners', $partners_handler->GetPartners( $category_id ) );

    if ( $Partners_config['xoopartners_category']['display_mode'] == "select" ) {
        $xoops->tpl->assign('category_footer', '</select></div>' );
    } elseif ( $Partners_config['xoopartners_category']['display_mode'] == "table" ) {
        $xoops->tpl->assign('category_footer', '</table>' );
    }
} else {
}
include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'footer.php';
?>