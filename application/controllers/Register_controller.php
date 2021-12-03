<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register_controller extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('OFS/Register_model');     
    }

    public function addUser() {    

        if($_SERVER['REQUEST_METHOD']=='POST'){
            
            $this->form_validation->set_rules('first_name','First name','alpha|trim|required');
            $this->form_validation->set_rules('last_name','Last name','alpha|trim|required');
            $this->form_validation->set_rules('middle_name','Middle name','alpha|trim|required');
            $this->form_validation->set_rules('contact','Contact Number','trim|required|integer');
            $this->form_validation->set_rules('password','Password','trim|min_length[6]|max_length[20]|required');
            $this->form_validation->set_rules('confirm-pw','Password','trim|matches[password]|required');

            $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]',
                array(
                    'is_unique' => 'This %s already exists.'
                )
            );

            if($this->form_validation->run()==TRUE){
                $fn = $this->input->post('first-name');
                $sn = $this->input->post('last-name');
                $mn = $this->input->post('middle-name');
                $contact = $this->input->post('contact');
                $email = $this->input->post('email-address');
                $password = $this->input->post('password');
                $status = true;

                $data = array (
                    'first_name' => $fn,
                    'last_name' => $sn,
                    'middle_name' => $mn,
                    'contact' => $contact,
                    'email' => $email,
                    'password' => $password,
                    'status' => $status
                );
                
                $insert = $this->Register_model->addUser($data);            
                
                if ($insert) {
                    $this->session->set_flashdata('success', '');
                    redirect(base_url('index.php/OnlineFreelancingServices/Loginpage'));

                }
                else   
                    redirect(base_url('index.php/OnlineFreelancingServices/Registerpage'));

            }
        
        }
        

    }
}
