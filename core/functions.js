function hideSidebar() {
    $('#menu_button').css('left', "-24%")
                    .find('input')
                        .attr("value", "show");
    $('#big_menu').css('left', "-24%");
}
function showSidebar() {
    $('#menu_button').css('left', "0")
                    .find('input')
                        .attr("value", "hide");
    $('#big_menu').css('left', "0");
}

function onMenuClicked() {
    if ($('#menu_button').find('input').attr("value") == "hide") {
        hideSidebar();
    } else {
        showSidebar();
    }
}