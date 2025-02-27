		<div class="wrap">
		    <h1>تنظیمات</h1>

		    <form method="post" action="" novalidate="novalidate">
		        <table class="form-table" role="presentation">

		            <tbody>

		                <tr>
		                    <th scope="row">مسابقه گروهی</th>
		                    <td>
		                        <fieldset><label for="setting_start">
		                                <input name="setting_start" type="checkbox" id="setting_start"
		                                    <?php echo $checked_mr_setting?>>فعال</label>
		                        </fieldset>
		                    </td>
		                </tr>

		                <tr>
		                    <th scope="row">مسابقه تلویزیونی</th>
		                    <td>
		                        <fieldset><label for="setting_start_tv">
		                                <input name="setting_start_tv" type="checkbox" id="setting_start_tv"
		                                    <?php echo $checked_mr_setting_tv?>>فعال</label>
		                        </fieldset>
		                    </td>
		                </tr>

		                <tr class="d-none">
		                    <th scope="row"><label for="mrdecs">متن بعد ساعت مسابقه تلویزیون</label></th>
		                    <td>
		                        <input name="mrdecs" id="mrdecs" type="text" value="<?php echo $clock_decs?>" class="regular-text">
		                    </td>
		                </tr>
		                <tr class="d-none">
		                    <th scope="row"><label for="timestamp">وقفه در زمان</label></th>
		                    <td>
		                        <input name="timestamp" id="timestamp" type="text" value="<?php echo $timestamp?>"
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