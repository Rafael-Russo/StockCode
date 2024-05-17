<?php


class Usuario extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario_model');
        $this->load->helper('url');
        $this->load->helper('string');
    }

    /*
     * Listing of usuario
     */
    function index()
    {
        $data['usuarios'] = $this->Usuario_model->get_all_usuarios();

        $data['_view'] = 'usuario/index';
        $this->load->view('layouts/main', $data);
    }



    function entrar()
    {

        if ($this->input->post('email')) {
            $usuario = $this->Usuario_model->get_usuario_by_email($this->input->post('email'));
            //SE EXISTIR USUaIO LIGADO AO EMAIL INFORMADO...
            if ($usuario) {


                //SE A SENHA ESTIVER CORRETA...
                if (md5($this->input->post('password')) == $usuario['senha']) {

                    $params = array(
                        'id' => $usuario['id'],
                        'usuario' => $usuario['nome'],
                        'email' => $usuario['email'],
                        'logado' => TRUE
                    );


                    if ($this->session->set_userdata($params)) {
                        redirect('teste');
                    }
                }

                //SE A SENHA Não ESTIVER CORRETA
                else {
                    $this->session->set_flashdata(array('warning' => 'wrongpass'));
                    redirect(base_url('usuario/entrar?senha=' . $this->input->post('password') . '&md5=' . md5($this->input->post('password'))));
                }
            } else {
                $this->session->set_flashdata(array('warning' => 'unregistered'));
                redirect(base_url('usuario/entrar'));
            }
        }

        $this->load->view('usuario/login');
    }

    function add()
    {
        if ($this->input->post('nome')) {
            $email = $this->input->post('email');
            if ($this->Usuario_model->get_usuario_by_email($email)) {
                $this->session->set_flashdata('error', 'Este email já está cadastrado.');
                redirect('usuario/add');
            } else {

                $params = array(
                    'nome' => $this->input->post('nome'),
                    'email' => $this->input->post('email'),
                    'senha' => md5($this->input->post('senha')),

                );


                $usuario_id = $this->Usuario_model->add_usuario($params);
                redirect('usuario');
            }
        }

        $data['_view'] = 'usuario/add';
        $this->load->view('layouts/main', $data);
    }

    function editar($usuario_id)
    {

        if ($this->input->post()) {
            $params = array(
                'nome' => $this->input->post('nome'),
                'email' => $this->input->post('email')
            );

            $this->Usuario_model->update_usuario($usuario_id, $params);
            //$this->Usuario_representante_model->update_usuario_representante($usuario_id, $params);

            if ($this->input->post('password') != '') {
                $params = array(
                    'senha' => md5($this->input->post('password')),
                );

                $this->Usuario_model->update_usuario($usuario_id, $params);
                //$this->Usuario_representante_model->update_usuario_representante($usuario_id, $params);
            }
            
            redirect(base_url('usuario/'));
        }
        
        $data['usuario'] = $this->Usuario_model->get_usuario($this->session->userdata('id'));
        $data['user'] = $this->Usuario_model->get_usuario($usuario_id);
        
        $data['_view'] = 'usuario/edit';
        $this->load->view('layouts/main', $data);
    }

    function sair()
    {
        $params = array('id', 'usuario', 'email', 'perfill', 'logado');

        $this->session->unset_userdata($params);
        redirect('usuario/entrar');
    }

    function cadastrar()
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
                print_r($error);
                print_r($config['upload_path']);
            } else {
                $data = array('upload_data' => $this->upload->data());
                $filename =  $config['file_name'];
                $filext = $this->upload->data('file_ext');
            }


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
                'perfil' => $filename . $filext

            );


            $this->session->set_flashdata($params);
            redirect('usuario/senha');
            /*if($this->Usuario_model->add_usuario($params))
                redirect(current_url().'?warning=success');*/
        }


        $data['_view'] = 'usuario/add';
        $this->load->view('layouts/main', $data);
    }

    function remove($usuario_id)
    {

        $this->Usuario_model->delete_usuario($usuario_id);
        redirect('usuario/');
    }
}
