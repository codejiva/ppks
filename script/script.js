// Namain title tiap page
let pageName = new URLSearchParams(window.location.search).get("page");
document.title = `Satgas PPKS | ${
  pageName.charAt(0).toUpperCase() + pageName.slice(1)
}`;

// toggleMenu() untuk membuka icon burger
function toggleMenu(params) {
  const menu = document.querySelector(".menu-links");
  const icon = document.querySelector(".burger-icon");
  menu.classList.toggle("open");
  icon.classList.toggle("open");
}

// navbar
window.addEventListener("scroll", function () {
  var nav = document.querySelector("nav");
  nav.classList.toggle("scrolled", window.scrollY > 0);
});

// balik ke hero tiap kali refresh
// harusnya gausa pake ini tapi gatau tiba-tiba error, jadi saya buat deh
window.onload = function() {
  window.scrollTo(0, document.getElementById("hero").offsetTop);
}

//

// const navLinks = document.getElementById('nav-links');

// navLinks.addEventListener('click', function(event) {
//     const targetPage = event.target.getAttribute('href').replace('../client/pages/', '');
//     window.history.pushState({ path: targetPage }, '', `index.php?page=${targetPage}`);
//     loadContent(targetPage);
//     event.preventDefault();
// });

// function loadContent(page) {
//     fetch(`../client/pages/${page}`)
//         .then(response => response.text())
//         .then(data => {
//             document.querySelector('main').innerHTML = data;
//         });
// }

//

