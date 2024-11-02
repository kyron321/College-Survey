jQuery(document).ready(function($) {
    function filterColleges() {
        var filter = $('#filter-form, .sort-by form').serialize();

        $.ajax({
            url: ajaxfilter.ajaxurl,
            data: filter + '&action=filter_colleges',
            type: 'POST',
            success: function(data) {
                $('#main').html(data);
            },
            error: function(xhr, status, error) {
                console.error('AJAX request failed:', status, error);
            }
        });
    }

    // Trigger filter on input change
    $('#filter-form').on('change', '.filter-input', function() {
        filterColleges();
    });

    // Trigger filter on sort order change
    $('.sort-by').on('change', '#sort_order', function() {
        filterColleges();
    });

    // Uncheck the other checkbox when one is selected for "accredited"
    $('#accredited_yes').on('change', function() {
        if ($(this).is(':checked')) {
            $('#accredited_no').prop('checked', false);
        }
    });

    $('#accredited_no').on('change', function() {
        if ($(this).is(':checked')) {
            $('#accredited_yes').prop('checked', false);
        }
    });

    // Uncheck the other checkbox when one is selected for "religious"
    $('#religious_yes').on('change', function() {
        if ($(this).is(':checked')) {
            $('#religious_no').prop('checked', false);
        }
    });

    $('#religious_no').on('change', function() {
        if ($(this).is(':checked')) {
            $('#religious_yes').prop('checked', false);
        }
    });

    // Uncheck the other checkbox when one is selected for "type_1" (public/private)
    $('#type_1_public').on('change', function() {
        if ($(this).is(':checked')) {
            $('#type_1_private').prop('checked', false);
        }
    });

    $('#type_1_private').on('change', function() {
        if ($(this).is(':checked')) {
            $('#type_1_public').prop('checked', false);
        }
    });
});