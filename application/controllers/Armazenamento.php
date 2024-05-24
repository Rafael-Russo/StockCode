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
                'nome' => $this->input->post('nome')
            );

            $armazenamento_id = $this->Armazenamento_model->add_armazenamento($params);

            // Gerar QR Code
            $qrCodeUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . urlencode(site_url('armazenamento/view/' . $armazenamento_id));
            $qrCodePath = './assets/qrcodes/armazens/' . $armazenamento_id . '.png';
            $this->download_qr_code($qrCodeUrl, $qrCodePath);

            $this->Armazenamento_model->update_armazenamento($armazenamento_id, ['qr_code' => $qrCodePath]);

            redirect('armazenamento');
        }

        $data['_view'] = 'armazenamento/add';
        $this->load->view('layouts/main', $data);
    }

    function editar($armazenamento_id)
    {
        $this->load->model('Ferramenta_model');

        if ($this->input->post()) {
            $params = array(
                'nome' => $this->input->post('nome')
            );

            $this->Armazenamento_model->update_armazenamento($armazenamento_id, $params);

            redirect(base_url('armazenamento/'));
        }

        $data['armazenamento'] = $this->Armazenamento_model->get_armazenamento($armazenamento_id);
        $data['ferramentas'] = $this->Ferramenta_model->get_ferramenta_by_armazenamento($armazenamento_id);

        $data['_view'] = 'armazenamento/edit';
        $this->load->view('layouts/main', $data);
    }
    
    function remove($armazenamento_id)
    {
        
        $this->Armazenamento_model->delete_armazenamento($armazenamento_id);
        redirect('armazenamento/');
    }

    function view($armazenamento_id)
    {
        $this->load->model('Ferramenta_model');

        $data['armazenamento'] = $this->Armazenamento_model->get_armazenamento($armazenamento_id);
        $data['ferramentas'] = $this->Ferramenta_model->get_ferramenta_by_armazenamento($armazenamento_id);

        $data['_view'] = 'armazenamento/view';
        $this->load->view('layouts/main', $data);
    }

    private function download_qr_code($url, $savePath)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
        $raw = curl_exec($ch);
        curl_close($ch);
        if (file_exists($savePath)) {
            unlink($savePath);
        }
        $fp = fopen($savePath, 'x');
        fwrite($fp, $raw);
        fclose($fp);
    }
}
