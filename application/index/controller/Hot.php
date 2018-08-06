<?php
namespace app\index\controller;

use think\Controller;

class Hot extends Controller
{
    public function hot()
    {
        return $this->fetch();
    }

  
}