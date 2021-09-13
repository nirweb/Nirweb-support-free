
<?php
include_once NIRWEB_SUPPORT_INC_ADMIN_FUNCTIONS_TICKET.'func_list_tickets.php';
if(current_user_can('administrator')){ 
$tickets=nirweb_ticket_get_list_all_ticket();
}else{
    $tickets=nirweb_ticket_get_list_all_ticket_posht(get_current_user_id());

}
?>

<form method="post" id="list_all_ticket" name="list_all_ticket[]">
<table class="wp-list-table widefat striped">
    <thead>
    <tr>
        <th> <input type="checkbox" id="selectAll" /></th>
         <th>ID</th>
        <th><?php echo __('Status', 'nirweb-support')?></th>
        <th><?php echo __('Subject', 'nirweb-support')?></th>
        <th><?php echo __('Sender', 'nirweb-support')?></th>
        <th><?php echo __('Department', 'nirweb-support')?></th>
        <th><?php echo __('Priority', 'nirweb-support')?></th>
        <th><?php echo __('Product', 'nirweb-support')?></th>
        <th><?php echo __('Answer', 'nirweb-support')?></th>
    </tr>
    </thead>
    <tbody>


    <?php foreach ($tickets[0] as $ticket):
        $date = strtotime($ticket->date_qustion);
        $date = wp_date( 'Y-m-d H:i:s' , $date);

        ?>
        <tr style="border: solid 1px #ccc">
            <th><input type="checkbox" id="frm_check_items" name="frm_check_items[]" value="<?php echo $ticket->ticket_id?>"></th>
            <th><?php echo $ticket->ticket_id?></th>
            <th id="status"  class="<?php

            if(intval($ticket->status) == 1){echo 'wpy_th_status';}
            if(intval($ticket->status) == 2){echo 'wpy_suc_status';}
            if(intval($ticket->status) == 3){echo 'wpy_wa_status';}
            if(intval($ticket->status) == 4){echo 'wpy_da_status';}



            ?>"
                value="<?php echo $ticket->status ?>"><?php echo __( strtolower($ticket->name_status),'nirweb-support')?>
            </th>
            <th><a href="<?php echo get_bloginfo('url').'/wp-admin/admin.php?page=nirweb_ticket_send_ticket&action=edit&id='.$ticket->ticket_id   ?>" class="su_link_tik"><?php echo $ticket->subject?></a></th>
            <th><?php echo $ticket->user_login ?></th>
            <th><?php echo $ticket->depname?></th>
            <th><?php echo __( strtolower($ticket->proname),'nirweb-support')?></th>
            <th><?php echo $ticket->product_name?></th>
            <th><a href="<?php echo get_bloginfo('url').'/wp-admin/admin.php?page=nirweb_ticket_send_ticket&action=edit&id='.$ticket->ticket_id   ?>" class="answer_ticket_wpys"><span class="dashicons dashicons-edit"></span></a></a></th>
        </tr>
    <?php endforeach ?>
    </tbody>
    <tfoot>
    <tr>
        <th></th>
        <th>ID</th>
        <th><?php echo __('Status', 'nirweb-support')?></th>
        <th><?php echo __('Subject', 'nirweb-support')?></th>
        <th><?php echo __('Sender', 'nirweb-support')?></th>
        <th><?php echo __('Department', 'nirweb-support')?></th>
        <th><?php echo __('Priority', 'nirweb-support')?></th>
        <th><?php echo __('Product', 'nirweb-support')?></th>
        <th><?php echo __('Answer', 'nirweb-support')?></th>
    </tr>
    </tfoot>
</table>

</form>

<div class="nirweb_ticket_pagination">

<?php echo $tickets[1] ?>

</div>
 