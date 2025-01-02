<?php
require 'conn.php';
require 'vendor/autoload.php'; // For PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;

if (isset($_POST['format'])) {
    $format = $_POST['format'];

    // Fetch the collaborations data
    $query = "SELECT * FROM collaborations ORDER BY submitted_at DESC";
    $result = $con->query($query);

    if ($format == 'excel') {
        // Create Excel file
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'SN');
        $sheet->setCellValue('B1', 'Organisation/Name');
        $sheet->setCellValue('C1', 'Contact');
        $sheet->setCellValue('D1', 'Collaboration Type');
        $sheet->setCellValue('E1', 'Areas of Collaboration');
        $sheet->setCellValue('F1', 'Address');
        $sheet->setCellValue('G1', 'Submitted At');

        $rowCount = 2;
        $sn = 1;
        while ($row = $result->fetch_assoc()) {
            $sheet->setCellValue('A' . $rowCount, $sn);
            $sheet->setCellValue('B' . $rowCount, $row['org_name']);
            $sheet->setCellValue('C' . $rowCount, $row['contact']);
            $sheet->setCellValue('D' . $rowCount, $row['collaboration_type']);
            $sheet->setCellValue('E' . $rowCount, $row['collab_areas']);
            $sheet->setCellValue('F' . $rowCount, $row['address']);
            $sheet->setCellValue('G' . $rowCount, $row['submitted_at']);
            $rowCount++;
            $sn++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'Collaborations_Submissions.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $fileName . '"');
        $writer->save('php://output');
        exit();
    } elseif ($format == 'pdf') {
        // Create PDF
        $html = '<div style="text-align:center;">
                    <h1>Mutual Generation International</h1>
                    <img src="dist/img/logowhite.png"  alt="Logo" width="100" /><br />
                    <p><strong>Address:</strong> Mikocheki B, Daima Street, Kinodondoni, Dar es Salaam</p>
                    <p><strong>Phone:</strong> +255 752 032 985</p>
                    <p><strong>Email:</strong> mutualgenaration@gmail.com</p>
                     <h2>Donations, Sponsorship & Partnership</h2>
                </div>';
        $html .= '<table border="1" cellpadding="5" cellspacing="0" style="width: 100%;">
                    <thead>
                        <tr>
                            <th style="background-color: #00ccfa;">SN</th>
                            <th style="background-color: #00ccfa;">Organisation/Name</th>
                            <th style="background-color: #00ccfa;">Contact</th>
                            <th style="background-color: #00ccfa;">Collaboration Type</th>
                            <th style="background-color: #00ccfa;">Areas of Collaboration</th>
                            <th style="background-color: #00ccfa;">Address</th>
                            <th style="background-color: #00ccfa;">Submitted At</th>
                        </tr>
                    </thead>
                    <tbody>';

        $sn = 1;
        while ($row = $result->fetch_assoc()) {
            $html .= '<tr>
                        <td>' . $sn . '</td>
                        <td>' . $row['org_name'] . '</td>
                        <td>' . $row['contact'] . '</td>
                        <td>' . $row['collaboration_type'] . '</td>
                        <td>' . $row['collab_areas'] . '</td>
                        <td>' . $row['address'] . '</td>
                        <td>' . $row['submitted_at'] . '</td>
                    </tr>';
            $sn++;
        }

        $html .= '</tbody></table>';

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('Collaborations_Submissions.pdf', array("Attachment" => 1));
        exit();
    }
}
?>
