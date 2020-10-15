<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'tables.php';
class Staffs_model extends MY_Model {
	function __construct() {
		parent::__construct();
        $this->table = TBL_STAFFS;
        $this->fields  = array('id', 'manage_users', 'manage_categories', 'manage_posts');
	}

	function isAdmin($user_id){
        $info = $this->_get(array('id' => $user_id));
        if (!$info)
        {
            return false;
        }
        return $info;
    }

    public function save($info){
	    $info = $this->correctField($info);
	    $cnt = $this->_count(array('id'=>$info['id']));
	    if($cnt > 0){
	        $this->_update(array('id'=>$info['id']), $info);
        }else{
            $this->_insert($info);
        }
    }

    public function  delete($condition)
    {
        return parent::_delete($condition); // TODO: Change the autogenerated stub
    }
}