<?php
require('../fpdf/fpdf.php');

// Fetching form data
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$date = $_POST['date'];
$time = $_POST['time'];
$problem = $_POST['problem'];

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // Logo
        $this->Image('source/img/logo.jpg', 10, 6, 30);
        // Set font
        $this->SetFont('Arial', 'B', 20);
        // Title
        $this->Cell(0, 20, 'K9-Vets Appointment Details', 0, 1, 'C');
        // Line break
        $this->Ln(10);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('Arial', 'I', 10);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }

    // Appointment Details
    function AppointmentDetails($name, $email, $mobile, $date, $time, $problem)
    {
        // Set font
        $this->SetFont('Arial', '', 14);

        // Name
        $this->Cell(40, 10, 'Name:', 0, 0, 'L');
        $this->Cell(0, 10, $name, 0, 1, 'L');

        // Email
        $this->Cell(40, 10, 'Email:', 0, 0, 'L');
        $this->Cell(0, 10, $email, 0, 1, 'L');

        // Mobile
        $this->Cell(40, 10, 'Mobile:', 0, 0, 'L');
        $this->Cell(0, 10, $mobile, 0, 1, 'L');

        // Date
        $this->Cell(40, 10, 'Date:', 0, 0, 'L');
        $this->Cell(0, 10, $date, 0, 1, 'L');

        // Time
        $this->Cell(40, 10, 'Time:', 0, 0, 'L');
        $this->Cell(0, 10, $time, 0, 1, 'L');

        // Problem
        $this->Cell(40, 10, 'Problem:', 0, 0, 'L');
        $this->MultiCell(0, 10, $problem, 0, 'L');
    }
}

// Instantiation of inherited class
$pdf = new PDF();
$pdf->AddPage();

// Output appointment details
$pdf->AppointmentDetails($name, $email, $mobile, $date, $time, $problem);

// Save and output the PDF
$pdf->Output('D', 'appointment_details.pdf');
?>