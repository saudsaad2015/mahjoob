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
    <h1><?php echo $languages['page_header_specify_date_range']; ?></h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <?php echo $languages['box_title_select_date_time_range']; ?>
                </h3>
            </div>
            <div class="box-body">
                <div class="alert alert-info reload-box">
                    <div>
                        <span><i class="fa fa-exclamation-circle"></i>&nbsp; <?php echo $languages['alert_new_options_selected']; ?></span>
                        <button type="button" class="btn btn-primary bt-reload"><?php echo $languages['button_reload_data']; ?></button>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="far fa-clock"></i>
                            </div>
                            <input type="button" class="form-control pull-right" id="querytime" value="<?php echo $languages['click_to_select_date_time_range']; ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label><?php echo $languages['label_query_status']; ?></label>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <div><input type="checkbox" id="type_forwarded" checked><label for="type_forwarded"><?php echo $languages['checkbox_permitted_forwarded']; ?></label><br></div>
                            <div><input type="checkbox" id="type_cached" checked><label for="type_cached"><?php echo $languages['checkbox_permitted_cached']; ?></label></div>
                            <div><input type="checkbox" id="type_cached_stale" checked><label for="type_cached_stale"><?php echo $languages['checkbox_permitted_stale_cache']; ?></label></div>
                            <div><input type="checkbox" id="type_retried" checked><label for="type_retried"><?php echo $languages['checkbox_permitted_retried']; ?></label></div>
                        </div>
                        <div class="col-md-3">
                            <div><input type="checkbox" id="type_gravity" checked><label for="type_gravity"><?php echo $languages['checkbox_blocked_gravity']; ?></label><br></div>
                            <div><input type="checkbox" id="type_external" checked><label for="type_external"><?php echo $languages['checkbox_blocked_external']; ?></label></div>
                            <div><input type="checkbox" id="type_dbbusy" checked><label for="type_dbbusy"><?php echo $languages['checkbox_blocked_dbbusy']; ?></label></div>
                        </div>
                        <div class="col-md-3">
                            <div><input type="checkbox" id="type_blacklist" checked><label for="type_blacklist"><?php echo $languages['checkbox_blocked_exact_blacklist']; ?></label><br></div>
                            <div><input type="checkbox" id="type_regex" checked><label for="type_regex"><?php echo $languages['checkbox_blocked_regex_blacklist']; ?></label></div>
                            <div><input type="checkbox" id="type_special_domain" checked><label for="type_special_domain"><?php echo $languages['checkbox_blocked_special_domain']; ?></label></div>
                        </div>
                        <div class="col-md-3">
                            <div><input type="checkbox" id="type_gravity_CNAME" checked><label for="type_gravity_CNAME"><?php echo $languages['checkbox_blocked_gravity_cname']; ?></label><br></div>
                            <div><input type="checkbox" id="type_blacklist_CNAME" checked><label for="type_blacklist_CNAME"><?php echo $languages['checkbox_blocked_exact_blacklist_cname']; ?></label><br></div>
                            <div><input type="checkbox" id="type_regex_CNAME" checked><label for="type_regex_CNAME"><?php echo $languages['checkbox_blocked_regex_blacklist_cname']; ?></label></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="timeoutWarning" class="alert alert-warning alert-dismissible fade in" role="alert" hidden>
    <?php echo $languages['timeout_warning_message']; ?><br/><span id="err"></span>
</div>

<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-aqua no-user-select">
            <div class="inner">
                <h3 class="statistic" id="dns_queries">---</h3>
                <p><?php echo $languages['total_queries']; ?></p>
            </div>
            <div class="icon">
                <i class="fas fa-globe-americas"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-red no-user-select">
            <div class="inner">
                <h3 class="statistic" id="queries_blocked_exact">---</h3>
                <p><?php echo $languages['queries_blocked']; ?></p>
            </div>
            <div class="icon">
                <i class="fas fa-hand-paper"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-red no-user-select">
            <div class="inner">
                <h3 class="statistic" id="queries_wildcard_blocked">---</h3>
                <p><?php echo $languages['queries_blocked_wildcards']; ?></p>
            </div>
            <div class="icon">
                <i class="fas fa-hand-paper"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-yellow no-user-select">
            <div class="inner">
                <h3 class="statistic" id="queries_percentage_today">---</h3>
                <p><?php echo $languages['percentage_blocked']; ?></p>
            </div>
            <div class="icon">
                <i class="fas fa-chart-pie"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
</div>

<!-- Alert Modal -->
<div id="alertModal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <span class="fa-stack fa-2x" style="margin-bottom: 10px">
                        <div class="alProcessing">
                            <i class="fa-stack-2x alSpinner"></i>
                        </div>
                        <div class="alSuccess" style="display: none">
                            <i class="fa fa-circle fa-stack-2x text-green"></i>
                            <i class="fa fa-check fa-stack-1x fa-inverse"></i>
                        </div>
                        <div class="alFailure" style="display: none">
                            <i class="fa fa-circle fa-stack-2x text-red"></i>
                            <i class="fa fa-times fa-stack-1x fa-inverse"></i>
                        </div>
                    </span>
                    <div class="alProcessing"><?php echo $languages['adding_domain_to_list']; ?><span id="alDomain"></span><?php echo $languages['to_the']; ?><span id="alList"></span>...</div>
                    <div class="alSuccess text-bold text-green" style="display: none"><span id="alDomain"></span><?php echo $languages['domain_successfully_added_to_list']; ?><span id="alList"></span></div>
                    <div class="alFailure text-bold text-red" style="display: none">
                        <span id="alNetErr"><?php echo $languages['timeout_or_network_error']; ?></span>
                        <span id="alCustomErr"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $languages['button_close']; ?></button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box" id="recent-queries">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo $languages['recent_queries']; ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="all-queries" class="table table-striped table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th><?php echo $languages['time']; ?></th>
                            <th><?php echo $languages['type']; ?></th>
                            <th><?php echo $languages['domain']; ?></th>
                            <th><?php echo $languages['client']; ?></th>
                            <th><?php echo $languages['status']; ?></th>
                            <th><?php echo $languages['reply']; ?></th>
                            <th><?php echo $languages['action']; ?></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th><?php echo $languages['time']; ?></th>
                            <th><?php echo $languages['type']; ?></th>
                            <th><?php echo $languages['domain']; ?></th>
                            <th><?php echo $languages['client']; ?></th>
                            <th><?php echo $languages['status']; ?></th>
                            <th><?php echo $languages['reply']; ?></th>
                            <th><?php echo $languages['action']; ?></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
<!-- /.row -->
<script src="<?php echo fileversion('scripts/pi-hole/js/ip-address-sorting.js'); ?>"></script>
<script src="<?php echo fileversion('scripts/vendor/daterangepicker.min.js'); ?>"></script>
<script src="<?php echo fileversion('scripts/pi-hole/js/db_queries.js'); ?>"></script>

<?php
require 'scripts/pi-hole/php/footer.php';
?>
