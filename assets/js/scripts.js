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

    if (openFiltersButton && closeFiltersButton && filtersModal) {
        function showModal() {
            filtersModal.style.display = 'block';
            setTimeout(() => {
                filtersModal.classList.add('show'); 
            }, 10);
        }

        function hideModal() {
            filtersModal.classList.remove('show'); 
            setTimeout(() => {
                filtersModal.style.display = 'none'; 
            }, 800); 
        }

        openFiltersButton.addEventListener('click', showModal);
        closeFiltersButton.addEventListener('click', hideModal);

        window.addEventListener('click', function (event) {
            if (event.target === filtersModal) {
                hideModal();
            }
        });
    } 
});

document.addEventListener('DOMContentLoaded', function() {
    const openModalBtn = document.getElementById('openModalBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const filtersModal = document.getElementById('filtersModal');
    const modalOverlay = document.getElementById('modalOverlay');

    function showModal() {
        filtersModal.classList.remove('hide'); 
        filtersModal.style.display = 'block'; 
        modalOverlay.style.display = 'block'; 
        document.body.classList.add('no-scroll'); 
        console.log('Added no-scroll class');
        setTimeout(() => {
            filtersModal.classList.add('show'); 
            modalOverlay.classList.add('show');
        }, 10); 
    }

    function hideModal() {
        filtersModal.classList.remove('show'); 
        filtersModal.classList.add('hide'); 
        modalOverlay.classList.remove('show'); 
        document.body.classList.remove('no-scroll');

        setTimeout(() => {
            filtersModal.style.display = 'none'; 
            modalOverlay.style.display = 'none'; 
        }, 600); 
    }

    openModalBtn.addEventListener('click', showModal);
    closeModalBtn.addEventListener('click', hideModal);
    modalOverlay.addEventListener('click', hideModal);
});

// write a script which gets the value of the select user_role id and if the value is Student, remove the display none style and make it display block
document.addEventListener('DOMContentLoaded', function() {
    const userRoleSelect = document.getElementById('user_role');
    const studentStatusContainer = document.querySelector('.comment-form-student-status');

    userRoleSelect.addEventListener('change', function() {
        if (this.value === 'student') {
            studentStatusContainer.style.display = 'block';
        } else {
            studentStatusContainer.style.display = 'none';
        }
    });
});






