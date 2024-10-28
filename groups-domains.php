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
    <h1><?php echo $languages['domain_management']; ?></h1>
</div>

<!-- Domain Input -->
<div class="row">
    <div class="col-md-12">
        <div class="box" id="add-group">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <?php echo $languages['add_new_domain_or_regex_filter']; ?>
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active" role="presentation">
                            <a href="#tab_domain" aria-controls="tab_domain" aria-expanded="true" role="tab" data-toggle="tab"><?php echo $languages['tab_domain']; ?></a>
                        </li>
                        <li role="presentation">
                            <a href="#tab_regex" aria-controls="tab_regex" aria-expanded="false" role="tab" data-toggle="tab"><?php echo $languages['tab_regex_filter']; ?></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <!-- Domain tab -->
                        <div id="tab_domain" class="tab-pane active fade in">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="new_domain"><?php echo $languages['label_domain']; ?></label>
                                        <input id="new_domain" type="url" class="form-control active" placeholder="<?php echo $languages['placeholder_domain']; ?>" autocomplete="off" spellcheck="false" autocapitalize="none" autocorrect="off">
                                        <div id="suggest_domains" class="table-responsive no-border"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="new_domain_comment"><?php echo $languages['label_domain_comment']; ?></label>
                                    <input id="new_domain_comment" type="text" class="form-control" placeholder="<?php echo $languages['placeholder_domain_comment']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div>
                                        <input type="checkbox" id="wildcard_checkbox">
                                        <label for="wildcard_checkbox"><?php echo $languages['checkbox_label_add_wildcard']; ?></label>
                                        <p><?php echo $languages['checkbox_description_add_wildcard']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- RegEx tab -->
                        <div id="tab_regex" class="tab-pane fade">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="new_regex"><?php echo $languages['label_regex']; ?></label>
                                        <input id="new_regex" type="text" class="form-control active" placeholder="<?php echo $languages['placeholder_regex']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <strong>Hint:</strong> <?php echo $languages['instruction_help_regex']; ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="new_regex_comment"><?php echo $languages['label_regex_comment']; ?></label>
                                    <input id="new_regex_comment" type="text" class="form-control" placeholder="<?php echo $languages['placeholder_regex_comment']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <p><?php echo $languages['note_auto_assignment']; ?></p>
                </div>
                <div class="btn-toolbar pull-right" role="toolbar" aria-label="Toolbar with buttons">
                    <div class="btn-group" role="group" aria-label="Third group">
                        <button type="button" class="btn btn-primary" id="add2black"><?php echo $languages['button_add_to_blacklist']; ?></button>
                    </div>
                    <div class="btn-group" role="group" aria-label="Third group">
                        <button type="button" class="btn btn-primary" id="add2white"><?php echo $languages['button_add_to_whitelist']; ?></button>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

<!-- Domain List -->
<div class="row">
    <div class="col-md-12">
        <div class="box" id="domains-list">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <?php echo $languages['list_of_domains']; ?>
                </h3>
                <div class="filter_types">
                    <div class="line">
                        <span><input type="checkbox" name="typ" value="0" id="typ0" checked><label for="typ0"><?php echo $languages['filter_exact_whitelist']; ?></label></span>
                        <span><input type="checkbox" name="typ" value="2" id="typ2" checked><label for="typ2"><?php echo $languages['filter_regex_whitelist']; ?></label></span>
                    </div>
                    <div class="line">
                        <span><input type="checkbox" name="typ" value="1" id="typ1" checked><label for="typ1"><?php echo $languages['filter_exact_blacklist']; ?></label></span>
                        <span><input type="checkbox" name="typ" value="3" id="typ3" checked><label for="typ3"><?php echo $languages['filter_regex_blacklist']; ?></label></span>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="domainsTable" class="table table-striped table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th><?php echo $languages['table_header_id']; ?></th>
                            <th><?php echo $languages['table_header_empty']; ?></th>
                            <th><?php echo $languages['table_header_domain_regex']; ?></th>
                            <th><?php echo $languages['table_header_type']; ?></th>
                            <th><?php echo $languages['table_header_status']; ?></th>
                            <th><?php echo $languages['table_header_comment']; ?></th>
                            <th><?php echo $languages['table_header_group_assignment']; ?></th>
                            <th><?php echo $languages['table_header_action']; ?></th>
                        </tr>
                    </thead>
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
<script src="<?php echo fileversion('scripts/pi-hole/js/groups-domains.js'); ?>"></script>

<?php
require 'scripts/pi-hole/php/footer.php';
?>
