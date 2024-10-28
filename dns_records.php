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
    <h1><?php echo $languages['local_dns_records_title']; ?></h1>
    <small><?php echo $languages['local_dns_records_subtitle']; ?></small>
</div>

<!-- Domain Input -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-header with-border">
                <h3 class="box-title">
                    <?php echo $languages['add_new_domain_ip_combination']; ?>
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
                        <label for="ip"><?php echo $languages['label_ip_address']; ?></label>
                        <input id="ip" type="text" class="form-control" placeholder="<?php echo $languages['placeholder_ip_address']; ?>" autocomplete="off" spellcheck="false" autocapitalize="none" autocorrect="off">
                    </div>
                </div>
            </div>
            <div class="box-footer clearfix">
                <strong><?php echo $languages['note']; ?></strong>
                <p><?php echo $languages['note_dns_records_order']; ?></p>
                <ol>
                    <li><?php echo $languages['note_dns_records_item1']; ?></li>
                    <li><?php echo $languages['note_dns_records_item2']; ?></li>
                    <li><?php echo $languages['note_dns_records_item3']; ?></li>
                    <li><?php echo $languages['note_dns_records_item4']; ?></li>
                </ol>
                <p><?php echo $languages['note_only_first_record']; ?></p>
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
                    <?php echo $languages['list_of_local_dns_domains']; ?>
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="customDNSTable" class="table table-striped table-bordered" width="100%">
                    <thead>
                    <tr>
                        <th><?php echo $languages['table_header_domain']; ?></th>
                        <th><?php echo $languages['table_header_ip']; ?></th>
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

<script src="<?php echo fileversion('scripts/pi-hole/js/ip-address-sorting.js'); ?>"></script>
<script src="<?php echo fileversion('scripts/pi-hole/js/customdns.js'); ?>"></script>

<?php
require 'scripts/pi-hole/php/footer.php';
?>
