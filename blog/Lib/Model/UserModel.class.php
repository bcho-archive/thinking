<?php
/**
 * UserModel.class.php
 *
 * User model
 */

class UserModel extends Model {
    protected $tableName = 'user';

    protected $_auto = array(
        array('password', 'encrypt', 1, 'callback'),
    );

    /**
     * encrypt
     *
     * Encrypt something with sha1.
     *
     * @raw string: raw buffer
     * @salt string: encrypt salt
     * @return string
     */
    public function encrypt($raw, $salt=null) {
        if ($salt === null) {
            $salt = C('HASH_SALT');
        }
        return sha1($salt . $raw);
    }

    public function get_user($id) {
        $cond = array(
            'id' => array('eq', $id),
        );
        $ret = $this->where($cond)->limit(1)->select();
        if (count($ret) === 1) {
            return $ret[0];
        }
        return null;
    }

    public function get_user_by_email($email) {
        $cond = array(
            'email' => array('eq', $email),
        );
        $ret = $this->where($cond)->limit(1)->select();
        if (count($ret) === 1) {
            return $ret[0];
        }
        return null;
    }
}

/* End of file UserModel.class.php */
