<?php

class Wikis extends Controller
{
    public function index()
    {

    }

    public function wikis(){
        $this->view('client/wikis');
    }

    public function tags(){
        $this->view('client/tags');
    }
  
}