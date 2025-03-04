		<div class="wrap">
		    <h1>تنظیمات</h1>

		    <form method="post" action="" novalidate="novalidate">
		        <table class="form-table" role="presentation">

		            <tbody>

		                <tr>
		                    <th scope="row">مسابقه گروهی</th>
		                    <td>
		                        <fieldset><label for="setting">
		                                <input name="setting" type="radio" value="1"
		                                    <?php checked(1, $clock_mr_setting[ 'setting' ])?>>فعال</label>

		                            <label for="setting">

		                                <input name="setting" type="radio" value="0"
		                                    <?php checked(0, $clock_mr_setting[ 'setting' ])?>>غیر فعال</label>
		                        </fieldset>
		                    </td>
		                </tr>

		                <tr>
		                    <th scope="row">مسابقه تلویزیونی</th>
		                    <td>
		                        <fieldset><label for="setting_tv">

		                                <input name="setting_tv" type="radio" value="1"
		                                    <?php checked(1, $clock_mr_setting[ 'setting_tv' ])?>>فعال</label>

		                            <label for="setting_tv">

		                                <input name="setting_tv" type="radio" value="0"
		                                    <?php checked(0, $clock_mr_setting[ 'setting_tv' ])?>>غیر فعال</label>
		                        </fieldset>
		                    </td>
		                </tr>

		                <tr class="d-none">
		                    <th scope="row"><label for="mrdecs">متن بعد ساعت مسابقه تلویزیون</label></th>
		                    <td>
		                        <input name="mrdecs" id="mrdecs" type="text" value="<?php echo $clock_decs ?>"
		                            class="regular-text">
		                    </td>
		                </tr>
		                <tr class="d-none">
		                    <th scope="row"><label for="timestamp">وقفه در زمان</label></th>
		                    <td>
		                        <input name="timestamp" id="timestamp" type="text" value="<?php echo $timestamp ?>"
		                            class="regular-text">
		                    </td>
		                </tr>

		            </tbody>
		        </table>


		        <p class="submit">
		            <button type="submit" name="act" id="submit" value="mr_setting"
		                class="button button-primary">ذخیره</button>
		        </p>
		    </form>
		</div>


		<div class="clear"></div>