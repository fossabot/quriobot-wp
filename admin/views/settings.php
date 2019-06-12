<?php

    // No direct access to this file
    defined( 'ABSPATH' ) or die();

?>

<?php if ( isset( $_GET['settings-updated'] ) ) : ?>

    <?php if ( get_option('quriobot_path') == '' ): ?>
        <div id="message" class="notice notice-warning is-dismissible">
            <p><strong><?php _e('Quriobot script is disabled.', 'quriobot'); ?></strong></p>
        </div>
    <?php else: ?>
        <div id="message" class="notice notice-success is-dismissible">
                <p><strong><?php echo sprintf( __('Quriobot script installed for bot path %s', 'quriobot'), get_option('quriobot_path')); ?></strong></p>
        </div>
    <?php endif; ?>

<?php endif; ?>


<div id="business-info-wrap" class="wrap">

    <div class="wp-header">
        <img src="<?php echo plugins_url( '../static/quriobot_logo_2x.png', __FILE__ ); ?>" alt="Quriobot" class="quriobot-logo">
        <p class="quriobot-tagline">
            <?php echo __('Increase conversion with an easy to use chatbot.', 'quriobot'); ?>
        </p>
    </div>

    <form method="post" action="options.php">
        <?php settings_fields( 'quriobot' );
        do_settings_sections('quriobot'); ?>

        <div id="quriobot-form-area">
            <p><?php
            $url = 'https://control.quriobot.com';
            $link = sprintf( wp_kses( __( 'Visit <a href="%s" target="_blank">Quriobot Control Room</a> to find your unique bot path.', 'quriobot'), array(  'a' => array( 'href' => array(), 'target' =>  '_blank' ) ) ), esc_url( $url ) );
            echo $link;
            ?>
                Learn more how to find your bot path <a target="_blank" href="https://quriobot.freshdesk.com/a/solutions/articles/35000007889">here</a>.
            </p>
            <p><?php _e('Input your bot path into the field below to install your bot to you WordPress website.', 'quriobot'); ?></p>

            <table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row">
                        <label for="quriobot_path"><?php esc_html_e( 'Bot path', 'quriobot'); ?></label>
                        </th>

                        <td>
                        <input name="quriobot_path" id="quriobot_path" value="<?php echo esc_attr( get_option('quriobot_path') ); ?>" />
                        <p class="description" id="wp_quriobot_path_description"><?php esc_html_e( '(Leave blank to disable)', 'quriobot' ); ?></p>
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>

        <?php submit_button(); ?>

    </form>
</div>
