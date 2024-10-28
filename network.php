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
    <h1><?php echo $languages['network_overview_title']; ?></h1>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box" id="network-details">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo $languages['network_overview_title']; ?></h3>
                <!-- إضافة زر تحميل CSV -->
                <div class="box-tools pull-right">
                    <button id="download-csv" class="btn btn-primary btn-sm"><?php echo $languages['download_csv_button']; ?></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="network-entries" class="table table-striped table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th><?php echo $languages['table_id']; ?></th>
                            <th><?php echo $languages['table_ip_address']; ?></th>
                            <th><?php echo $languages['table_hardware_address']; ?></th>
                            <th><?php echo $languages['table_interface']; ?></th>
                            <th><?php echo $languages['table_hostname']; ?></th>
                            <th><?php echo $languages['table_first_seen']; ?></th>
                            <th><?php echo $languages['table_last_query']; ?></th>
                            <th><?php echo $languages['table_number_of_queries']; ?></th>
                            <th><?php echo $languages['table_uses_pihole']; ?></th>
                            <th><?php echo $languages['table_action']; ?></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th><?php echo $languages['table_id']; ?></th>
                            <th><?php echo $languages['table_ip_address']; ?></th>
                            <th><?php echo $languages['table_hardware_address']; ?></th>
                            <th><?php echo $languages['table_interface']; ?></th>
                            <th><?php echo $languages['table_hostname']; ?></th>
                            <th><?php echo $languages['table_first_seen']; ?></th>
                            <th><?php echo $languages['table_last_query']; ?></th>
                            <th><?php echo $languages['table_number_of_queries']; ?></th>
                            <th><?php echo $languages['table_uses_pihole']; ?></th>
                            <th><?php echo $languages['table_action']; ?></th>
                        </tr>
                    </tfoot>
                </table>
                <label><?php echo $languages['background_color_label']; ?></label>
                <table width="100%">
                    <tr class="text-center">
                        <td class="network-recent" width="15%"><?php echo $languages['background_color_just_now']; ?></td>
                        <td class="network-gradient" width="30%"><?php echo $languages['background_color_to']; ?></td>
                        <td class="network-old" width="15%"><?php echo $languages['background_color_24_hours_ago']; ?></td>
                        <td class="network-older" width="20%"><?php echo $languages['background_color_more_than_24_hours_ago']; ?></td>
                        <td class="network-never" width="20%"><?php echo $languages['background_color_device_not_using_pihole']; ?></td>
                    </tr>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
<!-- /.row -->

<script src="<?php echo fileversion('scripts/pi-hole/js/ip-address-sorting.js'); ?>"></script>
<script src="<?php echo fileversion('scripts/pi-hole/js/network.js'); ?>"></script>

<!-- إضافة كود الجافاسكربت لتحميل CSV -->
<script>
document.getElementById('download-csv').addEventListener('click', function () {
    var table = document.getElementById('network-entries');
    var rows = table.querySelectorAll('tr');
    var csv = [];

    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll('th, td');

        for (var j = 0; j < cols.length; j++) {
            // تنظيف النصوص من علامات الاقتباس والفواصل
            var data = cols[j].innerText.replace(/"/g, '""');
            row.push('"' + data + '"');
        }

        csv.push(row.join(','));
    }

    // إنشاء Blob للـ CSV
    var csvString = csv.join('\n');
    var blob = new Blob([csvString], { type: 'text/csv;charset=utf-8;' });
    var link = document.createElement('a');

    if (link.download !== undefined) { // التحقق من دعم المتصفح
        var url = URL.createObjectURL(blob);
        link.setAttribute('href', url);
        link.setAttribute('download', 'network_details.csv');
        link.style.visibility = 'hidden';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
});
</script>

<?php
require 'scripts/pi-hole/php/footer.php';
?>
