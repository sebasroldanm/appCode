<section class="s-featured">
    <div class="row half-bottom">
        <div class="col-full">
            <?php
            if (isset($succes)) {
            ?>
                <div class="alert-box alert-box--success hideit">
                    <p><?= $succes ?></p>
                    <i class="fa fa-times alert-box__close"></i>
                </div> <!-- end success -->
            <?php
            }
            ?>

            <?php
            if (isset($error)) {
            ?>
                <div class="alert-box alert-box--error hideit">
                    <p><?= $error ?></p>
                    <i class="fa fa-times alert-box__close"></i>
                </div> <!-- end success -->
            <?php
            }
            ?>

            <div class="row narrow section-intro add-bottom text-center">
                <div class="col-twelve tab-full">
                    <h1 class="display-1 display-1--with-line-sep">Postea algo.</h1>
                    <p class="lead">Para nosotros es importante que expreses tus gustos, debatir y conocer nuevos puntos de vista.</p>
                </div>

            </div>
            <form action="/post/save" method="post" enctype="multipart/form-data">
                <label for="sampleTitle">Ingresa el titulo del Post</label>
                <input class="full-width" placeholder="Titulo" type="text" name="title">
                <label for="sampleIntro">Ingresa una pequeña introducción del Post</label>
                <input class="full-width" placeholder="Intro" type="text" name="intro">
                <label for="exampleMessage">Ingresa aqui tu contenido</label>
                <textarea class="full-width" placeholder="Contenido" id="summernote" name="content"></textarea>
                <label for="sampleRecipientInput">Selecciona una categoria</label>
                <select class="full-width" name="category">
                    <?php
                    foreach ($categories as $value) {
                        echo "<option value='" . $value['id'] . "'>" . $value['name'] . "</option>";
                    }
                    ?>
                </select>
                <label for="exampleTags">Escribe los Tags para su post</label>
                <input placeholder="Tags" type="text" name="tags">
                <label for="exampleBanner">Agrega un Banner</label>
                <input type="file" name="banner"><br>
                <input class="btn full-width" type="submit" name="" value="Postea ahora">
            </form>
        </div>
    </div>
</section>


<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>