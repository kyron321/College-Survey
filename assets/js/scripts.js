function toggleDropdown(id) {
    var dropdown = document.getElementById('dropdown-' + id);
    var chevron = document.getElementById('chevron-' + id);
    if (dropdown.style.display === 'none') {
        dropdown.style.display = 'block';
        chevron.classList.remove('fa-chevron-down');
        chevron.classList.add('fa-chevron-up');
    } else {
        dropdown.style.display = 'none';
        chevron.classList.remove('fa-chevron-up');
        chevron.classList.add('fa-chevron-down');
    }
}
document.addEventListener("DOMContentLoaded", function () {
    const userRoleDropdown = document.getElementById("user-role");
    const otherRoleContainer = document.getElementById("other-role-container");
    const otherRoleInput = document.getElementById("other-role");

    if (userRoleDropdown && otherRoleContainer && otherRoleInput) {
        userRoleDropdown.addEventListener("change", function () {
            if (this.value === "Other") {
                otherRoleContainer.style.display = "block";
                otherRoleInput.required = true; 
            } else {
                otherRoleContainer.style.display = "none";
                otherRoleInput.required = false; 
                otherRoleInput.value = ""; 
            }
        });
    } else {
        console.error("One or more elements not found in the DOM.");
    }
});

jQuery(document).ready(function ($) {
    let isSubmitting = false; 

    $('#commentform').off('submit.customSubmit').on('submit.customSubmit', function (e) {
        e.preventDefault(); 
        e.stopImmediatePropagation();
        if (isSubmitting) {
            return false;
        }
        isSubmitting = true; 
        const form = $(this);
        const formData = form.serialize(); 
        form.find('input[type="submit"]').prop('disabled', true);
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: formData,
            success: function (response) {
                if ($('.feedback-notice').length === 0) {
                    form.after('<p class="feedback-notice" style="color: green; margin: 10px 0;">Your feedback has been submitted successfully and is pending moderation.</p>');
                }
                form.find('textarea').val('');
                form.find('input:not([type="submit"])').val('');
            },
            error: function () {
               
                alert('An error occurred while submitting your feedback. Please try again.');
            },
            complete: function () {
                isSubmitting = false; 
                form.find('input[type="submit"]').prop('disabled', false);
            }
        });
        return false; 
    });
});


