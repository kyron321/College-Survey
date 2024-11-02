jQuery(document).ready(function($) {
    function filterColleges() {
        var filter = $('#filter-form').serialize();

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
});