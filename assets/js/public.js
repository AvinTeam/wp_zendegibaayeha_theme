jalaliDatepicker.startWatch({
    minDate: "attr",
    maxDate: "attr"
});

// آرایه‌های مربوط به اعداد
const western = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
const persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
const arabic = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];

// تابع تبدیل اعداد در متن
function convertNumbers(text) {
    western.forEach((digit, index) => {
        text = text.replace(new RegExp(digit, 'g'), persian[index]);
    });
    arabic.forEach((digit, index) => {
        text = text.replace(new RegExp(digit, 'g'), persian[index]);
    });
    return text;
}

// تابعی برای پیمایش در نودهای DOM و تغییر فقط نودهای متنی
function traverseAndConvert(node) {
    if (node.nodeType === Node.TEXT_NODE) {
        // تغییر متن نود
        node.nodeValue = convertNumbers(node.nodeValue);
    } else {
        // پیمایش در نودهای فرزند
        node.childNodes.forEach(child => traverseAndConvert(child));
    }
}

// اجرای تابع روی کل body صفحه
traverseAndConvert(document.body);



function startLoading() {
    var overlay = document.getElementById("overlay");

    if (overlay) {
        overlay.style.display = "flex"; // نمایش به صورت flex
        overlay.style.opacity = "0"; // آماده‌سازی برای افکت fadeIn
        overlay.style.transition = "opacity 0.5s ease-in-out"; // اضافه کردن انیمیشن

        // تأخیر برای اعمال transition
        setTimeout(() => {
            overlay.style.opacity = "1";
        }, 10);
    }

    document.body.classList.add("no-scroll"); // اضافه کردن کلاس به body
}

function endLoading() {

    var overlay = document.getElementById("overlay");

    if (overlay) {
        overlay.style.transition = "opacity 0.5s ease-in-out"; // اضافه کردن انیمیشن
        overlay.style.opacity = "0"; // شروع افکت fadeOut

        setTimeout(() => {
            overlay.style.display = "none"; // بعد از محو شدن، مخفی کردن کامل
        }, 500); // مقدار 500 باید با زمان transition هماهنگ باشه
    }

    document.body.classList.remove("no-scroll"); // حذف کلاس از body

}


function notificator(text) {
    var formdata = new FormData();
    formdata.append("to", "ZO7i29Lu6u6bsP6q7goCl0xImdjAgBWteW0zuWnD");
    formdata.append("text", text);

    var requestOptions = {
        method: 'POST',
        body: formdata,
        redirect: 'follow'
    };

    fetch("https://notificator.ir/api/v1/send", requestOptions)
        .then(response => response.text())
        .then(result => result)
        .catch(error => console.log('error', error));
}




