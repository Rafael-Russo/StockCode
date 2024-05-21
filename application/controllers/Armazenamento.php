<?php


class Armazenamento extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Armazenamento_model');
        $this->load->helper('url');
        $this->load->helper('string');
    }

    /*
     * Listing of armazenamento
     */
    function index()
    {
        $data['armazenamentos'] = $this->Armazenamento_model->get_all_armazenamentos();

        $data['_view'] = 'armazenamento/index';
        $this->load->view('layouts/main', $data);
    }

    function add()
    {
        if ($this->input->post()) {
            $params = array(
                'nome' => $this->input->post('nome'),
                'qr_code' => $this->input->post('qrcode')
            );

            $armazenamento_id = $this->Armazenamento_model->add_armazenamento($params);
            redirect('armazenamento');
        }

        $data['_view'] = 'armazenamento/add';
        $this->load->view('layouts/main', $data);
    }

    function editar($armazenamento_id)
    {
        if ($this->input->post()) {
            $params = array(
                'nome' => $this->input->post('nome'),
                'qr_code' => $this->input->post('qrcode')
            );

            $this->Armazenamento_model->update_armazenamento($armazenamento_id, $params);

            redirect(base_url('armazenamento/'));
        }

        $data['armazenamento'] = $this->Armazenamento_model->get_armazenamento($armazenamento_id);

        $data['_view'] = 'armazenamento/edit';
        $this->load->view('layouts/main', $data);
    }

    function remove($armazenamento_id)
    {

        $this->Armazenamento_model->delete_armazenamento($armazenamento_id);
        redirect('armazenamento/');
    }
}
