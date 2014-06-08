<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default" style="margin-top: 40px">
            <div class="panel-heading">
                <h2 class="panel-title">Install Gallery Plugin</h2>
            </div>
            <div class="panel-body" style="text-align: center">
                <p><?php  echo __d('croogo','Checking requirements before installing Gallery ...') ?></p>

                <?php $errors = 0; ?>
                <?php
                $files_path = WWW_ROOT . 'files';
                if (!is_writable($files_path)) {
                    ?>
                    <div class="alert alert-danger">
                        <i class="fa fa-times"></i>
                        <?php  echo __d('crogoo',"Your app/webroot/files folder isn't writable") ?>
                    </div>
                    <?php $errors++; ?>
                <?php
                } else {
                    ?>
                    <div class="alert alert-success">
                        <a href=""><i class="fa fa-check"></i>
                            <?php  echo __d('croogo','Your files folder is writable.') ?>
                        </a>
                    </div>

                <?php
                }
                ?>

                <?php
                $config_path = App::pluginPath('Gallery') . 'Config';
                if (!is_writable($config_path)) {
                    ?>
                    <div class="alert alert-danger">
                        <i class="fa fa-times"></i>
                        <?php  echo __d('croogo',"Your app/Plugin/Gallery/Config folder isn't writable") ?>
                    </div>
                    <?php $errors++; ?>
                <?php
                } else {
                    ?>
                    <div class="alert alert-success">
                        <a href=""><i class="fa fa-check"></i>
                            <?php  echo __d('croogo','Your config folder is writable.') ?>
                        </a>
                    </div>

                <?php
                }
                ?>


                <?php $db = ConnectionManager::getDataSource('default');

                if (!$db->isConnected()) {
                    ?>
                    <div class="alert alert-danger">
                        <i class="fa fa-times"></i>
                       <?php echo __d('croogo',' You need to connect a database before continue.') ?>
                    </div>
                    <?php $errors++; ?>
                <?php } else { ?>
                    <div class="alert alert-success">
                        <a href=""><i class="fa fa-check"></i>
                           <?php  echo __d('croogo',' Your database is connected.') ?>
                        </a>
                    </div>
                <?php } ?>


                <div class="clearfix"></div>
                <?php if (!$errors) { ?>
                    <?php echo $this->Html->link(
                        '<i class="fa fa-arrow-circle-right"></i> ' .__d('croogo','Configure my workflow now!'),
                        array(
                            'controller' => 'install',
                            'action' => 'configure',
                            'plugin' => 'gallery'
                        ),
                        array(
                            'class' => 'btn btn-success btn-lg',
                            'escape' => false
                        )
                    )?>

                <?php } else { ?>
                    <div class="alert alert-warning">
                        <i class="fa fa-info-circle"></i>
                        <?php  echo __d('croogo','Please, fix all the itens above to continue') ?>
                    </div>
                <?php } ?>
                <div class="clearfix"></div>


            </div>
            <div class="panel-footer" style="text-align: center">
                <small><?php  echo __d('croogo','We will create a config file and create 2 tables in your database.') ?></small>
            </div>
        </div>
    </div>
</div>