<?php
require 'conn.php';
require 'vendor/autoload.php'; // For PhpSpreadsheet and Dompdf

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;

if (isset($_POST['format'])) {
    $format = $_POST['format'];

    // Fetch the members data
    $query = "SELECT * FROM members ORDER BY submission_date DESC";
    $result = $con->query($query);

    if (!$result) {
        die('Query Error: ' . $con->error);
    }

    if ($format == 'excel') {
        // Create Excel file
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'SN');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Gender');
        $sheet->setCellValue('D1', 'Status'); // Added Status Column
        $sheet->setCellValue('E1', 'Phone');
        $sheet->setCellValue('F1', 'Country');
        $sheet->setCellValue('G1', 'Region');
        $sheet->setCellValue('H1', 'City');
        $sheet->setCellValue('I1', 'Reason for Membership');
        $sheet->setCellValue('J1', 'Submitted At');

        $rowCount = 2;
        $sn = 1;
        while ($row = $result->fetch_assoc()) {
            $sheet->setCellValue('A' . $rowCount, $sn);
            $sheet->setCellValue('B' . $rowCount, $row['name']);
            $sheet->setCellValue('C' . $rowCount, $row['gender']);
            $sheet->setCellValue('D' . $rowCount, $row['status']); // Added Status Field
            $sheet->setCellValue('E' . $rowCount, $row['phone']);
            $sheet->setCellValue('F' . $rowCount, $row['country']);
            $sheet->setCellValue('G' . $rowCount, $row['region']);
            $sheet->setCellValue('H' . $rowCount, $row['city']);
            $sheet->setCellValue('I' . $rowCount, $row['reason']);
            $sheet->setCellValue('J' . $rowCount, $row['submission_date']);
            $rowCount++;
            $sn++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'Members_Submissions.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $fileName . '"');
        $writer->save('php://output');
        exit();
    } elseif ($format == 'pdf') {
        // Create PDF
        $html = '<div style="text-align:center;">
                    <h1>Mutual Generation International</h1>
                    <img src="dist/img/logowhite.png" alt="Logo" width="100" /><br />
                    <p><strong>Address:</strong> Mikocheki B, Daima Street, Kinondoni, Dar es Salaam</p>
                    <p><strong>Phone:</strong> +255 752 032 985</p>
                    <p><strong>Email:</strong> mutualgeneration@gmail.com</p>
                    <h2>Members Submissions</h2>
                </div>';
        $html .= '<table border="1" cellpadding="5" cellspacing="0" style="width: 100%;">
                    <thead>
                        <tr>
                            <th style="background-color: #00ccfa;">SN</th>
                            <th style="background-color: #00ccfa;">Name</th>
                            <th style="background-color: #00ccfa;">Gender</th>
                            <th style="background-color: #00ccfa;">Status</th> <!-- Added Status Column -->
                            <th style="background-color: #00ccfa;">Phone</th>
                            <th style="background-color: #00ccfa;">Country</th>
                            <th style="background-color: #00ccfa;">Region</th>
                            <th style="background-color: #00ccfa;">City</th>
                            <th style="background-color: #00ccfa;">Reason for Membership</th>
                            <th style="background-color: #00ccfa;">Submitted At</th>
                        </tr>
                    </thead>
                    <tbody>';

        $sn = 1;
        while ($row = $result->fetch_assoc()) {
            $html .= '<tr>
                        <td>' . $sn . '</td>
                        <td>' . htmlspecialchars($row['name']) . '</td>
                        <td>' . htmlspecialchars($row['gender']) . '</td>
                        <td>' . htmlspecialchars($row['status']) . '</td> <!-- Added Status Field -->
                        <td>' . htmlspecialchars($row['phone']) . '</td>
                        <td>' . htmlspecialchars($row['country']) . '</td>
                        <td>' . htmlspecialchars($row['region']) . '</td>
                        <td>' . htmlspecialchars($row['city']) . '</td>
                        <td>' . htmlspecialchars($row['reason']) . '</td>
                        <td>' . htmlspecialchars($row['submission_date']) . '</td>
                    </tr>';
            $sn++;
        }

        $html .= '</tbody></table>';

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('Members_Submissions.pdf', array("Attachment" => 1));
        exit();
    }
}
?>
