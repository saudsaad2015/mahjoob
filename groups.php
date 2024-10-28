<?php
/*
*    Pi-hole: A black hole for Internet advertisements
*    (c) 2019 Pi-hole, LLC (https://pi-hole.net)
*    Network-wide ad blocking via your own hardware.
*
*    This file is copyright under the latest version of the EUPL.
*    Please see LICENSE file for your rights under this license.
*/

require 'scripts/pi-hole/php/header_authenticated.php';
?>

<!-- Title -->
<div class="page-header">
    <h1><?php echo $languages['group_management']; ?></h1>
</div>

<!-- Group Input -->
<div class="row">
    <div class="col-md-12">
        <div class="box" id="add-group">
            <!-- /.box-header -->
            <div class="box-header with-border">
                <h3 class="box-title">
                    <?php echo $languages['add_new_group']; ?>
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="new_name"><?php echo $languages['label_name']; ?></label>
                        <input id="new_name" type="text" class="form-control" placeholder="<?php echo $languages['placeholder_group_name']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="new_desc"><?php echo $languages['label_description']; ?></label>
                        <input id="new_desc" type="text" class="form-control" placeholder="<?php echo $languages['placeholder_group_description']; ?>">
                    </div>
                </div>
            </div>
            <div class="box-footer clearfix">
                <strong><?php echo $languages['hints']; ?></strong>
                <ol>
                    <li><?php echo $languages['hint_multiple_groups']; ?></li>
                    <li><?php echo $languages['hint_group_names_in_quotes']; ?></li>
                </ol>
                <button type="button" id="btnAdd" class="btn btn-primary pull-right"><?php echo $languages['button_add']; ?></button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box" id="groups-list">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <?php echo $languages['list_of_groups']; ?>
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="groupsTable" class="table table-striped table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th><?php echo $languages['table_header_id']; ?></th>
                            <th></th>
                            <th><?php echo $languages['table_header_name']; ?></th>
                            <th><?php echo $languages['table_header_status']; ?></th>
                            <th><?php echo $languages['table_header_description']; ?></th>
                            <th><?php echo $languages['table_header_action']; ?></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th><?php echo $languages['table_header_id']; ?></th>
                            <th></th>
                            <th><?php echo $languages['table_header_name']; ?></th>
                            <th><?php echo $languages['table_header_status']; ?></th>
                            <th><?php echo $languages['table_header_description']; ?></th>
                            <th><?php echo $languages['table_header_action']; ?></th>
                        </tr>
                    </tfoot>
                </table>
                <button type="button" id="resetButton" class="btn btn-default btn-sm text-red hidden"><?php echo $languages['button_reset_sorting']; ?></button>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

<!-- Warning Alert -->
<div id="timeoutWarning" class="alert alert-warning alert-dismissible fade in" role="alert" hidden>
    <?php echo $languages['timeout_warning_message']; ?><br/><span id="err"></span>
</div>

<script src="<?php echo fileversion('scripts/vendor/bootstrap-select.min.js'); ?>"></script>
<script src="<?php echo fileversion('scripts/vendor/bootstrap-toggle.min.js'); ?>"></script>
<script src="<?php echo fileversion('scripts/pi-hole/js/groups.js'); ?>"></script>

<?php
require 'scripts/pi-hole/php/footer.php';
?>
