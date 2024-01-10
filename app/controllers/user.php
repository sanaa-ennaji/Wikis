<?php
class User extends Controller{
    public function wikis() {
       $this->view('author/wikis');
    }
    public function tags(){
        $this->view('author/tags');
    }
}


?>