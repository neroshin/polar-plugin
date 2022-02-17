<?php
/**
 * Plugin Name: polar-plugin
 * Plugin URI: 
 * Description: The very first plugin that I have ever created.
 * Version: 1.0
 * Author: Romano
 */

// function that runs when shortcode is called

function wpb_polar2() { 
 
    // Things that you want to do. 

   
    ob_start();
  
    // Output needs to be return
    if ( is_user_logged_in() )include(plugin_dir_path(__FILE__).'polarchart2.php');
    $out = ob_get_clean();
    return $out;
    
}

add_shortcode('polar2', 'wpb_polar2'); 

function wpb_polar() { 
 
    // Things that you want to do. 

   
    ob_start();
  
    // Output needs to be return
    if ( is_user_logged_in() )include(plugin_dir_path(__FILE__).'polarchart.php');
    $out = ob_get_clean();
    return $out;
    
}

add_shortcode('polar1', 'wpb_polar'); 


function wo_funciton_thingtodo_life() { 
 
    // Things that you want to do. 

   
    ob_start();
  
    // Output needs to be return
    if ( is_user_logged_in() )include(plugin_dir_path(__FILE__).'/templates/template-thing-to-do-life.php');
    $out = ob_get_clean();
    return $out;
    
}

add_shortcode('thingtodo_life', 'wo_funciton_thingtodo_life'); 

    
function wo_funciton_thingtodo_business() { 
 
    // Things that you want to do. 

   
    ob_start();
  
    // Output needs to be return
    if ( is_user_logged_in() )include(plugin_dir_path(__FILE__).'/templates/template-thing-to-do-business.php');
    $out = ob_get_clean();
    return $out;
    
}

add_shortcode('thingtodo_business', 'wo_funciton_thingtodo_business');

function idealWeek(){
    ob_start();
    if ( is_user_logged_in() )include(plugin_dir_path(__FILE__).'/templates/template-ideal-week.php');
    $out = ob_get_clean();
    return $out;
}
add_shortcode('ideal_week', 'idealWeek');

function visionBoard(){
    ob_start();
    if ( is_user_logged_in() )include(plugin_dir_path(__FILE__).'/templates/template-vision-board.php');
    $out = ob_get_clean();
    return $out;
}
add_shortcode('vision_board', 'visionBoard');

function goalsetting(){
    ob_start();
    if ( is_user_logged_in() )include(plugin_dir_path(__FILE__).'/templates/template-goal-setting.php');
    $out = ob_get_clean();
    return $out;
}
add_shortcode('goal_setting', 'goalsetting');


function goalaction(){
    ob_start();
    if ( is_user_logged_in() )include(plugin_dir_path(__FILE__).'/templates/template-goal-action.php');
    $out = ob_get_clean();
    return $out;
}
add_shortcode('goal_action', 'goalaction');

function polarPrint(){
    ob_start();
    if ( is_user_logged_in() )include(plugin_dir_path(__FILE__).'/templates/print-polar.php');
    $out = ob_get_clean();
    return $out;
}
add_shortcode('polar_print', 'polarPrint');

function alist(){
    ob_start();
    if ( is_user_logged_in() )include(plugin_dir_path(__FILE__).'/templates/template-a-list.php');
    $out = ob_get_clean();
    return $out;
}
add_shortcode('a_list', 'alist');


function healthWellbieng(){
    ob_start();
    if ( is_user_logged_in() )include(plugin_dir_path(__FILE__).'/templates/template-healt-and-wellbeing.php');
    $out = ob_get_clean();
    return $out;
}
add_shortcode('health_wellbeing', 'healthWellbieng');




// ---------------------------------------------------------END SHORT CODES

