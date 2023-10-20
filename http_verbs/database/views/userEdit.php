<main>
    <h1 class="p-0 m-0 mt-5">Usuario: <?=$users["username"];?></h1>
        <?php $dir = BASE_DIR; ?>
        <table class="table table-striped">
                <tr>
                    <th>Usuario</th>
                    <th>Password</th>
                    <th></th>
                    <th>acción</th>
                </tr>
                <?=
                <<<OUTPUT
                <form action={$dir}user/{$users["id"]} method="POST">
                    <tr>
                        <td><input type="text" name="user" value={$users["username"]}></td>
                        <td><input type="password" name="pass" value={$users["password"]}></td>
                        <td><input type="hidden" name="_method" value="PUT"></td>
                        <td><input type="submit" value="Guardar cambios"></td>
                    </tr>
                    
                </form>
                OUTPUT;
                ?>
        </table>
</main>