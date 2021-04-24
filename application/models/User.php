<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model 
{
    function get_user_by_email($email)
    {
        $query = "SELECT * FROM users WHERE email=?";
        return $this->db->query($query, $this->security->xss_clean($email))->result_array()[0];
    }

    function validate_signin($user, $password)
    {
        $hash_password = $this->security->xss_clean($password);

        if($user && $user['password'] == md5($hash_password)) 
        {
            return "success";
        }
        else 
        {
            return "Incorrect email/password.";
        }
    }
    function create_user($user)
    {
        $query = "INSERT INTO users (first_name, last_name, email, password, user_level, created_at) VALUES (?,?,?,?,?,?)";
        $values = array(
            $this->security->xss_clean($user['first_name']),
            $this->security->xss_clean($user['last_name']),
            $this->security->xss_clean($user['email']),
            md5($this->security->xss_clean($user['password'])),
            1,
            date("Y-m-d, H:i:s")
        );
        return $this->db->query($query, $values);
    }
}