function dataPolarScript() { 
    global $wpdb;
	
	  $user = wp_get_current_user();
         $userID = $user->ID;
        //  SELECT * FROM tbl_polar where time IN (select max(time) from tbl_polar WHERE `class` = 'life' AND `user_id` = '1' GROUP BY class)
     $liferesult = $wpdb->get_results('SELECT * FROM tbl_polar where time IN (select max(time) from tbl_polar where class="life" AND user_id = '.$userID.' GROUP BY class)');
	
     $businessresult = $wpdb->get_results('SELECT * FROM tbl_polar where time IN (select max(time) from tbl_polar where class="business" AND user_id = '.$userID.' GROUP BY class)');
    //  testing
     $idealweek = $wpdb->get_results('SELECT * FROM tbl_polar where time IN (select max(time) from tbl_polar where class="week" AND user_id = '.$userID.' GROUP BY class)');

     $visionboard = $wpdb->get_results('SELECT * FROM tbl_polar where time IN (select max(time) from tbl_polar where class="vision" AND user_id = '.$userID.' GROUP BY class)');
     
     $goalsetting = $wpdb->get_results('SELECT * FROM tbl_polar where time IN (select max(time) from tbl_polar where class="goal" AND user_id = '.$userID.' GROUP BY class)');

     $alist = $wpdb->get_results('SELECT * FROM tbl_polar where time IN (select max(time) from tbl_polar where class="list" AND user_id = '.$userID.' GROUP BY class)');
     // $liferesult = $wpdb->get_results('SELECT * FROM tbl_polar where time IN (select max(time) from tbl_polar WHERE `class` = `life` AND `user_id` = '.$userID.' GROUP BY class)');
	
    //  $businessresult = $wpdb->get_results(' SELECT * FROM tbl_polar where time IN (select max(time) from tbl_polar WHERE `class` = `business` AND `user_id` = '.$userID.' GROUP BY class)');
   
  
    
    if(isset($liferesult[0]->value)){
        $life = json_encode(unserialize($liferesult[0]->value));
    }
    if(isset($businessresult[0]->value)){
        $business = json_encode(unserialize($businessresult[0]->value));
    }
    if(isset($idealweek[0]->value)){
        $idealweek = json_encode(unserialize($idealweek[0]->value));
    }
    if(isset($visionboard[0]->value)){
        $visionboard = json_encode(unserialize($visionboard[0]->value));
    }
    if(isset($goalsetting[0]->value)){
        $goalsetting = json_encode(unserialize($goalsetting[0]->value));
    }
    if(isset($alist[0]->value)){
        $alist = json_encode(unserialize($alist[0]->value));
    }
	
    // print_r($businessresult);
   
	 
	if(empty($businessresult)){
		$business = array();
		$business["data"] = array(
			10 , 10 , 10 , 10 , 10 , 10 , 10  , 10 
		);
		$business["labels"] = array(
			"Accounts" , "New Clients" , "Current Clients" , "Systems" , "Products" , "Event" , "Team" , "Social Media" 
		);
		$business["backgroundColor"] = array(
			'rgba(222, 45, 51, 1 )'  , 'rgba(240, 82, 53, 1 )', 'rgba(255, 152, 0, 1 )' , 'rgba(227, 198, 32, 1 )' , 'rgba(140, 198, 63, 1 )' ,'rgba(0, 172, 203, 1 )' , 'rgba(0, 129, 152, 1 )' ,  'rgba(131, 76, 149, 1 )'
		);
		
		$business = json_encode($business);

	} 
	
	
	
	 // if(empty($liferesult)){
	if(empty($liferesult)){
		
		
		
		
		
		$life = array();
		$life["data"] = array(
			10 , 10 , 10 , 10 , 10 , 10 , 10  , 10 
		);
		$life["labels"] = array(
			"Family" , "Health" , "Diet" , "Budget" , "Self-care" , "Travel" , "Exercise" , "Relationship"  
		);
		$life["backgroundColor"] = array(
			'rgba(222, 45, 51, 1 )'  , 'rgba(240, 82, 53, 1 )', 'rgba(255, 152, 0, 1 )' , 'rgba(227, 198, 32, 1 )' , 'rgba(140, 198, 63, 1 )' ,'rgba(0, 172, 203, 1 )' , 'rgba(0, 129, 152, 1 )' ,  'rgba(131, 76, 149, 1 )'
        );
        // $life["things_todo"] = array(
        //     "","","","","","",""
        // );
		

		$life = json_encode($life);
    } 
    
	
	 



    // echo "<script>var life = $life;var business = $business;</script>";
    echo "<script>var life = $life;var business = $business;var idealweek = $idealweek; var visionboard = $visionboard; var goalsetting = $goalsetting; var alist = $alist;</script>";
 
}
add_action('wp_head', 'dataPolarScript' , 100); 

