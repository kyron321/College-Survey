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

document.addEventListener('DOMContentLoaded', function () {
    const openFiltersButton = document.querySelector('.open-filters-button');
    const closeFiltersButton = document.querySelector('.close-filters-button');
    const filtersModal = document.getElementById('filters-modal');

    // Ensure elements exist before adding event listeners
    if (openFiltersButton && closeFiltersButton && filtersModal) {
        // Function to show the modal
        function showModal() {
            filtersModal.style.display = 'block'; // Make the modal visible
            setTimeout(() => {
                filtersModal.classList.add('show'); // Trigger the slide-in animation
            }, 10); // Small delay to allow the browser to register the display change
        }

        // Function to hide the modal
        function hideModal() {
            filtersModal.classList.remove('show'); // Trigger the slide-out animation
            setTimeout(() => {
                filtersModal.style.display = 'none'; // Hide the modal after animation
            }, 800); // Match this to your CSS transition duration (0.8s)
        }

        // Open modal when the button is clicked
        openFiltersButton.addEventListener('click', showModal);

        // Close modal when the close button is clicked
        closeFiltersButton.addEventListener('click', hideModal);

        // Optional: Close modal when clicking outside of the modal content
        window.addEventListener('click', function (event) {
            if (event.target === filtersModal) {
                hideModal();
            }
        });
    } 
});


document.addEventListener('DOMContentLoaded', () => {
    const controls = document.querySelector('.controls');

    // Check if the controls element exists before proceeding
    if (controls) {
        window.addEventListener('scroll', () => {
            const controlsTop = controls.getBoundingClientRect().top;

            if (controlsTop <= 0) {
                controls.classList.add('sticky');
            } else {
                controls.classList.remove('sticky');
            }
        });
    }
});






