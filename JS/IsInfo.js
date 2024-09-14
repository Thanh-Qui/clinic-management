function isAddDoctor() {

  var name = document.querySelector("#formAddDoctor input[name*='name']").value;
  if (name.length === 0) {
    document.querySelector("#formAddDoctor input[name*='name']").focus();
    document.getElementById("noteFormAddDoctor").innerHTML = "Vui lòng nhập đầy đủ họ tên!";
    return false;
  }

  var address = document.querySelector("#formAddDoctor input[name*='address']").value;
  if (address.length === 0) {
    document.querySelector("#formAddDoctor input[name*='address']").focus();
    document.getElementById("noteFormAddDoctor").innerHTML = "Vui lòng nhập địa chỉ!";
    return false;
  }else if (address.length < 6) {
    document.querySelector("#formAddDoctor input[name*='address']").focus();
    document.getElementById("noteFormAddDoctor").innerHTML = "Địa chỉ phải từ 6 ký tự trở lên!";
    return false;
  }

  var dob = document.querySelector("#formAddDoctor input[name*='dob']").value;
  if (dob.length === 0) {
    document.querySelector("#formAddDoctor input[name*='dob']").focus();
    document.getElementById("noteFormAddDoctor").innerHTML = "Vui lòng nhập ngày sinh!";
    return false;
  }

  var email = document.querySelector("#formAddDoctor input[name*='email']").value;
  if (email.length === 0) {
    document.querySelector("#formAddDoctor input[name*='email']").focus();
    document.getElementById("noteFormAddDoctor").innerHTML = "Vui lòng nhập địa chỉ!";
    return false;
  }

  var phone_number = document.querySelector("#formAddDoctor input[name*='phone-number']").value;
  if (phone_number.length === 0) {
    document.querySelector("#formAddDoctor input[name*='phone-number']").focus();
    document.getElementById("noteFormAddDoctor").innerHTML = "Vui lòng nhập số điện thoại";
    return false;
  }else if (phone_number.length < 10) {
    document.querySelector("#formAddDoctor input[name*='phone-number']").focus();
    document.getElementById("noteFormAddDoctor").innerHTML = "Số điện thoại phải từ 10 số trở lên";
    return false;
  }

  var salary = document.querySelector("#formAddDoctor input[name*='salary']").value;
  if (salary.length === 0) {
    document.querySelector("#formAddDoctor input[name*='salary']").focus();
    document.getElementById("noteFormAddDoctor").innerHTML = "Vui lòng nhập mức lương cơ bản";
    return false;
  }else if (Number(salary) < 0) {
    document.querySelector("#formAddDoctor input[name*='salary']").focus();
    document.getElementById("noteFormAddDoctor").innerHTML = "Mức lương phải là số âm";
    return false;
  }

  return true;
}

