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
    <h1><?php echo $languages['client_group_management']; ?></h1>
</div>

<!-- Domain Input -->
<div class="row">
    <div class="col-md-12">
        <div class="box" id="add-client">
            <!-- /.box-header -->
            <div class="box-header with-border">
                <h3 class="box-title">
                    <?php echo $languages['add_new_client']; ?>
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="select"><?php echo $languages['label_known_clients']; ?></label>
                        <select id="select" class="form-control" placeholder="">
                            <option disabled selected><?php echo $languages['select_known_clients_loading']; ?></option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="new_comment"><?php echo $languages['label_comment']; ?></label>
                        <input id="new_comment" type="text" class="form-control" placeholder="<?php echo $languages['placeholder_client_description']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p><?php echo $languages['instruction_select_or_add_client']; ?></p>
                        <p><?php echo $languages['instruction_client_description']; ?></p>
                        <p><?php echo $languages['instruction_client_recognition']; ?></p>
                    </div>
                </div>
            </div>
            <div class="box-footer clearfix">
                <button type="button" id="btnAdd" class="btn btn-primary pull-right"><?php echo $languages['button_add']; ?></button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box" id="clients-list">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <?php echo $languages['list_of_configured_clients']; ?>
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="clientsTable" class="table table-striped table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th><?php echo $languages['table_header_id']; ?></th>
                            <th><?php echo $languages['table_header_empty']; ?></th>
                            <th title="<?php echo $languages['table_header_client_tooltip']; ?>"><?php echo $languages['table_header_client']; ?></th>
                            <th><?php echo $languages['table_header_comment']; ?></th>
                            <th><?php echo $languages['table_header_group_assignment']; ?></th>
                            <th><?php echo $languages['table_header_action']; ?></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th><?php echo $languages['table_header_id']; ?></th>
                            <th><?php echo $languages['table_header_empty']; ?></th>
                            <th title="<?php echo $languages['table_header_client_tooltip']; ?>"><?php echo $languages['table_header_client']; ?></th>
                            <th><?php echo $languages['table_header_comment']; ?></th>
                            <th><?php echo $languages['table_header_group_assignment']; ?></th>
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
<script src="<?php echo fileversion('scripts/pi-hole/js/ip-address-sorting.js'); ?>"></script>
<script src="<?php echo fileversion('scripts/pi-hole/js/groups-clients.js'); ?>"></script>

<?php
require 'scripts/pi-hole/php/footer.php';
?>
