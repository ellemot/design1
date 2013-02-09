<?php

class data_model extends CI_model {
	
	
	// public function getall() {
		// $q = $this->db->get('data'); //2nd parameter is limit, 3rd offset
		
		// if ($q->num_rows()> 0) {
		
			// foreach ($q->result() as $row) 
			// {
				// $data[]=$row;
				
			// }
			
			// return $data;
			// }
			
			// }
			
			
			
	// public function gettitle() {
	
		// $this->db->select ('title');
		// $q=$this->db->get('data');
		
		// if ($q->num_rows()> 0) {
		
			// foreach ($q->result() as $row) 
			// {
				// $data[]=$row;
				
			// }
			
			// return $data;
			// }
			
			//}
			
	public function getall() {
	
		$sql = 'select * from data where id = ?';
		$q = $this->db->query($sql,  2);
	
		if ($q->num_rows()> 0) {
		
			foreach ($q->result() as $row) 
			{
				$data[]=$row;
				
			}
			
			return $data;
			}
		}	
			
			
			}
		