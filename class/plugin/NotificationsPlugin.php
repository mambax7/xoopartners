<?php

namespace XoopsModules\Xoopartners\Plugin;

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
 * @copyright       XOOPS Project (https://xoops.org)
 * @license         GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @package         Xoopartners
 * @since           2.6.0
 * @author          Laurent JEN (Aka DuGris)

 */

/**
 * Class XoopartnersNotificationsPlugin
 */
class NotificationsPlugin extends \Xoops\Module\Plugin\PluginAbstract implements \NotificationsPluginInterface
{
    /**
     * @param string $category
     * @param int    $item_id
     *
     * @return array
     */
    public function item($category, $item_id)
    {
        $xoops = \Xoops::getInstance();
        $item = [];
        $item_id = (int)$item_id;

        if ('global' === $category) {
            $item['name'] = '';
            $item['url'] = '';

            return $item;
        }

        if ('item' === $category) {
            $sql = 'SELECT xoopartners_title FROM ' . $xoops->db()->prefix('xoopartners') . ' WHERE xoopartners_id = ' . $item_id;
            $result = $xoops->db()->query($sql); // TODO: error check
            $result_array = $xoops->db()->fetchArray($result);
            $item['name'] = $result_array['xoopartners_title'];
            $item['url'] = 'partner.php';

            return $item;
        }

        return $item;
    }

    /**
     * @return array
     */
    public function categories()
    {
        $ret = [];
        $ret[1]['name'] = 'global';
        $ret[1]['title'] = _MI_XOO_PARTNERS_NOTIFICATION_GLOBAL;
        $ret[1]['description'] = _MI_XOO_PARTNERS_NOTIFICATION_GLOBAL_DSC;
        $ret[1]['subscribe_from'] = ['index.php'];

        $ret[2]['name'] = 'item';
        $ret[2]['title'] = _MI_XOO_PARTNERS_NOTIFICATION_ITEM;
        $ret[2]['description'] = _MI_XOO_PARTNERS_NOTIFICATION_ITEM_DSC;
        $ret[2]['subscribe_from'] = ['partner.php'];
        $ret[2]['item_name'] = 'partner_id';
        $ret[2]['allow_bookmark'] = 1;

        return $ret;
    }

    /**
     * @return array
     */
    public function events()
    {
        $ret = [];
        $ret[1]['name'] = 'newcontent';
        $ret[1]['category'] = 'global';
        $ret[1]['title'] = _MI_XOO_PARTNERS_NOTIFICATION_GLOBAL_NEWCONTENT;
        $ret[1]['caption'] = _MI_XOO_PARTNERS_NOTIFICATION_GLOBAL_NEWCONTENT_CAP;
        $ret[1]['description'] = _MI_XOO_PARTNERS_NOTIFICATION_GLOBAL_NEWCONTENT_DSC;
        $ret[1]['mail_template'] = 'global_newcontent';
        $ret[1]['mail_subject'] = _MI_XOO_PARTNERS_NOTIFICATION_GLOBAL_NEWCONTENT_SBJ;

        return $ret;
    }

    /**
     * @param string $category
     * @param int    $item_id
     * @param string $event
     *
     * @return array
     */
    public function tags($category, $item_id, $event)
    {
        return [];
    }
}
