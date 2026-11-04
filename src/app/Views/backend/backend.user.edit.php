<?php
    include_once "app/Views/backend/template/backend.header.php";
    include_once "app/Views/backend/template/backend.aside.php";
    include_once "app/Views/backend/template/backend.main.title.php";
    ?>
<!-- Código en HTML de la parte central de mi vista-->


        <input type="text" class="form-control" name="name" id="in_name" placeholder="Introduce el nombre del usuario" value="<?=$usuario->getName()?>">
        <div class="form-group">
            <label for="in_email">Email address</label>
            <input type="email" class="form-control" name="email" id="in_email" placeholder="Introduce el email del usuario" required value="<?=$usuario->getEmail()?>">
        </div>
        <input type="password" class="form-control" name="password" id="in_password" placeholder="Introduce el password del usuario">
        <select type="text" class="form-control"name="role" id="se_role">
            <?php
                foreach (\Matomas\Netflixsemi\Enum\UserRole::toArray() as $valor){
                    if($usuario->getRole()->toString()===$valor) {
                        echo "<option value=$valor selected>$valor</option>";
                    }else{
                        echo "<option value=$valor>$valor</option>";
                    }
                }
            ?>
        </select>
        <input type="date" class="form-control" name="birthdate" id="in_date" placeholder="Introduce el fecha de nacimiento del usuario" value="<?=$usuario->getBirthdate()->format('Y-m-d')?>">
    <button onclick="put()" class="btn btn-primary">Editar Usurario</button>
    <button onclick="borrar()" class="btn btn-danger">Borrar Usurario</button>

    <script>

        function put(){

            const myHeaders = new Headers();
            myHeaders.append("Content-Type", "application/json");

            const raw = JSON.stringify({
                "name": document.getElementById('in_name').value,
                "email": document.getElementById('in_email').value,
                "birthdate": document.getElementById('in_date').value,
                "role": document.getElementById('se_role').value,
                "password": document.getElementById('in_password').value
            });

            const requestOptions = {
                method: "PUT",
                headers: myHeaders,
                body: raw,
                redirect: "follow"
            };

            fetch("http://localhost:8080/user/<?=$usuario->getId()?>", requestOptions)
                .then((response) => response.text())
                .then((result) => window.location.replace("http://localhost:8080/user/"))
                .catch((error) => console.error(error));
        }

        function borrar(){

            const requestOptions = {
                method: "DELETE",
                redirect: "follow"
            };

            fetch("http://localhost:8080/user/<?=$usuario->getId()?>", requestOptions)
                .then((response) => response.text())
                .then((result) => window.location.replace("http://localhost:8080/user/"))
                .catch((error) => console.error(error));



        }


    </script>


<?php
    include_once "app/Views/backend/template/backend.footer.php";