function isUpdateDoctor() {

  var name = document.querySelector("#formUpdateDoctor input[name*='name']").value;
  if (name.length === 0) {
    document.querySelector("#formUpdateDoctor input[name*='name']").focus();
    document.getElementById("noteFormUpdateDoctor").innerHTML = "Vui lòng nhập đầy đủ họ tên!";
    return false;
  }

  var address = document.querySelector("#formUpdateDoctor input[name*='address']").value;
  if (address.length === 0) {
    document.querySelector("#formUpdateDoctor input[name*='address']").focus();
    document.getElementById("noteFormUpdateDoctor").innerHTML = "Vui lòng nhập địa chỉ!";
    return false;
  }else if (address.length < 6) {
    document.querySelector("#formUpdateDoctor input[name*='address']").focus();
    document.getElementById("noteFormUpdateDoctor").innerHTML = "Địa chỉ phải từ 6 ký tự trở lên!";
    return false;
  }

  var dob = document.querySelector("#formUpdateDoctor input[name*='dob']").value;
  if (dob.length === 0) {
    document.querySelector("#formUpdateDoctor input[name*='dob']").focus();
    document.getElementById("noteFormUpdateDoctor").innerHTML = "Vui lòng nhập ngày sinh!";
    return false;
  }

  var email = document.querySelector("#formUpdateDoctor input[name*='email']").value;
  if (email.length === 0) {
    document.querySelector("#formUpdateDoctor input[name*='email']").focus();
    document.getElementById("noteFormUpdateDoctor").innerHTML = "Vui lòng nhập địa chỉ!";
    return false;
  }

  var phone_number = document.querySelector("#formUpdateDoctor input[name*='phone-number']").value;
  if (phone_number.length === 0) {
    document.querySelector("#formUpdateDoctor input[name*='phone-number']").focus();
    document.getElementById("noteFormUpdateDoctor").innerHTML = "Vui lòng nhập số điện thoại";
    return false;
  }else if (phone_number.length < 10) {
    document.querySelector("#formUpdateDoctor input[name*='phone-number']").focus();
    document.getElementById("noteFormUpdateDoctor").innerHTML = "Số điện thoại phải từ 10 số trở lên";
    return false;
  }

  var salary = document.querySelector("#formUpdateDoctor input[name*='salary']").value;
  if (salary.length === 0) {
    document.querySelector("#formUpdateDoctor input[name*='salary']").focus();
    document.getElementById("noteFormUpdateDoctor").innerHTML = "Vui lòng nhập mức lương cơ bản";
    return false;
  }else if (Number(salary) < 0) {
    document.querySelector("#formUpdateDoctor input[name*='salary']").focus();
    document.getElementById("noteFormUpdateDoctor").innerHTML = "Mức lương phải là số âm";
    return false;
  }

  return true;
}


//kiểm tra lịch khám bệnh

function isAddAppointment() {
  
  var patient = document.querySelector("#formAppointment select[name*='patient']").value;
  if (patient.length === 0) {
    document.querySelector("#formAppointment select[name*='patient']").focus();
    document.getElementById("noteAppointment").innerHTML = "Vui lòng chọn bệnh nhân";
    return false;
  }

  var doctor = document.querySelector("#formAppointment select[name*='doctor']").value;
  if (doctor.length === 0) {
    document.querySelector("#formAppointment select[name*='doctor']").focus();
    document.getElementById("noteAppointment").innerHTML = "Vui lòng chọn bác sĩ";
    return false;
  }

  var app_date = document.querySelector("#formAppointment input[name*='app_date']").value;
  if (app_date.length === 0) {
    document.querySelector("#formAppointment input[name*='app_date']").focus();
    document.getElementById("noteAppointment").innerHTML = "Vui lòng chọn lịch khám bệnh";
    return false;
  }

  var status = document.querySelector("#formAppointment select[name*='status']").value;
  if (status.length === 0) {
    document.querySelector("#formAppointment select[name*='status']").focus();
    document.getElementById("noteAppointment").innerHTML = "Chọn trạng thái hoạt động";
    return false;
  }

  return true;
}

function isUpdateAppointment() {
  
  var patient = document.querySelector("#formUpdateAppointment select[name*='patient']").value;
  if (patient.length === 0) {
    document.querySelector("#formUpdateAppointment select[name*='patient']").focus();
    document.getElementById("noteUpdateAppointment").innerHTML = "Vui lòng chọn bệnh nhân";
    return false;
  }

  var doctor = document.querySelector("#formUpdateAppointment select[name*='doctor']").value;
  if (doctor.length === 0) {
    document.querySelector("#formUpdateAppointment select[name*='doctor']").focus();
    document.getElementById("noteUpdateAppointment").innerHTML = "Vui lòng chọn bác sĩ";
    return false;
  }

  var app_date = document.querySelector("#formUpdateAppointment input[name*='app_date']").value;
  if (app_date.length === 0) {
    document.querySelector("#formUpdateAppointment input[name*='app_date']").focus();
    document.getElementById("noteUpdateAppointment").innerHTML = "Vui lòng chọn lịch khám bệnh";
    return false;
  }

  var status = document.querySelector("#formUpdateAppointment select[name*='status']").value;
  if (status.length === 0) {
    document.querySelector("#formUpdateAppointment select[name*='status']").focus();
    document.getElementById("noteUpdateAppointment").innerHTML = "Chọn trạng thái hoạt động";
    return false;
  }

  return true;
}

