 <!-- Bootstrap core JavaScript -->
 <script src="vendor/jquery/jquery.min.js"></script>
 <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

 <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
 <script src="js/posts.js"></script>
 <script src="js/categories.js"></script>
 <script src="js/users.js"></script>


 <script>
$(document).ready(function() {
    //  loader
    var div_box = "<div id='load-screen'><div id='loading'></div></div>";

    $("body").prepend(div_box);

    $('#load-screen').delay(1500).fadeOut(600, function() {
        $(this).remove();
    });
});

// Menu Toggle Script
$(".sidebar-dropdown > a").click(function() {
    $(".sidebar-submenu").slideUp(200);
    if (
        $(this)
        .parent()
        .hasClass("active")
    ) {
        $(".sidebar-dropdown").removeClass("active");
        $(this)
            .parent()
            .removeClass("active");
    } else {
        $(".sidebar-dropdown").removeClass("active");
        $(this)
            .next(".sidebar-submenu")
            .slideDown(200);
        $(this)
            .parent()
            .addClass("active");
    }
});

$("#close-sidebar").click(function() {
    $(".page-wrapper").removeClass("toggled");
});
$("#show-sidebar").click(function() {
    $(".page-wrapper").addClass("toggled");
});
 </script>


 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <!-- <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
 <script type="text/javascript">
google.charts.load('current', {
    packages: ['corechart', 'bar']
});
google.charts.setOnLoadCallback(load_monthwise_data);

function load_monthwise_data() {
    $.ajax({
        url: "getData.php",
        dataType: "JSON",
        async: false,
        success: function(data) {
            drawMonthwiseChart(data);
        }
    });
}

function drawMonthwiseChart(chart_data) {
    var jsonData = chart_data;
    var data = new google.visualization.DataTable();
    data.addColumn('string', '');
    data.addColumn('number', 'Count');
    $.each(jsonData, function(i, jsonData) {
        var month = jsonData.text;
        var profit = parseFloat($.trim(jsonData.count));
        data.addRows([
            [month, profit]
        ]);
    });
    var options = {
        chart: {
            title: 'Statistics',
            subtitle: 'Current count',
        },
        colors: ['#1b9e77'],
        animation: {
            duration: 5000,
            easing: 'out',
        }

    };

    //var chart = new google.visualization.ColumnChart(document.getElementById('columnchart_material'));
    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
    chart.draw(data, google.charts.Bar.convertOptions(options));
}
 </script>
 </body>

 </html>