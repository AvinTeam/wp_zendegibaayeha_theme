<div class="h-100 mt-5 p-5">
    <div class="mx-auto d-flex flex-column justify-content-center align-content-center login-box">

        <form id="loginForm" class="mb-4" >
            <input type="hidden" id="created_user" name="created_user" value="false">
            <div id="mobileForm">
                <h3 class="text-center mt-2">استعلام با شماره موبایل</h3>
                <div class="form-group text-start">
                    <label for="mobile">شماره موبایل</label>


                    <div class="input-group mb-3">
                        <span class="input-group-text" id="sendsms"><i class="bi bi-phone"></i></span>
                        <input type="text" inputmode="numeric" pattern="\d*" class="form-control  onlyNumbersInput"
                            id="mobile" maxlength="11" placeholder="شماره موبایل خود را وارد کنید"
                            aria-describedby="sendsms">

                    </div>
                </div>
                <div class="form-group d-grid mt-2 ">
                    <button type="submit" class="btn btn-primary bg-gradiant  btn-block">استعلام</button>

                </div>
            </div>
            <div id="codeVerification" class="text-start" style="display: none;">
                <h4 class="text-center">کد تایید</h4>
                <div class="form-group d-grid mt-2">
                    <label for="verificationCode">کد تایید</label>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="verify"><i class="bi bi-person-fill"></i></span>
                        <input autocomplete="one-time-code" type="text" inputmode="numeric" pattern="\d*"
                            class="form-control onlyNumbersInput" id="verificationCode"
                            placeholder="کد تایید را وارد کنید" aria-describedby="verify" maxlength="4">
                    </div>
                </div>
                <div class="d-grid mt-2 gap-2">
                    <div class="timer text-center" id="timer">00:00</div>

                    <button type="submit" class="btn btn-primary bg-gradiant btn-block" id="verifyCode">تایید
                        کد</button>
                    <button type="button" class="btn btn-secondary btn-block" id="resendCode" disabled="">ارسال مجدد
                        کد</button>
                    <button type="button" class="btn btn-link btn-block" id="editNumber">ویرایش شماره</button>
                </div>
            </div>
            <div id="login-alert" class="alert alert-danger mt-2 d-none" role="alert"></div>

        </form>

        <?php echo zba_transient(); ?>
    </div>
</div>
