
<!-- Modal -->
<div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
  <div class="modal-dialog">
        <div class="text-center my-1 mx-auto">
            <div id="spinner" style="width: 9rem; height: 9rem;" class="text-center spinner-border text-light my-auto" role="status">
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="despesas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar Despesa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="controler/adicionarDespesa.php" method="post">

            <div class="row">

                <div class="col-md-6">

                    <div class="form-group">

                        <label for="descricao">

                        Data do compromisso

                        </label>

                        <input name="date" type="date" class="form-control" id="descricao" name="descricao">

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="form-group">

                        <label for="categoria">

                        Categoria

                        </label>

                        <input type="text" class="form-control" id="categoria" name="categoria">
            
                    </div>

                </div>

                <div class="col-md-12 mt-2">

                    <div class="form-group">

                        <label for="descricao">

                        Descrição

                        </label>

                        <input type="text" class="form-control" id="descricao" name="descricao">

                    </div>

                </div>
            
                
                <div class="col-md-4 mt-2">
                    
                    <div class="form-group">
                        
                        <label for="valor">
                            
                            Valor R$
                            
                        </label>
                        
                        <input type="number" class="form-control" id="valor" name="valor">
                        
                    </div>
                    
                </div>

                <div class="col-md-8 mt-2">
                    
                    <div class="form-group">
                        
                        <label for="descricao">
                            
                            Se parcelado, em quantas veses?
                            
                        </label>
                        
                        <input name="if_parcelamento" type="number" class="form-control" id="descricao" name="descricao">
                        
                    </div>
                    
                </div>
                
                <div class="col-md-12 mt-2">

                    <div class="form-group mx-auto">

                        <label>

                        Tipo da despesa

                        </label>

                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="eventual" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">Eventual</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="mensal" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">Mensal</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="parcelado" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">Parcelado</label>
                        </div>

                    </div>

                </div>

            </div>

        

            <hr>
            <div class="text-end">
                <button type="submit" class="btn btn-danger">Adicionar Despesa</button>
            </div>

        </form>

      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="receita" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar Receita</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="controler/adicionarReceita.php" method="post">

            <div class="row">

                <div class="col-md-6">

                    <div class="form-group">

                        <label for="descricao">

                        Data do compromisso

                        </label>

                        <input name="date" type="date" class="form-control" id="descricao" name="descricao">

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="form-group">

                        <label for="categoria">

                        Categoria

                        </label>

                        <input name="categoria" type="text" class="form-control">

                    </div>

                </div>

                <div class="col-md-12 mt-2">

                    <div class="form-group">

                        <label for="descricao">

                        Descrição

                        </label>

                        <input type="text" class="form-control" id="descricao" name="descricao">

                    </div>

                </div>
            
                
                <div class="col-md-12 mt-2">
                    
                    <div class="form-group">
                        
                        <label for="valor">
                            
                            Valor Recebido R$
                            
                        </label>
                        
                        <input type="number" class="form-control" id="valor" name="valor">
                        
                    </div>
                    
                </div>

            </div>

            <hr>
            <div class="text-end">
                <button type="submit" class="btn btn-success"><i class="fa-solid fa-plus"></i> Adicionar Receita</button>
            </div>

        </form>

      </div>
    </div>
  </div>
</div>

<!-- Modal guardar dinheiro -->
<div class="modal fade" id="guardar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Destinar valor para Guardar/Investir?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form action="controler/guardarDinheiro.php" method="post">

        <div class="row">

            <div class="col-md-6">

                <div class="form-group">

                    <label for="data">

                    Data do aporte

                    </label>

                    <input type="date" class="form-control" id="descricao" name="data">

                </div>

            </div>

            <div class="col-md-6">

                <div class="form-group">

                    <label for="valor">

                    Valor

                    </label>

                    <input type="text" class="form-control" id="valor" name="valor">

                </div>

            </div>

            <div class="col-md-12 mt-2">

                <div class="form-group">

                    <label for="descricao">

                    Descrição

                    </label>

                    <input type="text" class="form-control" id="descricao" name="descricao">

                </div>

            </div>

            <div class="col-md-12 mt-2">

                <div class="form-group">

                    <label for="descricao">

                    Objetivo

                    </label>

                    <input type="text" class="form-control" id="descricao" name="objetivo">

                </div>

            </div>

        </div>

        <hr>

        <div class="text-end">
            <button type="submit" class="btn btn-success"><i class="fa-solid fa-money-bills"></i> Adicionar dinheiro</button>
        </div>

    </form>
    
</div>
</div>
</div>
</div>