<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Voucher extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
        // Load member model
        $this->load->model('VoucherModel');
    }
    
    public function index(){
        $data = array();
        
        // Get rows count
        $conditions['returnType']     = 'count';
        $rowsCount = $this->VoucherModel->getRows($conditions);
        
        // Get rows
        $conditions['returnType'] = '';
        $data['voucher'] = $this->VoucherModel->getRows($conditions);
        $data['title'] = 'Voucher List';

        // Load the list page view
        $this->load->view('templates/header', $data);
        $this->load->view('voucher/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function memData(){
        $id = $this->input->post('id');
        if(!empty($id)){
            // Fetch member data
            $member = $this->VoucherModel->getRows(array('id'=>$id));
            
            // Return data as JSON format
            echo json_encode($member);
        }
    }

    public function listView(){
        $data = array();
        
        // Fetch all records
        $data['voucher'] = $this->VoucherModel->getRows();
            
        // Load the list view
        $this->load->view('voucher/view', $data);
    }
    
    public function add(){
        $verr = $status = 0;
        $msg = '';
        $memData = array();
        
        // Get user's input
        $voucher = $this->input->post('voucher');
        
        // Validate form fields
        if(empty($voucher)){
            $verr = 1;
            $msg .= 'Isi dong No Voucher.';
        }
        
        if($verr == 0){
            // Prepare member data
            $memData = array(
                'voucher'=> $voucher
            );
            
            // Insert member data
            $insert = $this->VoucherModel->insert($memData);
            
            if($insert){
                $status = 1;
                $msg .= 'Member has been added successfully.';
            }else{
                $msg .= 'Some problem occurred, please try again.';
            }
        }
        
        // Return response as JSON format
        $alertType = ($status == 1)?'alert-success':'alert-danger';
        $statusMsg = '<p class="alert '.$alertType.'">'.$msg.'</p>';
        $response = array(
            'status' => $status,
            'msg' => $statusMsg
        );
        echo json_encode($response);
    }
    
    public function edit(){
        $verr = $status = 0;
        $msg = '';
        $memData = array();
        
        $id = $this->input->post('id');
        
        if(!empty($id)){
            // Get user's input
            $voucher = $this->input->post('voucher');
            
            // Validate form fields
            if(empty($voucher)){
                $verr = 1;
                $msg .= 'Please enter your voucher.<br/>';
            }

            if($verr == 0){
                // Prepare member data
                $memData = array(
                    'voucher'=> $voucher
                );
                
                // Update member data
                $update = $this->VoucherModel->update($memData, $id);
                
                if($update){
                    $status = 1;
                    $msg .= 'Member has been updated successfully.';
                }else{
                    $msg .= 'Some problem occurred, please try again.';
                }
            }
        }else{
            $msg .= 'Some problem occurred, please try again.';
        }
        
        // Return response as JSON format
        $alertType = ($status == 1)?'alert-success':'alert-danger';
        $statusMsg = '<p class="alert '.$alertType.'">'.$msg.'</p>';
        $response = array(
            'status' => $status,
            'msg' => $statusMsg
        );
        echo json_encode($response);
    }
    
    public function delete(){
        $msg = '';
        $status = 0;
        
        $id = $this->input->post('id');
        
        // Check whether member id is not empty
        if(!empty($id)){
            // Delete member
            $delete = $this->VoucherModel->delete($id);
            
            if($delete){
                $status = 1;
                $msg .= 'Member has been removed successfully.';
            }else{
                $msg .= 'Some problem occurred, please try again.';
            }
        }else{
            $msg .= 'Some problem occurred, please try again.';
        }  
        
        // Return response as JSON format
        $alertType = ($status == 1)?'alert-success':'alert-danger';
        $statusMsg = '<p class="alert '.$alertType.'">'.$msg.'</p>';
        $response = array(
            'status' => $status,
            'msg' => $statusMsg
        );
        echo json_encode($response);
    }
    
    public function addVoucher(){
        function create_random($length)
        {
            $data = 'ABCDEFGHIJKLMNOPQRSTU1234567890';
            $string = '';
            for($i = 0; $i < $length; $i++) {
                $pos = rand(0, strlen($data)-1);
                $string .= $data{$pos};
            }
            return $string;
        }
        $n=strval($this->input->post('isi'));
        if($n>0){
            $a=1;
            while($a <= $n) {
                $voucher = create_random(15);
                $memData = array(
                    'voucher'=> $voucher
                );
                $insert = $this->VoucherModel->insert($memData);
                $a++;
            }
        }
        redirect(site_url('voucher'));
    }

}
