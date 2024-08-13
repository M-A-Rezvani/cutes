function getCookie(name) {
    let matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}
const btnSwitch = document.getElementById("btnSwitch");
const sun = document.getElementById("sun");
const moon = document.getElementById("moon");
const html = document.querySelector("html");
const quotes = document.querySelectorAll('.quote');

let theme = getCookie("data_bs_theme");

if (theme == null) {
    if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        theme = 'dark';
    } else {
        theme = 'light';
    }
}

if (theme == 'dark') {
    sun.style.display = 'inline';
    moon.style.display = 'none';
} else {
    sun.style.display = 'none';
    moon.style.display = 'inline';
}

html.setAttribute("data-bs-theme", theme)
for (var i = 0; i < quotes.length; i++) {
    if (theme == 'dark') {
        quotes[i].setAttribute('data-bs-theme', 'light');
    } else {
        quotes[i].setAttribute('data-bs-theme', 'dark');
    }
}

btnSwitch.addEventListener("click", () => {
    if (theme == 'light') {
        theme = "dark";
        sun.style.display = 'inline';
        moon.style.display = 'none';
    } else {
        theme = "light";
        sun.style.display = 'none';
        moon.style.display = 'inline';
    }
    html.setAttribute("data-bs-theme", theme)
    for (var i = 0; i < quotes.length; i++) {
        if (theme == 'dark') {
            quotes[i].setAttribute('data-bs-theme', 'light');
        } else {
            quotes[i].setAttribute('data-bs-theme', 'dark');
        }
    }
    document.cookie = `data_bs_theme=${theme}; expires=${new Date(new Date().getTime()+1000*60*60*24*365).toGMTString()}; path=/`;
});