function isPrescription() {

  var staff = document.querySelector("#formPrescription select[name*='staff']").value;
  if (staff.length === 0) {
    document.querySelector("#formPrescription select[name*='staff']").focus();
    document.getElementById("notePrescription").innerHTML = "Vui lòng chọn bác sĩ";
    return false;
  }
  
  var date = document.querySelector("#formPrescription input[name*='date']").value;
  if (date.length === 0) {
    document.querySelector("#formPrescription input[name*='date']").focus();
    document.getElementById("notePrescription").innerHTML = "Chọn ngày kê đơn thuốc";
    return false;
  }

  var medicine = document.querySelector("#formPrescription select[name*='id_medicine[]']").value;
  if (medicine.length === 0) {
    document.querySelector("#formPrescription select[name*='id_medicine[]']").focus();
    document.getElementById("notePrescription").innerHTML = "Vui lòng chọn loại thuốc!";
    return false;
  }

  var quantity = document.querySelector("#formPrescription input[name*='quantity[]']").value;
  if (quantity.length === 0) {
    document.querySelector("#formPrescription input[name*='quantity[]']").focus();
    document.getElementById("notePrescription").innerHTML = "Nhập số lượng thuốc cần thiết!";
    return false;
  }

  var dosage = document.querySelector("#formPrescription input[name*='dosage[]']").value;
  if (dosage.length === 0) {
    document.querySelector("#formPrescription input[name*='dosage[]']").focus();
    document.getElementById("notePrescription").innerHTML = "Nhập liều lượng thuốc cần thiết!";
    return false;
  }

  return true;
}

//kiểm tra thông tin bệnh nhân

function isAddPatient() {

  var name = document.querySelector("#formAddPatient input[name*='name']").value;
  if (name.length === 0) {
    document.querySelector("#formAddPatient input[name*='name']").focus();
    document.getElementById("noteAddPatient").innerHTML = "Vui lòng nhập đầy đủ họ tên!";
    return false;
  }

  var dob = document.querySelector("#formAddPatient input[name*='dob']").value;
  if (dob.length === 0) {
    document.querySelector("#formAddPatient input[name*='dob']").focus();
    document.getElementById("noteAddPatient").innerHTML = "Vui lòng chọn ngày sinh!";
    return false;
  }

  var email = document.querySelector("#formAddPatient input[name*='email']").value;
  if (email.length === 0) {
    document.querySelector("#formAddPatient input[name*='email']").focus();
    document.getElementById("noteAddPatient").innerHTML = "Vui lòng nhập email!";
    return false;
  }else if (email.indexOf("@") === -1) {
    document.querySelector("#formAddPatient input[name*='email']").focus();
    document.getElementById("noteAddPatient").innerHTML = "Email phải chứa '@'";
    return false;
  }

  var address = document.querySelector("#formAddPatient input[name*='address']").value;
  if (address.length === 0) {
    document.querySelector("#formAddPatient input[name*='address']").focus();
    document.getElementById("noteAddPatient").innerHTML = "Vui lòng nhập đầy đủ địa chỉ cụ thể!";
    return false;
  }

  var phone_number = document.querySelector("#formAddPatient input[name*='phone_number']").value;
  if (phone_number.length === 0) {
    document.querySelector("#formAddPatient input[name*='phone_number']").focus();
    document.getElementById("noteAddPatient").innerHTML = "Vui lòng nhập số điện đang sử dụng";
    return false;
  }else if (phone_number.length < 10) {
    document.querySelector("#formAddPatient input[name*='phone_number']").focus();
    document.getElementById("noteAddPatient").innerHTML = "Số điện thoại phải từ 10 trở lên";
    return false;
  }


  return true;
}

