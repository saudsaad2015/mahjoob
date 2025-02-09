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
    <h1><?php echo $languages['audit_log_title']; ?></h1>
</div>

<div class="row">
    <div class="col-xs-12 col-lg-6">
        <div class="box" id="domain-frequency">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo $languages['allowed_queries']; ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo $languages['domain']; ?></th>
                                <th><?php echo $languages['hits']; ?></th>
                                <th><?php echo $languages['actions']; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="overlay">
                <i class="fa fa-sync fa-spin"></i>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->

    <div class="col-xs-12 col-lg-6">
        <div class="box" id="ad-frequency">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo $languages['blocked_queries']; ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo $languages['domain']; ?></th>
                                <th><?php echo $languages['hits']; ?></th>
                                <th><?php echo $languages['actions']; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="overlay">
                <i class="fa fa-sync fa-spin"></i>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

<script src="<?php echo fileversion('scripts/pi-hole/js/auditlog.js'); ?>"></script>

<?php
require 'scripts/pi-hole/php/footer.php';
?>
