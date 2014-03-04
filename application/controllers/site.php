<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

	public function index() {
        $this->load->model('image_model');
        
        if ($this->input->post('url')) {
            $this->image_model->file_put($this->input->post('url'));
            $data['pictures'] = $this->image_model->file_get();
        }
        
        $data['pictures'] = $this->image_model->file_get();

        $this->load->view('home_view', $data);
    }

    public function thumb() {
    	if (isset($_GET['url'])) {
            //do this
        }
    	
    	$this->load->view('thumb_view', $data);
    }
}
?>