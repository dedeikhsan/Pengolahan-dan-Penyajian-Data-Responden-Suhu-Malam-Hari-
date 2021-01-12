//Navbar Scroll
window.addEventListener("scroll", function () {
    let menuArea = document.getElementById('menu')

    if (window.pageYOffset > 0) {
        menuArea.classList.add("cus-nav");
    } else {
        menuArea.classList.remove("cus-nav");
    }
})

$('.page-scroll').on('click', function (e) {

    //ambil isi href
    var tujuan = $(this).attr('href');
    //tangkap elemen ybs
    var elemenTujuan = $(tujuan);

    //pindahkan scroll
    $('html, body').animate({
        scrollTop: elemenTujuan.offset().top - 80
    }, 1250, 'easeInOutExpo');

    e.preventDefault();

});