function isUpdatePatient() {

  var name = document.querySelector("#formUpdatePatient input[name*='name']").value;
  if (name.length === 0) {
    document.querySelector("#formUpdatePatient input[name*='name']").focus();
    document.getElementById("noteUpdatePatient").innerHTML = "Vui lòng nhập đầy đủ họ tên!";
    return false;
  }

  var dob = document.querySelector("#formUpdatePatient input[name*='dob']").value;
  if (dob.length === 0) {
    document.querySelector("#formUpdatePatient input[name*='dob']").focus();
    document.getElementById("noteUpdatePatient").innerHTML = "Vui lòng chọn ngày sinh!";
    return false;
  }

  var email = document.querySelector("#formUpdatePatient input[name*='email']").value;
  if (email.length === 0) {
    document.querySelector("#formUpdatePatient input[name*='email']").focus();
    document.getElementById("noteUpdatePatient").innerHTML = "Vui lòng nhập email!";
    return false;
  }else if (email.indexOf("@") === -1) {
    document.querySelector("#formUpdatePatient input[name*='email']").focus();
    document.getElementById("noteUpdatePatient").innerHTML = "Email phải chứa '@'";
    return false;
  }

  var address = document.querySelector("#formUpdatePatient input[name*='address']").value;
  if (address.length === 0) {
    document.querySelector("#formUpdatePatient input[name*='address']").focus();
    document.getElementById("noteUpdatePatient").innerHTML = "Vui lòng nhập đầy đủ địa chỉ cụ thể!";
    return false;
  }

  var phone_number = document.querySelector("#formUpdatePatient input[name*='phone_number']").value;
  if (phone_number.length === 0) {
    document.querySelector("#formUpdatePatient input[name*='phone_number']").focus();
    document.getElementById("noteUpdatePatient").innerHTML = "Vui lòng nhập số điện đang sử dụng";
    return false;
  }else if (phone_number.length < 10) {
    document.querySelector("#formUpdatePatient input[name*='phone_number']").focus();
    document.getElementById("noteUpdatePatient").innerHTML = "Số điện thoại phải từ 10 trở lên";
    return false;
  }


  return true;
}

// Kiểm tra thông tin các loại thuốc

function isAddMedicine() {

  var name = document.querySelector("#formAddMedicine input[name*='name']").value;
  if (name.length === 0) {
    document.querySelector("#formAddMedicine input[name*='name']").focus();
    document.getElementById("noteAddMedicine").innerHTML = "Vui lòng nhập đầy đủ tên loại thuốc!";
    return false;
  }

  var price = document.querySelector("#formAddMedicine input[name*='price']").value;
  if (price.length === 0) {
    document.querySelector("#formAddMedicine input[name*='price']").focus();
    document.getElementById("noteAddMedicine").innerHTML = "Vui lòng nhập đơn giá tương ứng!";
    return false;
  }

  var mota = document.querySelector("#formAddMedicine textarea[name*='mota']").value;
  if (mota.length === 0) {
    document.querySelector("#formAddMedicine textarea[name*='mota']").focus();
    document.getElementById("noteAddMedicine").innerHTML = "Vui lòng nhập mô tả về loại thuốc này!";
    return false;
  }

  var supp = document.querySelector("#formAddMedicine select[name*='supp']").value;
  if (supp.length === 0) {
    document.querySelector("#formAddMedicine select[name*='supp']").focus();
    document.getElementById("noteAddMedicine").innerHTML = "Vui lòng chọn nhà cung cấp!";
    return false;
  }

  var quantity = document.querySelector("#formAddMedicine input[name*='quantity']").value;
  if (quantity.length === 0) {
    document.querySelector("#formAddMedicine input[name*='quantity']").focus();
    document.getElementById("noteAddMedicine").innerHTML = "Vui lòng số lượng!";
    return false;
  }

  var exp_day = document.querySelector("#formAddMedicine input[name*='exp_day']").value;
  if (exp_day.length === 0) {
    document.querySelector("#formAddMedicine input[name*='exp_day']").focus();
    document.getElementById("noteAddMedicine").innerHTML = "Vui lòng chọn ngày hết hạn!";
    return false;
  }

  var status = document.querySelector("#formAddMedicine input[name*='status']").value;
  if (status.length === 0) {
    document.querySelector("#formAddMedicine input[name*='status']").focus();
    document.getElementById("noteAddMedicine").innerHTML = "Vui lòng trạng thái của thuốc!";
    return false;
  }

  return true;

}

