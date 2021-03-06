<!-- s-content
    ================================================== -->
    <section class="s-content s-content--top-padding s-content--narrow">

<article class="row entry format-standard">

    <div class="entry__media col-full">
        <div class="entry__post-thumb">
            <?php
            $url = base_url() . "/uploads/" . $post['banner'];
            ?>

            <img src="<?= $url ?>" srcset="<?= $url ?> 1000w" sizes="(max-width: 2000px) 100vw, 2000px" alt="">
        </div>
    </div>

    <div class="entry__header col-full">
        <h1 class="entry__header-title display-1">
            <?= $post['title'] ?>
        </h1>
        <ul class="entry__header-meta">
            <?php
            $date = date('d-m-Y', strtotime($post['created_at']));
            ?>
            <li class="date"><?= $date ?></li>
            <li class="byline">
                By
                <a href="#0">Jonathan Doe</a>
            </li>
        </ul>
    </div>

    <div class="col-full entry__main">

        <blockquote>
            <p>
                <?= $post['intro'] ?>
            </p>
        </blockquote>

        <p class="lead drop-cap">
            <?= $post['content'] ?>
        </p>

        <div class="row half-bottom">

            <div class="col-twelve">

                <!-- <h3>Estadísticas</h3> -->

                <ul class="stats-tabs">
                    <li><a href="#"><?= $post['show_home'] ?> <em>Visitas</em></a></li>
                    <!-- <li><a href="#">567 <em>Gratitud</em></a></li> -->
                </ul>

            </div>

        </div> <!-- end row -->

        <!-- <p>Odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nulla vitae elit libero, a pharetra augue laboris in sit minim cupidatat ut dolor voluptate enim veniam consequat occaecat fugiat in adipisicing in amet Ut nulla nisi non ut enim aliqua laborum mollit quis nostrud sed sed.</p>

        <h3>Smaller Heading</h3>

        <p>Dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nulla vitae elit libero, a pharetra augue laboris in sit minim cupidatat ut dolor voluptate enim veniam consequat occaecat fugiat in adipisicing in amet Ut nulla nisi non ut enim aliqua laborum mollit quis nostrud sed sed.

            <pre><code>
code {
    font-size: 1.4rem;
    margin: 0 .2rem;
    padding: .2rem .6rem;
    white-space: nowrap;
    background: #F1F1F1;
    border: 1px solid #E1E1E1;
    border-radius: 3px;
}
</code></pre>

            <p>Odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa.</p>

            <ul>
                <li>Donec nulla non metus auctor fringilla.
                    <ul>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.</li>
                    </ul>
                </li>
                <li>Donec nulla non metus auctor fringilla.</li>
                <li>Donec nulla non metus auctor fringilla.</li>
            </ul>

            <p>Odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nulla vitae elit libero, a pharetra augue laboris in sit minim cupidatat ut dolor voluptate enim veniam consequat occaecat fugiat in adipisicing in amet Ut nulla nisi non ut enim aliqua laborum mollit quis nostrud sed sed.</p>
-->
    </div>
    <div class="entry__taxonomies">
        <div class="entry__cat">
            <h5>Tags In: </h5>
            <?php
            $tags = explode(" ", $post['tags']);
            ?>
            <span class="entry__tax-list entry__tax-list--pill">
                <?php
                foreach ($tags as $value) {
                    echo '<a href="">' . $value . '</a>';
                }
                ?>
            </span>
        </div> <!-- end entry__cat -->

        <div class="entry__tags">
            <h5>Categoria: </h5>
            <span class="entry__tax-list entry__tax-list--pill">
                <a href="<?= base_url() . '/category/' . $category['id'] ?>"><?= $category['name'] ?></a>
            </span>
        </div> <!-- end entry__tags -->
    </div> <!-- end s-content__taxonomies -->

    <div class="entry__author">
        <img src="<?= base_url() ?>/assets/images/avatars/user-03.jpg" alt="">

        <div class="entry__author-about">
            <h5 class="entry__author-name">
                <span>Posteado por</span>
                <a href="#0"><?= $user['name'] ?></a>
            </h5>

            <div class="entry__author-desc">
                <p>
                    <?= $user['bio'] ?>
                </p>
            </div>
        </div>
    </div>

    </div> <!-- s-entry__main -->

</article> <!-- end entry/article -->


