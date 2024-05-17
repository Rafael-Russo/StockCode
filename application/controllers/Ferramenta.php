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
        if ($this->input->post('nome')) {
            $email = $this->input->post('email');
            if ($this->Ferramenta_model->get_ferramenta_by_email($email)) {
                $this->session->set_flashdata('error', 'Este email já está cadastrado.');
                redirect('ferramenta/add');
            } else {

                $params = array(
                    'nome' => $this->input->post('nome'),
                    'email' => $this->input->post('email'),
                    'senha' => md5($this->input->post('senha')),

                );


                $ferramenta_id = $this->Ferramenta_model->add_ferramenta($params);
                redirect('ferramenta');
            }
        }

        $data['_view'] = 'ferramenta/add';
        $this->load->view('layouts/main', $data);
    }

    function editar($ferramenta_id)
    {

        if ($this->input->post('nome')) {


            $config['upload_path']          = './assets/uploads';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 10000;
            $config['max_width']            = 4000;
            $config['max_height']           = 4000;
            $config['file_name']         = random_string('alnum', 16);


            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('perfil')) {
                $error = array('error' => $this->upload->display_errors());

                $filename = $config['file_name'];
                $filext = $this->upload->data('file_ext');
                //print_r($error);
                //print_r($config['upload_path']);
            } else {
                $dados = array('upload_data' => $this->upload->data());
                $filename =  $config['file_name'];
                $filext = $this->upload->data('file_ext');
            }

            $portal = ($this->input->post('portal') == 1) ? 1 : 0;
            $representante = ($this->input->post('representante') == 1) ? 1 : 0;
            $rh = ($this->input->post('rh') == 1) ? 1 : 0;
            $ac = ($this->input->post('ac') == 1) ? 1 : 0;
            $qr = ($this->input->post('qr') == 1) ? 1 : 0;
            $ed = ($this->input->post('ed') == 1) ? 1 : 0;
            $edita_painel = ($this->input->post('edita_painel') == 1) ? 1 : 0;
            $acesso_mapa = ($this->input->post('acesso_mapa') == 1) ? 1 : 0;


            $params = array(
                'nome' => $this->input->post('nome'),
                'endereco' => $this->input->post('endereco'),
                'numero' => $this->input->post('numero'),
                'bairro' => $this->input->post('bairro'),
                'cidade' => $this->input->post('cidade'),
                'uf' => $this->input->post('estado'),
                'telefone' => $this->input->post('telefone'),
                'email' => $this->input->post('email'),
                'nascimento' => $this->input->post('nascimento'),
                'cep' => $this->input->post('cep'),
                'complemento' => $this->input->post('complemento'),
                'status' => '1',
                'perfil' => $filename . $filext,
                'portal' => $portal,
                'representante' => $representante,
                'rh' => $rh,
                'ac' => $ac,
                'qr' => $qr,
                'ed' => $ed,
                'edita_painel' => $edita_painel,
                'acesso_mapa' => $acesso_mapa
            );

            $this->Ferramenta_model->update_ferramenta($ferramenta_id, $params);
            //$this->ferramenta_representante_model->update_ferramenta_representante($ferramenta_id, $params);

            if ($this->input->post('password') != '') {
                $params = array(
                    'senha' => md5($this->input->post('password')),
                );

                $this->Ferramenta_model->update_ferramenta($ferramenta_id, $params);
                //$this->ferramenta_representante_model->update_ferramenta_representante($ferramenta_id, $params);
            }
        }

        $data['ferramenta'] = $this->Ferramenta_model->get_ferramenta($this->session->userdata('id'));
        $data['user'] = $this->Ferramenta_model->get_ferramenta($ferramenta_id);

        $data['_view'] = 'ferramenta/edit';
        $this->load->view('layouts/main', $data);
    }

    function sair()
    {
        $params = array('id', 'ferramenta', 'email', 'perfill', 'logado');

        $this->session->unset_userdata($params);
        redirect('ferramenta/entrar');
    }

    function remove($ferramenta_id)
    {

        $this->Ferramenta_model->delete_ferramenta($ferramenta_id);
        redirect('ferramenta/index');
    }
}
