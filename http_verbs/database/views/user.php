<main>
    <h1 class="p-0 m-0 mt-5">Usuario: <?= htmlspecialchars($users["username"]); ?></h1>
    <table class="table table-striped">
        <tr>
            <th>Usuario</th>
            <th>Password</th>
        </tr>
        <tr>
            <td><?= htmlspecialchars($users["username"]); ?></td>
            <td><?= htmlspecialchars($users["password"]); ?></td>
        </tr>
    </table>
</main>
