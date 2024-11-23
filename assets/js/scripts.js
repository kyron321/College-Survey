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
