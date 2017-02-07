function init()
{
    var hgt = $(".blog-post-meta").parent().height();
    $(".blog-post-meta").css(
        {
            "height":      hgt + "px",
            "line-height": hgt + "px",
        });
}

window.onload = function()
{
    init();
}

window.onresize = function()
{
    init();
}

$('button[data-target=".del-dry-cfm-dlg"]').click(function()
{
    var md5 = $(this).parents(".dry-ctl").first().find("input[name='dryMd5Hid']").val();
    $(".del-dry-cfm-dlg button[role='confirmDel'] input[type='hidden']").val(md5);
});

$(".del-dry-cfm-dlg button[role='confirmDel']").click(function()
{
    window.location = "deldry?md5=" + $(this).find("input[type='hidden']").val();
});