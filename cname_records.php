<?php
/*
*    Pi-hole: A black hole for Internet advertisements
*    (c) 2017 Pi-hole, LLC (https://pi-hole.net)
*    Network-wide ad blocking via your own hardware.
*
*    This file is copyright under the latest version of the EUPL.
*    Please see LICENSE file for your rights under this license.
*/

require 'scripts/pi-hole/php/header_authenticated.php';
?>

<!-- Title -->
<div class="page-header">
    <h1><?php echo $languages['local_cname_records_title']; ?></h1>
    <small><?php echo $languages['local_cname_records_subtitle']; ?></small>
</div>

<!-- Domain Input -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-header with-border">
                <h3 class="box-title">
                    <?php echo $languages['add_new_cname_record']; ?>
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="domain"><?php echo $languages['label_domain']; ?></label>
                        <input id="domain" type="url" class="form-control" placeholder="<?php echo $languages['placeholder_domain_list']; ?>" autocomplete="off" spellcheck="false" autocapitalize="none" autocorrect="off">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="target"><?php echo $languages['label_target_domain']; ?></label>
                        <input id="target" type="url" class="form-control" placeholder="<?php echo $languages['placeholder_target_domain']; ?>" autocomplete="off" spellcheck="false" autocapitalize="none" autocorrect="off">
                    </div>
                </div>
            </div>
            <div class="box-footer clearfix">
                <strong><?php echo $languages['note']; ?></strong>
                <p><?php echo $languages['note_cname_target_requirement']; ?></p>
                <p><?php echo $languages['note_cname_no_upstream_queries']; ?></p>
                <p><?php echo $languages['note_cname_external_domains']; ?></p>
                <button type="button" id="btnAdd" class="btn btn-primary pull-right"><?php echo $languages['button_add']; ?></button>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box" id="recent-queries">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <?php echo $languages['list_of_local_cname_records']; ?>
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="customCNAMETable" class="table table-striped table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th><?php echo $languages['table_header_domain']; ?></th>
                            <th><?php echo $languages['table_header_target']; ?></th>
                            <th><?php echo $languages['table_header_action']; ?></th>
                        </tr>
                    </thead>
                </table>
                <button type="button" id="resetButton" class="btn btn-default btn-sm text-red hidden"><?php echo $languages['button_clear_filters']; ?></button>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

<script src="<?php echo fileversion('scripts/pi-hole/js/customcname.js'); ?>"></script>

<?php
require 'scripts/pi-hole/php/footer.php';
?>
