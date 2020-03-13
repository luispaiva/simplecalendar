<div class="wrap">
    <h1><?php esc_attr_e("Agenda", "simplecalendar"); ?></h1>
    <p><?php esc_attr_e("Aqui estão agendados os seus compromissos.", "simplecalendar"); ?></p>

    <div id="calendar"></div>

    <div id="eventContent" title="Event Details" style="display:none;">
        <table class="form-table">
            <tbody>

                <tr>
                    <th scope="row"><label for="eventTitle"><?php esc_attr_e("Título:", "simplecalendar"); ?></label></th>
                    <td><input type="text" name="eventTitle" id="eventTitle" class="regular-text"></td>
                </tr>

                <tr>
                    <th scope="row"><label for="startTime"><?php esc_attr_e("Início:", "simplecalendar"); ?></label></th>
                    <td><input type="text" id="startTime" name="startTime" class="datepicker"></td>
                </tr>

                <!-- <tr>
                    <th scope="row"><label for="endTime"><?php esc_attr_e("Fim:", "simplecalendar"); ?></label></th>
                    <td><input type="text" name="endTime" id="endTime" class="regular-text"></td>
                </tr> -->

                <tr>
                    <th scope="row"><label for="endTime"><?php esc_attr_e("Fim:", "simplecalendar"); ?></label></th>
                    <td><input type="text" id="endTime" name="endTime" class="datepicker"></td>
                </tr>

                <tr>
                    <th scope="row"><?php esc_attr_e("Descrição:", "simplecalendar"); ?></th>
                    <td>
                        <fieldset>
                            <legend class="screen-reader-text">
                                <span>checkbox</span>
                            </legend>
                            <label for="checkbox_id">
                                <textarea name="eventInfo" id="eventInfo" cols="40" rows="5"></textarea>
                            </label>
                        </fieldset>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>

</div>