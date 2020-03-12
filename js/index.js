var myVar;

function myFunction() {
    myVar = setTimeout(showPage, 2000);
}

function showPage() {
    document.getElementById("loader").style.display = "none";
    document.getElementById("myDiv").style.display = "block";
}


$(document).ready(function () {
    $(window).scroll(function () {
        var sticky = $('.main-nav');
        var navbars = $('.navbar');
        scroll = $(window).scrollTop();

        if (scroll >= 100) {
            sticky.addClass('sticky-top');
            sticky.addClass('bg-white');
        }
        else {
            sticky.removeClass('sticky-top');
        }

    });

    $(window).scroll(function () {

        var position = $(window).scrollTop();
        var bottom = $(document).height() - $(window).height();

        if (position == bottom) {

            var row = Number($('#row').val());
            var allcount = Number($('#all').val());
            var rowperpage = 3;
            row = row + rowperpage;

            if (row <= allcount) {
                $('#row').val(row);
                $.ajax({
                    url: 'fetch-posts.php',
                    type: 'post',
                    data: { row: row },
                    success: function (response) {
                        $(".post:last").after(response).show().fadeIn("slow");
                    }
                });
            }
        }

    });


});