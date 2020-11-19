<?php

function manna_list() {
    ?>
    <style>
       * {
           margin:0;
           padding:0;
           box-sizing:border-box;
        }
        #wpwrap{
         
            border:1px solid coral;
        }
        table {
            border-collapse: collapse;    
            margin: 0 auto;
        }

        table, td, th {
            border: 1px solid #999;
            padding: 20px;
            text-align: center;
            color:#555;
        }

        table tr:hover{
            background-color: white;
        }
        table thead tr:hover {
            background-color: skyblue;
            color:white;
        }



    </style>
    <div class="wrap">
    <?php $url =  admin_url('/admin.php?page=manna_insert'); ?>
     <a href="<?php echo $url ?>"> Insert</a>
        <table>
            <thead>
            <tr>
                <th>Title</th>
                <th>Manna</th>  
                <th>Date</th>           
                <th>Update</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
            global $wpdb;
            $table_name = $wpdb->prefix . 'daily_manna';
            $employees = $wpdb->get_results("SELECT id,title,manna, manna_date from $table_name");
            foreach ($employees as $employee) {
                ?>
                <tr>                    
                    <td><?= $employee->title; ?></td>
                    <td><?= $employee->manna; ?></td>
                    <td><?= $employee->manna_date; ?></td>
                    <td><a href="<?php echo admin_url('admin.php?page=Manna_Update&id=' . $employee->id); ?>">Update</a> </td>
                    <td><a href="<?php echo admin_url('admin.php?page=Manna_Delete&id=' . $employee->id); ?>"> Delete</a></td>
                </tr>
            <?php } ?>

            </tbody>
            <!--<tbody>
            <tr>
                <td>1</td>
                <td>Hardik K. Vyas</td>
                <td>Php Developer</td>
                <td>+91 940894578</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Mark M. Knight</td>
                <td>Blog Writer</td>
                <td>630-531-9601</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Annie D. Naccarato</td>
                <td>Project Leader</td>
                <td>144-54-XXXX</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Jayesh P. Patel</td>
                <td>Web Designer</td>
                <td>+91 98562315</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Alvin B. Reddick</td>
                <td>ifone Developer</td>
                <td>619-11-XXXX</td>
            </tr>
            </tbody>-->
        </table>
    </div>
    <?php
   //echo admin_url('/admin.php?page=Daily_Manna');
}
add_shortcode('short_manna_list', 'manna_list');
?>