function randomColor(){
    return 'rgba('.rand(0,255).', '.rand(0,255).', '.rand(0,255).', 0.5 )';
  
}
 
    
    function save_data_polar(){
        //echo "hello world ako";
        // save here
        $user = wp_get_current_user();
         $userID = $user->ID;
         $class =   $_POST["class"];
        global $wpdb;
     /*  
	   echo "<pre>";
		print_r($_POST); 
	   */
	  $todo = array();
	  
	  echo($class);
	  
	/*   echo array_key_exists("name",$_POST['things_todo'][0]);
	  echo $_POST['things_todo'][0]["name"]; */
	  if(isset($_POST['things_todo'] ) && isset( $_POST['things_todo'][0]["name"]) ){
        foreach($_POST['things_todo'] as $key => $value){
           // eval($value['name'] );
           
           
            // print("$".$value['name'] ." = '" . $value['value']."'; <br>");
            eval("$".$value['name'] ." = '" . $value['value']."';");
          
        }
         

         
         $_POST['things_todo'] = $todo;
     }
      $result = $wpdb->get_results("SELECT * FROM `tbl_polar` WHERE DATE(time) = CURDATE()  AND time IN (select max(time) from tbl_polar where `class` = '$class' AND `user_id` = '$userID' GROUP BY class)");
    
      
  /*   echo "<pre>";
      print_r($_POST); */
     if(empty($result)){
           $wpdb->insert( "tbl_polar",
          array(  "value" => maybe_serialize($_POST) , "class" => $class ,  "user_id" => $userID ) , array('%s'  , '%s' , '%d'));
 
         echo $wpdb->insert_id;
       }
       else{
          $wpdb->update( "tbl_polar", array( 'value' =>  maybe_serialize($_POST)) ,array('id'=> $result[0]->id ));
       }

        die();
    }
    add_action( 'wp_ajax_save_data_polar', 'save_data_polar' );
    add_action( 'wp_ajax_nopriv_save_data_polar', 'save_data_polar' );






    function save_ideal_week(){


        // echo "hello world";

        $user = wp_get_current_user();
         $userID = $user->ID;
         $class =   $_POST["class"];
        global $wpdb;
        
        $result = $wpdb->get_results("SELECT * FROM `tbl_polar` WHERE DATE(time) = CURDATE()  AND time IN (select max(time) from tbl_polar where `class` = '$class' AND `user_id` = '$userID' GROUP BY class)");
        $respond = array();
    
        if(empty($result)){
            $wpdb->insert( "tbl_polar",
           array(  "value" => maybe_serialize($_POST) , "class" => $class ,  "user_id" => $userID ) , array('%s'  , '%s' , '%d'));
  
          echo $wpdb->insert_id;
          $respond["success"] = true;
        }
        else{
            $wpdb->update( "tbl_polar", array( 'value' =>  maybe_serialize($_POST)) ,array('id'=> $result[0]->id ));
            $respond["success"] = true;
        }
 
        echo json_encode($respond);


        die();
	
		
    }
    add_action( 'wp_ajax_save_ideal_week', 'save_ideal_week' );
    add_action( 'wp_ajax_nopriv_save_ideal_week', 'save_ideal_week' );


    function submit_vision(){
        $user = wp_get_current_user();
         $userID = $user->ID;
         $class =   $_POST["class"];
        global $wpdb;

        $result = $wpdb->get_results("SELECT * FROM `tbl_polar` WHERE DATE(time) = CURDATE()  AND time IN (select max(time) from tbl_polar where `class` = '$class' AND `user_id` = '$userID' GROUP BY class)");
        if(empty($result)){
            $wpdb->insert( "tbl_polar",
           array(  "value" => maybe_serialize($_POST) , "class" => $class ,  "user_id" => $userID ) , array('%s'  , '%s' , '%d'));
  
          echo $wpdb->insert_id;
         
        }
        else{
            $wpdb->update( "tbl_polar", array( 'value' =>  maybe_serialize($_POST)) ,array('id'=> $result[0]->id ));
           
        }

        die();

    }
    add_action( 'wp_ajax_submit_vision', 'submit_vision' );
    add_action( 'wp_ajax_nopriv_submit_vision', 'submit_vision' );




    function save_goal(){
        $user = wp_get_current_user();
         $userID = $user->ID;
         $class =   $_POST["class"];
        global $wpdb;

        $result = $wpdb->get_results("SELECT * FROM `tbl_polar` WHERE DATE(time) = CURDATE()  AND time IN (select max(time) from tbl_polar where `class` = '$class' AND `user_id` = '$userID' GROUP BY class)");
        if(empty($result)){
            $wpdb->insert( "tbl_polar",
           array(  "value" => maybe_serialize($_POST) , "class" => $class ,  "user_id" => $userID ) , array('%s'  , '%s' , '%d'));
  
          echo $wpdb->insert_id;
         
        }
        else{
            $wpdb->update( "tbl_polar", array( 'value' =>  maybe_serialize($_POST)) ,array('id'=> $result[0]->id ));
           
        }

        die();
    }
    add_action( 'wp_ajax_save_goal', 'save_goal' );
    add_action( 'wp_ajax_nopriv_save_goal', 'save_goal' );



    function save_list(){
        $user = wp_get_current_user();
         $userID = $user->ID;
         $class =   $_POST["class"];
        global $wpdb;

        $result = $wpdb->get_results("SELECT * FROM `tbl_polar` WHERE DATE(time) = CURDATE()  AND time IN (select max(time) from tbl_polar where `class` = '$class' AND `user_id` = '$userID' GROUP BY class)");
        if(empty($result)){
            $wpdb->insert( "tbl_polar",
           array(  "value" => maybe_serialize($_POST) , "class" => $class ,  "user_id" => $userID ) , array('%s'  , '%s' , '%d'));
  
          echo $wpdb->insert_id;
         
        }
        else{
            $wpdb->update( "tbl_polar", array( 'value' =>  maybe_serialize($_POST)) ,array('id'=> $result[0]->id ));
           
        }

        die();
    }
    add_action( 'wp_ajax_save_list', 'save_list' );
    add_action( 'wp_ajax_nopriv_save_list', 'save_list' );



     function plugin_on_activate(){
			
        global $wpdb;
        
        $table_name = 'tbl_polar';
        
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE `{$table_name}` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `value` text NOT NULL,
            `class` varchar(24) NOT NULL,
            `user_id` int(16) NOT NULL,
            `time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
            PRIMARY KEY  (id)
        ) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }
register_activation_hook( __FILE__, 'plugin_on_activate' );



 add_action( 'wp_footer','load_script_polar'  );
 
 
function load_script_polar() {
	
	

	
	 
	wp_register_script( "load_script_front_polar", plugins_url( '/assets/front-end-script.js' , __FILE__ ), array('jquery') );
	wp_register_script( "load_script_front_polar", plugins_url( '/assets/build/pdf.js' , __FILE__ ), array('jquery') );
		
	wp_localize_script( 'load_script_front_polar', 'polar_AjaxAdmin', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) , 'nonce' =>   wp_create_nonce('ajax-nonce')));
			
	
	wp_enqueue_script( 'load_script_front_polar' ); 
	
	
	
} 




function call_me_ajax(){

    $response = array();

    $args = array(
        'post_type' => 'PDF',
        'post_status' => 'publish',
      );
 
      $myPost = new WP_Query( $args );



        if( $myPost->have_posts() ) {
            $meth = array();
            $ds = array();
            for($i ; $i <= count($myPost->posts); $i++){
                // $myPost->the_post();
                // array_push($meth, get_field($myPost->posts[$i]->ID, 'content', true));
                array_push($meth, get_post_meta($myPost->posts[$i]->ID, '', TRUE));
                array_push($ds, $myPost->posts);
                // var_dump($myPost->posts);
                // $response['zxczxczxc'] = $myPost;
            }
            $response['metas'] = $meth;
            // $response['zxczxczxc'] = $myPost;
            $response['zxczxczxc'] = $ds;
            
        }
        else {
            echo 'Oh ohm no post!';
            die();
        }


        
        // echo json_encode(get_post_meta(2518, '', TRUE));

        // $asd = wp_get_attachment_url(2503);
        echo json_encode($response);
        die();

}
add_action( 'wp_ajax_call_me_ajax', 'call_me_ajax' );
add_action( 'wp_ajax_nopriv_call_me_ajax', 'call_me_ajax' );




    
 
 

 ?>