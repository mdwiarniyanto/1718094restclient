<?php
Class Kontak extends CI_Controller{

    var $API ="";

    function __construct() {
        parent::__construct();
        $this->API="http://localhost/nomer/index.php/";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    // menampilkan data kontak
    function index(){
        $data['datakontak'] = json_decode($this->curl->simple_get($this->API.'/kontak'));
        $this->load->view('kontak/list',$data);
    }

    // insert data kontak
    function create(){
        if(isset($_POST['submit'])){
            $data = array(
                'idkontak'       =>  $this->input->post('idkontak'),
                'kontak'      =>  $this->input->post('kontak'),
                'nomer'=>  $this->input->post('nomer'));
            $insert =  $this->curl->simple_post($this->API.'/kontak', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('kontak');
        }else{
            $this->load->view('kontak/create');
        }
    }

    // edit data kontak
    function edit(){
        if(isset($_POST['submit'])){
            $data = array(
                'idkontak'       =>  $this->input->post('idkontak'),
                'kontak'      =>  $this->input->post('kontak'),
                'nomer'=>  $this->input->post('nomer'));
            $update =  $this->curl->simple_put($this->API.'/kontak', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('kontak');
        }else{
            $params = array('idkontak'=>  $this->uri->segment(3));
            $data['datakontak'] = json_decode($this->curl->simple_get($this->API.'/kontak',$params));
            $this->load->view('kontak/edit',$data);
        }
    }

    // delete data kontak
    function delete($id){
        if(empty($id)){
            redirect('kontak');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/kontak', array('idkontak'=>$id), array(CURLOPT_BUFFERSIZE => 10)); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('kontak');
        }
    }
}