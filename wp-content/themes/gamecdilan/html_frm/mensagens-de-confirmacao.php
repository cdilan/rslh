<?php
/*	######################################
	##		html para campos de 		##
	##		mensagens de confirmação	##
	###################################### */

// mensagem para nova entrada

<div class="modal hide fade" id="parabens">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Parabéns [display-frm-data id=18 filter=1], você entregou mais uma atividade com sucesso</h3>
  </div>
  <div class="modal-body">
    <p>Em até 1 dia útil sua atividade será avaliada e suas medalhas e pontos serão computadas.</p>
    <p>Foi enviado a seu email maiores informações</p>
  </div>
  <div class="modal-footer">
    <a href="../../suas-entregas/" class="btn btn-primary">Suas Entregas</a>
    <a href="../../episodios/" title="Episodios" class="btn">Episódios</a>
    <a href="../entregas/[post_id]" class="btn">Ver como ficou</a>
  </div>
</div>

// mensagem para atualização

<div class="modal hide fade" id="parabens">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>[display-frm-data id=18 filter=1], sua entrega foi atualizada com sucesso</h3>
  </div>
  <div class="modal-body">
    <p>Avise outros jogadores das suas alterações, principalmente os que colaboraram comentando sua entrega.</p>
    <p>Uma boa prática é responder o comentário que gerou a atualização agradecendo e avisando a todos da alteração.</p>
  </div>
  <div class="modal-footer">
    <a href="../../suas-entregas/" class="btn btn-primary">Suas Entregas</a>
    <a href="../../episodios/" title="Episodios" class="btn">Episódios</a>
    <a href="../entregas/[post_id]" class="btn">Ver como ficou</a>
  </div>
</div>

?>