<?php
class User_model extends CI_Model {
    
    public function save_user($data) {
        $this->db->insert('users', $data);
        if ($this->db->affected_rows() > 0) {
            return array('status' => 'success');
        } else {
            return array('status' => 'error');
        }
    }

    public function user_list() {
        $res = $this->db->get('users');
        return $res->result();
    }

    public function update_user($id, $data) {
        $this->db->where('id', $id);
        if ($this->db->update('users', $data)) {
            return array('status' => 'success');
        } else {
            return array('status' => 'error');
        }
    }

    public function delete_user($id) {
        $this->db->where('id', $id);
        if ($this->db->delete('users')) {
            return array('status' => 'success');
        } else {
            return array('status' => 'error');
        }
    }
}
?>
