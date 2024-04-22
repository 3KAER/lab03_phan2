document.addEventListener('DOMContentLoaded', function() {
    displayCookies();

    const form = document.getElementById('cookie-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        const name = form.name.value;
        const value = form.value.value;
        setCookie(name, value);
        displayCookies();
        form.reset();
    });

    const cookieList = document.getElementById('cookie-list');
    cookieList.addEventListener('click', function(event) {
        if (event.target.classList.contains('delete')) {
            const name = event.target.dataset.name;
            deleteCookie(name);
            displayCookies();
        }
    });
});

function setCookie(name, value) {
    document.cookie = `${encodeURIComponent(name)}=${encodeURIComponent(value)}; path=/`;
}

function deleteCookie(name) {
    document.cookie = `${encodeURIComponent(name)}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`;
}

function displayCookies() {
    const cookies = document.cookie.split(';').map(cookie => cookie.trim());
    const cookieList = document.getElementById('cookie-list');
    cookieList.innerHTML = '<h2>Danh sách Cookie:</h2>';
    if (cookies[0] === '') {
        cookieList.innerHTML += '<p>Không có cookie nào.</p>';
    } else {
        cookies.forEach(cookie => {
            const [name, value] = cookie.split('=');
            cookieList.innerHTML += `
                <div>
                    <strong>${decodeURIComponent(name)}</strong>: ${decodeURIComponent(value)}
                    <button class="delete" data-name="${decodeURIComponent(name)}">Xóa</button>
                </div>
            `;
        });
    }
}
