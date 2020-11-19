<?php
//echo "update page";
function manna_update(){
    global $wpdb;
    
    $i=$_GET['id'];    
    $table_name = $wpdb->prefix . 'daily_manna';
    $mannas = $wpdb->get_results("SELECT id,title, manna, manna_date from $table_name where id=$i");
    $manna = $mannas[0];
    print_r($manna);
    echo $manna->id;
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
            <input type="hidden" name="id" value="<?= $manna->id; ?>">
            <tr>
                <td>Title:</td>
                <td><input type="text" name="title" value="<?= $manna->title; ?>"></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><input type="text" name="manna" value="<?= $manna->manna; ?>"></td>
            </tr>
           
            <tr>
                <td>Date</td>
                <?php 
                $time = strtotime($manna->manna_date);                        
                $newformat = date('Y-m-d', $time);
                echo $newformat;
                ?>
       
                <td><input type="date" name="manna_date" value="<?php echo $newformat; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Update" name="update"></td>
            </tr>
        </form>
        </tbody>
    </table>
    <?php
}
if(isset($_POST['update']))
{
    global $wpdb;
    $table_name=$wpdb->prefix.'daily_manna';
    $id=$_POST['id'];
    $title=$_POST['title'];
    $manna=$_POST['manna'];
    $manna_date=$_POST['manna_date'];
    
    $wpdb->update(
        $table_name,
        array(
            'title'=>$title,
            'manna'=>$manna,   
            'manna_date' => $manna_date     
        ),
        array(
            'id'=>$id
        )
    );

    
    header("location:http://codexworld.test/wp-admin/admin.php?page=Daily_Manna");
}
?>