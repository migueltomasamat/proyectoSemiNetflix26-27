<?php
    include_once "app/Views/backend/template/backend.header.php";
    include_once "app/Views/backend/template/backend.aside.php";
    include_once "app/Views/backend/template/backend.main.title.php";
    ?>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <th scope="col">Birthdate</th>
            <th scope="col">Type</th>
        </tr>
        </thead>
        <tbody>
        <?php
            foreach ($usuarios as $usuario) { ?>
                <tr>
                    <th scope="row"><?=$usuario->getId()?></th>
                    <td><?=$usuario->getName()?></td>
                    <td><?=$usuario->getEmail()?></td>
                    <td><?=$usuario->getPassword()?></td>
                    <td><?=$usuario->getBirthdate()->format('Y-m-d')?></td>
                    <td><?=$usuario->getRole()->toString()?></td>
                </tr>
        <?php } ?>

        </tbody>
    </table>


<?php
    include_once "app/Views/backend/template/backend.footer.php";
