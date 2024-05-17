	<?php if($this->session->flashdata('warning') == 'success'){?>
	
	<div class="row" style="margin-top: 40px">
                    <div class="col-md-6 mx-auto">
                    
				<div class="card-box">          	
			            	<div class="text-center">
					       <img src="<?php echo base_url('assets/images/v.png') ?>" width="200">    
			 <br><br><h2 style="text-align: center; text-transform: uppercase; font-family: Nunito;">Usuário <span style="color: #24c3dc"><?php $nome = explode(" ", $this->session->userdata('nome')); echo $nome[0].' '.$nome[1];  ?></span> adicionado com sucesso!</h2>    
					</div><br><br>
				<div class="row text-center">
				        <div class="col-md-4">
				           <a href="<?php echo base_url('usuario'); ?>"><button class="btn btn-primary" style="font-weight: bold">VER USUÁRIOS</button></a> 
				        </div>
				        <div class="col-md-4">
				           <a href="<?php echo base_url('usuario/cadastrar'); ?>"><button class="btn btn-success" style="font-weight: bold">NOVO USUÁRIO</button> </a>
				        </div>
				        <div class="col-md-4">
				           <a href="<?php echo base_url(); ?>"><button class="btn btn-secondary" style="font-weight: bold">PÁGINA PRINCIPAL</button></a>  
				        </div>
			        </div>        
			        </div>
	            </div>
	</div>
			    	
	
            <?php } else {?>
            
            	
		<!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            
                            <p class="page-title font-weight-bold text-uppercase" style="text-align: center !important">Cadastrar senha do usuário <span style="color: #12dc18; font-weight: bold" ><?php $nome = explode(" ", $this->session->flashdata('nome')); echo $nome[0].' '.$nome['1']?></span></p>
                        </div>
                    </div>
                </div>     
                <!-- end page title --> 

	<form action="" method="POST">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                    
	                     <div class="card-box" id="senha">   
	                        <div class="form-group">
	                            <label>Senha<span class="text-danger">*</span></label>
	                            <input type="password" name="senha" class="form-control" id="senha">
	                         </div>
	                         <div class="form-group">
	                            <label>Confirmar senha<span class="text-danger">*</span></label>
	                            <input type="password" name="confirmar_senha" class="form-control" id="confirmar_senha">
	                         </div>
	                     </div>    

                   </div>
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-12">
                        <div class="text-center mb-3">

                            <button type="submit" class="btn  w-sm btn-success waves-effect waves-light">CADASTRAR</button>
                        </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
                
            </form>
           	 
            
            
            <?php } ?>
            
            
             <!-- Botão para acionar modal -->
		<button type="button" class="btn btn-primary hidden" data-toggle="modal" data-target="#modalExemplo" id="successModal" style="display: none !important">
			  Abrir modal de demonstraçãoaadsfad
			</button>
			
			<!-- Modal -->
			<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h2 style="text-align: center; text-transform: uppercase;">Usuário <?php $nome = explode(" ", $this->session->userdata('nome')); echo $nome[0];  ?> adicionado com sucesso!</h2>
			        
			      </div>
			      <div class="modal-body">
			        
			      
			    </div>
			  </div>
			</div>
            
            
            
            
           
			


	
         
               


	

