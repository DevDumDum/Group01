<?php
$udata = $this->session->userdata('UserLoginSession');
            
if(!empty($key_posts)){


    foreach($key_posts as $p) {
        
    print_r($p);
        /*
        $id = $p['ID'];
        $name_id = $p['poster_ID'];
        $name = ($p['post_owner'] == '')? strval($p['post_owner']): "Anonymous";
        */

        $post = array();
        $post['id'] = $p['ID'];
        $post['name_id'] = $p['poster_ID'];
        $post['name'] = ($p['post_owner'] == '')
            ? strval($p['post_owner'])
            : "Anonymous";
        $post['work'] = ($p['profession_ID'] != 0) 
            ? $post['work'] = $key_works[$p['profession_ID']-1]['profession_type']
            : $post['work'] = $key_works[0]['profession_type'];

        echo'<script>'; 
        echo 'alert('.$p["post_owner"].');';
        echo 'initPost('.json_encode($post).');';
        echo '</script>';
    }
}
?>