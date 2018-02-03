<?php
/**
 * Created by PhpStorm.
 * User: Next
 * Date: 2018/1/31
 * Time: 22:35
 */

namespace app\ctrl;

use app\model\GuestBook;

class IndexCtrl extends \core\Start
{
    //查询全部
    public function index()
    {
        $model = new GuestBook();
        $data = $model->all();
        $this->assign('data', $data);
        $this->display('index.html');
    }

    //添加一条留言
    public function add()
    {
        $this->display('add.html');
    }

    //保存留言
    public function save()
    {
        $data['title'] = post('title');
        $data['content'] = post('content');
        $data['create_time'] = time();
        $model = new GuestBook();
        $ret = $model->addOne($data);
        if ($ret) {
            jump('/');
        } else {
            p('保存失败啦啦啦啦！');
        }
    }

    //删除留言
    public function del()
    {
        $id = get('id', 0, 'int');
        if ($id) {
            $model = new GuestBook();
            $ret = $model->delOne($id);
            if ($ret) {
                jump('/');
            } else {
                p('删除失败啦啦啦啦！');
            }
        }else{
            p('参数错误');
        }
    }

}