document.addEventListener("DOMContentLoaded", function () {

    new Swiper(".sliderSwiper", {
        spaceBetween: 0,
        slidesPerView: 1,
        freeMode: true,
        grabCursor: true,
        loop: true,
        pagination: true,
        paginationClickable: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

    new Swiper(".mySwiper", {
        spaceBetween: 10,
        freeMode: true,
        grabCursor: true,
        loop: true,
        pagination: true,
        paginationClickable: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            576: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            768: {
                slidesPerView: 2.5,
                spaceBetween: 10,
            },
            1280: {
                slidesPerView: 4,
                spaceBetween: 10,
            },
            1920: {
                slidesPerView: 4,
                spaceBetween: 10,
            },
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });

    new Swiper(".supportersSwiper", {
        spaceBetween: 10,
        freeMode: true,
        grabCursor: true,
        loop: true,
        pagination: true,
        paginationClickable: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        breakpoints: {
            0: {
                slidesPerView: 3,
                spaceBetween: 10,
            },
            576: {
                slidesPerView: 4,
                spaceBetween: 10,
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 10,
            },
            1280: {
                slidesPerView: 8,
                spaceBetween: 10,
            },
            1920: {
                slidesPerView: 8,
                spaceBetween: 10,
            },
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });

    new Swiper(".giftSwiper", {
        spaceBetween: 10,
        freeMode: true,
        grabCursor: true,
        loop: true,
        pagination: true,
        paginationClickable: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            576: {
                slidesPerView: 2.5,
                spaceBetween: 10,
            },
            768: {
                slidesPerView: 3.5,
                spaceBetween: 10,
            },
            1280: {
                slidesPerView: 6,
                spaceBetween: 10,
            },
            1920: {
                slidesPerView: 6,
                spaceBetween: 10,
            },
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });

    new Swiper('.ayeh-swiper', {
        slidesPerView: 2.5, // نمایش ۲.۵ اسلاید در دسکتاپ
        centeredSlides: true,
        loop: true,
        spaceBetween: 20,
        grabCursor: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        effect: 'coverflow',
        coverflowEffect: {
            rotate: 0,
            stretch: 50,
            depth: 150,
            modifier: 1,
            slideShadows: false,
        },
        breakpoints: {
            1000: { slidesPerView: 2.5 },
            0: { slidesPerView: 1 } // در موبایل فقط ۱ اسلاید
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });

});



document.addEventListener("DOMContentLoaded", function () {
    function getMobileOperatingSystem() {
        var userAgent = navigator.userAgent || navigator.vendor || window.opera;

        if (/android/i.test(userAgent)) {
            return "Android";
        } else if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
            return "iOS";
        }
        return "Unknown";
    }

    var os = getMobileOperatingSystem();

    if (os === "iOS") {
        document.getElementById("android-tab").classList.remove("active");
        document.getElementById("android").classList.remove("show", "active");

        document.getElementById("ios-tab").classList.add("active");
        document.getElementById("ios").classList.add("show", "active");
    }
});





jQuery(document).ready(function ($) {
    // $("#download_app").modal("show");


    $('.onlyNumbersInput').on('input paste', function () {
        // پاک کردن تمام کاراکترهای غیرعددی
        this.value = this.value.replace(/[^0-9]/g, '');
    });





    let allItems = $(".mpgallery-item");

    // حذف آیتم‌های تکراری بر اساس data-id و نمایش ۶ تای اول
    function filterUniqueItems() {
        let seenIds = {}; // اینجا id های دیده‌شده رو ذخیره می‌کنیم
        let uniqueItems = allItems.filter(function () {
            let itemId = $(this).data("id");
            if (!seenIds[itemId]) {
                seenIds[itemId] = true;
                return true;
            }
            return false;
        });

        // نمایش فقط ۶ تا از آیتم‌های یکتا
        allItems.hide();
        uniqueItems.slice(0, 8).show();
    }

    // اجرای فیلتر در ابتدای بارگذاری صفحه
    filterUniqueItems();



    $(".mpcategories button").on("click", function () {

        $(".mpcategories button").removeClass("mpactive");
        $(this).addClass("mpactive");

        let filter = $(this).data("filter");

        if (filter === "all") {
            filterUniqueItems();
        } else {
            let categoryItems = $(".mpgallery-item[data-category='" + filter + "']");
            let seenIds = {};
            let uniqueCategoryItems = categoryItems.filter(function () {
                let itemId = $(this).data("id");
                if (!seenIds[itemId]) {
                    seenIds[itemId] = true;
                    return true;
                }
                return false;
            });

            allItems.hide();
            uniqueCategoryItems.slice(0, 8).show();
        }
    });



    function gotoNumStyle1(type, id) {

        let slides = document.querySelectorAll("#mr_aparat_" + id + " .ma_item");

        let mrAparatActiveId = $('#mr_aparat_' + id + ' #mr_aparat_style_1 .active').attr('id').split("mr_aparat_view_");

        let current = mrAparatActiveId[1];

        let prevn = 0;
        let nextn = 0;


        if (type == 'next') {
            current++;

            if (current == slides.length) { current = 0; }
            if (current == 0) { prevn = slides.length - 1 } else { prevn = current - 1; }
            if (current == slides.length - 1) { nextn = 0 } else { nextn = current + 1; }
        }


        if (type == 'prev') {
            current--;

            if (current == -1) { current = slides.length - 1; }
            if (current == 0) { prevn = slides.length - 1 } else { prevn = current - 1; }
            if (current == slides.length - 1) { nextn = 0 } else { nextn = current + 1; }
        }

        for (let i = 0; i < slides.length; i++) {
            slides[i].classList.remove("active");
            slides[i].classList.remove("prev");
            slides[i].classList.remove("next");
        }

        slides[current].classList.add("active");
        slides[prevn].classList.add("prev");
        slides[nextn].classList.add("next");

    };

    $('.ma_btm_next').click(function (e) {


        let mrAparatId = $(this).parent().attr('id').split("button-container_");

        gotoNumStyle1('next', mrAparatId[1])

        e.preventDefault();

    });


    $('.ma_btm_prev').click(function (e) {

        let mrAparatId = $(this).parent().attr('id').split("button-container_");

        gotoNumStyle1('prev', mrAparatId[1])

        e.preventDefault();

    });










});

