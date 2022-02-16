function validateRequired(field) {
  return field == "" ? `Bạn phải nhập thông tin.\n` : "";
}

function validateLength(field, min, max) {
  if (field.length < min) return `Thông tin phải nhỏ hơn ${min} kí tự.\n`;
  if (field.length > max) return `Thông tin phải lớn hơn ${max} kí tự.\n`;
}

function validateName(field, min = 6) {
  if (field == "") return "Bạn phải nhập thông tin.\n";
  else if (field.length < min) return `Thông tin phải lớn hơn ${min} kí tự.\n`;
  else if (
    /[^a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ ]/.test(
      field
    )
  )
    return "Không nhập số hoặc kí tự đặc biệt.\n";
  return "";
}

function validateUsername(field, min = 5) {
  if (field == "") return "Bạn phải nhập thông tin.\n";
  else if (field.length < min) return `Thông tin phải lớn hơn ${min} kí tự.\n`;
  else if (/[^a-zA-Z0-9_-]/.test(field))
    return "Chỉ cho phép kí tự a-z, A-Z, 0-9, - and _ .\n";
  return "";
}

function validatePassword(field, min = 5) {
  if (field == "") return "Bạn phải nhập thông tin.\n";
  else if (field.length < min) return `Thông tin phải lớn hơn ${min} kí tự.\n`;
  else if (/[^a-zA-Z0-9!@#$%^&*]/.test(field))
    return "Không được chứa khoảng trắng.\n";
  return "";
}

// function validateAge(field) {
//   if (field == "" || isNaN(field)) return "Bạn phải nhập thông tin.\n";
//   else if (field < 18 || field > 110)
//     return "Tuổi phải từ 18 đến 110.\n";
//   return "";
// }

function validateEmail(field) {
  if (field == "") return "Bạn phải nhập thông tin.\n";
  else if (
    !(field.indexOf(".") > 0 && field.indexOf("@") > 0) ||
    /[^a-zA-Z0-9.@_-]/.test(field)
  )
    return "Email không hợp lệ.\n";
  return "";
}

function validatePhone(field, min = 10, max = 11) {
  if (field == "") return "Bạn phải nhập thông tin.\n";
  else if (field.length < min) return `Thông tin phải nhỏ hơn ${min} kí tự.\n`;
  else if (field.length > max) return `Thông tin phải lớn hơn ${max} kí tự.\n`;
  else if (/[^0-9]/.test(field)) return "Số điện thoại không hợp lệ.\n";
  return "";
}

function validateMatch(input1, input2, label) {
  if (input1 !== input2) {
    return `${label} không giống nhau.\n`;
  }
  return "";
}
function validateUnique(field) {}
