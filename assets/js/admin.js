
jalaliDatepicker.startWatch({
    minDate: "attr",
    maxDate: "attr"
});

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

jQuery(document).ready(function ($) {

    $('.onlyNumbersInput').on('input paste', function () {
        this.value = this.value.replace(/[^0-9]/g, '');
    });




    $(document).on("click", "#zba-add-video", function (e) {


        const videoUrl = $('#zba-add-video-url').val();
        const videoTitle = $('#zba-add-video-title').val();

        e.preventDefault();
        const newRow = `
            <div class="zba-row-meta-box w-100">
                <textarea style="opacity: 0; width: 0px; height: 0px; " name="ayeh[video][]">${videoTitle.trim()}|==|${videoUrl.trim()}</textarea>
                <div class="w-100">
                    <p class="w-100">${videoTitle.trim()}</p>                        
                    <a class="button w-100" href="${videoUrl.trim()}">${videoUrl.trim()}</a>
                </div>        
                <video controls  preload="auto">
                    <source src="${videoUrl.trim()}" type="video/mp4">
                    مرورگر شما از تگ video پشتیبانی نمی‌کند.
                </video>
                <button type="button" class="button button-error zba_btn_remove">حذف</button>
            </div>
        `;

        $('#video_list').append(newRow);

        $('#zba-add-video-url').val('');
        $('#zba-add-video-title').val('');
    });


    $(document).on("click", "#zba-add-sound", function (e) {


        const soundUrl = $('#zba-add-sound-url').val();
        const soundTitle = $('#zba-add-sound-title').val();

        e.preventDefault();
        const newRow = `
        <div class="zba-row-meta-box w-100">
            <textarea style="opacity: 0; width: 0px; height: 0px; "
                name="ayeh[sound][]">${soundTitle.trim()}|==|${soundUrl.trim()}</textarea>
            <div class="w-100">
                <p class="w-100">${soundTitle.trim()}</p>
                <a class="button w-100" href="${soundUrl.trim()}">${soundUrl.trim()}</a>
            </div>
            <audio controls preload="auto">
                <source id="zba-source-sound" src="${soundUrl.trim()}" type="audio/mpeg">
                مرورگر شما از تگ audio پشتیبانی نمی‌کند.
            </audio>
            <button type="button" class="button button-error zba_btn_remove">حذف</button>
        </div>
        `;

        $('#sound_list').append(newRow);

        $('#zba-add-sound-url').val('');
        $('#zba-add-sound-title').val('');
    });

    $(document).on("click", ".zba_btn_remove", function () {
        $(this).closest(".zba-row-meta-box").remove(); // حذف عنصر
    });

})

