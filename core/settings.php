<?php

function ticket_text_var_wpyartick() {

	echo '<div class ="info_set_text_body">';
	echo '<h2 style="margin-bottom:20px;color:#ff0000">' . esc_html__( 'Help to create email text', 'nirweb-support' ) . '</h2>';
	echo '<p><span style="width:120px;display:inline-block">' . esc_html__( 'ticket number', 'nirweb-support' ) . '</span> <code>{{ticket_id}}</code></p>';
	echo '<p><span style="width:120px;display:inline-block">' . esc_html__( 'ticket title', 'nirweb-support' ) . '</span><code>{{ticket_title}}</code></p>';
	echo '<p><span style="width:120px;display:inline-block">' . esc_html__( 'name support', 'nirweb-support' ) . '</span><code>{{ticket_poshtiban}}</code></p>';
	echo '<p><span style="width:120px;display:inline-block">' . esc_html__( 'name department', 'nirweb-support' ) . '</span><code>{{ticket_dep}}</code></p>';
	echo '<p><span style="width:120px;display:inline-block">' . esc_html__( 'Priority', 'nirweb-support' ) . '</span> <code>{{ticket_pri}}</code></p>';
	echo '<p><span style="width:120px;display:inline-block">' . esc_html__( 'status', 'nirweb-support' ) . '</span> <code>{{ticket_stu}}</code></p>';
	echo '</div>';
}

?>
<hr class="wp-header-end">

