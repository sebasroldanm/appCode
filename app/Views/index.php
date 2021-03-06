<!-- featured 
    ================================================== -->
<section class="s-featured">
    <div class="row">
        <div class="col-full">

            <div class="featured-slider featured" data-aos="zoom-in">
                <?php
                $nPosts = sizeof($lastPost);
                $urlUploadPost = base_url() . '/dashboard/uploadPost';
                switch ($nPosts) {
                    case '0':
                ?>
                        <div class="featured__slide">
                            <div class="entry">

                                <div class="entry__background" style="background-image:url('<?= base_url() ?>/assets/images/thumbs/featured/featured-guitarman.jpg');"></div>

                                <div class="entry__content">
                                    <span class="entry__category"><a href="<?= $urlUploadPost ?>">Cultura</a></span>

                                    <h1><a href="<?= $urlUploadPost ?>" title="">Publica lo que te guste y sientas aquí.</a></h1>

                                    <div class="entry__info">
                                        <a href="<?= $urlUploadPost ?>" class="entry__profile-pic">
                                            <img class="avatar" src="<?= base_url() ?>/assets/images/avatars/user-05.jpg" alt="">
                                        </a>
                                        <ul class="entry__meta">
                                            <li><a href="<?= $urlUploadPost ?>">Jonathan Smith</a></li>
                                            <li>June 02, 2018</li>
                                        </ul>
                                    </div>
                                </div> <!-- end entry__content -->

                            </div> <!-- end entry -->
                        </div> <!-- end featured__slide -->
                        <div class="featured__slide">
                            <div class="entry">

                                <div class="entry__background" style="background-image:url('<?= base_url() ?>/assets/images/thumbs/featured/featured-watch.jpg');"></div>

                                <div class="entry__content">
                                    <span class="entry__category"><a href="<?= $urlUploadPost ?>">Deporte</a></span>

                                    <h1><a href="<?= $urlUploadPost ?>" title="">Postea, interactua, debate y aprende de los demás.</a></h1>

                                    <div class="entry__info">
                                        <a href="<?= $urlUploadPost ?>" class="entry__profile-pic">
                                            <img class="avatar" src="<?= base_url() ?>/assets/images/avatars/user-05.jpg" alt="">
                                        </a>
                                        <ul class="entry__meta">
                                            <li><a href="<?= $urlUploadPost ?>">Jonathan Smith</a></li>
                                            <li>June 02, 2018</li>
                                        </ul>
                                    </div>
                                </div> <!-- end entry__content -->

                            </div> <!-- end entry -->
                        </div> <!-- end featured__slide -->
                    <?php
                        break;
                    case '1':
                        $urlBanner = base_url() . '/uploads/' . $lastPost[0]->banner;
                        $urlPost = base_url() . '/dashboard/post/' . $lastPost[0]->slug . '/' . $lastPost[0]->id;
                        $urlCategory = base_url() . '/dashboard/category/' . $lastPost[0]->idCategory;
                    ?>
                        <div class="featured__slide">
                            <div class="entry">

                                <div class="entry__background" style="background-image:url('<?= $urlBanner ?>');"></div>

                                <div class="entry__content">
                                    <span class="entry__category"><a href="<?= $urlCategory ?>"><?= $lastPost[0]->nameCategory ?></a></span>

                                    <h1><a href="<?= $urlPost ?>" title=""><?= $lastPost[0]->title ?></a></h1>

                                    <div class="entry__info">
                                        <a href="#0" class="entry__profile-pic">
                                            <img class="avatar" src="<?= base_url() ?>/assets/images/avatars/user-03.jpg" alt="">
                                        </a>
                                        <ul class="entry__meta">
                                            <li><a href="#0"><?= $lastPost[0]->name ?></a></li>
                                            <li><?= date('M-d-Y', strtotime($lastPost[0]->created_at)) ?></li>
                                        </ul>
                                    </div>
                                </div> <!-- end entry__content -->

                            </div> <!-- end entry -->
                        </div> <!-- end featured__slide -->

                        <div class="featured__slide">
                            <div class="entry">

                                <div class="entry__background" style="background-image:url('<?= base_url() ?>/assets/images/thumbs/featured/featured-guitarman.jpg');"></div>

                                <div class="entry__content">
                                    <span class="entry__category"><a href="<?= $urlUploadPost ?>">Hobbie</a></span>

                                    <h1><a href="<?= $urlUploadPost ?>" title="">Publica lo que te guste y sientas aquí.</a></h1>

                                    <div class="entry__info">
                                        <a href="<?= $urlUploadPost ?>" class="entry__profile-pic">
                                            <img class="avatar" src="<?= base_url() ?>/assets/images/avatars/user-05.jpg" alt="">
                                        </a>
                                        <ul class="entry__meta">
                                            <li><a href="<?= $urlUploadPost ?>">Jonathan Smith</a></li>
                                            <li>June 02, 2018</li>
                                        </ul>
                                    </div>
                                </div> <!-- end entry__content -->

                            </div> <!-- end entry -->
                        </div> <!-- end featured__slide -->
                        <?php
                        break;
                    default:
                    if($nPosts > 3){
                        $nPosts = 3;
                    }
                        for ($i = 0; $i < $nPosts; $i++) {
                            $urlBanner = base_url() . '/uploads/' . $lastPost[$i]->banner;
                            $urlPost = base_url() . '/dashboard/post/' . $lastPost[$i]->slug . '/' . $lastPost[$i]->id;
                            $urlCategory = base_url() . '/dashboard/category/' . $lastPost[$i]->idCategory;
                        ?>
                            <div class="featured__slide">
                                <div class="entry">

                                    <div class="entry__background" style="background-image:url('<?= $urlBanner ?>');"></div>

                                    <div class="entry__content">
                                        <span class="entry__category"><a href="<?= $urlCategory ?>"><?= $lastPost[$i]->nameCategory ?></a></span>

                                        <h1><a href="<?= $urlPost ?>" title=""><?= $lastPost[$i]->title ?></a></h1>

                                        <div class="entry__info">
                                            <a href="#0" class="entry__profile-pic">
                                                <img class="avatar" src="<?= base_url() ?>/assets/images/avatars/user-03.jpg" alt="">
                                            </a>
                                            <ul class="entry__meta">
                                                <li><a href="#0"><?= $lastPost[$i]->name ?></a></li>
                                                <li><?= date('M-d-Y', strtotime($lastPost[$i]->created_at)) ?></li>
                                            </ul>
                                        </div>
                                    </div> <!-- end entry__content -->

                                </div> <!-- end entry -->
                            </div> <!-- end featured__slide -->
                <?php
                        }
                        break;
                }
                ?>

            </div> <!-- end featured -->

        </div> <!-- end col-full -->
    </div>
