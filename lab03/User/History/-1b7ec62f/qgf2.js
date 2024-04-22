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
    if (name.trim() === "") {
        alert("Vui lòng nhập tên cookie.");
        return;
    }
    window.location.href = "index1.html?" + name; // Chuyển hướng đến trang delete-cookie.html với tham số là tên cookie cần xóa
}


displayCookies();
