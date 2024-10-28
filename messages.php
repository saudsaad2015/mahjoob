<?php
/*
*    Pi-hole: A black hole for Internet advertisements
*    (c) 2020 Pi-hole, LLC (https://pi-hole.net)
*    Network-wide ad blocking via your own hardware.
*
*    This file is copyright under the latest version of the EUPL.
*    Please see LICENSE file for your rights under this license.
*/

require 'scripts/pi-hole/php/header_authenticated.php';
?>

<!-- Title -->
<div class="page-header">
    <h1><?php echo $languages['diagnosis_title']; ?></h1>
    <small><?php echo $languages['diagnosis_subtitle']; ?></small>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box" id="messages-list">
            <!-- /.box-header -->
            <div class="box-body">
                <table id="messagesTable" class="table table-striped table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th><?php echo $languages['table_header_id']; ?></th>
                            <th><?php echo $languages['table_header_empty1']; ?></th>
                            <th><?php echo $languages['table_header_time']; ?></th>
                            <th><?php echo $languages['table_header_type']; ?></th>
                            <th><?php echo $languages['table_header_message']; ?></th>
                            <th><?php echo $languages['table_header_data1']; ?></th>
                            <th><?php echo $languages['table_header_data2']; ?></th>
                            <th><?php echo $languages['table_header_data3']; ?></th>
                            <th><?php echo $languages['table_header_data4']; ?></th>
                            <th><?php echo $languages['table_header_data5']; ?></th>
                            <th><?php echo $languages['table_header_empty2']; ?></th>
                        </tr>
                    </thead>
                </table>
                <p><?php echo $languages['note_generate_debug_log']; ?></p>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

<script src="<?php echo fileversion('scripts/pi-hole/js/messages.js'); ?>"></script>

<?php
require 'scripts/pi-hole/php/footer.php';
?>