</section> <!-- end s-featured -->


<!-- s-content
    ================================================== -->
<section class="s-content">

    <div class="row entries-wrap wide">
        <div class="entries">

            <?php
            if (isset($lastPost)) {
                for ($i = 3; $i < count($lastPost); $i++) {
                    $urlBanner = base_url() . '/uploads/' . $lastPost[$i]->banner;
                    $urlPost = base_url() . '/Dashboard/post/' . $lastPost[$i]->slug . '/' . $lastPost[$i]->id;
                    $urlCategory = base_url() . '/dashboard/category/' . $lastPost[$i]->idCategory;
            ?>
                    <article class="col-block">

                        <div class="item-entry" data-aos="zoom-in">
                            <div class="item-entry__thumb">
                                <a href="<?= $urlPost ?>" class="item-entry__thumb-link">
                                    <img src="<?= $urlBanner ?>" srcset="<?= $urlBanner ?> 1x, <?= $urlBanner ?> 2x" alt="">
                                </a>
                            </div>

                            <div class="item-entry__text">
                                <div class="item-entry__cat">
                                    <a href="<?= $urlCategory ?>"><?= $lastPost[$i]->nameCategory ?></a>
                                    </d$iv>

                                    <h1 class="item-entry__title"><a href="<?= $urlPost ?>"><?= $lastPost[$i]->title ?></a></h1>

                                    <div class="item-entry__date">
                                        <a href="<?= $urlPost ?>"><?= date('M-d-Y', strtotime($lastPost[$i]->created_at)) ?></a>
                                    </div>
                                </div>
                            </div> <!-- item-entry -->

                    </article> <!-- end article -->
            <?php
                }
            }
            ?>

        </div> <!-- end entries -->
    </div> <!-- end entries-wrap -->

    <!-- <div class="row pagination-wrap">
        <div class="col-full">
            <nav class="pgn" data-aos="fade-up">
                <ul>
                    <li><a class="pgn__prev" href="#0">Prev</a></li>
                    <li><a class="pgn__num" href="#0">1</a></li>
                    <li><span class="pgn__num current">2</span></li>
                    <li><a class="pgn__num" href="#0">3</a></li>
                    <li><a class="pgn__num" href="#0">4</a></li>
                    <li><a class="pgn__num" href="#0">5</a></li>
                    <li><span class="pgn__num dots">…</span></li>
                    <li><a class="pgn__num" href="#0">8</a></li>
                    <li><a class="pgn__next" href="#0">Next</a></li>
                </ul>
            </nav>
        </div>
    </div> -->

</section> <!-- end s-content -->