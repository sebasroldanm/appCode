<section class="s-featured">
    <div class="row">
        <div class="col-full">
            <form action="" method="post" enctype="multipart/form-data">
                <input placeholder="Titulo" type="text" name="title">
                <input placeholder="Intro" type="text" name="intro">
                <textarea placeholder="Contenido" id="summernote" name="content"></textarea>
                <select name="category">
                    <?php
                    foreach ($categories as $value) {
                        echo "<option value='" . $value['id'] . "'>" . $value['name'] . "</option>";
                    }
                    ?>
                </select>
                <input placeholder="Tags" type="text" name="tags">
                <input type="file" name="banner"><br>
                <input type="submit" name="" value="Enviar">
            </form>
        </div>
    </div>
</section>


<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>