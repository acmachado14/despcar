 @extends('layout')

@section('cabecalho')
    Show Carro
@endsection

@section('conteudo')
@include('erros', ['errors' => $errors])

<div class="container">
        <form method="post">
        @csrf

        <label for="CdCarro"></label>
        <input type="hidden" class="form-control" value="{{ $carro->cdCarro }}" id="CdCarro" name="CdCarro" >

		<div class="row form-group">
            <div class="col-md-4">
                <label for="Placa">Placa</label>
                <input type="text" class="form-control" value="{{ $carro->placa }}" id="placa" name="placa">
            </div>
            <div class="col-md-4">
                <label for="Descrição">Descrição</label>
                <input type="text" class="form-control" value="{{ $carro->descricao }}" id="descricao" name="descricao">
            </div>
            <div class="col-md-4">
                <label for="ano">Ano</label>
                <input type="text" class="form-control" id="ano" name="ano" value="{{ $carro->ano }}">
            </div>												
		</div>
        <div class="row form-group">
            <div class="col-md-4">
                <label for="chassi">Chassi</label>
                <input type="text" class="form-control" id="chassi" name="chassi" value="{{ $carro->chassi }}">
            </div>	
            <div class="col-md-4">
                <label for="combustivel">Tipo do Combustivel</label>
                <input type="text" class="form-control" id="combustivel" name="combustivel" value="{{ $carro->combustivel }}">
            </div>
            <div class="col-md-4">
                <label for="lugar">Origem</label>
                <input type="text" class="form-control" id="lugar" name="lugar" value="{{ $carro->lugar }}">
            </div>											
        </div>  
        
        <div class="row form-group">
            <div class="col-md-6">
                <label>Leilao</label>
                <select class="form-control" id="leilao" name="leilao">
                    <option value="Indefinido" >Indefinido</option>
                    <option value="Sim" <?php if(isset($carro->leilao) && $carro->leilao == 'Sim'){ echo 'selected';} ?>>Sim</option>
                    <option value="Não" <?php if(isset($carro->leilao) && $carro->leilao == 'Não'){ echo 'selected';} ?>>Não</option>
                </select>
            </div>

            <div class="col-md-6">
                <label>Remarqueting</label>
                <select class="form-control" id="remark" name="remark">
                    <option value="Indefinido">Indefinido</option>
                    <option value="Sim" <?php if(isset($carro->remark) && $carro->remark == 'Sim'){ echo 'selected';} ?>>Sim</option>
                    <option value="Não" <?php if(isset($carro->remark) && $carro->remark == 'Não'){ echo 'selected';} ?>>Não</option>
                </select>
            </div>          
		
        </div>
            
        <div class="row form-group">
            <div class="col-md-12">
                <div>
                    <label for="descLeilao">Descrição do Leilão</label>
                    <input type="text" class="form-control" id="descLeilao" name="descLeilao" value="{{ $carro->descLeilao }}" >
                </div>
            </div>
        </div>

        
        <div class="row form-group">
            <div class="col-md-12">
                <button class="btn btn-success float-right mx-1">Salvar</button>	
                <a href="{{ route('index')}} "class="btn btn-primary float-left mx-1">Voltar</a>	               
            </div>
        </div>

    </form>
</div>
@endsection