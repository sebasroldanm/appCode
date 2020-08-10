<section class="s-content s-content--top-padding s-content--narrow">

    <article class="row entry format-standard">
        <?php

        echo form_open('/includes/guarda');
        echo form_input(array('name' => 'name', 'placeholder' => 'Nombre'));
        echo form_close();

        ?>
    </article>
</section>