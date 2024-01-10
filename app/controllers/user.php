<?php
class User extends Controller{
    public function wikis() {
       $this->view('client/wikis');
    }
    public function tags(){
        $this->view('client/tags');
    }
}









?>