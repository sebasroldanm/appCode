    <!-- s-extra
    ================================================== -->
    <section class="s-extra">

        <div class="row">

            <div class="col-seven md-six tab-full popular">
                <h3>Posts mas visitados</h3>

                <div class="block-1-2 block-m-full popular__posts">

                    <?php

                    $db = \Config\Database::connect();
                    $query = $db->query(
                        "SELECT p.* , u.name, u.username 
                        FROM posts p
                        INNER JOIN users u 
                        WHERE p.show_home != 0 
                        ORDER BY p.show_home DESC LIMIT 10"
                    );
                    $result = $query->getResult();

                    foreach ($result as $value) {
                    ?>


                        <article class="col-block popular__post">
                            <a href="<?= base_url() ?>/dashboard/post/<?= $value->slug . '/' . $value->id ?>" class="popular__thumb">
                                <img src="<?= base_url() ?>/uploads/<?= $value->banner ?>" alt="">
                            </a>
                            <a href="<?= base_url() ?>/dashboard/post/<?= $value->slug . '/' . $value->id ?>">
                                <h5><?= $value->title ?></h5>
                            </a>
                            <section class="popular__meta">
                                <span class="popular__author"><span>By</span> <a href="#0"><?= $value->name ?></a></span>
                                <span class="popular__date"><span>on</span> <time datetime="<?= $value->created_at ?>"><?= date('d-m-Y', strtotime($value->created_at)) ?></time></span>
                            </section>
                        </article>
                    <?php

                    }
                    ?>

                </div> <!-- end popular_posts -->
            </div> <!-- end popular -->

            <div class="col-four md-six tab-full end">
                <div class="row">
                    <div class="col-six md-six mob-full categories">
                        <h3>Categorias</h3>
                        <ul class="linklist">

                            <?php
                            $db = \Config\Database::connect();
                            $query = $db->query("SELECT * FROM categories");
                            $result = $query->getResult();

                            foreach ($result as $value) {

                            ?>
                                <li><a href="<?= base_url() . "/dashboard/category/" . $value->id ?> "><?= $value->name ?></a></li>
                            <?php
                            }
                            ?>
                        </ul>


                    </div> <!-- end categories -->

                    <div class="col-six md-six mob-full sitelinks">
                        <h3>Enlaces del Sitio</h3>

                        <ul class="linklist">
                            <li><a href="<?= base_url() . '/dashboard' ?>">Home</a></li>
                            <li><a href="<?= base_url() ?>/dashboard/uploadPost">Postear</a></li>
                            <!-- <li><a href="#0">Acerca de nosotros</a></li>
                            <li><a href="#0">Contacto</a></li>
                            <li><a href="#0">Política de Privacidad</a></li> -->
                        </ul>
                    </div> <!-- end sitelinks -->
                </div>
            </div>
        </div> <!-- end row -->

    </section> <!-- end s-extra -->