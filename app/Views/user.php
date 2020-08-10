<section class="s-content s-content--top-padding s-content--narrow">

    <article class="row entry format-standard">

        <div class="row add-bottom">

            <div class="col-twelve">

                <h3>Tables</h3>
                <p>Be sure to use properly formed table markup with <code>&lt;thead&gt;</code> and <code>&lt;tbody&gt;</code> when building a <code>table</code>.</p>

                <div class="table-responsive">

                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Usuario</th>
                                <th>Eliminado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($users as $value) {

                                echo '<tr>';

                                echo '<td>' . $value['id'] . '</td>';
                                echo '<td>' . $value['name'] . '</td>';
                                echo '<td>' . $value['email'] . '</td>';
                                echo '<td>' . $value['username'] . '</td>';
                                echo '<td>' . $value['deleted_at'] . '</td>';

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