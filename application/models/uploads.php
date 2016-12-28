<?php
class Uploads extends CI_Model {

  var $tabel1 = 'blog';//tabel gambar di database sismul

    function __construct() {
        parent::__construct();
    }

    function insert_blog($data){
       $this->db->insert($this->tabel1, $data);
       return TRUE;
  }

  //fungsi untuk select table blog
    function getBlog() {
         return $this->db->get('blog');
    }
}
