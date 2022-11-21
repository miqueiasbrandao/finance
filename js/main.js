function loading2(link) { //com modal
    var page = document.getElementById('page');
    page.classList.add('desfoque-full');

    setTimeout(() => {
        window.location.href=(link)
    }, 0);
}