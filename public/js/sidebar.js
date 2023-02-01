    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    let welcome = document.querySelector(".welcome");
    sidebarBtn.onclick = function () {
    sidebar.classList.toggle("active");
    if (sidebar.classList.contains("active")) {
    sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
    welcome.style.display = "none";
} else {
    sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    welcome.style.display = "block";
}
};