<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Image_model extends CI_Model {
    public function file_get() {
        //get pictures
        $query = $this->db->query('SELECT * FROM images;');

        foreach ($query->result() as $row) {
           $db_result[] = array(
            'id' => $row->id,
            'image_url' => $row->image_url,
            'thumb_url' => $row->thumb_url
            );
        }
        return $db_result;
    }
        
        
        /*$files = scandir(FCPATH.'assets/images');
        $files = array_diff($files, array('.','..', 'thumbs'));
        
        $pictures = array();
        
        foreach ($files as $file) {
            $pictures [] = array (
                'url' => base_url().'assets/images/' . $file,
                'thumb_url' => base_url().'assets/images/thumbs/' . $file);
            }
        //return $pictures; */
    
    //download picture into folder and upload filepath into database
    public function file_put($url) {
        $filename = substr($url, strrpos($url, '/') + 1); //cut up the URL so we only end up with file name.jpg
        file_put_contents('assets/images/'.$filename, file_get_contents($url)); //grab the same folder level as index.php, download the URL picture, and upload into supplied path
        
        $config['image_library'] = 'gd2';
        $config['source_image']	= FCPATH.'assets/images/'.$filename;
        $config['new_image'] = FCPATH.'assets/images/thumbs';
        $config['maintain_ratio'] = TRUE;
        $config['width']	 = 150;
        $config['height']	= 150;
        
        $this->load->library('image_lib', $config); 
        
        $this->image_lib->resize();
        if ( ! $this->image_lib->resize()) {
        echo $this->image_lib->display_errors();
        }

        // insert the path and image file into database
        $url = base_url().'assets/images/' . $filename;
        $thumb_url = base_url().'assets/images/thumbs/' . $filename;

        $data = array (
            'image_url' => $url,
            'thumb_url' => $thumb_url
            );

        $this->db->insert('images' , $data);
        }

    public function file_get_db() {
        $query = $this->db->query('SELECT * FROM images;');

        foreach ($query->result_array() as $row) {
           $id = $row['id'];
        }
        return $id;
    }
}

?>