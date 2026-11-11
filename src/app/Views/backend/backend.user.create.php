<?php
    include_once "app/Views/backend/template/backend.header.php";
    include_once "app/Views/backend/template/backend.aside.php";
    include_once "app/Views/backend/template/backend.main.title.php";
    ?>
<!-- Código en HTML de la parte central de mi vista-->

    <form method="post" action="/user">
        <div class="mb-3">
            <label for="in_name">Introduce el nombre del usuario:</label>
            <input type="text" class="form-control" name="name" id="in_name" placeholder="Introduce el nombre del usuario">
        </div>
        <div class="mb-3">
            <label for="in_email">Introduce el correo electrónico del usuario:</label>
            <input type="email" class="form-control" name="email" id="in_email" placeholder="Introduce el email del usuario" required>
        </div>
        <div class="mb-3">
            <label for="in_password">Introduce la contraseña del usuario:</label>
            <input type="password" class="form-control" name="password" id="in_password" placeholder="Introduce el password del usuario">
        </div>
        <div class="mb-3">
            <select type="text" class="form-control"name="role">
                <?php
                    foreach (\Matomas\Netflixsemi\Enum\UserRole::toArray() as $valor){
                        echo "<option value=$valor>$valor</option>";
                    }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <input type="date" class="form-control" name="birthdate" id="in_date" placeholder="Introduce el fecha de nacimiento del usuario">
        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Registrar Usuario">
        </div>
    </form>

<?php
    include_once "app/Views/backend/template/backend.footer.php";
