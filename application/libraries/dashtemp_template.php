<?php

class Dashtemp_template 
{
    protected $_ci;
    
    function __construct()
    {        
        $this->_ci = &get_instance();
    }
    
    function display_dashtemp($template, $data = null)
    {        
        $data['_content'] = $this->_ci->load->view($template, $data, true);       
        $data['_header'] = $this->_ci->load->view("dashtemp_template/header_incld", $data, true); 
        $data['_menu'] = $this->_ci->load->view("dashtemp_template/menu_incld", $data, true); 
        $data['_footer'] = $this->_ci->load->view("dashtemp_template/footer_incld", $data, true); 
        $this->_ci->load->view("dashtemp_template/table_tmplt.php", $data);
    }
}