function isUpdateMedicine() {

  var name = document.querySelector("#formUpdateMedicine input[name*='name']").value;
  if (name.length === 0) {
    document.querySelector("#formUpdateMedicine input[name*='name']").focus();
    document.getElementById("noteUpdateMedicine").innerHTML = "Vui lòng nhập đầy đủ tên loại thuốc!";
    return false;
  }

  var price = document.querySelector("#formUpdateMedicine input[name*='price']").value;
  if (price.length === 0) {
    document.querySelector("#formUpdateMedicine input[name*='price']").focus();
    document.getElementById("noteUpdateMedicine").innerHTML = "Vui lòng nhập đơn giá tương ứng!";
    return false;
  }

  var mota = document.querySelector("#formUpdateMedicine textarea[name*='mota']").value;
  if (mota.length === 0) {
    document.querySelector("#formUpdateMedicine textarea[name*='mota']").focus();
    document.getElementById("noteUpdateMedicine").innerHTML = "Vui lòng nhập mô tả về loại thuốc này!";
    return false;
  }

  var supp = document.querySelector("#formUpdateMedicine select[name*='supp']").value;
  if (supp.length === 0) {
    document.querySelector("#formUpdateMedicine select[name*='supp']").focus();
    document.getElementById("noteUpdateMedicine").innerHTML = "Vui lòng chọn nhà cung cấp!";
    return false;
  }

  var quantity = document.querySelector("#formUpdateMedicine input[name*='quantity']").value;
  if (quantity.length === 0) {
    document.querySelector("#formUpdateMedicine input[name*='quantity']").focus();
    document.getElementById("noteUpdateMedicine").innerHTML = "Vui lòng số lượng!";
    return false;
  }

  var exp_day = document.querySelector("#formUpdateMedicine input[name*='exp_day']").value;
  if (exp_day.length === 0) {
    document.querySelector("#formUpdateMedicine input[name*='exp_day']").focus();
    document.getElementById("noteUpdateMedicine").innerHTML = "Vui lòng chọn ngày hết hạn!";
    return false;
  }

  var status = document.querySelector("#formUpdateMedicine input[name*='status']").value;
  if (status.length === 0) {
    document.querySelector("#formUpdateMedicine input[name*='status']").focus();
    document.getElementById("noteUpdateMedicine").innerHTML = "Vui lòng trạng thái của thuốc!";
    return false;
  }

  return true;

}

// Kiểm tra thông tin đơn đặt thuốc

function isAddMedicineOrder() {

  var supp = document.querySelector("#formAddMedicineOrder select[name*='supp']").value;
  if (supp.length === 0) {
    document.querySelector("#formAddMedicineOrder select[name*='supp']").focus();
    document.getElementById("noteAddMedicineOrder").innerHTML = "Vui lòng nhà cung cấp!";
    return false;
  }

  var order_date = document.querySelector("#formAddMedicineOrder input[name*='order_date']").value;
  if (order_date.length === 0) {
    document.querySelector("#formAddMedicineOrder input[name*='order_date']").focus();
    document.getElementById("noteAddMedicineOrder").innerHTML = "Vui lòng chọn ngày đặt hàng!";
    return false;
  }

  var id_medicine = document.querySelector("#formAddMedicineOrder select[name*='id_medicine[]']").value;
  if (id_medicine.length === 0) {
    document.querySelector("#formAddMedicineOrder select[name*='id_medicine[]']").focus();
    document.getElementById("noteAddMedicineOrder").innerHTML = "Vui lòng chọn loại thuốc!";
    return false;
  }

  var quantity = document.querySelector("#formAddMedicineOrder input[name*='quantity[]']").value;
  if (quantity.length === 0) {
    document.querySelector("#formAddMedicineOrder input[name*='quantity[]']").focus();
    document.getElementById("noteAddMedicineOrder").innerHTML = "Vui lòng nhập số lượng!";
    return false;
  }

  var price = document.querySelector("#formAddMedicineOrder input[name*='price[]']").value;
  if (price.length === 0) {
    document.querySelector("#formAddMedicineOrder input[name*='price[]']").focus();
    document.getElementById("noteAddMedicineOrder").innerHTML = "Vui lòng nhập đơn giá!";
    return false;
  }

  return true;
}

