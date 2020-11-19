<?php
/**
 * Created by PhpStorm.
 * User: lcom53-two
 * Date: 2/12/2018
 * Time: 2:25 PM
 */
function manna_insert()
{

    ?>
<table>
    <thead>
    <tr>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <form name="frm" action="#" method="post">
    <tr>
        <td>Title:</td>
        <td><input type="text" name="title"></td>
    </tr>
    <tr>
        <td>Manna:</td>
        <td><input type="text" name="manna"></td>
    </tr>
  
    <tr>
        <td>Date:</td>
        <td><input type="date" name="date"></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" value="Insert" name="insert"></td>
    </tr>
    </form>
    </tbody>
</table>
<?php
    if(isset($_POST['insert'])){
        global $wpdb;
        $title=$_POST['title'];
        $manna=$_POST['manna'];
        $date =$_POST['date'];
        
        $table_name = $wpdb->prefix . 'daily_manna';

        $wpdb->insert(
            $table_name,
            array(
                'title' => $title,
                'manna' => $manna,
                'manna_date' => $date                
            )
        );

        
        $url =  admin_url('/admin.php?page=Daily_Manna');

        ?>
        <meta http-equiv="refresh" content="1; url=http://codexworld.test/wp-admin/admin.php?page=Daily_Manna" />
        <?php
        exit;
    }
}

