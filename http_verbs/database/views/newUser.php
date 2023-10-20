<main>
    <h1 class="p-0 m-0 mt-5">Nuevo Usuario</h1>
    <form action="<?= BASE_DIR; ?>User/store/" method="post">
        <div class="row d-flex justify-content-center">
            <div class="col">
                <input class="form-control" type="text" name="user" placeholder="Nombre de usuario">
            </div>
            <div class="col">
                <input class="form-control" type="password" name="pass" placeholder="Password">
            </div>
            <input class="btn btn-success mt-3" type="submit" value="Guardar">
        </div>
    </form>
</main>