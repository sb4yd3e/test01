<?php


class Admin_model extends CI_Model
{
    var $table = 'admins';
    var $column_order = array(null, 'username','name','admin_group','last_login',null);
    var $column_search = array('username','name','admin_group'); 
    var $order = array('aid' => 'asc'); 

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    private function _get_datatables_query()
    {
         
        $this->db->from($this->table);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    
    /*
     * Get admin by aid
     */
    function get_admin($aid)
    {
        return $this->db->get_where('admins',array('aid'=>$aid))->row_array();
    }
    
    /*
     * Get all admins
     */
    function get_all_admins()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    
    /*
     * function to add new admin
     */
    function add_admin($params)
    {
        $this->db->insert('admins',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update admin
     */
    function update_admin($aid,$params)
    {
        $this->db->where('aid',$aid);
        $response = $this->db->update('admins',$params);
        if($response)
        {
            return "admin updated successfully";
        }
        else
        {
            return "Error occuring while updating admin";
        }
    }
    
    /*
     * function to delete admin
     */
    function delete_admin($aid)
    {
        $response = $this->db->delete('admins',array('aid'=>$aid));
        if($response)
        {
            return "admin deleted successfully";
        }
        else
        {
            return "Error occuring while deleting admin";
        }
    }
}
