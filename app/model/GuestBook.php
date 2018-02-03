<?php
/**
 * Created by PhpStorm.
 * User: Next
 * Date: 2018/2/2
 * Time: 23:17
 */

namespace app\model;

use core\lib\Model;

class GuestBook extends Model
{
    public $table = 'guest_book';

    /**
     * @return array|bool
     */
    public function all()
    {
        $ret = $this->select($this->table, '*');
        return $ret;
    }

    /**
     * @param $data array 需要插入的数据
     * @return int
     */
    public function addOne($data)
    {
        $ret = $this->insert($this->table, $data);
        return $ret->rowCount();
    }

    public function delOne($id)
    {
        $ret = $this->delete($this->table, ['id[=]' => $id]);
        if ($ret !== false) {
            return true;
        } else {
            return false;
        }
    }
}