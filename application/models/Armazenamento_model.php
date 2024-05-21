<?php
 
class Armazenamento_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get armazenamento by armazenamento_id
     */
    function get_armazenamento($armazenamento_id)
    {
        return $this->db->get_where('armazenamento',array('id'=>$armazenamento_id))->row_array();
    }
        
    /*
     * Get all armazenamento
     */
    function get_all_armazenamentos()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('armazenamento')->result_array();
    }
        
    /*
     * function to add new armazenamento
     */
    function add_armazenamento($params)
    {
        $this->db->insert('armazenamento',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update armazenamento
     */
    function update_armazenamento($armazenamento_id,$params)
    {
        $this->db->where('id',$armazenamento_id);
        return $this->db->update('armazenamento',$params);
    }
    
    /*
     * function to delete armazenamento
     */
    function delete_armazenamento($armazenamento_id)
    {
        return $this->db->delete('armazenamento',array('id'=>$armazenamento_id));
    }
}
