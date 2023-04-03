document.addEventListener('scroll', function (e) {
    if (document.body.scrollTop > 100) {
        var currScrollPos2 = document.body.scrollTop;
        document.getElementById('header').style.opacity = -currScrollPos2 / 100 + 2.5;
    }
});

function openMenuMobile() {
    document.querySelector('.navbar').classList.add('open');
}

function closeMenuMobile() {
    document.querySelector('.navbar').classList.remove('open');
}



