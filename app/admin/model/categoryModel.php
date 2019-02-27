<?php

namespace app\admin\model;

use think\facade\Db;
use app\Common\Model\CommonModel;

class categoryModel extends CommonModel {

    // 设置当前模型对应的完整数据表名称
    protected $table = 'category';
    protected $pk = 'id'; //主键

    public function __construct() {
        parent::__construct();
    }

    public $notes = array(//数值注释
        'status' => array(1 => '正常', 2 => '禁用'),
    );

    //查询
    public function getList($where = '', $page = 1, $pageSize = 20, $order = '') {
        if (!$order) {
            $order = $this->pk . " DESC";
        }
        $list = Db::name($this->table)->where($where)->page($page)->limit($pageSize)->order($order)->select();
        return $list;
    }

    //分页
    public function getListPage($where = '', $page = 1, $pageSize = 20, $order = '') {
        if (!$order) {
            $order = $this->pk . " DESC";
        }
        $list = Db::name($this->table)->where($where)->page($page)->limit($pageSize)->order($order)->paginate($pageSize);
        return $list;
    }

    public function getCount($where = array()) {
        $count = Db::name($this->table)->where($where)->count();
        return $count;
    }

    public function getField($where = "", $field = "*", $order = '', $limit = 0) {
        if (!$order) {
            $order = $this->pk . " DESC";
        }
        $list = Db::name($this->table)->where($where)->order($order)->limit($limit)->column($field);
        return $list;
    }

//读取
    public function getOne($id = '', $where = '') {
        if ($where) {
            $info = Db::name($this->table)->where($where)->find();
        } else {
            $info = isset($id) ? Db::name($this->table)->find($id) : NULL;
        }
        return $info;
    }

//更新
    public function Dosave($data, $where) {
        $ret = Db::name($this->table)->where($where)->strict(false)->update($data);
        return $ret;
    }

//增加
    public function Doadd($data) {
        $id = Db::name($this->table)->strict(false)->insertGetId($data);
        return $id;
    }

//删
    public function Dodel($id, $where) {
        if ($id) {
            $where['id'] = $id;
        }
        $x = Db::name($this->table)->where($where)->delete();
        if ($x) {
            return true;
        } else {
            return false;
        }
    }

}
