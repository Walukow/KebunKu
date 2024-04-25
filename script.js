document.getElementById('toggle-menu').addEventListener('click', function () {
    var navbar = document.querySelector('.navbar');
    if (navbar.style.maxHeight) {
        navbar.style.maxHeight = null;
    } else {
        navbar.style.maxHeight = "163px";
    }
});

document.addEventListener("DOMContentLoaded", function() {
    const observerNewProduk = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("animasiAktif");
            }
        });
    }, { threshold: 0.9 });

    document.querySelectorAll('.newproduk').forEach((e) => {
        observerNewProduk.observe(e);
    });

    const observerAkanKeKiri = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("kananKiri");
            }
        });
    }, { threshold: 0.9 });

    document.querySelectorAll('.akanKeKiri').forEach((e) => {
        observerAkanKeKiri.observe(e);
    });

    const observerAkanKeKanan = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("kiriKanan");
            }
        });
    }, { threshold: 0.9 });

    document.querySelectorAll('.akanKeKanan').forEach((e) => {
        observerAkanKeKanan.observe(e);
    });
});

