<?php

namespace app\index\controller;

use app\Common\Controller\BlogBaseController;

class Info extends BlogBaseController {

    protected $mod;

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $id = input('id/d', 0);
        if (!$id) {
            return $this->jump404();
        }
        $mod = new \app\admin\model\articleModel();
        $info = $mod->getOne($id);
        if (!$info) {
            return $this->jump404();
        }
        $this->view->assign([
            'info' => $info,
            'type' => $info['type'],
            'title' => $info['title'],
        ]);
        return $this->blogTpl();
    }

}
