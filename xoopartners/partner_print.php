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

include dirname(dirname(__DIR__)) .  '/mainfile.php';
include __DIR__ . '/include/functions.php';

$xoopartners_module = Xoopartners::getInstance();
$partners_config    = $xoopartners_module->LoadConfig();
$categories_handler = $xoopartners_module->CategoriesHandler();
$partners_handler   = $xoopartners_module->PartnersHandler();

XoopsLoad::load('system', 'system');
$system = System::getInstance();

$xoops = Xoops::getInstance();
$xoops->disableErrorReporting();

$partner_id = $system->cleanVars($_REQUEST, 'partner_id', 0, 'int');
$partner    = $partners_handler->get($partner_id);

$output = $system->cleanVars($_REQUEST, 'output', 'print', 'string');

if (is_object($partner) && count($partner) != 0 && $partner->getVar('xoopartners_online') && $partner->getVar('xoopartners_accepted')) {
    $tpl = new XoopsTpl();

    $tpl->assign('xoopartners_category', $partners_config['xoopartners_category']);
    $tpl->assign('xoopartners_partner', $partners_config['xoopartners_partner']);
    $tpl->assign('xoopartners_qrcode', $partners_config['xoopartners_qrcode']);
    $tpl->assign('xoopartners_rld', $partners_config['xoopartners_rld']);

    $tpl->assign('moduletitle', $xoops->module->name());

    $tpl->assign('partner', $partner->getValues());
    $tpl->assign('print', true);
    $tpl->assign('output', true);
    $tpl->assign('xoops_sitename', $xoops->getConfig('sitename'));
    $tpl->assign('xoops_pagetitle', $partner->getVar('xoopartners_title') . ' - ' . $xoops->module->getVar('name'));
    $tpl->assign('xoops_slogan', htmlspecialchars($xoops->getConfig('slogan'), ENT_QUOTES));

    if ($xoops->isActiveModule('pdf') && $output == 'pdf') {
        /*
                $content = $tpl->fetch('module:xoopartners/xoopartners_partner_pdf.html');
                $pdf = new Pdf('P', 'A4', _LANGCODE, true, _CHARSET, array(10, 10, 10, 10));
                $pdf->setDefaultFont('Helvetica');
                $pdf->writeHtml($content, false);
                $pdf->Output();
        */
    } else {
        $tpl->display('module:xoopartners/xoopartners_partner_print.tpl');
    }
} else {
    $tpl = new XoopsTpl();
    $tpl->assign('xoops_sitename', $xoops->getConfig('sitename'));
    $tpl->assign('xoops_slogan', htmlspecialchars($xoops->getConfig('slogan'), ENT_QUOTES));
    $tpl->assign('not_found', true);
    $tpl->display('module:xoopartners/xoopartners_partner_print.tpl');
}
