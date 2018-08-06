<?php
namespace app\admin\controller;

use think\Controller;

class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function public_left()
    {
    	return $this->fetch();
    }

    public function public_header()
    {
    	return $this->fetch();
    }
    
    public function wenzhang_xinwen()
    {
    	return $this->fetch();
    }
    
    public function public_super_cg()
    {
        return $this->fetch();
    }

    public function public_left_cg()
    {
        return $this->fetch();
    }

    public function super_cg()
    {
        return $this->fetch();
    }

  
}

