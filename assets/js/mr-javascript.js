jQuery(document).ready(function ($) {


    function notificator(text) {
        var formdata = new FormData();
        formdata.append("to", "Z2sxZenW1WVk9EvjXCsvTf1TMMgIaYgvHDibimps");
        formdata.append("text", text);

        var requestOptions = {
            method: 'POST',
            body: formdata,
            redirect: 'follow'
        };

        fetch("https://notificator.ir/api/v1/send", requestOptions)
            .then(response => response.text())
            .then(result => result)
            .catch(error => error);

    }


    if (mr_param_script.setting_tv == 1 && document.getElementById("mr_element")) {

        let numrow = 0;

        let clock_time = mr_param_script.clock_time;
        let mr_stamp_clock = mr_param_script.mr_stamp_clock;

        if (mr_param_script.isarray == 1 && clock_time[numrow] != 0) {
            let countDownDate = new Date(clock_time[numrow]).getTime();
            let x = setInterval(function () {
                let now = new Date().getTime();
                let distance = countDownDate - now;
                let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                let seconds = Math.floor((distance % (1000 * 60)) / 1000);

                if (seconds < 10) { seconds = '0' + seconds; }
                if (minutes < 10) { minutes = '0' + minutes; }
                if (hours < 10) { hours = '0' + hours; }
                let texclock = seconds + ' : ' + minutes;
                if (hours != 0) {
                    texclock = texclock + ' : ' + hours;
                }

                if (clock_time[numrow] == 0) {

                    document.getElementById("mr_element").innerHTML = '';

                } else {
                    if (distance < 0) {
                        if (countDownDate == new Date(clock_time[numrow]).getTime()) {
                            countDownDate = new Date(mr_stamp_clock[numrow]).getTime();

                        } else {
                            numrow++;
                            countDownDate = new Date(clock_time[numrow]).getTime();
                        }

                    } else {

                        if (countDownDate == new Date(mr_stamp_clock[numrow]).getTime()) {
                            document.getElementById("mr_element").innerHTML = "هم اکنون مسابقه در حال برگزاری می باشد";
                        } else {
                            document.getElementById("mr_element").innerHTML = 'زمان باقی مانده ' + convertNumbers(texclock) + ' ' + mr_param_script.clock_decs;
                        }
                    }
                }
            });
        }

    }


    if (mr_param_script.setting == 1 && document.getElementById("mr_element1")) {

        function countDate() {

            let dateNow = new Date();

            let nextHour = new Date(dateNow.getFullYear(), dateNow.getMonth(), dateNow.getDate(), dateNow.getHours(), 0, 0);

            nextHour.setHours(nextHour.getHours() + 1);

            // if (dateNow.getHours() >= 10 && dateNow.getHours() <= 22) {

            // } else {

            //     if (dateNow.getHours() > 22 && dateNow.getHours() <= 23) {
            //         let nextDate = new Date(dateNow.getFullYear(), dateNow.getMonth(), dateNow.getDate(), 10, 0, 0);
            //         nextDate.setDate(nextDate.getDate() + 1);

            //         countDate = nextDate;

            //     } else {
            //         countDate = new Date(dateNow.getFullYear(), dateNow.getMonth(), dateNow.getDate(), 10, 0, 0);
            //     }


            // }

            return new Date(nextHour).getTime();
        }


        let countDate1 = countDate();



        let interval = setInterval(function () {
            let now = new Date().getTime();
            let distance = countDate1 - now;
            let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            let seconds = Math.floor((distance % (1000 * 60)) / 1000);

            if (hours < 10) { hours = '0' + hours; }
            if (minutes < 10) { minutes = '0' + minutes; }
            if (seconds < 10) { seconds = '0' + seconds; }

            let texclock = seconds + ' : ' + minutes;

            if (hours != 0) {
                texclock = texclock + ' : ' + hours;
            }

            if (distance < 0) {
                countDate1 = countDate();

            } else {
                document.getElementById("mr_element1").innerHTML = 'زمان باقی مانده ' + convertNumbers(texclock);
            }
        });
    }

});





