<?php 
include NIRWEB_SUPPORT_INC_USER_FUNCTIONS_TICKET .'func_u_list_ticket.php';
include NIRWEB_SUPPORT_INC_ADMIN_FUNCTIONS_TICKET .'func_status_and_priority.php';
$list_ticket = nirweb_ticket_get_list_all_ticket_user();
$list_status = nirweb_ticket_get_status();
$user = wp_get_current_user();
?>
 <div class="nirweb_ticket_base wpyar-ticket">   
     <h3 class="tite_status_tickets_wpyar"><?php echo  __('Ticket status', 'nirweb-support') ?></h3>
     <div class="row_status">
         <div class="col_box_status_ticket_wpyar" id="open">
         <svg id="svg_open-ticket" viewBox="0 0 48.6 48.6" style="width: 50px"><path fill="#FFF" d="M17.5 14.2l2.4-2.4c5.6 5.6 11.2 11.3 16.8 16.9L34.4 31c-5.6-5.5-11.3-11.2-16.9-16.8z"></path><path fill="#E6E6E6" d="M38.2 28.8l9.4-9.4-4.2-4.2c-2.7 2.6-7.1 2.5-9.7-.2-2.7-2.6-2.8-7-.2-9.7L29.3 1l-9.4 9.4 18.3 18.4z"></path><path fill="#4D4D4D" d="M25.3 32.3c-.3 0-.5-.1-.7-.3l-2.7-2.7c-.4-.4-.4-1 0-1.4s1-.4 1.4 0l2.7 2.7c.4.4.4 1 0 1.4-.2.2-.5.3-.7.3zm-5.4-5.4c-.3 0-.5-.1-.7-.3l-2.7-2.7c-.4-.4-.4-1 0-1.4s1-.4 1.4 0l2.7 2.7c.4.4.4 1 0 1.4-.2.2-.5.3-.7.3z"></path><path fill="#4D4D4D" d="M48.3 18.6l-4.2-4.2c-.4-.4-1-.4-1.4 0-2.3 2.2-6 2.1-8.2-.2-2.3-2.2-2.4-6-.2-8.3.4-.4.4-1 0-1.4L30 .3l-.2-.1-.2-.1-.2-.1H29.1c-.2 0-.4.1-.5.2l-9.4 9.4-18.9 19c-.4.4-.4 1 0 1.4l4.2 4.2c.4.4 1 .4 1.4 0 2.3-2.2 6.1-2.1 8.3.2 2.3 2.2 2.4 6 .2 8.3-.4.4-.4 1 0 1.4l4.2 4.2c.2.2.5.3.7.3s.5-.1.7-.3l14.8-14.8c.2 0 .3-.1.4-.2l4.2-4.2c.1-.1.1-.2.2-.3l8.7-8.7c.2-.2.3-.5.3-.8 0-.2-.1-.5-.3-.7zm-19-16.2l2.9 2.9c-2.3 3.1-2 7.6.8 10.3 2.8 2.8 7.2 3.1 10.4.9l2.8 2.8-7.5 7.5L21.8 10l7.5-7.6zm-9.4 9.4l16.8 16.9-2.3 2.3-16.9-16.8 2.4-2.4zm-.6 34.4l-2.8-2.8c2.3-3.1 2-7.6-.8-10.3-2.8-2.8-7.2-3.1-10.4-.9l-2.8-2.8 9.8-9.8c0 .1.1.2.2.3l1.4 1.4c.2.2.5.3.7.3s.5-.1.7-.3c.4-.4.4-1 0-1.4l-1.4-1.4c-.1-.1-.2-.1-.3-.2l2.6-2.6L33 32.5l-2.6 2.6c0-.2-.1-.3-.2-.4l-1.4-1.4c-.4-.4-1-.4-1.4 0s-.4 1 0 1.4l1.4 1.4c.1.1.3.2.4.2l-9.9 9.9z"></path><circle fill="#FF1A1A" cx="35.2" cy="35.7" r="9.9"></circle><path fill="#FFF" d="M35.2 47.7c-6.6 0-12-5.4-12-12s5.4-12 12-12 12 5.4 12 12-5.4 12-12 12zm0-22c-5.5 0-10 4.5-10 10s4.5 10 10 10 10-4.5 10-10-4.5-10-10-10z"></path><path fill="#FFF" d="M38.8 40.5h-6c-.6 0-1-.4-1-1s.4-1 1-1h5v-5h-5c-.6 0-1-.4-1-1s.4-1 1-1h6c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1z"></path></svg>
         <p class="title"><?php echo __('Open', 'nirweb-support') ?></p>
         <p class="number c-red">
             <?php nirweb_ticket_count_new_ticket_user_fr ()?>
         </p>
         </div>
         <div class="col_box_status_ticket_wpyar" id="inprogress">
             <svg id="svg_doing-ticket" viewBox="0 0 48.6 48.6"style="width: 50px"><g transform="translate(-1031 1558)"><path fill="#FFF" d="M1047.103-1543.742l4.242-4.242 18.385 18.384-4.243 4.243z"></path><path fill="#4D4D4D" d="M1056.3-1525.7c-.3 0-.5-.1-.7-.3l-2.7-2.7c-.4-.4-.4-1 0-1.4s1-.4 1.4 0l2.7 2.7c.4.4.4 1 0 1.4-.2.2-.5.3-.7.3zm-5.4-5.4c-.3 0-.5-.1-.7-.3l-2.7-2.7c-.4-.4-.4-1 0-1.4s1-.4 1.4 0l2.7 2.7c.4.4.4 1 0 1.4-.2.2-.5.3-.7.3z"></path><path fill="#E6E6E6" d="M1069.2-1529.2l9.4-9.4-4.2-4.2c-2.7 2.6-7.1 2.5-9.7-.2-2.7-2.6-2.8-7-.2-9.7l-4.2-4.3-9.4 9.4 18.3 18.4z"></path><path fill="#4D4D4D" d="M1079.3-1539.4l-4.2-4.2c-.4-.4-1-.4-1.4 0-2.3 2.2-6 2.1-8.2-.2-2.3-2.2-2.4-6-.2-8.3.4-.4.4-1 0-1.4l-4.3-4.2s-.1-.1-.2-.1-.1-.1-.2-.1-.2 0-.3-.1H1060c-.2 0-.4.1-.5.2l-9.4 9.4-18.9 18.9c-.4.4-.4 1 0 1.4l4.2 4.2c.4.4 1 .4 1.4 0 2.3-2.2 6.1-2.1 8.3.2 2.3 2.2 2.4 6 .2 8.3-.4.4-.4 1 0 1.4l4.2 4.2c.2.2.5.3.7.3s.5-.1.7-.3l14.8-14.8c.2 0 .3-.1.4-.2l4.2-4.2c.1-.1.1-.2.2-.3l8.7-8.7c.2-.2.3-.5.3-.8.1-.1 0-.4-.2-.6zm-19-16.2l2.9 2.9c-2.3 3.1-2 7.6.8 10.3 2.8 2.8 7.2 3.1 10.4.9l2.8 2.8-7.5 7.5-16.9-16.9 7.5-7.5zm-9.4 9.4l16.8 16.9-2.3 2.3-16.9-16.9 2.4-2.3zm-.6 34.4l-2.8-2.8c2.3-3.1 2-7.6-.8-10.3-2.8-2.8-7.2-3.1-10.4-.9l-2.8-2.8 9.8-9.8c0 .1.1.2.2.3l1.4 1.4c.2.2.5.3.7.3s.5-.1.7-.3c.4-.4.4-1 0-1.4l-1.4-1.4c-.1-.1-.2-.1-.3-.2l2.6-2.6 16.9 16.9-2.6 2.6c0-.2-.1-.3-.2-.4l-1.4-1.4c-.4-.4-1-.4-1.4 0s-.4 1 0 1.4l1.4 1.4c.1.1.3.2.4.2l-10 9.8z"></path><circle fill="#2096FC" cx="1065.2" cy="-1522.3" r="11"></circle><path fill="#FFF" d="M1065.2-1510.3c-6.6 0-12-5.4-12-12s5.4-12 12-12 12 5.4 12 12-5.4 12-12 12zm0-22c-5.5 0-10 4.5-10 10s4.5 10 10 10 10-4.5 10-10-4.5-10-10-10z"></path><path fill="#FFF" d="M1071.3-1520.7h-1.1c-.6 0-1-.4-1-1s.4-1 1-1h1.1c.6 0 1 .4 1 1s-.4 1-1 1zM1060.4-1520.7h-1.1c-.6 0-1-.4-1-1s.4-1 1-1h1.1c.6 0 1 .4 1 1s-.4 1-1 1zM1065.9-1520.7h-1.1c-.6 0-1-.4-1-1s.4-1 1-1h1.1c.6 0 1 .4 1 1s-.4 1-1 1z"></path></g></svg>
         <p class="title"><?php echo __('Inprogress', 'nirweb-support') ?></p>
         <p class="number c-blue"><?php nirweb_ticket_count_process_ticket_user_fr ()?></p>
         </div>
         <div class="col_box_status_ticket_wpyar" id="closed">
         <svg id="svg_close-ticket" viewBox="0 0 48.6 48.6" style="width: 50px"><g transform="translate(-905 1558)"><path fill="#FFF" d="M921.104-1543.743l4.242-4.242 18.385 18.384-4.243 4.243z"></path><path fill="#E6E6E6" d="M943.2-1529.2l9.4-9.4-4.2-4.2c-2.7 2.6-7.1 2.5-9.7-.2-2.7-2.6-2.8-7-.2-9.7l-4.2-4.3-9.4 9.4 18.3 18.4z"></path><path fill="#4D4D4D" d="M930.3-1525.7c-.3 0-.5-.1-.7-.3l-2.7-2.7c-.4-.4-.4-1 0-1.4s1-.4 1.4 0l2.7 2.7c.4.4.4 1 0 1.4-.2.2-.5.3-.7.3zm-5.4-5.4c-.3 0-.5-.1-.7-.3l-2.7-2.7c-.4-.4-.4-1 0-1.4s1-.4 1.4 0l2.7 2.7c.4.4.4 1 0 1.4-.2.2-.5.3-.7.3z"></path><path fill="#4D4D4D" d="M953.3-1539.4l-4.2-4.2c-.4-.4-1-.4-1.4 0-2.3 2.2-6 2.1-8.2-.2-2.3-2.2-2.4-6-.2-8.3.4-.4.4-1 0-1.4l-4.3-4.2s-.1-.1-.2-.1-.1-.1-.2-.1-.2 0-.3-.1H934c-.2 0-.4.1-.5.2l-9.4 9.4-18.9 18.9c-.4.4-.4 1 0 1.4l4.2 4.2c.4.4 1 .4 1.4 0 2.3-2.2 6.1-2.1 8.3.2 2.3 2.2 2.4 6 .2 8.3-.4.4-.4 1 0 1.4l4.2 4.2c.2.2.5.3.7.3s.5-.1.7-.3l14.8-14.8c.2 0 .3-.1.4-.2l4.2-4.2c.1-.1.1-.2.2-.3l8.7-8.7c.2-.2.3-.5.3-.8.1-.1 0-.4-.2-.6zm-19-16.2l2.9 2.9c-2.3 3.1-2 7.6.8 10.3 2.8 2.8 7.2 3.1 10.4.9l2.8 2.8-7.5 7.5-16.9-16.9 7.5-7.5zm-9.4 9.4l16.8 16.9-2.3 2.3-16.9-16.9 2.4-2.3zm-.6 34.4l-2.8-2.8c2.3-3.1 2-7.6-.8-10.3-2.8-2.8-7.2-3.1-10.4-.9l-2.8-2.8 9.8-9.8c0 .1.1.2.2.3l1.4 1.4c.2.2.5.3.7.3s.5-.1.7-.3c.4-.4.4-1 0-1.4l-1.4-1.4c-.1-.1-.2-.1-.3-.2l2.6-2.6 16.9 16.9-2.6 2.6c0-.2-.1-.3-.2-.4l-1.4-1.4c-.4-.4-1-.4-1.4 0s-.4 1 0 1.4l1.4 1.4c.1.1.3.2.4.2l-10 9.8z"></path><circle fill="#2FBE35" cx="940.2" cy="-1522.3" r="11"></circle><path fill="#FFF" d="M940.2-1510.3c-6.6 0-12-5.4-12-12s5.4-12 12-12 12 5.4 12 12-5.4 12-12 12zm0-22c-5.5 0-10 4.5-10 10s4.5 10 10 10 10-4.5 10-10-4.5-10-10-10z"></path><path fill="#FFF" d="M943.8-1517.5h-7c-.6 0-1-.4-1-1v-7c0-.6.4-1 1-1h7c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1zm-6-2h5v-5h-5v5z"></path></g></svg>
         <p class="title"><?php echo __('Closed', 'nirweb-support') ?></p>
         <p class="number c-green"><?php nirweb_ticket_count_closed_ticket_user_fr ()?></p>
         </div>
         <div class="col_box_status_ticket_wpyar" id="answered">
         <svg id="svg_answered-ticket" viewBox="0 0 48.6 48.6" style="width: 50px"><g transform="translate(-1179 1558)"><path fill="#FFF" d="M1195.102-1543.74l4.242-4.243 18.385 18.384-4.243 4.243z"></path><path fill="#E6E6E6" d="M1217.2-1529.2l9.4-9.4-4.2-4.2c-2.7 2.6-7.1 2.5-9.7-.2-2.7-2.6-2.8-7-.2-9.7l-4.2-4.3-9.4 9.4 18.3 18.4z"></path><path fill="#4D4D4D" d="M1204.3-1525.7c-.3 0-.5-.1-.7-.3l-2.7-2.7c-.4-.4-.4-1 0-1.4s1-.4 1.4 0l2.7 2.7c.4.4.4 1 0 1.4-.2.2-.5.3-.7.3zm-5.4-5.4c-.3 0-.5-.1-.7-.3l-2.7-2.7c-.4-.4-.4-1 0-1.4s1-.4 1.4 0l2.7 2.7c.4.4.4 1 0 1.4-.2.2-.5.3-.7.3z"></path><path fill="#4D4D4D" d="M1227.3-1539.4l-4.2-4.2c-.4-.4-1-.4-1.4 0-2.3 2.2-6 2.1-8.2-.2-2.3-2.2-2.4-6-.2-8.3.4-.4.4-1 0-1.4l-4.3-4.2s-.1-.1-.2-.1-.1-.1-.2-.1-.2 0-.3-.1H1208c-.2 0-.4.1-.5.2l-9.4 9.4-18.9 18.9c-.4.4-.4 1 0 1.4l4.2 4.2c.4.4 1 .4 1.4 0 2.3-2.2 6.1-2.1 8.3.2 2.3 2.2 2.4 6 .2 8.3-.4.4-.4 1 0 1.4l4.2 4.2c.2.2.5.3.7.3s.5-.1.7-.3l14.8-14.8c.2 0 .3-.1.4-.2l4.2-4.2c.1-.1.1-.2.2-.3l8.7-8.7c.2-.2.3-.5.3-.8.1-.1 0-.4-.2-.6zm-19-16.2l2.9 2.9c-2.3 3.1-2 7.6.8 10.3 2.8 2.8 7.2 3.1 10.4.9l2.8 2.8-7.5 7.5-16.9-16.9 7.5-7.5zm-9.4 9.4l16.8 16.9-2.3 2.3-16.9-16.9 2.4-2.3zm-.6 34.4l-2.8-2.8c2.3-3.1 2-7.6-.8-10.3-2.8-2.8-7.2-3.1-10.4-.9l-2.8-2.8 9.8-9.8c0 .1.1.2.2.3l1.4 1.4c.2.2.5.3.7.3s.5-.1.7-.3c.4-.4.4-1 0-1.4l-1.4-1.4c-.1-.1-.2-.1-.3-.2l2.6-2.6 16.9 16.9-2.6 2.6c0-.2-.1-.3-.2-.4l-1.4-1.4c-.4-.4-1-.4-1.4 0s-.4 1 0 1.4l1.4 1.4c.1.1.3.2.4.2l-10 9.8z"></path><path fill="#9F3FE5" d="M1213.2-1533.3c6.1 0 11 4.9 11 11s-4.9 11-11 11-11-4.9-11-11 4.9-11 11-11z"></path><path fill="#FFF" d="M1213.2-1510.3c-6.6 0-12-5.4-12-12 0-3.2 1.2-6.2 3.5-8.5s5.3-3.5 8.5-3.5h.1c6.6 0 12 5.4 12 12s-5.5 12-12.1 12zm0-23v1c-2.7 0-5.2 1.1-7.1 2.9-1.9 1.9-2.9 4.4-2.9 7.1 0 5.5 4.5 10 10 10s10-4.5 10-10-4.5-10-10-10v-1z"></path><path fill="#FFF" d="M1212.4-1517.6c-.2 0-.4-.1-.6-.2l-2.9-2.3c-.4-.3-.5-1-.2-1.4.3-.4 1-.5 1.4-.2l2.1 1.7 4.1-5.3c.3-.4 1-.5 1.4-.2.4.3.5 1 .2 1.4l-4.7 6.1c-.2.2-.4.3-.7.4h-.1z"></path></g></svg>
         <p class="title"><?php echo __('Answered', 'nirweb-support') ?></p>
         <p class="number c-purple"><?php nirweb_ticket_count_answered_ticket_user_fr ()?></p>
         </div>
         <div class="col_box_status_ticket_wpyar" id="all">
         <svg id="svg_total-ticket" viewBox="0 0 48.4 48.4" style="width: 50px"><g transform="translate(-2300 -319)"><path fill="#FEA000" d="M2318.241 335.827l3.748-3.747 16.475 16.475-3.748 3.748z"></path><path fill="#4D4D4D" d="M2326.4 352.4c-.3 0-.5-.1-.7-.3l-2.4-2.4c-.4-.4-.4-1 0-1.4s1-.4 1.4 0l2.4 2.4c.4.4.4 1 0 1.4-.2.2-.5.3-.7.3zm-4.9-4.9c-.3 0-.5-.1-.7-.3l-2.4-2.4c-.4-.4-.4-1 0-1.4s1-.4 1.4 0l2.4 2.4c.4.4.4 1 0 1.4-.1.2-.4.3-.7.3z"></path><path fill="#E6E6E6" d="M2338.4 348.5l9-9-3.8-3.8c-2.4 2.5-6.4 2.5-8.9.1-2.4-2.5-2.4-6.5.1-8.9l-3.8-3.8-9 9 16.4 16.4z"></path><path fill="#4D4D4D" d="M2348.4 339.5c0-.1 0-.3-.1-.4 0-.1-.1-.2-.2-.3l-3.8-3.8c-.2-.2-.4-.3-.7-.3-.3 0-.5.1-.7.3-.5.5-1.1.9-1.7 1.2h-.2c-.3.1-.5.2-.8.2-.3.1-.7.1-1 .1-1.4 0-2.7-.5-3.7-1.5l-.1-.1c-1-1-1.5-2.4-1.5-3.7 0-1.3.6-2.7 1.6-3.7.2-.2.3-.4.3-.7v-.1c0-.3-.1-.5-.3-.7l-3.8-3.8c-.4-.4-1-.4-1.4 0l-27 27c-.4.4-.4 1 0 1.4l3.8 3.8c.2.2.4.3.7.3.3 0 .5-.1.7-.3 2-2.1 5.4-2.1 7.5-.1 2 2.1 2 5.4-.1 7.5-.2.2-.3.4-.3.7 0 .3.1.5.3.7l3.8 3.8c.2.2.5.3.7.3.3 0 .5-.1.7-.3l14-13.9c.1 0 .3-.1.4-.2l3.7-3.7c.1-.1.1-.2.2-.2l8.6-8.6.1-.1c.1-.1.2-.2.2-.3.1-.2.1-.3.1-.5zm-14.4-3c.8.8 1.8 1.3 2.8 1.7.1 0 .3.1.4.1.2 0 .3.1.5.1.3.1.6.1.9.1h1c.2 0 .4 0 .6-.1.3 0 .5-.1.8-.2.1 0 .2-.1.4-.1.3-.1.7-.2 1-.4.1 0 .1 0 .2-.1.4-.2.7-.4 1.1-.7l1.2 1.2 1.2 1.2-7.5 7.5-15-15 7.5-7.5 2.4 2.4c-1.1 1.4-1.6 3.1-1.5 4.8 0 2 .7 3.7 2 5zm-12-3l15 15-2.3 2.3-15-15 2.3-2.3zm-1.6 31.5l-2.4-2.4c2.2-2.8 2-6.9-.6-9.6-2.6-2.6-6.7-2.7-9.6-.6l-2.4-2.4 9.1-9.1v.1l1.4 1.4c.2.2.5.3.7.3s.5-.1.7-.3c.4-.4.4-1 0-1.4l-1.4-1.4h-.1l2.3-2.3 15 15-2.3 2.3-1.4-1.4c-.4-.4-1-.4-1.4 0s-.4 1 0 1.4l1.4 1.4-9 9zM2301.4 347.3c-.3 0-.5-.1-.7-.3-.4-.4-.4-1 0-1.4l25.4-25.9c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4l-25.4 25.9c-.2.2-.4.3-.7.3z"></path></g></svg>
         <p class="title"><?php echo __('Total', 'nirweb-support') ?></p>
         <p class="number c-org"><?php nirweb_ticket_count_all_ticket_user_fr ()?></p>
        </div>
     </div>
        <div class="head_wpyar_tickt">
            <h3><?php echo __('List of tickets', 'nirweb-support') ?></h3>
            <?php if(is_plugin_active( 'wpyar_panel/wpyar_panel.php' )){ ?>
                <a class=" wpyar-ticket" href="?endp=new-ticket"><?php echo __('New Ticket', 'nirweb-support') ?></a>

           <?php }else{ ?>
     <a class=" wpyar-ticket" href="?action=new"><?php echo __('New Ticket', 'nirweb-support') ?></a>

            <?php }?>
        </div>
