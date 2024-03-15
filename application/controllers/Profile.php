<?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Profile extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->Auth_model->cek_session();
            $this->load->model('Users_model');
        }
        public function index()
        {
            $data['user'] = $this->Users_model->get_data($this->session->userdata('user_id'));
            $data['title'] = 'Profile';
            $this->load->view('layout/header.php',$data);
			if($this->session->userdata('user_role') == 'admin'){
				$this->load->view('pages/profile/index.php',$data);
			}else{
				$this->load->view('pages/profile/profile_tuser.php',$data);
			}
            $this->load->view('layout/footer.php');
        }
        public function update()
        {
            $id = $this->session->userdata('user_id');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('flash-gagal', 'Di Update');
                return redirect('profile');
            } else {
                $data = [
                    'nama' => htmlspecialchars($this->input->post('nama')),
                    'email' => htmlspecialchars($this->input->post('email')),
                ];
                $this->Users_model->update_profile($data, $id);
            }
        }
		public function update_tuser()
        {
            $id = $this->session->userdata('user_id');
            $this->form_validation->set_rules('no_telp', 'No Telp', 'required');
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('konter', 'Konter', 'required');
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('flash-gagal', 'Di Update');
                return redirect('profile');
            } else {
                $data = [
                    'nama' => htmlspecialchars($this->input->post('nama')),
                    'nomor_telp' => htmlspecialchars($this->input->post('no_telp')),
                    'nama_konter' => htmlspecialchars($this->input->post('konter')),
                ];
                $this->Users_model->update_profile($data, $id);
            }
        }
        public function update_password()
        {
            $id = $this->session->userdata('user_id');
            $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
            $this->form_validation->set_rules('new_password', 'New Password', 'required|trim|min_length[6]');
            $user = $this->db->get_where('users', ['id' => $id])->row_array();
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('flash-gagal', 'Di Updatee');
                redirect('profile');
            } else {
                $current_password = htmlspecialchars($this->input->post('current_password'));;
                $new_password = htmlspecialchars($this->input->post('new_password'));
                if (!password_verify($current_password, $user['password'])) {
                    $this->session->set_flashdata('pesan', '<script>Swal.fire({
                        title: "Warning",
                        text: "Password saat ini yang anda masukkan salah!",
                        icon: "warning"
                      });</script>');
                    redirect('profile');
                } else {
                    if ($current_password == $new_password) {
                        $this->session->set_flashdata('pesan', '<script>Swal.fire({
                            title: "Warning",
                            text: "Password baru tidak boleh sama dengan password saat ini!",
                            icon: "warning"
                          });</script>');
                        redirect('profile');
                    } else {
                        $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                        $this->db->set('password', $password_hash);
                        $this->db->where('id', $id);
                        $this->db->update('users');
                        $this->session->set_flashdata('flash', 'Di Update');
                        redirect('profile');
                    }
                }
            }
        }
        }
