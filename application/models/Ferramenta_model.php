<?php
 
class ferramenta_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get ferramenta by ferramenta_id
     */
    function get_ferramenta($ferramenta_id)
    {
        return $this->db->get_where('ferramenta',array('id'=>$ferramenta_id))->row_array();
    }
        
    /*
     * Get all ferramenta
     */
    function get_all_ferramentas()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('ferramenta')->result_array();
    }
        
    /*
     * function to add new ferramenta
     */
    function add_ferramenta($params)
    {
        $this->db->insert('ferramenta',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update ferramenta
     */
    function update_ferramenta($ferramenta_id,$params)
    {
        $this->db->where('ferramenta_id',$ferramenta_id);
        return $this->db->update('ferramenta',$params);
    }
    
    /*
     * function to delete ferramenta
     */
    function delete_ferramenta($ferramenta_id)
    {
        return $this->db->delete('ferramenta',array('ferramenta_id'=>$ferramenta_id));
    }
}
