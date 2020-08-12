<section class="s-content s-content--top-padding s-content--narrow">

    <article class="row entry format-standard">

        <?php
        if (isset($error)) {
        ?>
            <div class="alert-box alert-box--error hideit">
                <p><?php 
                foreach ($error as  $value) {
                    echo $value;
                } 
                ?></p>
                <i class="fa fa-times alert-box__close"></i>
            </div> <!-- end success -->
        <?php
        }

        if (isset($user['id'])) {
            $id = $user['id'];
            $name = $user['name'];
            $email = $user['email'];
            $bio = $user['bio'];
            $username = $user['username'];
            $pasword = $user['password'];
            $role = $user['role'];
        } else {
            $id = "";
            $name = "";
            $email = "";
            $bio = "";
            $username = "";
            $pasword = "";
            $role = "";
        }
        ?>

        <div class="row narrow section-intro add-bottom text-center">
            <div class="col-twelve tab-full">
                <h1 class="display-1 display-1--with-line-sep">Postea algo.</h1>
                <p class="lead">Para nosotros es importante que expreses tus gustos, debatir y conocer nuevos puntos de vista.</p>
            </div>

        </div>


        <?php

        echo form_open('/UserController/update');

        // echo '<label for="sampleTitle">Este es el ID</label>';
        echo form_input(array('name' => 'id', 'value' => $id, 'placeholder' => 'Nombre', 'class' => 'full-with', 'type' => 'hidden'));

        echo '<label for="sampleTitle">Ingrese su Nombre</label>';
        echo form_input(array('name' => 'name', 'value' => $name, 'placeholder' => 'Nombre', 'class' => 'full-with', 'type' => 'text'));

        echo '<label for="sampleTitle">Ingrese su email</label>';
        echo form_input(array('name' => 'email', 'value' => $email, 'placeholder' => 'Email', 'class' => 'full-with', 'type' => 'text'));

        echo '<label for="sampleTitle">Ingrese su Biografía</label>';
        echo form_input(array('name' => 'bio', 'value' => $bio, 'placeholder' => 'Biografia', 'class' => 'full-with', 'type' => 'text'));

        echo '<label for="sampleTitle">Ingresar su Usuario</label>';
        echo form_input(array('name' => 'username', 'value' => $username, 'placeholder' => 'Usuario', 'class' => 'full-with', 'type' => 'text'));

        echo '<label for="sampleTitle">Ingrese su contraseña</label>';
        echo form_input(array('name' => 'password', 'value' => $pasword, 'placeholder' => 'Contraseña', 'class' => 'full-with', 'type' => 'text'));

        echo '<label for="sampleTitle">Ingresar el Rol</label>';
        echo form_input(array('name' => 'role', 'value' => $role, 'placeholder' => 'Rol', 'class' => 'full-with', 'type' => 'text'));

        echo form_submit('edita', 'Editar');

        echo form_close();

        ?>
    </article>
</section>