// Kiểm tra thông tin nhà cung cấp

function isAddSupplier() {

  var name = document.querySelector("#formAddSupplier input[name*='name']").value;
  if (name.length === 0) {
    document.querySelector("#formAddSupplier input[name*='name']").focus();
    document.getElementById("noteAddSuppier").innerHTML = "Vui lòng nhập tên nhà cung cấp!";
    return false;
  }

  var contact = document.querySelector("#formAddSupplier input[name*='contact']").value;
  if (contact.length === 0) {
    document.querySelector("#formAddSupplier input[name*='contact']").focus();
    document.getElementById("noteAddSuppier").innerHTML = "Vui lòng nhập số điện thoại!";
    return false;
  }

  var address = document.querySelector("#formAddSupplier input[name*='address']").value;
  if (address.length === 0) {
    document.querySelector("#formAddSupplier input[name*='address']").focus();
    document.getElementById("noteAddSuppier").innerHTML = "Vui lòng nhập địa chỉ!";
    return false;
  }

  var email = document.querySelector("#formAddSupplier input[name*='email']").value;
  if (email.length === 0) {
    document.querySelector("#formAddSupplier input[name*='email']").focus();
    document.getElementById("noteAddSuppier").innerHTML = "Vui lòng nhập email!";
    return false;
  }else if (email.indexOf("@") === -1) {
    document.querySelector("#formAddSupplier input[name*='email']").focus();
    document.getElementById("noteAddSuppier").innerHTML = "Email phải chứ '@'!";
    return false;
  }

  return true;
}

function isUpdateSupplier() {

  var name = document.querySelector("#formUpdateSupplier input[name*='name']").value;
  if (name.length === 0) {
    document.querySelector("#formUpdateSupplier input[name*='name']").focus();
    document.getElementById("noteUpdateSupplier").innerHTML = "Vui lòng nhập tên nhà cung cấp!";
    return false;
  }

  var contact = document.querySelector("#formUpdateSupplier input[name*='contact']").value;
  if (contact.length === 0) {
    document.querySelector("#formUpdateSupplier input[name*='contact']").focus();
    document.getElementById("noteUpdateSupplier").innerHTML = "Vui lòng nhập số điện thoại!";
    return false;
  }

  var address = document.querySelector("#formUpdateSupplier input[name*='address']").value;
  if (address.length === 0) {
    document.querySelector("#formUpdateSupplier input[name*='address']").focus();
    document.getElementById("noteUpdateSupplier").innerHTML = "Vui lòng nhập địa chỉ!";
    return false;
  }

  var email = document.querySelector("#formUpdateSupplier input[name*='email']").value;
  if (email.length === 0) {
    document.querySelector("#formUpdateSupplier input[name*='email']").focus();
    document.getElementById("noteUpdateSupplier").innerHTML = "Vui lòng nhập email!";
    return false;
  }else if (email.indexOf("@") === -1) {
    document.querySelector("#formUpdateSupplier input[name*='email']").focus();
    document.getElementById("noteUpdateSupplier").innerHTML = "Email phải chứ '@'!";
    return false;
  }

  return true;
}

// các hàm chung

function isDelete() {
  
  var confirmation = confirm("Bạn có muốn xoá thông tin này không?");
  if (confirmation == true) {
    return true;
  }else {
    return false;
  } 
}

function addForm() {
  var formContainer = document.getElementById('form-container');

  // Thêm form mới từ mẫu
  var newForm = document.createElement('div');
  newForm.innerHTML = formTemplate;

  formContainer.appendChild(newForm);
}

function deleteForm() {

  var formContainer = document.getElementById('form-container');

  if (formContainer.children.length > 0) {
    formContainer.removeChild(formContainer.lastElementChild);
  }

}