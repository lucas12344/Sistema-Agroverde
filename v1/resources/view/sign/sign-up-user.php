<div class="dff-tab current" id="tab-3">
  <form id="formUserConsumidor" method="post" action="">
    <div class="row">
      <div class="col-lg-12 no-pdd">
        <div class="sn-field">
          <input type="hidden" name="tipo" value="C">
          <input type="text" name="nome" placeholder="Nome Completo" required>
          <i class="fa fa-user"></i>
        </div>
      </div>
      <div class="col-lg-12 no-pdd">
        <div class="sn-field">
          <input type="email" name="email" placeholder="E-mail" required>
          <i class="fa fa-envelope"></i>
        </div>
      </div>
      <div class="col-lg-12 no-pdd">
        <div class="sn-field">
          <input type="phone" name="telefone" placeholder="Telefone" required>
          <i class="fa fa-phone"></i>
        </div>
      </div>
      <div class="col-lg-12 no-pdd">
        <div class="sn-field">
          <select name="sexo" required>
            <option>Sexo</option>
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
          </select>
          <i class="fas fa-female"></i>
          <span><i class="fa fa-ellipsis-h"></i></span>
        </div>
      </div>
      <div class="col-lg-12 no-pdd">
        <div class="sn-field">
          <input type="password" name="senha" placeholder="Senha">
          <i class="fa fa-lock"></i>
        </div>
      </div>
      <div class="col-lg-12 no-pdd">
        <button type="submit" value="submit" name="save" value="1">Cadastrar</button>
      </div>
    </div>
  </form>
</div>