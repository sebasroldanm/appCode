<!-- s-content
    ================================================== -->
<section class="s-content s-content--top-padding s-content--narrow">

    <article class="row entry format-standard">

        <div class="entry__media col-full">
            <div class="entry__post-thumb">
                <?php
                $url = base_url() . "/uploads/" . $post[0]['banner'];
                ?>
                <img src="<?= $url ?>" sizes="(max-width: 2000px) 100vw, 2000px" alt="" style="align-content: center;">
            </div>
        </div>

        <div class="entry__header col-full">
            <h1 class="entry__header-title display-1">
                <?= $post[0]['title'] ?>
            </h1>
            <ul class="entry__header-meta">
                <?php
                $date = date('d-m-Y', strtotime($post[0]['created_at']));
                ?>
                <li class="date"><?= $date ?></li>
                <li class="byline">
                    By
                    <a href="#0">Jonathan Doe</a>
                </li>
            </ul>
        </div>

        <div class="col-full entry__main">

            <p class="lead drop-cap">
                <?= $post[0]['content'] ?>
            </p>

            <blockquote>
                <p>
                    <?= $post[0]['intro'] ?>
                </p>
            </blockquote>

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
                $tags = explode(" ", $post[0]['tags']);
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
                    <a href="<?= base_url() . '/category/' . $categories[0]['id'] ?>"><?= $categories[0]['name'] ?></a>
                </span>
            </div> <!-- end entry__tags -->
        </div> <!-- end s-content__taxonomies -->

        <div class="entry__author">
            <img src="images/avatars/user-03.jpg" alt="">

            <div class="entry__author-about">
                <h5 class="entry__author-name">
                    <span>Posted by</span>
                    <a href="#0">Jonathan Doe</a>
                </h5>

                <div class="entry__author-desc">
                    <p>
                        Alias aperiam at debitis deserunt dignissimos dolorem doloribus, fuga fugiat
                        impedit laudantium magni maxime nihil nisi quidem quisquam sed ullam voluptas
                        voluptatum. Lorem ipsum dolor sit.
                    </p>
                </div>
            </div>
        </div>

        </div> <!-- s-entry__main -->

    </article> <!-- end entry/article -->


    <div class="s-content__entry-nav">
        <div class="row s-content__nav">
            <div class="col-six s-content__prev">
                <?php
                $db = \Config\Database::connect();
                $query = $db->query("SELECT * FROM posts ORDER BY RAND() LIMIT 2");
                $result = $query->getResult();
                ?>
                <a href="<?= base_url() . '/Dashboard/post/' . $result[0]->slug . '/' . $result[0]->id ?>" rel="prev">
                    <span>Post Anterior</span>
                    <?= $result[0]->title;

                    ?>
                </a>
            </div>
            <div class="col-six s-content__next">
                <a href="<?= base_url() . '/Dashboard/post/' . $result[1]->slug . '/' . $result[1]->id ?>" rel="next">
                    <span>Siguiente Post</span>
                    <?= $result[1]->title;
                    ?>
                </a>
            </div>
        </div>
    </div> <!-- end s-content__pagenav -->

    <div class="comments-wrap">

        <div id="comments" class="row">
            <div class="col-full">

                <h3 class="h2">5 Comments</h3>

                <!-- START commentlist -->
                <ol class="commentlist">

                    <li class="depth-1 comment">

                        <div class="comment__avatar">
                            <img class="avatar" src="images/avatars/user-01.jpg" alt="" width="50" height="50">
                        </div>

                        <div class="comment__content">

                            <div class="comment__info">
                                <div class="comment__author">Itachi Uchiha</div>

                                <div class="comment__meta">
                                    <div class="comment__time">Jun 15, 2018</div>
                                    <div class="comment__reply">
                                        <a class="comment-reply-link" href="#0">Reply</a>
                                    </div>
                                </div>
                            </div>

                            <div class="comment__text">
                                <p>Adhuc quaerendum est ne, vis ut harum tantas noluisse, id suas iisque mei. Nec te inani ponderum vulputate,
                                    facilisi expetenda has et. Iudico dictas scriptorem an vim, ei alia mentitum est, ne has voluptua praesent.</p>
                            </div>

                        </div>

                    </li> <!-- end comment level 1 -->

                    <li class="thread-alt depth-1 comment">

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

                    </li> <!-- end comment level 1 -->

                    <li class="depth-1 comment">

                        <div class="comment__avatar">
                            <img class="avatar" src="images/avatars/user-02.jpg" alt="" width="50" height="50">
                        </div>

                        <div class="comment__content">

                            <div class="comment__info">
                                <div class="comment__author">Shikamaru Nara</div>

                                <div class="comment__meta">
                                    <div class="comment__time">Jun 15, 2018</div>
                                    <div class="comment__reply">
                                        <a class="comment-reply-link" href="#0">Reply</a>
                                    </div>
                                </div>
                            </div>

                            <div class="comment__text">
                                <p>Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem.</p>
                            </div>

                        </div>

                    </li> <!-- end comment level 1 -->

                </ol>
                <!-- END commentlist -->

            </div> <!-- end col-full -->
        </div> <!-- end comments -->

        <div class="row comment-respond">

            <!-- START respond -->
            <div id="respond" class="col-full">

                <h3 class="h2">Add Comment <span>Your email address will not be published</span></h3>

                <form name="contactForm" id="contactForm" method="post" action="" autocomplete="off">
                    <fieldset>

                        <div class="form-field">
                            <input name="cName" id="cName" class="full-width" placeholder="Your Name*" value="" type="text">
                        </div>

                        <div class="form-field">
                            <input name="cEmail" id="cEmail" class="full-width" placeholder="Your Email*" value="" type="text">
                        </div>

                        <div class="form-field">
                            <input name="cWebsite" id="cWebsite" class="full-width" placeholder="Website" value="" type="text">
                        </div>

                        <div class="message form-field">
                            <textarea name="cMessage" id="cMessage" class="full-width" placeholder="Your Message*"></textarea>
                        </div>

                        <input name="submit" id="submit" class="btn btn--primary btn-wide btn--large full-width" value="Add Comment" type="submit">

                    </fieldset>
                </form> <!-- end form -->

            </div>
            <!-- END respond-->

        </div> <!-- end comment-respond -->

    </div> <!-- end comments-wrap -->

</section> <!-- end s-content -->