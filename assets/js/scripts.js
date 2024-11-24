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
});
