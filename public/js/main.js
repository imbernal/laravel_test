$(document).ready(function () {

    $('input[name="daterange"]').daterangepicker({
        locale: {
            format: 'YYYY-MM-DD'
        }
    });



    $(".makeRequest").click(function () {

        window.location.href = '/payment';

    });

    $(".detail").click(function () {

        var id = $(this).data("room");

        $("#" + id).toggleClass("hideTable");
    });

    function getTaxes(price) {
        console.log(price);
        console.log("price");

    }

    $(".btnRooms").click(function () {

        var id = $(this).data("room");

        $("#" + id).fadeToggle();
    });
});

