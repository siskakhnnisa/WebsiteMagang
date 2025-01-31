const allSideMenu = document.querySelectorAll("#sidebar .side-menu.top li a");

allSideMenu.forEach((item) => {
  const li = item.parentElement;

  item.addEventListener("click", function () {
    allSideMenu.forEach((i) => {
      i.parentElement.classList.remove("active");
    });
    li.classList.add("active");
  });
});

// TOGGLE SIDEBAR
const menuBar = document.querySelector("#content nav .bx.bx-menu");
const sidebar = document.getElementById("sidebar");

menuBar.addEventListener("click", function () {
  sidebar.classList.toggle("hide");
});

//Search Button
const searchButton = document.querySelector(
  "#content nav form .form-input button"
);
const searchButtonIcon = document.querySelector(
  "#content nav form .form-input button .bx"
);
const searchForm = document.querySelector("#content nav form");

searchButton.addEventListener("click", function (e) {
  if (window.innerWidth < 576) {
    e.preventDefault();
    searchForm.classList.toggle("show");
    if (searchForm.classList.contains("show")) {
      searchButtonIcon.classList.replace("bx-search", "bx-x");
    } else {
      searchButtonIcon.classList.replace("bx-x", "bx-search");
    }
  }
});

if (window.innerWidth < 768) {
  sidebar.classList.add("hide");
} else if (window.innerWidth > 576) {
  searchButtonIcon.classList.replace("bx-x", "bx-search");
  searchForm.classList.remove("show");
}

window.addEventListener("resize", function () {
  if (this.innerWidth > 576) {
    searchButtonIcon.classList.replace("bx-x", "bx-search");
    searchForm.classList.remove("show");
  }
});

//Switch Mode
const switchMode = document.getElementById("switch-mode");
switchMode.addEventListener("change", function () {
  if (this.checked) {
    document.body.classList.add("dark");
  } else {
    document.body.classList.remove("dark");
  }
});

//Card Thing
const cards = document.querySelectorAll(".box-info div");
cards.forEach((card) => {
  card.addEventListener("click", () => {
    cards.forEach((c) => c.classList.remove("selected"));
    card.classList.add("selected"); 
  });
});



// Tambahkan event listener untuk setiap kategori
categoryBlocks.forEach((categoryBlock) => {
  categoryBlock.addEventListener("click", function (event) {
    event.preventDefault();
    const category = categoryBlock.querySelector("span").textContent.trim();
    showData(category);
  });
});

// Saat pertama kali halaman dimuat, tampilkan pesan "Silahkan Pilih Kategori Terlebih Dahulu"
showData(null);


// Upload File
const fileArea = document.querySelector(".file-area");
const inputFile = document.getElementById("formFile");

imgArea.addEventListener("click", function () {
  inputFile.click();
});

// Galeri
const search = document.querySelector(".search-box input"),
  images = document.querySelectorAll(".image-box");
search.addEventListener("keyup", (e) => {
  if (e.key == "Enter") {
    let searcValue = search.value,
      value = searcValue.toLowerCase();
    images.forEach((image) => {
      if (value === image.dataset.name) {
        //matching value with getting attribute of images
        return (image.style.display = "block");
      }
      image.style.display = "none";
    });
  }
});
search.addEventListener("keyup", () => {
  if (search.value != "") return;
  images.forEach((image) => {
    image.style.display = "block";
  });
});

//Dropdown Mitra
document.addEventListener("DOMContentLoaded", function () {
  const dropdownToggle = document.querySelector(".dropdown-toggle");

  dropdownToggle.addEventListener("click", function () {
    const dropdownMenu = this.nextElementSibling;
    dropdownMenu.classList.toggle("show");
  });

  // Close the dropdown menu if the user clicks outside of it
  window.addEventListener("click", function (event) {
    if (!event.target.matches(".dropdown-toggle")) {
      const dropdowns = document.querySelectorAll(".dropdown-menu");
      dropdowns.forEach(function (dropdown) {
        if (dropdown.classList.contains("show")) {
          dropdown.classList.remove("show");
        }
      });
    }
  });
});




