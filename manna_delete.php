<?php

function manna_delete(){
    if(isset($_GET['id'])){
        global $wpdb;
        $table_name=$wpdb->prefix.'daily_manna';
        $i=$_GET['id'];
        $wpdb->delete(
            $table_name,
            array('id'=>$i)
        );
    }

    ?>
    <meta http-equiv="refresh" content="1; url=http://codexworld.test/wp-admin/admin.php?page=Daily_Manna" />
    <!-- <meta http-equiv="refresh" content="0; url=http://localhost/wordpressmyplugin/wordpress/wp-admin/admin.php?page=Employee_Listing" /> -->
    <?php
    //wp_redirect( admin_url('admin.php?page=page=Employee_List'),301 );
    //exit;
    //header("location:http://localhost/wordpressmyplugin/wordpress/wp-admin/admin.php?page=Employee_Listing");
}