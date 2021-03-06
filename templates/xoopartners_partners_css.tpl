<style type="text/css" media="screen,print">
    [class^="xoopartners-image-"], [class*=" xoopartners-image-"] {
        background-size: <{$xoopartners_partner.image_width}>px;
    }

    <{if count($partners) != 0}>
    <{foreach from=$partners item=csspartner name=foo}>
    .xoopartners-ico-partner <{$csspartner.xoopartners_id}> {
        background-image: url('<{$csspartner.xoopartners_image_link}>');
    }

    .xoopartners-image-partner <{$csspartner.xoopartners_id}> {
        background-image: url('<{$csspartner.xoopartners_image_link}>');
    }

    .partner <{$csspartner.xoopartners_id}> {
    <{if $csspartner.xoopartners_image != "blank.gif"}> padding-left: <{$xoopartners_partner.image_width}>px;
        margin-left: 10px;
    <{/if}>
    }

    <{/foreach}>
    <{else}>
    .xoopartners-ico-partner <{$partner.xoopartners_id}> {
        background-image: url('<{$partner.xoopartners_image_link}>');
    }

    .xoopartners-image-partner <{$partner.xoopartners_id}> {
        background-image: url('<{$partner.xoopartners_image_link}>');
    }

    .partner <{$partner.xoopartners_id}> {
    <{if $partner.xoopartners_image != "blank.gif"}> padding-left: <{$xoopartners_partner.image_width}>px;
        margin-left: 10px;
    <{/if}> min-height: <{$xoopartners_partner.image_height}>px;
    }

    <{/if}>
    .partnerImage {
        min-height: <{$xoopartners_partner.image_height}>px;
    }

    .partnerImage img {
        max-width: <{$xoopartners_partner.image_width}>px;
    }
</style>
