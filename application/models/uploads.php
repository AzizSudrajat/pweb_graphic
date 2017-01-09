<?php
class Uploads extends CI_Model {

  var $tabel1 = 'blog';//tabel gambar di database ci_graphic

    function __construct() {
        parent::__construct();
    }

    function insert_blog($data){
       $this->db->insert($this->tabel1, $data);
       return TRUE;
  }

    function getBlog() {
         return $this->db->get('blog');
    }

    //fungsi untuk select satu gambar untuk di edit
    function getSinglegambar($id) {
        return $query = $this->db->get_where('blog', array('id' => $id));
    }

    //fungsi untuk melakukan edit data blog
    function update_blog($data, $id){
      $this->db->where('id', $id);
       $this->db->update($this->tabel1, $data);
       return TRUE;
    }

    //fungsi untuk menghapus blog dari database
    function do_hapus_blog($id) {
        $this->db->delete('blog', array('id' => $id));
        // redirect('admin/welcome/blog');
    }

}
