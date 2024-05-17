<?php
    $usuario = $this->Usuario_model->get_usuario($this->session->userdata('id'));
    if(!$usuario){
        redirect('usuario/sair');
    }
    
    $this->load->view('_includes/header');
    $this->load->view('_includes/topbar');
    $this->load->view('_includes/menu');
?>

<div style="padding-top: 130px;">
    <div class="" style="padding: 0;">
        <?php
            if(isset($_view) && $_view)
                $this->load->view($_view);
        ?>
    </div>
</div>