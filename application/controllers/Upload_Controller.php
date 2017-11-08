<?php

class Upload_Controller extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
        }

        public function index()
        {
                $this->load->view('upload_form', array('error' => ' ' ));
        }

        public function do_upload()
        {
                $data = $_POST['userfile'];


                list($type, $data) = explode(';', $data);

                list(, $data)      = explode(',', $data);


                $data = base64_decode($data);

                $imageName = $this->session->user->id . '.png';

                file_put_contents('./assets/img/avatar/'.$imageName, $data);
        }
}
?>