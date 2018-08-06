<?php
namespace app\admin\controller;

use think\Controller;

class Article extends Controller
{
    
    public function article()
    {
    	return $this->fetch('article/Wenzhang_xinwen');
    }
    

  
}