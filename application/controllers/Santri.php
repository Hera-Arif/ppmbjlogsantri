<?php
	class Santri extends Admin_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('Santri_m');
			$this->load->model('Angkatan_m');
		}

		public function edit($id){
			$this->data['page_info'] = array(
					'title' => 'Santri Database',
					'css' => array('admin.css', 'switch.css'),
					'js' => array('counter.js')
				);
			$this->data['subview'] = 'admin/santri';

			$this->data['santriData'] = $this->Santri_m->get_by(array('id' => $id), TRUE);
			$this->data['angkatanData'] = $this->Angkatan_m->get_by(array('angkatan' => $this->data['santriData']->angkatan), TRUE);

			$rules = $this->Santri_m->rules;
			$this->form_validation->set_rules($rules);

			//form validation
			if($this->form_validation->run() == TRUE){
				$dataSantri = $this->Santri_m->array_from_post(array('name', 'angkatan', 'kosong'));
				$progress = array();

				for ($i=2; $i <= 605; $i++) { 
					if($this->input->post($i) != NULL) $progress[$i] = $i;
				}

				$dataSantri['progress'] = serialize($progress);

				$this->Santri_m->save($dataSantri, $id);

				redirect('admin/dashboard');
			}

			$this->load->view('components/main_layout', $this->data);
		}

		public function setting(){

			//Page Info
			$this->data['page_info'] = array(
				'title' => 'Setting | '.$this->session->userdata('name'),
				'css' => array('admin.css'),
				'js' => array('')
				);
			$this->data['subview'] = 'admin/setting';

			//validation
			$rules = array(
				array(
					'field' => 'password',
					'rules' => 'trim|required'
					),
				array(
					'field' => 'user',
					'rules' => 'trim|required|xss_clean'
					)
			);
			$this->form_validation->set_rules($rules);
			if($this->form_validation->run() == TRUE){
				$newUserData = (array)$this->Santri_m->get_by(array('id' => $this->session->userdata('id')),TRUE);

				$userData = $this->Santri_m->array_from_post(array('user', 'password'));

				$newUserData['name'] = $userData['user'];
				$newUserData['pass'] = $this->Santri_m->hash($userData['password']);
				$newUserData['level'] = $this->session->userdata('level');

				$this->Santri_m->save($newUserData, $this->session->userdata('id'));

				redirect('santri/setting', 'refresh');
			}
			
			//Load View
			$this->load->view('components/main_layout', $this->data);
		}

		public function delete($id){
			$this->Santri_m->delete($id);
			redirect('user', 'refresh');
		}
	}
?>