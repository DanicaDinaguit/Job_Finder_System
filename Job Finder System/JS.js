$("document").ready(function() {
    function searchLocation() {
        let book = $("input[name='location']").val();
        $.post("hire.php", {
            search: search
        }, function(data, status) {
            $("#test").html(data).show();
            $("li a").click(function() {
                $("input[name='location']").val($(this).text());
                searchLocation();
            });
        });
    }

    $("input[name='location']").on("input", function() {
        searchLocation();
    });
});