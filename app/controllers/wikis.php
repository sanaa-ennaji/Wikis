<?php

class Wikis extends Controller
{
    public function index()
    {

    }
    public function wikis(){
        $this->view('author/wikis');
    }

    public function tags(){
        $this->view('author/tags');
    }
  

}