<?php

class Log_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get log by log_id
     */
    function get_log($log_id)
    {
        return $this->db->get_where('log', array('id' => $log_id))->row_array();
    }

    /*
     * Get log by ferramenta_id
     */
    public function get_logs_by_ferramenta($ferramenta_id)
    {
        $this->db->select('log.*, usuario.nome AS usuario_nome, armazenamento.nome AS armazem_nome');
        $this->db->from('log');
        $this->db->join('usuario', 'usuario.id = log.usuario_id', 'left');
        $this->db->join('armazenamento', 'armazenamento.id = log.armazenamento_id', 'left');
        $this->db->where('log.ferramenta_id', $ferramenta_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    /*
     * Get all log
     */
    function get_all_logs()
    {
        $this->db->select('f.*, a.nome as armazenamento_nome');
        $this->db->from('log f');
        $this->db->join('armazenamento a', 'f.armazenamento = a.id', 'left');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    /*
     * function to add new log
     */
    function add_log($params)
    {
        $this->db->insert('log', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update log
     */
    function update_log($log_id, $params)
    {
        $this->db->where('id', $log_id);
        return $this->db->update('log', $params);
    }

    /*
     * function to delete log
     */
    function delete_log($log_id)
    {
        return $this->db->delete('log', array('id' => $log_id));
    }
}
