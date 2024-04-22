document.addEventListener('DOMContentLoaded', function() {
    displayCookies();

    const form = document.getElementById('cookie-form');
    const addButton = document.getElementById('add-button');
    const editButton = document.getElementById('edit-button');

    addButton.addEventListener('click', function(event) {
        event.preventDefault();
        const name = form.name.value;
        const value = form.value.value;
        setCookie(name, value);
        displayCookies();
        form.reset();
    });

    editButton.addEventListener('click', function(event) {
        event.preventDefault();
        const name = form.name.value;
        const value = form.value.value;
        editCookie(name, value);
        displayCookies();
        form.reset();
        addButton.classList.remove('d-none');
        editButton.classList.add('d-none');
    });

    const cookieList = document.getElementById('cookie-list');
    cookieList.addEventListener('click', function(event) {
        if (event.target.classList.contains('edit-btn')) {
            const name = event.target.dataset.name;
            const value = event.target.dataset.value;
            form.name.value = name;
            form.value.value = value;
            addButton.classList.add('d-none');
            editButton.classList.remove('d-none');
        } else if (event.target.classList.contains('delete-btn')) {
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

function editCookie(name, value) {
    deleteCookie(name);
    setCookie(name, value);
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
                <div class="cookie-item">
                    <span class="cookie-info"><strong>${decodeURIComponent(name)}</strong>: ${decodeURIComponent(value)}</span>
                    <button class="btn btn-sm btn-info edit-btn" data-name="${decodeURIComponent(name)}" data-value="${decodeURIComponent(value)}">Sửa</button>
                    <button class="btn btn-sm btn-danger delete-btn" data-name="${decodeURIComponent(name)}">Xóa</button>
                </div>
            `;
        });
    }
}
