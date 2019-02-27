<?php

namespace app\Common\Controller;

class BlogBaseController extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->blogHeadNav();
    }

    //获取博客头部分类
    protected function blogHeadNav() {
        $category = new \app\admin\model\categoryModel();
        $background = new \app\admin\model\backgroundModel();
        $headernav = $category->getField(['status' => 1], 'id,title', 'sort asc');
        $backimg = $background->getOne(1);
        $this->view->assign(['headernav' => $headernav, 'backimg' => $backimg]);
    }

    public function jump404() {
        //只有在app_debug=False时才会正常显示404页面，否则会有相应的错误警告提示
        abort(404, '页面异常');
    }

    public function blogTpl() {
        //直接引入头部和底部文件，在新建页面模版的时候省去重复引入的环节
        $contrroller = strtolower(CONTROLLER_NAME);
        $action = strtolower(ACTION_NAME);
        return $this->view->fetch('public_head') . $this->view->fetch($contrroller . '_' . $action) . $this->view->fetch('public_foot');
    }

    //空方法
    public function _empty() {
        return $this->jump404();
    }

}
