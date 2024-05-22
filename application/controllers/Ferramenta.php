<?php


class Ferramenta extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Ferramenta_model');
        $this->load->model('Armazenamento_model');
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

    public function add()
{
    if ($this->input->post()) {

        $this->load->library('upload');
        $config['upload_path'] = './assets/images/ferramentas/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048;
        $config['encrypt_name'] = TRUE;

        $this->upload->initialize($config);

        $img = '';
        if ($this->upload->do_upload('img')) {
            $upload_data = $this->upload->data();
            $img = '/assets/images/ferramentas/' . $upload_data['file_name'];
        } else {
            $error = $this->upload->display_errors();
            echo $error;
            return;
        }

        $params = array(
            'nome' => $this->input->post('nome'),
            'calibragem' => $this->input->post('calibragem') == '1' ? 1 : 0,
            'img' => $img,
            'armazenamento' => $this->input->post('armazenamento')
        );

        $ferramenta_id = $this->Ferramenta_model->add_ferramenta($params);

        // Gerar QR Code
        $qrCodeUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . urlencode(site_url('ferramenta/view/' . $ferramenta_id));
        $qrCodePath = './assets/qrcodes/ferramentas/' . $ferramenta_id . '.png';
        $this->download_qr_code($qrCodeUrl, $qrCodePath);

        $this->Ferramenta_model->update_ferramenta($ferramenta_id, ['qr_code' => $qrCodePath]);

        redirect('ferramenta');
    }

    $data['armazenamentos'] = $this->Armazenamento_model->get_all_armazenamentos();
    $data['_view'] = 'ferramenta/add';
    $this->load->view('layouts/main', $data);
}

private function download_qr_code($url, $savePath)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
    $raw = curl_exec($ch);
    curl_close ($ch);
    if(file_exists($savePath)){
        unlink($savePath);
    }
    $fp = fopen($savePath,'x');
    fwrite($fp, $raw);
    fclose($fp);
}

    function editar($ferramenta_id)
    {
        if ($this->input->post()) {
            $this->load->library('upload');

            $config['upload_path'] = './assets/images/ferramentas/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048;
            $config['encrypt_name'] = TRUE;

            $this->upload->initialize($config);

            $img = '';
            if ($this->upload->do_upload('img')) {
                // Sucesso no upload
                $upload_data = $this->upload->data();
                $img = '/assets/images/ferramentas/' . $upload_data['file_name'];
            } else {
                $error = $this->upload->display_errors();
                echo $error;
                return;
            }

            $params = array(
                'nome' => $this->input->post('nome'),
                'calibragem' => $this->input->post('calibragem') == '1' ? 1 : 0,
                'img' => $img,
                'armazenamento' => $this->input->post('armazenamento')
            );

            $this->Ferramenta_model->update_ferramenta($ferramenta_id, $params);

            redirect(base_url('ferramenta/'));
        }

        $data['ferramenta'] = $this->Ferramenta_model->get_ferramenta($ferramenta_id);
        $data['armazenamentos'] = $this->Armazenamento_model->get_all_armazenamentos();

        $data['_view'] = 'ferramenta/edit';
        $this->load->view('layouts/main', $data);
    }

    function view($ferramenta_id)
    {
        $data['ferramenta'] = $this->Ferramenta_model->get_ferramenta($ferramenta_id);
        $data['armazenamentos'] = $this->Armazenamento_model->get_all_armazenamentos();

        $data['_view'] = 'ferramenta/view';
        $this->load->view('layouts/main', $data);
    }

    public function atualizar_calibragem() {
        $ferramenta_id = $this->input->post('ferramenta_id');
        $calibragem = $this->input->post('calibragem');
        
        if (!$ferramenta_id || $calibragem === null) {
            show_error('Dados inválidos.');
        }
    
        $this->Ferramenta_model->update_ferramenta($ferramenta_id, ['calibragem' => $calibragem]);
        echo json_encode(['status' => 'success']);
    }
    
    public function atualizar_armazenamento() {
        $ferramenta_id = $this->input->post('ferramenta_id');
        $armazenamento = $this->input->post('armazenamento');
        
        if (!$ferramenta_id || $armazenamento === null) {
            show_error('Dados inválidos.');
        }
    
        $this->Ferramenta_model->update_ferramenta($ferramenta_id, ['armazenamento' => $armazenamento]);
        echo json_encode(['status' => 'success']);
    }

    function remove($ferramenta_id)
    {

        $this->Ferramenta_model->delete_ferramenta($ferramenta_id);
        redirect('ferramenta/');
    }
}
