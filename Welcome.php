<?php

defined('BASEPATH') OR exit('No direct script access allowed');

define('DOMPDF_ENABLE_AUTOLOAD', false);

class Welcome extends CI_Controller {

    public function index() {
        // Load all views as normal
        include_once APPPATH . 'third_party/dompdf/autoload.inc.php';
        $dompdf = new \Dompdf\Dompdf();
        $data=array();
        $html = $this->load->view('welcome_message', $data, true);
        $paper = 'A4';
        $orientation = "portrait";
        $dompdf->setPaper($paper, $orientation);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream('Test.pdf', array("Attachment" => 0));
    }

}
