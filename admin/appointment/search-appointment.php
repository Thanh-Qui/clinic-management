<?php 

require_once('../../mod/config.php');
require_once("../../mod/connect.php");
require_once("../../mod/appointmentCls.php");
require_once("../../mod/patientCls.php");
require_once("../../mod/staffCls.php");

$appointment = new appointment();
$patient = new patients();
$doctor = new doctor;

if (isset($_POST['search-appointment'])) {
    $searchValue = $_POST['search-appointment'];
    $res = $patient->searchPatient($searchValue);

    if (count($res) > 0) {
        echo "<tbody>";
        $sn = 1;

        foreach ($res as $row) {
            $res1 = $appointment->searchAppointment($row->id_patient);

            foreach ($res1 as $row2) {
                $id_appointment = $row2->id_appointment;
                $id_staff = $row2->id_staff;
                $id_patient = $row2->id_patient;

                $patient_name = $patient->GetPatientById($id_patient);
                $doctor_name = $doctor->GetStaffById($id_staff); 
                
                if ($row2->status != "đã xoá") {
                    echo "<tr>";
                    echo "<td>{$sn}</td>";
                    echo "<td>{$patient_name->name}</td>";
                    echo "<td>{$doctor_name->name}</td>";
                    echo "<td>{$row2->appointment_date}</td>";

                    if ($row2->status != "đã xoá") {
                        echo "<td>{$row2->status}</td>";
                    }else {
                        echo "";
                    }

                    
                    echo "<td>{$row2->notes}</td>";
                    echo "<td>";
                    echo "<a href='".SITEURL."admin/appointment/update-appointment.php?id={$id_appointment}'><i class='fa-solid fa-pen' style='margin-right: 10px;'></i></a>";
                    echo "<a href='".SITEURL."admin/appointment/delete-appointment.php?id={$id_appointment}' onclick='return isDelete();'><i class='fa-solid fa-trash' style='margin-right: 5px;'></i></a>";
                    echo "<a href='".SITEURL."admin/appointment/prescriptions.php?id={$id_appointment}&id_staff={$id_staff}'><i class='fa-solid fa-tablets' style='margin-right: 10px;'></i></a>";
                    echo "<a href='".SITEURL."admin/appointment/invoice.php?id={$id_appointment}'><i class='fa-solid fa-receipt'></i></a>";
                    echo "</td>";
                    echo "</tr>";
                    
                    $sn++;
                }else {
                    continue;
                }

            }

        }
        echo "</tbody>";
    }else {
        echo "<div class='error'> Không tìm thấy thông tin! </div>";
    }

}