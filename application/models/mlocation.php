<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Mlocation extends CI_Model {
	 
		public function reg_insert($data) {
			$this->db->insert('bz_location', $data);
			return $this->db->insert_id();
		}
		
		public function query_location() {
			$query = $this->db->order_by('id', 'desc');
			$query = $this->db->get('bz_location');
			if($query->num_rows() > 0) {
				return $query->result();
			}
		}
		
		public function query_location_id($data) {
			$query = $this->db->where('id', $data);
			$query = $this->db->get('bz_location');
			if($query->num_rows() > 0) {
				return $query->result();
			}
		}
		
		public function update_location($id, $data) {
			$this->db->where('id', $id);
			$this->db->update('bz_location', $data);
			return $this->db->affected_rows();	
		}
		
		public function delete_location($id) {
			$this->db->where('id', $id);
			$this->db->delete('bz_location');
			return $this->db->affected_rows();
		}
	}