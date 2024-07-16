window.addEventListener("load", (event) => {
  function checkAndRemoveSelectedClass() {
    var elements = document.querySelectorAll(".selected");
    if (window.innerWidth <= 1160) {
      elements.forEach(function (element) {
        element.classList.remove("selected");
      });
    }
  }

  checkAndRemoveSelectedClass();
  window.addEventListener("resize", function () {
    checkAndRemoveSelectedClass();
    document.querySelectorAll(".carousel-column").forEach((element) => {
      element.removeEventListener("click", handleClick);
    });
  });

  function handleClick(e) {
    document.querySelectorAll(".carousel-column").forEach((element) => {
      element.classList.remove("selected");
    });
    e.currentTarget.classList.add("selected");
  }

  document.querySelectorAll(".carousel-column").forEach((element) => {
    element.addEventListener("click", handleClick);
  });
});
