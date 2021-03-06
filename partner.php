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
 * @copyright       XOOPS Project (https://xoops.org)
 * @license         GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @package         Xoopartners
 * @since           2.6.0
 * @author          Laurent JEN (Aka DuGris)
 */
use Xoops\Core\Request;

include __DIR__ . '/header.php';
$_SESSION['xoopartners_stat'] = true;

$partner_id = Request::getInt('partner_id', 0); //$system->cleanVars($_REQUEST, 'partner_id', 0, 'int');
$partner = $partnersHandler->get($partner_id);

if (is_object($partner) && 0 != count($partner) && $partner->getVar('xoopartners_online') && $partner->getVar('xoopartners_accepted')) {
    $time = time();
    if (!isset($_SESSION['xoopartner_view' . $partner_id]) || $_SESSION['xoopartner_view' . $partner_id] < $time) {
        $_SESSION['xoopartner_view' . $partner_id] = $time + 3600;
        $partnersHandler->setRead($partner);
    }

    $content = $partner->getValues();
    $content = $partner->getRLD($content);
    $xoops->tpl()->assign('partner', $content);
    $xoops->tpl()->assign('security', $xoops->security()->createToken());
    $xoops->tpl()->assign('xoops_pagetitle', $partner->getVar('xoopartners_title') . ' - ' . $xoops->module->getVar('name'));
    $xoops->theme()->addMeta($type = 'meta', 'description', $partner->getMetaDescription());
    $xoops->theme()->addMeta($type = 'meta', 'keywords', $partner->getMetaKeywords());

    if ($plugin = \Xoops\Module\Plugin::getPlugin('xoopartners', 'comments')) {
        $xoops->tpl()->assign('xoopartners_com', $xoops->isActiveModule('comments'));
    }
} else {
    $xoops->tpl()->assign('not_found', true);
}
include __DIR__ . '/footer.php';
