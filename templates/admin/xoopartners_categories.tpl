<{include file="admin:system/admin_navigation.tpl"}>
<{include file="admin:system/admin_tips.tpl"}>
<{include file="admin:system/admin_buttons.tpl"}>

<{if $categories}>
    <table class="outer">
        <thead>
        <tr>
            <th class="txtcenter width60"><{$smarty.const._XOO_PARTNERS_TITLE}></th>
            <th class="txtcenter"><{$smarty.const._XOO_PARTNERS_ORDER}></th>
            <th class="txtcenter"><{$smarty.const._XOO_PARTNERS_DISPLAY}></th>
            <th class="txtcenter"><{$smarty.const._AM_XOO_PARTNERS_ACTION}></th>
        </tr>
        </thead>

        <{foreach from=$categories item=category}>
        <{assign var=pad value=0}>
        <tr class="even">
            <td>
                <{$category.xoopartners_category_title}>
            </td>

            <td class="txtcenter">
                <{$category.xoopartners_category_order}>
            </td>

            <td class="txtcenter">
                <{if ( $category.xoopartners_category_online )}>
                    <a href="categories.php?op=hide&amp;xoopartners_category_id=<{$category.xoopartners_category_id}>" title="<{$smarty.const._XOO_PARTNERS_SHOW_HIDE}>"><img src="<{xoImgUrl 'media/xoops/images/icons/16/on.png'}>" alt="<{$smarty.const._AM_XOO_PARTNERS_HIDE}>"></a>
                <{else}>
                    <a href="categories.php?op=view&amp;xoopartners_category_id=<{$category.xoopartners_category_id}>" title="<{$smarty.const._XOO_PARTNERS_SHOW_HIDE}>"><img src="<{xoImgUrl 'media/xoops/images/icons/16/off.png'}>" alt="<{$smarty.const._AM_XOO_PARTNERS_SHOW}>"></a>
                <{/if}>
            </td>

            <td class="txtcenter">
                <a href="categories.php?op=edit&amp;xoopartners_category_id=<{$category.xoopartners_category_id}>" title="<{$smarty.const._EDIT}>"><img src="<{xoImgUrl 'media/xoops/images/icons/16/edit.png'}>" alt="{$smarty.const._EDIT}>"></a>
                <!--
                <a href="categories.php?op=del&amp;xoopartners_category_id=<{$category.xoopartners_category_id}>" title="<{$smarty.const._DELETE}>"><img src="<{xoImgUrl 'media/xoops/images/icons/16/delete.png'}>" alt="<{$smarty.const._DELETE}>"></a>
-->
            </td>
        </tr>


        <{include file="admin:xoopartners/xoopartners_categories_list.tpl" categories=$category.categories}>
        <{/foreach}>
    </table>
<{/if}>
