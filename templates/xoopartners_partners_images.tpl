<{foreach from=$partners item=partner name=foo}>
<div class="partnerImage txtcenter">
    <a href="<{$partner.xoopartners_link}>" title="<{$partner.xoopartners_title}>"><img class="itemImage" src="<{$partner.xoopartners_image_link}>" alt="<{$partner.xoopartners_title}>"></a>

    <div class="txtcenter">
        <a href="<{$partner.xoopartners_link}>" title="<{$partner.xoopartners_title}>"><{$partner.xoopartners_title}></a>
    </div>
</div>
<{/foreach}>
