<?php


class Ferramenta extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Ferramenta_model');
        $this->load->helper('url');
        $this->load->helper('string');
    }

    /*
     * Listing of ferramenta
     */
    function index()
    {
        $data['ferramentas'] = $this->Ferramenta_model->get_all_ferramentas();

        $data['_view'] = 'ferramenta/index';
        $this->load->view('layouts/main', $data);
    }

    function add()
    {
        if ($this->input->post()) {
            $params = array(
                'nome' => $this->input->post('nome'),
                'calibragem' => $this->input->post('calibragem'),
                'qr_code' => $this->input->post('qrcode'),
                'armazenamento' => $this->input->post('armazenamento')
            );

            $ferramenta_id = $this->Ferramenta_model->add_ferramenta($params);
            redirect('ferramenta');
        }

        $data['_view'] = 'ferramenta/add';
        $this->load->view('layouts/main', $data);
    }

    function editar($ferramenta_id)
    {
        if ($this->input->post()) {
            $params = array(
                'nome' => $this->input->post('nome'),
                'calibragem' => $this->input->post('calibragem'),
                'qr_code' => $this->input->post('qrcode'),
                'armazenamento' => $this->input->post('armazenamento')
            );

            $this->Ferramenta_model->update_ferramenta($ferramenta_id, $params);

            redirect(base_url('ferramenta/'));
        }

        $data['ferramenta'] = $this->Ferramenta_model->get_ferramenta($ferramenta_id);

        $data['_view'] = 'ferramenta/edit';
        $this->load->view('layouts/main', $data);
    }

    function remove($ferramenta_id)
    {

        $this->Ferramenta_model->delete_ferramenta($ferramenta_id);
        redirect('ferramenta/');
    }
}
