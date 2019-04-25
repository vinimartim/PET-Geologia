var campoFiltro = document.querySelector("#search");

campoFiltro.addEventListener("input", function() {
    var users = document.querySelectorAll(".tr-class");

    if (this.value.length > 0) {
        for (var i = 0; i < users.length; i++) {
            var user = users[i];
            var tdName = user.querySelector(".td-info");
            var name = tdName.textContent;
            var regexp = new RegExp(this.value, "i");

            if (!regexp.test(name)) {
                user.classList.add("invisible");
            } else {
                user.classList.remove("invisible");
            }
        }
    } else {
        for (var i = 0; i < users.length; i++) {
            var user = users[i];
            user.classList.remove("invisible");
        }
    }
});