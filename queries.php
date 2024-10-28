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

$showing = '';

if (isset($setupVars['API_QUERY_LOG_SHOW'])) {
    if ($setupVars['API_QUERY_LOG_SHOW'] === 'all') {
        $showing = $languages['showing'];
    } elseif ($setupVars['API_QUERY_LOG_SHOW'] === 'permittedonly') {
        $showing = $languages['showing_permitted'];
    } elseif ($setupVars['API_QUERY_LOG_SHOW'] === 'blockedonly') {
        $showing = $languages['showing_blocked'];
    } elseif ($setupVars['API_QUERY_LOG_SHOW'] === 'nothing') {
        $showing = $languages['showing_no_queries_due_to_setting'];
    }
} elseif (isset($_GET['type']) && $_GET['type'] === 'blocked') {
    $showing = $languages['showing_blocked'];
} else {
    // If filter variable is not set, we
    // automatically show all queries
    $showing = $languages['showing'];
}

$showall = false;
if (isset($_GET['all'])) {
    $showing .= ' ' . $languages['show_all'] . ' ' . $languages['queries_within_specified_time_interval'];
} elseif (isset($_GET['client'])) {
    // Add switch between showing all queries and blocked only
    if (isset($_GET['type']) && $_GET['type'] === 'blocked') {
        // Show blocked queries for this client + link to all
        $showing .= ' ' . $languages['queries_blocked_by_pihole'] . ' ' . $languages['for_client'] . htmlentities($_GET['client']);
        $showing .= ', <a href="?client=' . htmlentities($_GET['client']) . '">' . $languages['show_all'] . '</a>';
    } else {
        // Show All queries for this client + link to show only blocked
        $showing .= ' ' . $languages['queries'] . ' ' . $languages['for_client'] . htmlentities($_GET['client']);
        $showing .= ', <a href="?client=' . htmlentities($_GET['client']) . '&type=blocked">' . $languages['show_blocked_only'] . '</a>';
    }
} elseif (isset($_GET['forwarddest'])) {
    if ($_GET['forwarddest'] === 'blocked') {
        $showing .= ' ' . $languages['queries_blocked_by_pihole'];
    } elseif ($_GET['forwarddest'] === 'cached') {
        $showing .= ' ' . $languages['queries_answered_from_cache'];
    } else {
        $showing .= ' ' . $languages['queries_for_upstream_destination'] . htmlentities($_GET['forwarddest']);
    }
} elseif (isset($_GET['querytype'])) {
    $showing .= ' ' . $languages['type_queries'] . getQueryTypeStr($_GET['querytype']) . $languages['queries'];
} elseif (isset($_GET['domain'])) {
    $showing .= ' ' . $languages['queries_for_domain'] . htmlentities($_GET['domain']);
} elseif (isset($_GET['from']) || isset($_GET['until'])) {
    $showing .= ' ' . $languages['queries_within_specified_time_interval'];
} else {
    $showing .= ' ' . $languages['up_to_100_queries'];
    $showall = true;
}

if (strlen($showing) > 0) {
    $showing = '(' . $showing . ')';
    if ($showall) {
        $showing .= ', <a href="?all">' . $languages['show_all'] . '</a>';
    }
}
?>

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
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $languages['close']; ?></button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box" id="recent-queries">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo $languages['recent_queries'] . $showing; ?></h3>
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
                <p><?php echo $languages['note_queries_pi_hole_hostname_never_logged']; ?></p>
                <p><strong><?php echo $languages['filtering_options']; ?></strong></p>
                <ul>
                    <li><?php echo $languages['click_value_add_remove_filter']; ?></li>
                    <li><?php echo $languages['hold_down_keys_computer']; ?></li>
                    <li><?php echo $languages['long_press_mobile']; ?></li>
                </ul><br/><button type="button" id="resetButton" class="btn btn-default btn-sm text-red hidden"><?php echo $languages['clear_filters']; ?></button>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
<!-- /.row -->
<script src="<?php echo fileversion('scripts/pi-hole/js/ip-address-sorting.js'); ?>"></script>
<script src="<?php echo fileversion('scripts/pi-hole/js/queries.js'); ?>"></script>

<?php
require 'scripts/pi-hole/php/footer.php';
?>
