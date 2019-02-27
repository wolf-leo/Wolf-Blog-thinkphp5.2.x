<?php

namespace app\Common\Controller;

use think\Controller;

class BaseController extends Controller {

    public $view;

    public function __construct() {
        parent::__construct(new \think\App());
        include_once dirname(dirname(__FILE__)) . "/const.php";
        include_once dirname(dirname(__FILE__)) . "/define.php";
        $this->view = new \think\view;
        $config = [
            // 模板文件后缀
            'view_suffix' => 'php',
            // 模板文件名分隔符
            'view_depr' => '_',
        ];
        $this->view->config($config);
    }

}
