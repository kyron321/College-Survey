jQuery(document).ready(function ($) {
    function filterColleges() {
        var filter = $('#filter-form, .sort-by form' || '#filter-form-mobile, .sort-by form').serialize();
        var searchQuery = $('#college-search').val();

        $.ajax({
            url: ajaxfilter.ajaxurl,
            data: filter + '&search=' + searchQuery + '&action=filter_colleges',
            type: 'POST',
            success: function (data) {
                $('#main').html(data);
            },
            error: function (xhr, status, error) {
                console.error('AJAX request failed:', status, error);
            }
        });
    }

    $('#filter-form' || 'filter-form-mobile').on('change', '.filter-input', function () {
        filterColleges();
    });


    $('.sort-by').on('change', '#sort_order', function () {
        filterColleges();
    });


    $('#college-search').on('input', function () {
        filterColleges();
    });

    $('#accredited_no').on('change', function () {
        if ($(this).is(':checked')) {
            $('#accredited_yes').prop('checked', false);
        }
    });


    $('#religious_yes').on('change', function () {
        if ($(this).is(':checked')) {
            $('#religious_no').prop('checked', false);
        }
    });

    $('#religious_no').on('change', function () {
        if ($(this).is(':checked')) {
            $('#religious_yes').prop('checked', false);
        }
    });

    $('#type_1_public').on('change', function () {
        if ($(this).is(':checked')) {
            $('#type_1_private').prop('checked', false);
        }
    });

    $('#type_1_private').on('change', function () {
        if ($(this).is(':checked')) {
            $('#type_1_public').prop('checked', false);
        }
    });


    $('#clear-filters').on('click', function (e) {
        e.preventDefault();
        $('#filter-form')[0].reset();
        filterColleges();
    });
});

// mobile version
jQuery(document).ready(function ($) {
    function filterColleges() {
        var filter = $('#filter-form-mobile, .sort-by form').serialize();
        var searchQuery = $('#college-search-mobile').val();

        $.ajax({
            url: ajaxfilter.ajaxurl,
            data: filter + '&search=' + searchQuery + '&action=filter_colleges',
            type: 'POST',
            success: function (data) {
                $('#main').html(data);
            },
            error: function (xhr, status, error) {
                console.error('AJAX request failed:', status, error);
            }
        });
    }

    $('#filter-form-mobile').on('change', '.filter-input', function () {
        filterColleges();
    });


    $('.sort-by').on('change', '#sort_order', function () {
        filterColleges();
    });


    $('#college-search-mobile').on('input', function () {
        filterColleges();
    });

    $('#accredited_no').on('change', function () {
        if ($(this).is(':checked')) {
            $('#accredited_yes').prop('checked', false);
        }
    });


    $('#religious_yes').on('change', function () {
        if ($(this).is(':checked')) {
            $('#religious_no').prop('checked', false);
        }
    });

    $('#religious_no').on('change', function () {
        if ($(this).is(':checked')) {
            $('#religious_yes').prop('checked', false);
        }
    });

    $('#type_1_public').on('change', function () {
        if ($(this).is(':checked')) {
            $('#type_1_private').prop('checked', false);
        }
    });

    $('#type_1_private').on('change', function () {
        if ($(this).is(':checked')) {
            $('#type_1_public').prop('checked', false);
        }
    });


    $('#clear-filters-mobile').on('click', function (e) {
        e.preventDefault();
        $('#filter-form-mobile')[0].reset();
        filterColleges();
    });
});