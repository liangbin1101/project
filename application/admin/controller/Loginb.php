<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\captcha\Captcha;
use think\facade\Cookie;
use think\facade\Session;
use think\Request;

class Loginb extends Controller
{
    public function loginb()
    {
        return $this->fetch();
    }

    public function loginbDo()
    { 
    	$request = new Request();
    	$name = $request->post('name');
    	$password = $request->post('password');
    	// $password = md5($password);
    	$authcode = $request->post('authcode');
		$arr = Db::table('admin')->where('name',$name)->find(); 
        if ($arr) {
        	$all = ['name' => $name];
            Cookie::set('all',$all,3);
			if ($arr['password'] == $password) {
				$allp = ['password' => $password];
                Cookie::set('allp',$allp,3);
				$captcha = new Captcha();
				if ( !$captcha->check($authcode)) {
				    $this->redirect('Loginb/loginb');
				} else {
					if ($arr['is_show'] == 1) {
						Session::set('name',$arr['name']); 
	                    Session::set('id',$arr['id']); 
	                    $data = ['name' => $arr['name'],
	                             'login_time' => time(),
	                             'user_ip' => $_SERVER['REMOTE_ADDR'],
	                             'server_ip' => $_SERVER['SERVER_ADDR']
	                            ];
	                    Db::name('admin_log')->insert($data);
						$this->redirect('Index/index');
					} else {
			            $this->redirect('Loginb/loginb');
			        }
				}
			} else {
				$this->redirect('Loginb/loginb');
			}
		} else {
			$this->redirect('Loginb/loginb');
		} 
    }

    public function verify()
    {
		$config = [
            'length' => 3,
        ];
        $captcha = new Captcha($config);
        $captcha->codeSet = '0123456789';

        return $captcha->entry();    
    }


    public function change_psw()
    {
    	return $this->fetch();
    }

    
}