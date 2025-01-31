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

// switch mode
const switchMode = document.getElementById("switch-mode");

switchMode.addEventListener("change", function () {
  if (this.checked) {
    document.body.classList.add("dark");
  } else {
    document.body.classList.remove("dark");
  }
});

//dropdown mitra
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

//scroll sub po
const scrollMenu = document.querySelector(".scroll-menu");
const scrollLeft = document.getElementById("scrollLeft");
const scrollRight = document.getElementById("scrollRight");

scrollRight.addEventListener("click", () => {
  scrollMenu.scrollBy({
    left: 300,
    behavior: "smooth",
  });
});

scrollLeft.addEventListener("click", () => {
  scrollMenu.scrollBy({
    left: -300,
    behavior: "smooth",
  });
});

// hide ring-segment
// // Penanganan peristiwa klik pada setiap box-menu
// document.querySelectorAll('.box-menu').forEach(boxMenu => {
//     boxMenu.addEventListener('click', event => {
//         // Sembunyikan semua ring dan segment
//         document.querySelectorAll('.ring').forEach(ring => {
//             ring.style.display = 'none';
//         });
//         document.querySelectorAll('.segment').forEach(segment => {
//             segment.style.display = 'none';
//         });

//         // Tampilkan ring yang sesuai dengan box-menu yang diklik
//         const ringId = boxMenu.getAttribute('data-ring');
//         const ring = document.getElementById(ringId);
//         ring.style.display = 'block';
//     });
// });

// // Penanganan peristiwa klik pada setiap item ring
// document.querySelectorAll('.ring > .todo > .todo-list > a').forEach(ringLink => {
//     ringLink.addEventListener('click', event => {
//         // Ambil ID segment dari atribut data
//         const segmentId = ringLink.getAttribute('data-segment');
//         const segment = document.getElementById(segmentId);

//         // Sembunyikan semua div segment
//         document.querySelectorAll('.segment').forEach(seg => {
//             seg.style.display = 'none';
//         });

//         // Tampilkan div segment yang sesuai
//         if (segment) {
//             segment.style.display = 'block';
//         }

//         // Hentikan default action dari link
//         event.preventDefault();
//     });
// });

// Penanganan peristiwa klik pada setiap box-menu
document.addEventListener("DOMContentLoaded", function () {
  const boxMenus = document.querySelectorAll(".xlbox-menu");

  boxMenus.forEach((boxMenu) => {
    boxMenu.addEventListener("click", function (event) {
      event.preventDefault();

      const dataRing = this.getAttribute("xldata-ring");
      const todoLists = document.querySelectorAll(".xltodo-list");

      todoLists.forEach((todoList) => {
        const todoListId = todoList.getAttribute("id");
        if (todoListId === dataRing) {
          todoList.style.display = "block";
        } else {
          todoList.style.display = "none";
        }
      });
    });
  });
});

// Penanganan peristiwa klik pada setiap ring
document.addEventListener("DOMContentLoaded", function () {
  const segmentLinks = document.querySelectorAll("[data-segment]");

  segmentLinks.forEach((segmentLink) => {
    segmentLink.addEventListener("click", function (event) {
      event.preventDefault();

      const dataSegment = this.getAttribute("data-segment");
      const tableBodies = document.querySelectorAll(".segment tbody");

      tableBodies.forEach((tableBody) => {
        const tableBodyId = tableBody.getAttribute("id");
        if (tableBodyId === dataSegment) {
          tableBody.style.display = "table-row-group";
        } else {
          tableBody.style.display = "none";
        }
      });
    });
  });
});


// animasi border card PO
// JavaScript untuk menambahkan dan menghapus kelas selected pada card
const boxes = document.querySelectorAll('.box-menu');

boxes.forEach(box => {
    box.addEventListener('click', () => {
        // Menghapus kelas selected dari semua card
        boxes.forEach(otherBox => otherBox.classList.remove('selected'));
        
        // Menambahkan kelas selected pada card yang diklik
        box.classList.add('selected');
    });
});

