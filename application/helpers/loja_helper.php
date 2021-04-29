<?php 


function last_query(){
    $ci = & get_instance();
    debug( $ci->db->last_query() );
}

function debug( $data ){
    echo "<pre>";
    print_r( $data );
    echo "</pre>";
    exit();
}

function getSession($index)
{
    // Recupera o ponteiro da instancia do CodeIgniter
    $CI = &get_instance();
    // Se não existir a posição requirida CI retorna false
    $flag = $CI->session->userdata($index);

    if (!empty($flag)) {
        return $flag;
    }

    return false;
}

function setSession($values, $index = false)
{
    // Recupera o ponteiro da instancia do CodeIgniter
    $CI = &get_instance();

    if ($index !== false) {
        $CI->session->set_userdata($values, $index);

        return getSession($index);
    } 
    
    $CI->session->set_userdata($values);
    return;
}