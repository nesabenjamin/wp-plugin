<?php

/**
 * Template Name: Manna 
 * 
 * 
 */

 ?>

<?php get_header(); ?>
<section class="page-wrap">
<div class="container">


    <div class="row">
        <div class="col-lg-4">
            <h1><?php the_title(); ?> </h1>
        </div>
      
        <div class="col-lg-6 pt-2">

              
      
            <?php
                global $wpdb;
                $table_name = $wpdb->prefix . 'daily_manna';
                $date = date('Y-m-d');
                //$date = "2020-11-17";
                //echo $date;
                //SELECT id,title,manna, manna_date from wp_daily_manna where manna_date='2020-11-17'
                //$mannas = $wpdb->get_results("SELECT id,title,manna, manna_date from $table_name where id=2");
                $mannas = $wpdb->get_results("SELECT id,title,manna, manna_date from $table_name where manna_date='$date'");
                //print_r($mannas);
                if( sizeof($mannas ) < 1 ){
                    $mannas = $wpdb->get_results("SELECT id,title,manna, manna_date from $table_name limit 1");
                }
                $manna = $mannas[0];
                           ?>   
                      <strong> <?php echo $manna->title; ?> </strong> <br/>
                      <?php echo $manna->manna; ?>
           
                      
               
          

            


        </div>
    </div>



</div>
</section> 
    

<?php get_footer(); ?> 