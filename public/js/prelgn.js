function init()
{
    $(".bkgd-img").css("width", $(document).width());
    $(".bkgd-img").css("height", $(document).height());

    var hgt = $(".lgn-pnl form").height();
    hgt += parseInt($(".lgn-pnl").css("padding-top"));
    hgt += parseInt($(".lgn-pnl").css("padding-bottom"));
    hgt += parseInt($(".lgn-pnl form").css("margin-top"));
    hgt += parseInt($(".lgn-pnl form").css("margin-bottom"));
    hgt += parseInt($(".lgn-pnl form").css("padding-top"));
    hgt += parseInt($(".lgn-pnl form").css("padding-bottom"));
    $(".lgn-pnl").css("height", hgt);
    $(".lgn-blk").css("height", hgt);
    $(".lgn-blk-edge").css("height", hgt);
}

window.onload = function()
{
    init();
}
window.onresize = function()
{
    init();
}