<?php

namespace app\admin\controller;

use app\Common\Controller\AdminBaseController;

class Category extends AdminBaseController {

    protected $mod;

    public function __construct() {
        parent::__construct();
        $this->mod = new \app\admin\model\categoryModel();
        $this->view->assign([
            'notes' => $this->mod->notes,
        ]);
    }

    public function index() {
        $page = input('page', 1);
        $pageSize = 5; //每页显示的数量
        $where = [];
        if (input('id')) {
            $where[] = ['id', '=', input('id')];
        }
        $list = $this->mod->getListPage($where, $page, $pageSize);
        $this->view->assign([
            'list' => $list,
        ]);
        return $this->adminTpl();
    }

    public function edit() {
        $id = input('id');
        $info = $this->mod->getOne($id);
        if (IS_POST) { //数据操作
            $data = input('post.');
            unset($data['id']);
            if ($id) { //更新数据
                $where['id'] = $id;
                $x = $this->mod->Dosave($data, $where);
            } else { //添加数据
                $data['c_time'] = date('Y-m-d H:i:s');
                $x = $this->mod->Doadd($data);
            }
            $x and $this->success('操作成功', CONTROLLER_NAME . '/index', NULL, 1) or $this->error('操作失败');
        } else {
            $this->view->assign([
                'info' => $info,
            ]);
            return $this->adminTpl();
        }
    }

}
