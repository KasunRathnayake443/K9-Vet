<?php

include '../config.php';
require('../fpdf/fpdf.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $problem = mysqli_real_escape_string($conn, $_POST['problem']);

    $sql = "INSERT INTO appointments (name, email, mobile, date, time, problem) VALUES ('$name', '$email', '$mobile', '$date', '$time', '$problem')";

    if (mysqli_query($conn, $sql)) {
        class PDF extends FPDF
        {
            function Header()
            {
                $this->Image('../img/logo.png', 10, 6, 30);
                $this->SetFont('Arial', 'B', 20);
                $this->Cell(0, 20, 'K9-Vets Appointment Details', 0, 1, 'C');
                $this->Ln(10);
            }

            function Footer()
            {
                $this->SetY(-15);
                $this->SetFont('Arial', 'I', 10);
                $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
            }

            function AppointmentDetails($name, $email, $mobile, $date, $time, $problem)
            {
                $this->SetFont('Arial', '', 14);
                $this->Cell(40, 10, 'Name:', 0, 0, 'L');
                $this->Cell(0, 10, $name, 0, 1, 'L');
                $this->Cell(40, 10, 'Email:', 0, 0, 'L');
                $this->Cell(0, 10, $email, 0, 1, 'L');
                $this->Cell(40, 10, 'Mobile:', 0, 0, 'L');
                $this->Cell(0, 10, $mobile, 0, 1, 'L');
                $this->Cell(40, 10, 'Date:', 0, 0, 'L');
                $this->Cell(0, 10, $date, 0, 1, 'L');
                $this->Cell(40, 10, 'Time:', 0, 0, 'L');
                $this->Cell(0, 10, $time, 0, 1, 'L');
                $this->Cell(40, 10, 'Problem:', 0, 0, 'L');
                $this->MultiCell(0, 10, $problem, 0, 'L');
                $this->Ln(10); 
            }

            function AddQRCode($imagePath)
            {
                $this->Image($imagePath, 80, $this->GetY(), 50, 50);
            }
        }

        $pdf = new PDF();
        $pdf->AddPage();
        $pdf->AppointmentDetails($name, $email, $mobile, $date, $time, $problem);
        $pdf->AddQRCode('../img/qr1.png'); 

        if (ob_get_contents()) {
            ob_end_clean();
        }

        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="appointment_details.pdf"');
        $pdf->Output('I'); 
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
