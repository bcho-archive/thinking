<?php
/**
 * PostModel.class.php
 *
 * Post model
 */

class PostModel extends Model {
    protected $tableName = 'post';

    /**
     * author
     *
     * get author via author_id
     * 
     * @author_id int / string: author's id
     * @return object (Model `User`)
     */
    protected function author($author_id) {
        return D('User')->get_user($author_id);
    }

    public function get_posts($map=null, $limit=null) {
        if ($limit === null) {
            $limit = 30;
        }
        if ($map !== null) {
            $ret = $this->where($map)->limit($limit)->select();
        } else {
            $ret = $this->limit($limit)->select();
        }
        for ($i = 0;$i < count($ret);$i++) {
            $ret[$i]['author'] = $this->author($ret[$i]['author_id']);
        }
        return $ret;
    }

    public function get_post($id) {
        $cond = array(
            'id' => array('eq', $id),
        );
        $ret = $this->get_posts($cond, 1);
        if (count($ret) === 1) {
            return $ret[0];
        }
        return null;
    }
}
