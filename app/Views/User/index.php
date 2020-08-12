<section class="s-content s-content--top-padding s-content--narrow">

    <article class="row entry format-standard">

        <div class="row add-bottom">

            <div class="col-twelve">

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


                <h3>Usuarios</h3>
                <p>Be sure to use properly formed table markup with <code>&lt;thead&gt;</code> and <code>&lt;tbody&gt;</code> when building a <code>table</code>.</p>
                <a href="<?= base_url() . '/user/create' ?>">Crear Usuario</a>
                <div class="table-responsive">

                    <table>
                        <thead>
                            <tr>
                                <!-- <th>ID</th> -->
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Usuario</th>
                                <!-- <th>Eliminado</th> -->
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($users as $value) {

                                echo '<tr>';

                                // echo '<td>' . $value['id'] . '</td>';
                                echo '<td>' . $value['name'] . '</td>';
                                echo '<td>' . $value['email'] . '</td>';
                                echo '<td>' . $value['username'] . '</td>';
                                // echo '<td>' . $value['deleted_at'] . '</td>';
                                echo '<td>';
                            ?>
                                <a href="/user/edit/<?= $value['id'] ?>" class="btn btn-warning" role="button"><i class="material-icons">edit</i></a>
                                <a href="/user/delete/<?= $value['id'] ?>" class="btn btn-danger" role="button"><i class="material-icons">delete</i></a>
                            <?php
                                echo '</td>';

                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>

                </div>

            </div>

        </div> <!-- end row -->
    </article>
</section>