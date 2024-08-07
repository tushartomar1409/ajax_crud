<?php
class User extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index() {
        $this->load->view('user_view');
    }

    public function save() {
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'address' => $this->input->post('address')
        );

        $result = $this->user_model->save_user($data);
        echo json_encode($result);
    }

    public function user_data() {
        $data = $this->user_model->user_list();
        echo json_encode($data);
    }

    public function update() {
        $id = $this->input->post('id');
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'address' => $this->input->post('address')
        );

        $result = $this->user_model->update_user($id, $data);
        echo json_encode($result);
    }

    public function delete() {
        $id = $this->input->post('id');
        $this->user_model->delete_user($id);
        echo json_encode(array('status' => 'success'));
    }
}
?>
