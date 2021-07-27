<?php

namespace Controller;

class SecurityController {
    public function login() {
        $this->model->login('login');
    }
    public function logout() {
        $this->model->logout('logout');
    }
    public function signup() {
        $this->model->signup('signup');
    }
    public function updateUser() {
        $this->model->updateUser('updateUser');
    }
}