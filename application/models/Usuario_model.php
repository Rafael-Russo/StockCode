<?php
 
class Usuario_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get usuario by usuario_id
     */
    function get_usuario($usuario_id)
    {
        return $this->db->get_where('usuario',array('id'=>$usuario_id))->row_array();
    }
    
    function get_usuario_by_email($email)
    {
    	return $this->db->get_where('usuario', array('email' => $email))->row_array();
    }
    
    
    function get_usuario_by_codigo($codigo)
    {
    	return $this->db->get_where('usuario', array('id' => $codigo))->row_array();
    }
        
    /*
     * Get all usuario
     */
    function get_all_usuarios()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('usuario')->result_array();
    }
        
    /*
     * function to add new usuario
     */
    function add_usuario($params)
    {
        $this->db->insert('usuario',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update usuario
     */
    function update_usuario($usuario_id,$params)
    {
        $this->db->where('id',$usuario_id);
        return $this->db->update('usuario',$params);
    }
    
    /*
     * function to delete usuario
     */
    function delete_usuario($usuario_id)
    {
        return $this->db->delete('usuario',array('id'=>$usuario_id));
    }
}
