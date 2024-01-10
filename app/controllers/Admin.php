<?php

class Admin extends Controller
{
    public function index()
    {

    }

    public function wikis(){
        $this->view('admin/wikiad');
    }

    public function tags(){
        $this->view('admin/tagad');
    }
    public function category(){
        $this->view('admin/categoryad');
        }
}