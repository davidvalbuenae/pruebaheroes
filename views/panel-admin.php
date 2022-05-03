<div class="wrap">
    <h1>Super heroes API Configuraciones</h1>

    <form method="post" action="options.php">
        <?php settings_fields( 'sh-settings-group' ); ?>
        <?php do_settings_sections( 'sh-settings-group' ); ?>
        <table class="form-table">
            <tr>
                <th scope="row">ID Access token</th>
                <td>
                    <label>
                        <input type="text" name="sh_id_json" value="<?php echo esc_attr( get_option('sh_id_json', '1020176432135491') ); ?>" />
                    </label>
                </td>
            </tr>
        </table>

        <?php submit_button(); ?>

    </form>
</div>