<div class="s-content__entry-nav">
    <div class="row s-content__nav">
        <?php
        $db = \Config\Database::connect();
        $id = $post['id'];
        $queryNext = $db->query("SELECT * FROM appCode_udemy.posts p WHERE p.id = (SELECT MIN(p.id ) FROM appCode_udemy.posts p2 WHERE p.id > $id )");
        $queryPrevious = $db->query("SELECT * FROM appCode_udemy.posts p WHERE p.id = (SELECT MIN(p.id ) FROM appCode_udemy.posts p2 WHERE p.id < $id )");
        $resultNext = $queryNext->getResult();
        $resultPrevious = $queryPrevious->getResult();

        if (!empty($resultPrevious)) {
        ?>
            <div class="col-six s-content__prev">
                <a href="<?= base_url() . '/Dashboard/post/' . $resultPrevious[0]->slug . '/' . $resultPrevious[0]->id ?>" rel="prev">
                    <span>Post Anterior</span>
                    <?= $resultPrevious[0]->title;
                    ?>
                </a>
            </div>
        <?php
        } else {
        ?>
            <div class="col-six s-content__prev">
                <a href="<?= base_url() . '/Dashboard/uploadPost/' ?>" rel="prev">
                    <span>Siguiente Post</span>
                    No hay post disponibles :(. Punlica tu post para que se visualice por aquí
                </a>
            </div>
        <?php
        }
        ?>

        <?php
        if (!empty($resultNext)) {
        ?>
            <div class="col-six s-content__next">
                <a href="<?= base_url() . '/Dashboard/post/' . $resultNext[0]->slug . '/' . $resultNext[0]->id ?>" rel="next">
                    <span>Anterior Post</span>
                    <?= $resultNext[0]->title;
                    ?>
                </a>
            </div>
        <?php
        } else {
        ?>
            <div class="col-six s-content__prev">
                <a href="<?= base_url() . '/Dashboard/uploadPost/' ?>" rel="prev">
                    <span>Siguiente Post</span>
                    No hay post disponibles :(. Punlica tu post para que se visualice por aquí
                </a>
            </div>
        <?php
        }
        ?>

    </div>
</div> <!-- end s-content__pagenav -->

<div class="comments-wrap">

    <div id="comments" class="row">
        <div class="col-full">
            <h3 class="h2">
                <?php
                $tam = sizeof($comments);
                if ($tam == 1) {
                    echo $tam . ' Comentario';
                } else {
                    echo $tam . ' Comentarios';
                }
                ?>
            </h3>
            <!-- START commentlist -->
            <ol class="commentlist">
                <?php
                foreach ($comments as $value) {
                ?>
                    <li class="depth-1 comment">

                        <div class="comment__avatar">
                            <img class="avatar" src="<?= base_url() . '/assets/' ?>images/avatars/user-03.jpg" alt="" width="50" height="50">
                        </div>

                        <div class="comment__content">

                            <div class="comment__info">
                                <div class="comment__author"><?= $value['name'] ?></div>

                                <div class="comment__meta">
                                    <div class="comment__time"><?= date('M-d,Y', strtotime($value['date'])) ?></div>
                                    <div class="comment__reply">
                                        <a class="comment-reply-link" href="#0">Responder</a>
                                    </div>
                                </div>

                            </div>

                            <div class="comment__text">
                                <p><?= $value['comment'] ?></p>
                            </div>

                        </div>

                    </li> <!-- end comment level 1 -->
                <?php
                }
                ?>
                <!-- Comentario con nivles -->
                <!-- <li class="thread-alt depth-1 comment">

                    <div class="comment__avatar">
                        <img class="avatar" src="images/avatars/user-04.jpg" alt="" width="50" height="50">
                    </div>

                    <div class="comment__content">

                        <div class="comment__info">
                            <div class="comment__author">John Doe</div>

                            <div class="comment__meta">
                                <div class="comment__time">Jun 15, 2018</div>
                                <div class="comment__reply">
                                    <a class="comment-reply-link" href="#0">Reply</a>
                                </div>
                            </div>
                        </div>

                        <div class="comment__text">
                            <p>Sumo euismod dissentiunt ne sit, ad eos iudico qualisque adversarium, tota falli et mei. Esse euismod
                                urbanitas ut sed, et duo scaevola pericula splendide. Primis veritus contentiones nec ad, nec et
                                tantas semper delicatissimi.</p>
                        </div>

                    </div>

                    <ul class="children">

                        <li class="depth-2 comment">

                            <div class="comment__avatar">
                                <img class="avatar" src="images/avatars/user-03.jpg" alt="" width="50" height="50">
                            </div>

                            <div class="comment__content">

                                <div class="comment__info">
                                    <div class="comment__author">Kakashi Hatake</div>

                                    <div class="comment__meta">
                                        <div class="comment__time">Jun 15, 2018</div>
                                        <div class="comment__reply">
                                            <a class="comment-reply-link" href="#0">Reply</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="comment__text">
                                    <p>Duis sed odio sit amet nibh vulputate
                                        cursus a sit amet mauris. Morbi accumsan ipsum velit. Duis sed odio sit amet nibh vulputate
                                        cursus a sit amet mauris</p>
                                </div>

                            </div>

                            <ul class="children">

                                <li class="depth-3 comment">

                                    <div class="comment__avatar">
                                        <img class="avatar" src="images/avatars/user-04.jpg" alt="" width="50" height="50">
                                    </div>

                                    <div class="comment__content">

                                        <div class="comment__info">
                                            <div class="comment__author">John Doe</div>

                                            <div class="comment__meta">
                                                <div class="comment__time">Jun 15, 2018</div>
                                                <div class="comment__reply">
                                                    <a class="comment-reply-link" href="#0">Reply</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="comment__text">
                                            <p>Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est
                                                etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</p>
                                        </div>

                                    </div>

                                </li>

                            </ul>

                        </li>

                    </ul>

                </li> -->
                <!-- end comment level 1 -->

            </ol>
            <!-- END commentlist -->

        </div> <!-- end col-full -->
    </div> <!-- end comments -->

    <div class="row comment-respond">

        <!-- START respond -->
        <div id="respond" class="col-full">

            <h3 class="h2">Agregar un Comentario <span>Su dirección de correo electrónico no será publicada</span></h3>

            <form name="contactForm" id="contactForm" method="post" action="" autocomplete="off">
                <fieldset>

                    <div class="form-field">
                        <input name="cName" id="cName" class="full-width" placeholder="Tu nombre*" value="" type="text">
                    </div>

                    <div class="form-field">
                        <input name="cEmail" id="cEmail" class="full-width" placeholder="Tu Correo*" value="" type="text">
                    </div>

                    <div class="message form-field">
                        <textarea name="cMessage" id="cMessage" class="full-width" placeholder="Tu Comentario*"></textarea>
                    </div>

                    <input name="submit" id="submit" class="btn btn--primary btn-wide btn--large full-width" value="Agregar Comentario" type="submit">

                </fieldset>
            </form> <!-- end form -->

        </div>
        <!-- END respond-->

    </div> <!-- end comment-respond -->

</div> <!-- end comments-wrap -->

</section> <!-- end s-content -->