$(document).ready(function() {
    // Listen for changes in the "province" select box
    $('#province').on('change', function() {
        var province_id = $(this).val();
        if (province_id) {
            // If a province is selected, fetch the districts for that province using AJAX
            $.ajax({
                url: 'ajax_get_district.php',
                method: 'GET',
                dataType: "json",
                data: {
                    province_id: province_id
                },
                success: function(data) {
                    $('#district').empty();
                    $('#wards').empty();
                    $('#district').append($('<option>', {
                        value: '',
                        text: 'Chọn một quận/huyện'
                    }));
                    $.each(data, function(i, district) {
                        $('#district').append($('<option>', {
                            value: district.id,
                            text: district.name
                        }));
                    });
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log('Error: ' + errorThrown);
                }
            });
        } else {
            // If no province is selected, clear the options in the "district" and "wards" select boxes
            $('#district').empty();
            $('#wards').empty();
        }
    });

    // Listen for changes in the "district" select box
    $('#district').on('change', function() {
        var district_id = $(this).val();
        if (district_id) {
            // If a district is selected, fetch the wards for that district using AJAX
            $.ajax({
                url: 'ajax_get_wards.php',
                method: 'GET',
                dataType: "json",
                data: {
                    district_id: district_id
                },
                success: function(data) {
                    $('#wards').empty();
                    $('#wards').append($('<option>', {
                        value: '',
                        text: 'Chọn một xã/phường'
                    }));
                    $.each(data, function(i, wards) {
                        $('#wards').append($('<option>', {
                            value: wards.id,
                            text: wards.name
                        }));
                    });
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log('Error: ' + errorThrown);
                }
            });
        } else {
            // If no district is selected, clear the options in the "wards" select box
            $('#wards').empty();
        }
    });
});
