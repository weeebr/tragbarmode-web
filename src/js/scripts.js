document.querySelector('.mobile-nav').onclick = function toggleNav() {
    var x = document.getElementById('toggle'); // eslint-disable-line no-var
    if (x.style.display !== 'flex') {
        x.style.display = 'flex';
    } else {
        x.style.display = 'none';
    }
};
