<?php
namespace app\index\controller;

use think\Controller;

class Touch extends Controller
{
    public function touch()
    {
        return $this->fetch();
    }

  
}