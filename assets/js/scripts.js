function toggleDropdown(id) {
    const dropdown = document.getElementById(`dropdown-${id}`);
    const chevron = document.getElementById(`chevron-${id}`);

    if (dropdown.style.display === "none") {
        dropdown.style.display = "block"; // Show dropdown
        chevron.classList.remove("fa-chevron-down");
        chevron.classList.add("fa-chevron-up"); // Change to upward chevron
    } else {
        dropdown.style.display = "none"; // Hide dropdown
        chevron.classList.remove("fa-chevron-up");
        chevron.classList.add("fa-chevron-down"); // Change to downward chevron
    }
}