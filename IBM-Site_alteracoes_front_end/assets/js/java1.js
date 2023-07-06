


var button = document.getElementById("action");
button.addEventListener("click", function() {
    var container = document.getElementById("sumiu");
    var computedStyle = window.getComputedStyle(container);

    if (computedStyle.display === "none") {
        container.style.display = "block";
        button.style.display = "none";
    } else {
        container.style.display = "none";
    }
});

var button1 = document.getElementById("action1");
button1.addEventListener("click", function() {
    var container = document.getElementById("sumiu");
    var computedStyle = window.getComputedStyle(container);

    if (computedStyle.display === "block") {
        container.style.display = "none";
        button.style.display = "block";
    } else {
        container.style.display = "none";
    }
});