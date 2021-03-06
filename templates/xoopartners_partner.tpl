<{include file='module:xoopartners/xoopartners_partners_css.tpl'}>

<{if !$partners}>
    <{if $moduletitle != ''}>
        <fieldset>
            <legend><{$moduletitle}></legend>
        </fieldset>
    <{/if}>
<{/if}>

<{if !$not_found}>
    <div class="item">
        <div class="itemHead">
            <{*<{if $qrcode}>*}>
                <{*<div class="itemQRcode">*}>
                    <{*<a href="<{$partner.xoopartners_link}>" title="<{$partner.xoopartners_title}>"><img src="<{xoAppUrl 'modules/xoopartners/qrcode.php'}>?url=<{$partner.xoopartners_link}>" alt="<{$partner.xoopartners_link}>"></a>*}>
                <{*</div>*}>
            <{*<{/if}>*}>
            <{if $qrcode}>
                <div class="itemQRcode">
                    <a href="<{$partner.xoopartners_link}>" title="<{$partner.xoopartners_title}>"> <{$partner.qrcode_image_link}> </a>
                </div>
            <{/if}>


            <div class="floatleft">
                <{if $partner.xoopartners_image != "blank.gif"}>
                    <div class="partnerImage">
                        <img src="<{$partner.xoopartners_image_link}>" alt="">
                    </div>
                <{/if}>
                <div class="partner<{$partner.xoopartners_id}>">
                    <div class="itemTitle">
                        <{if $partners}>
                            <a href="<{$partner.xoopartners_link}>" title="<{$partner.xoopartners_title}>"><{$partner.xoopartners_title}></a>
                        <{else}>
                            <a rel="external" href="visitpartner.php?partner_id=<{$partner.xoopartners_id}>" title="<{$partner.xoopartners_title}>"><img src="<{xoImgUrl 'modules/xoopartners/assets/icons/16/weblink.png'}>" alt="<{$partner.xoopartners_title}>"><{$partner.xoopartners_title}>
                            </a>
                        <{/if}>
                    </div>

                    <div class="itemInfo">
                        <div class="itemPoster">
                            <{$smarty.const._XOO_PARTNERS_AUTHOR}> : <a href="<{xoAppUrl 'userinfo.php'}>?uid=<{$partner.xoopartners_uid}>" title="<{$partner.xoopartners_uid_name}>">
                                <{$partner.xoopartners_uid_name}>
                            </a>
                        </div>

                        <{if $partner.xoopartners_categories}>
                            <div class="itemCategories">
                                <{$smarty.const._XOO_PARTNERS_CATEGORIES}> :
                                <{foreach from=$partner.xoopartners_categories item=category name=foo}>
                                <a href="<{$category.xoopartners_category_link}>" title="<{$category.xoopartners_category_title}>"><{$category.xoopartners_category_title}></a><{if !$smarty.foreach.foo.last}>,&nbsp;<{/if}>
                                <{/foreach}>
                            </div>
                        <{/if}>

                        <{if $partner.tags}>
                            <{include file="module:xootags/xootags_bar.tpl" tags=$partner.tags}>
                        <{/if}>
                    </div>
                </div>
            </div>
        </div>

        <{if $partner.xoopartners_description}>
            <div class="itemBody">
                <div class="itemText">
                    <{$partner.xoopartners_description}>
                </div>
            </div>
        <{else}>
            <div class="clear"></div>
        <{/if}>

        <{if $partner.readmore}>
            <div class="itemFoot floatright">
                <a href="<{$partner.xoopartners_link}>" title="<{$smarty.const._XOO_PARTNERS_READMORE}>"><{$smarty.const._XOO_PARTNERS_READMORE}></a>
            </div>
            <div class="clear"></div>
        <{/if}>

        <{if !$partners && !$print}>
            <div class="itemFoot">
                <div class="itemStat floatleft">
                    <button id="button-reads" title="<{$smarty.const._XOO_PARTNERS_READS}>"><i class="reads"></i><{$partner.xoopartners_hits}></button>
                    <button id="button-visits" title="<{$smarty.const._XOO_PARTNERS_VISITS}>"><i class="visits"></i><{$partner.xoopartners_visit}></button>
                    <{if $xoopartners_com}>
                        <button id="button-comments" title="<{$smarty.const._XOO_PARTNERS_COMMENTS}>"><i class="comments"></i><{$partner.xoopartners_comments}></button>
                    <{/if}>
                    <button id="button-print" title="<{$smarty.const._XOO_PARTNERS_PRINT}>"><i class="print"></i></button>
                    <!--
                    <button id="button-pdf" title="<{$smarty.const._XOO_PARTNERS_PDF}>"><i class="pdf"></i></button>
-->
                </div>

                <{if $xoopartners_rld.rld_mode != ''}>
                    <div class="floatright">
                        <{if $xoopartners_rld.rld_mode == 'rate'}>
                            <{include file='module:xoopartners/xoopartners_partner_rate.tpl'}>
                        <{else}>
                            <{include file='module:xoopartners/xoopartners_partner_like_dislike.tpl'}>
                        <{/if}>
                    </div>
                <{/if}>

                <div class="clear"></div>
            </div>
            <{if $xoosocialnetwork}>
                <{include file='module:xoosocialnetwork/xoosocialnetwork.tpl'}>
            <{/if}>
        <{/if}>
    </div>
    <{if !$partners && !$print}>
        <{include file='module:xoopartners/xoopartners_footer.tpl'}>
    <{/if}>

<{else}>
    <div class="errorMsg">
        <{$smarty.const._XOO_PARTNERS_NOTFOUND}>
    </div>
<{/if}>
<script language="javascript">
    <!--
    $("#button-print").click(function () {
        window.open('partner_print.php?partner_id=<{$partner.xoopartners_id}>', 'New Project', 'left=20, top=20, width=1100, height=700, toolbar=0, resizable=1, scrollbars=1');
    });
    $("#button-pdf").click(function () {
        window.open('partner_print.php?partner_id=<{$partner.xoopartners_id}>&output=pdf', 'New Project', 'left=20, top=20, width=1100, height=700, toolbar=0, resizable=1, scrollbars=1');
    });
    //-->
</script>
