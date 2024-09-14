function searchMedicine() {
    var searchValue = document.getElementById('search-medicine').value;
  
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'search-medicine.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Làm trống nội dung cũ trước khi chèn nội dung mới
            document.getElementById('medicine-list').innerHTML = xhr.responseText;
        }
    };
  
    xhr.send('search-medicine=' + searchValue);
}
  
function searchPatient() {
    var searchValue = document.getElementById('search-patient').value;
  
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'search_patient.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Làm trống nội dung cũ trước khi chèn nội dung mới
            document.getElementById('patient-list').innerHTML = xhr.responseText;
        }
    };
  
    xhr.send('search-patient=' + searchValue);
}

function searchMedicineOrder() {
    var searchValue = document.getElementById("search-medicineorder").value;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'search-medicineOrder.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('medicineorder-list').innerHTML = xhr.responseText;
        }
    }

    xhr.send('search-medicineorder='+ searchValue);
}

function searchDoctor() {
    var searchValue = document.getElementById("search-doctor").value;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'search-doctor.php', true);
    xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("doctor-list").innerHTML = xhr.responseText;
        }
    }
    
    xhr.send('search-doctor='+searchValue);
}

function searchSupplier() {
    var searchValue = document.getElementById("search-supplier").value;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'search-supplier.php', true);
    xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("supplier-list").innerHTML = xhr.responseText;
        }
    }

    xhr.send('search-supplier='+searchValue);
}

function searchAppointment() {
    var searchValue = document.getElementById("search-appointment").value;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'search-appointment.php', true);
    xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("appointment-list").innerHTML = xhr.responseText;
        }
    }

    xhr.send('search-appointment='+searchValue);
}