<h1 class="wp-heading-inline"><?= esc_html__( 'Settings', 'nirweb-support' ) ?></h1>
<div class="wrap">
    <div id="wrapper">
        <form method="post" action="options.php">
			<?php settings_fields( 'nirweb_ticket-settings-group' ); ?>
			<?php do_settings_sections( 'nirweb_ticket-settings-group' ); ?>
            <div class="war_settings">
                <ul class="list_tabs_settings">
                    <li class="active"
                        data-target="box_1"><?php echo esc_html__( 'General settings', 'nirweb-support' ) ?></li>
                    <li data-target="box_2"><?php echo esc_html__( 'Support notification', 'nirweb-support' ); ?></li>
                    <li data-target="box_3"><?php echo esc_html__( 'User notification', 'nirweb-support' ); ?></li>
                    <li data-target="box_4"><?php echo esc_html__( 'Ticket', 'nirweb-support' ); ?></li>
                    <li data-target="box_5"><?php echo esc_html__( 'File', 'nirweb-support' ); ?></li>
                </ul>
                <div class="content_settings">
                    <div id="box_1">
                        <ul>
                            <li>
                                <span><?php echo esc_html__( 'Display Icon', 'nirweb-support' ); ?></span>
                                <div>
                                    <select name="display_icon_send_ticket">
                                        <option value="0" <?= get_option( 'display_icon_send_ticket' ) == '0' ? 'selected' : '' ?> ><?php echo esc_html__( 'deactivate', 'nirweb-support' ); ?></option>
                                        <option value="1" <?= get_option( 'display_icon_send_ticket' ) == '1' ? 'selected' : '' ?> ><?php echo esc_html__( 'active', 'nirweb-support' ); ?></option>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <span>
                                    <?php echo esc_html__( 'If you do not have the WooCommerce plugin installed, select a Page', 'nirweb-support' ); ?>
                                </span>
                                <div>
                                    <select name="select_page_ticket">
                                        <option value="0"><?php echo esc_html__( 'Please Select Page', 'nirweb-support' ); ?></option>
										<?php foreach ( get_pages() as $page ): ?>
                                            <option value="<?php echo esc_html( $page->ID ) ?>" <?= get_option( 'select_page_ticket' ) == $page->ID ? 'selected' : '' ?> ><?php echo esc_html( $page->post_title ) ?></option>
										<?php endforeach; ?>
                                    </select>
                                    <small><?php echo esc_html__( 'short code : [nirweb_ticket]', 'nirweb-support' ); ?></small>
                                </div>
                            </li>
                            <li>
                                <span><?php echo esc_html__( 'Enter the icon address', 'nirweb-support' ); ?></span>
                                <div>
                                    <input type="text" name="icon_nirweb_ticket_front"
                                           value="<?= esc_html( get_option( 'icon_nirweb_ticket_front' ) ) ?>">
                                </div>
                            </li>
                            <li>
                                <span><?php echo esc_html__( 'Posotion Icon', 'nirweb-support' ); ?></span>
                                <div>
                                    <select name="position_icon_nirweb_ticket_front">
                                        <option value="left" <?= get_option( 'position_icon_nirweb_ticket_front' ) == 'left' ? 'selected' : '' ?> ><?php echo esc_html__( 'Left', 'nirweb-support' ); ?></option>
                                        <option value="right" <?= get_option( 'position_icon_nirweb_ticket_front' ) == 'right' ? 'selected' : '' ?> >
                                            <?php echo esc_html__( 'Right', 'nirweb-support' ); ?></option>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <span><?php echo esc_html__( 'Email Template For Send Ticket By Admin', 'nirweb-support' ); ?>
                                  <small><?php echo esc_html__( 'Receiver : {username}', 'nirweb-support' ); ?></small>
                                </span>
                                <div>
									<?php esc_html( wp_editor( get_option( 'template_send_ticket_email' ) , 'template_send_ticket_email') ); ?>
                                </div>
                            </li>


                        </ul>

                    </div>
                    <div id="box_2">
                        <ul>
                            <li>
                                <span><?php echo esc_html__( 'Send Email To Support', 'nirweb-support' ); ?></span>
                                <div>
                                    <select name="active_send_mail_to_poshtiban">
                                        <option value="0" <?= get_option( 'active_send_mail_to_poshtiban' ) == '0' ? 'selected' : '' ?> >
                                            <?php echo esc_html__( 'deactivate', 'nirweb-support' ); ?>
                                        </option>
                                        <option value="1" <?= get_option( 'active_send_mail_to_poshtiban' ) == '1' ? 'selected' : '' ?> >
                                            <?php echo esc_html__( 'active', 'nirweb-support' ); ?>
                                        </option>
                                    </select>
                                </div>
                            </li>


                            <li>
                                <h2><?php echo esc_html__( 'Send Ticket', 'nirweb-support' ); ?></h2>
                                <span><?php echo esc_html__( 'Subject', 'nirweb-support' ); ?></span>
                                <div style="margin-bottom: 30px;">
                                    <input type="text" name="subject_mail_poshtiban_new"
                                           value="<?= esc_html( get_option( 'subject_mail_poshtiban_new' ) ) ?>">
                                </div>

                                <span><?php echo esc_html__( 'Message', 'nirweb-support' ); ?></span>
                                <div>
									<?php esc_html(  wp_editor(get_option( 'poshtiban_text_email_send' ) , 'poshtiban_text_email_send') ); ?>
                                </div>
                                <section class="box_help"><?php ticket_text_var_wpyartick() ?></section>
                            </li>

                            <li>
                                <h2><?php echo esc_html__( 'Answer Ticket', 'nirweb-support' ); ?></h2>
                                <span><?php echo esc_html__( 'Subject', 'nirweb-support' ); ?></span>
                                <div style="margin-bottom: 30px;">
                                    <input type="text" name="subject_mail_poshtiban_answer"
                                           value="<?= esc_html( get_option( 'subject_mail_poshtiban_answer' ) ) ?>">
                                </div>

                                <span><?php echo esc_html__( 'Message', 'nirweb-support' ); ?></span>
                                <div>
									<?php esc_html(  wp_editor(get_option( 'poshtiban_text_email_send_answer' ) , 'poshtiban_text_email_send_answer' )); ?>
                                </div>
                                <section class="box_help"><?php ticket_text_var_wpyartick() ?></section>
                            </li>

                        </ul>
                    </div>
                    <div id="box_3">
                        <ul>
                            <li>
                                <span><?php echo esc_html__( 'Send Email To User', 'nirweb-support' ); ?></span>
                                <div>
                                    <select name="active_send_mail_to_user">
                                        <option value="0" <?= get_option( 'active_send_mail_to_user' ) == '0' ? 'selected' : '' ?> ><?php echo esc_html__( 'deactivate', 'nirweb-support' ); ?></option>
                                        <option value="1" <?= get_option( 'active_send_mail_to_user' ) == '1' ? 'selected' : '' ?> ><?php echo esc_html__( 'active', 'nirweb-support' ); ?></option>
                                    </select>
                                </div>
                            </li>

                            <li>
                                <h2><?php echo esc_html__( 'Send Ticket', 'nirweb-support' ); ?></h2>
                                <span><?php echo esc_html__( 'Subject', 'nirweb-support' ); ?></span>
                                <div style="margin-bottom: 30px;">
                                    <input type="text" name="subject_mail_user_new"
                                           value="<?= esc_html( get_option( 'subject_mail_user_new' ) ) ?>">
                                </div>

                                <span><?php echo esc_html__( 'Message', 'nirweb-support' ); ?></span>
                                <div>
									<?php esc_html(  wp_editor(get_option( 'user_text_email_send' ) , 'user_text_email_send' )); ?>
                                </div>
                                <section class="box_help"><?php ticket_text_var_wpyartick() ?></section>
                            </li>

                            <li>
                                <h2><?php echo esc_html__( 'Answer Ticket', 'nirweb-support' ); ?></h2>
                                <span><?php echo esc_html__( 'Subject', 'nirweb-support' ); ?></span>
                                <div style="margin-bottom: 30px;">
                                    <input type="text" name="subject_mail_user_answer"
                                           value="<?= esc_html( get_option( 'subject_mail_user_answer' ) ) ?>">
                                </div>

                                <span><?php echo esc_html__( 'Message', 'nirweb-support' ); ?></span>
                                <div>
									<?php  esc_html( wp_editor(get_option( 'user_text_email_send_answer' ) , 'user_text_email_send_answer' )); ?>
                                </div>
                                <section class="box_help"><?php ticket_text_var_wpyartick() ?></section>
                            </li>

                        </ul>

                    </div>
                    <div id="box_4">
                        <ul>
                            <li>
                                <span><?php echo esc_html__( 'Select Product Required', 'nirweb-support' ); ?></span>
                                <div>
                                    <select name="require_procut_user_wpyar">
                                        <option value="0" <?= get_option( 'require_procut_user_wpyar' ) == '0' ? 'selected' : '' ?> ><?php echo esc_html__( 'deactivate', 'nirweb-support' ); ?></option>
                                        <option value="1" <?= get_option( 'require_procut_user_wpyar' ) == '1' ? 'selected' : '' ?> ><?php echo esc_html__( 'active', 'nirweb-support' ); ?></option>
                                    </select>
                                </div>
                            </li>


                            <li>

                                <span><?php echo esc_html__( 'Text above the Send Ticket', 'nirweb-support' ); ?></span>
                                <div>
									<?php esc_html( wp_editor( get_option( 'text_top_send_mail_nirweb_ticket' ) , 'text_top_send_mail_nirweb_ticket') ); ?>
                                </div>
                            </li>

                        </ul>

                    </div>
                    <div id="box_5">
                        <ul>
                            <li>
                                <span><?php echo esc_html__( 'Upload volume in MB', 'nirweb-support' ); ?></span>
                                <div>
                                    <input type="number" name="size_of_file_wpyartik"
                                           value="<?= esc_html( get_option( 'size_of_file_wpyartik' ) ) ?>">
                                </div>
                            </li>

                            <li>
                                <span><?php echo esc_html__( 'Authorized file extensions', 'nirweb-support' ); ?></span>
                                <div>
                                    <input type="text" name="mojaz_file_upload_user_wpyar"
                                           value="<?= get_option( 'mojaz_file_upload_user_wpyar' ) ? esc_html( get_option( 'mojaz_file_upload_user_wpyar' ) ) : '.png,.jpg,.jpeg' ?>">
                                    <small><?php echo esc_html__( 'Example : .png,.jpg,.jpeg', 'nirweb-support' ) ?></small>
                                </div>

                            </li>


                        </ul>

                    </div>

                </div>
            </div>

			<?php submit_button(); ?>

        </form>
    </div>
</div>

