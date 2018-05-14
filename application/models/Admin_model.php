<?php

class Admin_model extends CI_Model {

    public function auth($username, $password) {
        
        $sql = "SELECT * 
                FROM admins 
                WHERE username = ?
                AND passwd = ? ";

        $binding = [ $username, $password ];
        return $this->db->query($sql, $binding);
    }

}

