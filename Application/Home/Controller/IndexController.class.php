<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController {
    public function index(){

        $tmp = @file_get_contents('./Application/Common/Conf/config.php');
        if (strstr($tmp, "showdoc not install")) {
            header("location:./install");
            exit();
        }
        $this->checkLogin(false);
        $login_user = session("login_user");
        if (LANG_SET == 'en-us') {
            $demo_url = "https://www.showdoc.cc/demo-en";
            $help_url = "https://www.showdoc.cc/help-en";
            $creator_url = "https://github.com/star7th";
        }
        else{
            $demo_url = "https://www.showdoc.cc/demo";
            $help_url = "https://www.showdoc.cc/help";
            $creator_url = "https://blog.star7th.com/";
        }

        $items  = D("Item")->select();
        
        $share_url = get_domain().__APP__.'/uid/'.$login_user['uid'];

        $this->assign("items" , $items);
        $this->assign("login_user" , $login_user);
        $this->assign("share_url" , $share_url);
        $this->display();
    }
}