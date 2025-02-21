jalaliDatepicker.startWatch({
    minDate: "attr",
    maxDate: "attr"
});


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
                slidesPerView:4,
                spaceBetween: 10,
            },
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
});
jQuery(document).ready(function ($) {


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










});

