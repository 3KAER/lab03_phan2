function displayCookies() {
    var cookies = document.cookie.split("; ");
    var cookieList = document.getElementById("cookie-list");
    cookieList.innerHTML = "";
    cookies.forEach(function(cookie) {
        var parts = cookie.split("=");
        var name = parts[0];
        var value = parts[1];
        var listItem = document.createElement("div");
        listItem.textContent = name + ": " + value;
        listItem.classList.add("cookie-item");
        listItem.onclick = function() {
            document.getElementById("cookie-name").value = name;
            document.getElementById("cookie-value").value = value;
        };
        cookieList.appendChild(listItem);
    });
}

function addCookie() {
    var name = document.getElementById("cookie-name").value;
    var value = document.getElementById("cookie-value").value;
    document.cookie = name + "=" + value;
    displayCookies();
}

function editCookie() {
    var name = document.getElementById("cookie-name").value;
    var value = document.getElementById("cookie-value").value;
    document.cookie = name + "=" + value;
    displayCookies();
}

function deleteCookie() {
    var name = document.getElementById("cookie-name").value;
    if (document.cookie.split(";").some((cookie) => cookie.trim().startsWith(name + "="))) {
        document.cookie = "name = alo; expires=Thu, 18 Dec 2018 12:00:00 UTC; path=/";
        displayCookies();
    } else {
        alert("Cookie không tồn tại!");
    }
} 

displayCookies();
