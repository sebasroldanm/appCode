<section class="s-content s-content--top-padding s-content--narrow">

    <article class="row entry format-standard">

        <?php
        if (isset($messageData)) {
            foreach ($messageData['message'] as $value) {
                echo '<div class="alert-box alert-box--' . $messageData['type'] . ' hideit">';
                echo '<p>' . $value . '</p>';
                echo '<i class="fa fa-times alert-box__close"></i>';
                echo '</div>';
            }
            $session = \Config\Services::session();
            echo $session->remove('info');
        }
        ?>

        <div class="row narrow section-intro add-bottom text-center">
            <div class="col-twelve tab-full">
                <h1 class="display-1 display-1--with-line-sep">Postea algo.</h1>
                <p class="lead">Para nosotros es importante que expreses tus gustos, debatir y conocer nuevos puntos de vista.</p>
            </div>

        </div>


        <?php

        echo form_open('user/save');

        echo '<label for="sampleTitle">Ingrese su Nombre</label>';
        echo form_input(array('name' => 'name', 'placeholder' => 'Nombre', 'class' => 'full-with', 'type' => 'text'));

        echo '<label for="sampleTitle">Ingrese su email</label>';
        echo form_input(array('name' => 'email', 'placeholder' => 'Email', 'class' => 'full-with', 'type' => 'text'));

        echo '<label for="sampleTitle">Ingrese su Biografía</label>';
        echo form_input(array('name' => 'bio', 'placeholder' => 'Biografia', 'class' => 'full-with', 'type' => 'text'));

        echo '<label for="sampleTitle">Ingresar su Usuario</label>';
        echo form_input(array('name' => 'username', 'placeholder' => 'Usuario', 'class' => 'full-with', 'type' => 'text'));

        echo '<label for="sampleTitle">Ingrese su contraseña</label>';
        echo form_input(array('name' => 'password', 'placeholder' => 'Contraseña', 'class' => 'full-with', 'type' => 'text'));

        echo '<label for="sampleTitle">Ingresar el Rol</label>';
        echo form_input(array('name' => 'role', 'placeholder' => 'Rol', 'class' => 'full-with', 'type' => 'text'));

        echo form_submit('guarda', 'Guardar');
        ?>
        <a href="<?= base_url() ?>/user" class="btn btn-primary" role="button">Cancelar</a>
        <?php

        echo form_close();

        ?>
    </article>
</section>