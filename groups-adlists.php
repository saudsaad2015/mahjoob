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
    <h1><?php echo $languages['adlist_group_management']; ?></h1>
</div>

<!-- Domain Input -->
<div class="row">
    <div class="col-md-12">
        <div class="box" id="add-group">
            <!-- /.box-header -->
            <div class="box-header with-border">
                <h3 class="box-title">
                    <?php echo $languages['add_new_adlist']; ?>
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="new_address"><?php echo $languages['address']; ?></label>
                        <input id="new_address" type="text" class="form-control" placeholder="<?php echo $languages['url_or_space_separated_urls']; ?>" autocomplete="off" spellcheck="false" autocapitalize="none" autocorrect="off">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="new_comment"><?php echo $languages['comment']; ?></label>
                        <input id="new_comment" type="text" class="form-control" placeholder="<?php echo $languages['adlist_description_optional']; ?>">
                    </div>
                </div>
            </div>
            <div class="box-footer clearfix">
                <strong><?php echo $languages['hints']; ?></strong>
                <ol>
                    <li><?php echo $languages['hint1']; ?></li>
                    <li><?php echo $languages['hint2']; ?></li>
                    <li><?php echo $languages['hint3']; ?></li>
                </ol>
                <button type="button" id="btnAdd" class="btn btn-primary pull-right"><?php echo $languages['add']; ?></button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box" id="adlists-list">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <?php echo $languages['list_of_adlists']; ?>
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="adlistsTable" class="table table-striped table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th><?php echo $languages['id']; ?></th>
                            <th></th>
                            <th class="no-padding"></th>
                            <th><?php echo $languages['address_table']; ?></th>
                            <th><?php echo $languages['status']; ?></th>
                            <th><?php echo $languages['comment_table']; ?></th>
                            <th><?php echo $languages['group_assignment']; ?></th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                </table>
                <button type="button" id="resetButton" class="btn btn-default btn-sm text-red hidden"><?php echo $languages['reset_sorting']; ?></button>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

<script src="<?php echo fileversion('scripts/vendor/bootstrap-select.min.js'); ?>"></script>
<script src="<?php echo fileversion('scripts/vendor/bootstrap-toggle.min.js'); ?>"></script>
<script src="<?php echo fileversion('scripts/pi-hole/js/groups-adlists.js'); ?>"></script>

<?php
require 'scripts/pi-hole/php/footer.php';
?>
