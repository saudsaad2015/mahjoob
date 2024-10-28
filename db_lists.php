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
    <h1><?php echo $languages['compute_top_lists']; ?></h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <?php echo $languages['select_date_time_range']; ?>
                </h3>
            </div>
            <div class="box-body">
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
            </div>
        </div>
    </div>
</div>

<div id="timeoutWarning" class="alert alert-warning alert-dismissible fade in" role="alert" hidden>
    <?php echo $languages['timeout_warning_message']; ?><br/><span id="err"></span>
</div>

<?php
if ($boxedlayout) {
    $tablelayout = 'col-md-6';
} else {
    $tablelayout = 'col-md-6 col-lg-4';
}
?>
<div class="row">
    <div class="<?php echo $tablelayout; ?>">
        <div class="box" id="domain-frequency">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo $languages['top_domains']; ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo $languages['domain']; ?></th>
                                <th><?php echo $languages['hits']; ?></th>
                                <th><?php echo $languages['frequency']; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="overlay" hidden>
                <i class="fa fa-sync fa-spin"></i>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="<?php echo $tablelayout; ?>">
        <div class="box" id="ad-frequency">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo $languages['top_blocked_domains']; ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo $languages['domain']; ?></th>
                                <th><?php echo $languages['hits']; ?></th>
                                <th><?php echo $languages['frequency']; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="overlay" hidden>
                <i class="fa fa-sync fa-spin"></i>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="<?php echo $tablelayout; ?>">
        <div class="box" id="client-frequency">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo $languages['top_clients']; ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo $languages['client']; ?></th>
                                <th><?php echo $languages['requests']; ?></th>
                                <th><?php echo $languages['frequency']; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="overlay" hidden>
                <i class="fa fa-sync fa-spin"></i>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>

<script src="<?php echo fileversion('scripts/vendor/daterangepicker.min.js'); ?>"></script>
<script src="<?php echo fileversion('scripts/pi-hole/js/db_lists.js'); ?>"></script>

<?php
require 'scripts/pi-hole/php/footer.php';
?>
