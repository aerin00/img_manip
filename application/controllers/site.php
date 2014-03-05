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
        $this->load->model('image_model');
        
    	if (isset($_GET['image'])) {
            $id = $_GET['image'];
            $image_url = $this->image_model->file_get_thumb($id);
        }

    	$data['image_url'] = $image_url;
    	$this->load->view('thumb_view', $data);
    }
}
?>