<div class="like-dislike floatright">
    <button id="button-container-like" class="option" value="1" title="<{$smarty.const._XOO_PARTNERS_LIKE}>"><i class="thumbs-up"></i>

        <div class="like"><{$partner.xoopartners_like}></div>
    </button>
    <button id="button-container-unlike" class="option" value="0" title="<{$smarty.const._XOO_PARTNERS_DISLIKE}>"><i class="thumbs-down"></i>

        <div class="dislike"><{$partner.xoopartners_dislike}></div>
    </button>
    <input type="hidden" id="partner_id" value="<{$partner.xoopartners_id}>">
</div>

<script language="javascript">
    <!--
    $(".option").click(function () {

        var option = $(this).val();
        var item = $("#partner_id").val();
        var token = "<{$security}>";

        $.ajax({
            type   : "POST",
            url    : "partner_like_dislike.php",
            data   : "option=" + option + "&partner_id=" + item + "&XOOPS_TOKEN_REQUEST=" + token,
            success: function (responce) {
                var json = jQuery.parseJSON(responce);
                //alert( json.error );
                if (json.error == "0") {
                    if (option == "1") {
                        $(".like").tpl(json.xoopartners_like);
                    } else {
                        $(".dislike").tpl(json.xoopartners_dislike);
                    }
                }
            }
        });
    });
    //-->
</script>
