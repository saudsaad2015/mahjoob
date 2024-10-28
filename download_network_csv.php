<?php
/*
 * Pi-hole: A black hole for Internet advertisements
 * (c) 2017 Pi-hole, LLC (https://pi-hole.net)
 * Network-wide ad blocking via your own hardware.
 *
 * This file is copyright under the latest version of the EUPL.
 * Please see LICENSE file for your rights under this license.
 */

require 'header_authenticated.php'; // تأكد من المسار الصحيح للملف

// دالة لإخراج CSV
function outputCSV($data, $filename = "network_details.csv") {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename="' . $filename . '"');

    $output = fopen('php://output', 'w');

    // إخراج رؤوس الأعمدة
    if (count($data) > 0) {
        fputcsv($output, array_keys($data[0]));
    }

    // إخراج البيانات
    foreach ($data as $row) {
        fputcsv($output, $row);
    }

    fclose($output);
    exit();
}

// جلب بيانات الشبكة من قاعدة بيانات Pi-hole
function getNetworkData() {
    // إعداد الاتصال بقاعدة البيانات
    // تأكد من تعديل التفاصيل حسب تكوين قاعدة البيانات الخاصة بك
    $servername = "localhost";
    $username = "pi_hole_user"; // استبدل باسم المستخدم الفعلي
    $password = "pi_hole_password"; // استبدل بكلمة المرور الفعلية
    $dbname = "pihole"; // اسم قاعدة البيانات الفعلية

    // إنشاء الاتصال
    $conn = new mysqli($servername, $username, $password, $dbname);

    // التحقق من الاتصال
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // استعلام SQL لجلب بيانات الشبكة
    $sql = "SELECT id, ip_address, hardware_address, interface, hostname, first_seen, last_query, number_of_queries, uses_pihole, action FROM network_table"; // تأكد من اسم الجدول والأعمدة
    $result = $conn->query($sql);

    $data = [];

    if ($result->num_rows > 0) {
        // إخراج البيانات
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    $conn->close();

    return $data;
}

$networkData = getNetworkData();

// إخراج CSV
outputCSV($networkData);

require 'footer.php'; // تأكد من المسار الصحيح للملف
?>
