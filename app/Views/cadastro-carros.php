<div class="row">
    <div class="col">
        <h2>Cadastro de Carros</h2>
    </div>
</div>

<form method="post" action="gravarCarro">
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="">Modelo: </label>
                <input type="text" class="form-control" name="modelo"
                value="<?= isset($pessoa['modelo']) ? $pessoa['modelo'] : ""  ?>">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="">Marca: </label>
                <input type="text" class="form-control" name="marca"
                value="<?= isset($pessoa['marca']) ? $pessoa['marca'] : ""  ?>">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="">Placa: </label>
                <input type="text" class="form-control" name="placa"
                value="<?= isset($pessoa['placa']) ? $pessoa['placa'] : ""  ?>">
            </div>
        </div>
    </div>
    <input type="hidden" name="id" 
    value="<?= isset($pessoa['id']) ? $pessoa['id'] : ""  ?>"
    >
    <div class="row">
        <div class="col-6">
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary mt-3">Enviar</button>
            </div>
        </div>
    </div>
</form>