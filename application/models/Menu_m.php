<?php
	class Menu_m extends MY_Model{
		protected $_table_name = 'menu';
		protected $_order_by = 'id';
		public $rules = array(
				array(
					'field' => 'icon',
					'rules' => 'trim|required'
					),
				array(
					'field' => 'text',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'type',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'link',
					'rules' => 'trim|required'
				)
			);
		public function __construct(){
			parent::__construct();
		}
	}
?>