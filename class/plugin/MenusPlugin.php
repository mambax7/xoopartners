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
 * Class MenusPlugin
 */
class MenusPlugin extends \Xoops\Module\Plugin\PluginAbstract implements \MenusPluginInterface
{
    /**
     * expects an array of array containing:
     * name,      Name of the submenu
     * url,       Url of the submenu relative to the module
     * ex: return array(0 => array(
     *      'name' => _MI_PUBLISHER_SUB_SMNAME3;
     *      'url' => "search.php";
     *    ));
     *
     * @return array
     */
    public function subMenus()
    {
        $ret = [];
        if (\Xoops::getInstance()->isModule() && 'xoopartners' === \Xoops::getInstance()->module->getVar('dirname')) {
            $helper = \XoopsModules\Xoopartners\Helper::getInstance();
            $partnersConfig = $helper->loadConfig();

            $i = 0;
            if ($partnersConfig['xoopartners_category']['use_categories'] && $partnersConfig['xoopartners_category']['main_menu']) {
                $categoriesHandler = $helper->getHandler('Categories');
                $categories = $categoriesHandler->getCategories(0, false, false);
                foreach ($categories as $k => $category) {
                    $ret[$i]['name'] = $category['xoopartners_category_title'];
                    $ret[$i]['url'] = 'index.php?category_id=' . $category['xoopartners_category_id'];
                    ++$i;
                }
            }
            $ret[$i]['name'] = _XOO_PARTNERS_JOIN;
            $ret[$i]['url'] = 'joinpartners.php';
        }

        return $ret;
    }
}
