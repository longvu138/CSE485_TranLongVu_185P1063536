$(document).ready(function() {
    $(".province").change(function() {
        var idprovince = $(".province").val();
        // alert(idprovince);
        $.post("province.php", { idprovince: idprovince },
            function(data) {
                $(".district").html(data);
            },

        );

    })
    $(".district").change(function() {
        var iddistrict = $(".district").val();
        // alert(iddistrict);
        $.post("district.php", { districtid: iddistrict },
            function(data) {
                $(".ward").html(data);
            },

        );

    })
    $(".ward").change(function() {
        var idward = $(".ward").val();
        // alert(idward);
        $.post("ward.php", { wardid: idward },
            function(data) {
                $(".village").html(data);
            },

        );

    })
});