<di class="ajax_result">
<div class="base_list_ticket_uwpyar">
    <ul class="ul_list_ticket_uwpyar">
    <?php  foreach ($list_ticket[0] as $row) :  ?>
        <li>
            <a href="?action=reply&id=<?php echo $row->ticket_id ?>"  
            class="<?php
                    if (intval($row->status) == 1) {
                        echo 'arbitrator_wpyaru-red';
                    }
                    if (intval($row->status) == 2) {
                        echo 'arbitrator_wpyaru-blue';
                    }
                    if (intval($row->status) == 3) {
                        echo 'arbitrator_wpyaru-purple';
                    }
                    if (intval($row->status) == 4) {
                        echo 'arbitrator_wpyaru-green';
                    }
                                ?>" >
                <div class="info_user_time_wpyaru">
                <?php   echo get_avatar( $row->sender_id, 130); ?>
                    <div class="icon_nameUser">
                    <svg id="svg_username" viewBox="0 0 14.8 17.1" style="width: 17px"><path d="M10.9 7.3c.6-.8.9-1.7.9-2.8C11.8 2 9.8 0 7.3 0S2.8 2 2.8 4.5c0 1.1.4 2 1 2.8C1.5 8.6 0 11.1 0 13.7c0 2.3 3.7 3.4 7.4 3.4s7.4-1 7.4-3.3c0-2.7-1.5-5.2-3.9-6.5zM7.3 1c2 0 3.5 1.6 3.5 3.5 0 2-1.6 3.5-3.5 3.5-2 0-3.5-1.6-3.5-3.5S5.4 1 7.3 1zm.1 15.1c-3.1 0-6.4-.8-6.4-2.4 0-2.3 1.3-4.5 3.3-5.6.9.6 2 1 3.1 1s2.2-.3 3-1c2 1.1 3.3 3.3 3.3 5.6.1 1.6-3.2 2.4-6.3 2.4z"></path></svg>
                    <?php echo $user->display_name; ?>
                    </div>
                    <time>
                    <?php
                        $orig_time = strtotime( $row->time_update);
                        $date = strtotime($row->date_qustion);
                         echo $date = wp_date('d F', $date); ?>
                      
                            </time>
                </div>
                <div class="title_time_ticket">
                    <p><?php echo $row->subject ?></p>
                    <time>
                        <?php
                        $orig_time = strtotime( $row->time_update);
                       ago_ticket_nirweb($orig_time) ?>
                    </time>
                </div>
            </a>
        </li>
        <?php endforeach ?>
    </ul>
</div>
    <div class="pagination_ticket_index">
        <?php echo $list_ticket[1] ?>
    </div>
</di>
 </div>