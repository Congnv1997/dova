$(document).ready(function () {


    $("#btn-menu-main").click(function (e) {
        $("#nav").toggleClass("active-block");

        $(this).addClass("active");
        e.stopPropagation();
    });

    $(".menu-sub").click(function (e) {
        e.stopPropagation();
    });

    $("body").click(function () {
       

    });


});