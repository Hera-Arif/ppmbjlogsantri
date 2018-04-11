<?php

	/*
		* Class ini mengatur CRUD pada tabel hadist yang menampung data hadist yang sudah diajarkan oleh pondok yang bersangkutan

		* Struktur database hadist
		- id: id hadist
		- nama: merupakan nama hadist yang dikaji
		- offset: menunjukkan jumlah halaman hadist yang dikaji

		@package model
		@author Logic_boys
	*/
	class Hadist_m extends MY_Model
	{
		protected $_table_name = 'hadist';
		protected $_order_by = 'id';

		public $rules = array(
				array(
					'field' => 'nama',
					'rules' => 'trim|required'
					),
				array(
					'field' => 'offset',
					'rules' => 'trim|required'
				)
			);

		public function __construct()
		{
			parent::__construct();
		}

		/*
			* Method ini digunakan untuk mengambil data hadist yang sudah diambil oleh santri untuk side menu

			@param $id int,string: id dari santri yang bersangkutan
		*/
		public function get_hadist_list($id)
		{
			$this->db->select('m.santri_id, h.nama, h.id');
			$this->db->from('hadist as h');
			$this->db->join('materi_hadist as m', 'm.hadist_id = h.id');
			$this->db->where(array('santri_id' => $id));
			return $this->db->get()->result();
		}

		/*
			* Method ini digunakan untuk mengambil data hadist yang sudah ditambahkan oleh santri beserta dengan hadist yang belum diambil (dan nilainya adalah null)
		*/
		public function get_hadist_added()
		{

			//$id santri menggunakan yang login saat ini
			$id = $this->session->userdata('id');
			$this->db->select('m.santri_id, h.nama, h.id, h.offset');
			$this->db->from('hadist as h');
			$this->db->join('(SELECT * FROM materi_hadist WHERE santri_id ='.$id.') as m', 
				'm.hadist_id = h.id', 
				'left'); //kunci null terletak pada left outer join

			//$this->db->where(array('santri_id' => $this->session->userdata('id')));
			return $this->db->get()->result();
		}
	}
?>