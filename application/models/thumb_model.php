<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Thumb_model extends CI_Model {
	public function image_get() {
		$query = $this->db->get_where('images', array('id' => $id), $limit, $offset);
	}
}

?>