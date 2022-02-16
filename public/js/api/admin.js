$("#select-all").click(function () {
  if (this.checked) {
    $(":checkbox").each(function () {
      this.checked = true;
    });
  } else {
    $(":checkbox").each(function () {
      this.checked = false;
    });
  }
});

function editStatusProduct() {
  var id, status, button;
  $("#edit-status-product").on("show.bs.modal", function (event) {
    button = $(event.relatedTarget);
    id = button.data("id");
    status = button.data("status");
  });
  $("#submit-edit-status-product").click(async () => {
    status ? (status = 0) : (status = 1);
    const response = await fetch("/admin/product", {
      method: "post",
      body: JSON.stringify({
        id: id,
        status: status,
      }),
    });
    if (response.ok) {
      const result = await response.json();
      $("#edit-status-product").modal("hide");
      $(".admin-product-success").remove();
      $(".totalStocking").text(result.totalStocking);
      button.parent().append(result.text);
      button.remove();
    } else {
      console.log("Error");
    }
  });
}
editStatusProduct();

function deleteProduct() {
  let button, id;
  $("#delete-product").on("show.bs.modal", function (event) {
    button = $(event.relatedTarget);
    id = button.data("id");
  });
  $("#submit-delete-product").click(async () => {
    const response = await fetch("/admin/product", {
      method: "post",
      body: JSON.stringify({
        deleteId: id,
      }),
    });
    if (response.ok) {
      const result = await response.json();
      if (result === true) {
        window.location = "/admin/product";
      } else {
        $(".alert-product").html("");
        $(".admin-product-success").remove();
        if (Array.isArray(result)) {
          result.forEach((element) => {
            $(".alert-product").append(element + "<br>");
          });
        }
        $("#delete-product").modal("hide");
      }
    } else {
      console.log("error");
    }
  });
}
deleteProduct();

$("#submit-delete-multi-product").click(async (e) => {
  e.preventDefault();
  const formData = new FormData(
    document.querySelector("#delete-multi-product-form")
  );
  const response = await fetch("/admin/product", {
    method: "post",
    body: formData,
  });

  if (response.ok) {
    const result = await response.json();
    if (result === true) {
      // $("#delete-multi-product").modal("hide");
      window.location = "/admin/product";
    } else {
      $(".alert-product").html("");
      $(".admin-product-success").remove();
      if (Array.isArray(result)) {
        result.forEach((element) => {
          $(".alert-product").append(element + "<br>");
        });
      }
      $("#delete-multi-product").modal("hide");
    }
  } else {
    console.log("error");
  }
});

function validateEditProduct() {
  let form = document.querySelector("#edit-product-admin");
  let textSKU = document.querySelector(".product-error-sku");
  let textName = document.querySelector(".product-error-product_name");
  let textListPrice = document.querySelector(".product-error-list_price");
  let textStandardCost = document.querySelector(".product-error-standard_cost");
  // let textImage = document.querySelector(".product-error-image");
  let textCategory = document.querySelector(".product-error-category");
  textSKU.innerHTML =
    textName.innerHTML =
    textListPrice.innerHTML =
    textStandardCost.innerHTML =
    textImage =
    textCategory =
      "";
  let errorSKU = validateRequired(form.product_code.value);
  let errorName = validateRequired(form.product_name.value);
  let errorListPrice = validateRequired(form.list_price.value);
  let errorStandardCost = validateRequired(form.standard_cost.value);
  // let errorImage = validateRequired(form.image.value);
  let errorCategory = validateRequired(form.category_id.value);

  if (
    errorSKU == "" &&
    errorName == "" &&
    errorListPrice == "" &&
    errorStandardCost == "" &&
    // errorImage == "" &&
    errorCategory == ""
  )
    return true;
  else {
    textSKU.innerHTML = errorSKU;
    textName.innerHTML = errorName;
    textListPrice.innerHTML = errorListPrice;
    textStandardCost.innerHTML = errorStandardCost;
    // textImage.innerHTML = errorImage;
    textCategory.innerHTML = errorCategory;
    return false;
  }
}
function fetchEditProduct() {
  const editProductForm = document.querySelector("#edit-product-admin");
  let productError = document.querySelector(".edit-product-error");
  if (editProductForm != null) {
    editProductForm.addEventListener("submit", async (event) => {
      event.preventDefault();
      if (validateEditProduct() == true) {
        productError.innerHTML = "";
        const formData = new FormData(editProductForm);
        const response = await fetch("/admin/product/edit", {
          method: "post",
          body: formData,
        });

        if (response.ok) {
          const result = await response.json();
          if (result.errors != null) {
            productError.innerHTML = "";
            result.errors.forEach((element) => {
              productError.innerHTML += element;
              productError.innerHTML += "<br>";
            });
          } else {
            window.location = result;
          }
        }
      }
    });
  }
}
fetchEditProduct();

function deleteCategory() {
  let button, id;
  $("#delete-category").on("show.bs.modal", function (event) {
    button = $(event.relatedTarget);
    id = button.data("id");
  });

  $("#submit-delete-category").click(async () => {
    const response = await fetch("/admin/category", {
      method: "post",
      body: JSON.stringify({
        deleteId: id,
      }),
    });

    if (response.ok) {
      const result = await response.json();
      if (result === true) {
        window.location = "/admin/category";
      } else {
        $("#deleteCateModal").modal("hide");
        $(".category-alert").html("");
        $(".category-alert").append(result);
      }
    }
  });
}
deleteCategory();

$("#submit-delete-multi-category").click(async (e) => {
  e.preventDefault();
  const formData = new FormData(
    document.querySelector("#delete-multi-category-form")
  );

  const response = await fetch("/admin/category", {
    method: "post",
    body: formData,
  });

  if (response.ok) {
    const result = await response.json();
    if (result === true) {
      window.location = "/admin/category";
    } else {
      $(".flash-success").remove();
      $(".category-alert").html("");
      if (Array.isArray(result)) {
        result.forEach((element) => {
          $(".category-alert").append(element + "<br>");
        });
      }
      $("#delete-multi-category").modal("hide");
    }
  }
});

function validateEditCategory() {
  let form = document.querySelector("#edit-category-admin");
  let textName = document.querySelector(".category-error-name");
  // let textImage = document.querySelector(".product-error-image");
  textName.innerHTML = "";
  let errorName = validateRequired(form.category_name.value);
  // let errorImage = validateRequired(form.image.value);

  if (
    errorName == ""
    // errorImage == "" &&
  )
    return true;
  else {
    textName.innerHTML = errorName;
    // textImage.innerHTML = errorImage;
    return false;
  }
}
function fetchEditCategory() {
  const editCategoryForm = document.querySelector("#edit-category-admin");
  let categoryError = document.querySelector(".edit-category-error");
  let categorySuccess = document.querySelector(".edit-category-success");
  if (editCategoryForm != null) {
    editCategoryForm.addEventListener("submit", async (event) => {
      event.preventDefault();
      if (validateEditCategory() == true) {
        const formData = new FormData(editCategoryForm);
        const response = await fetch("/admin/category/edit", {
          method: "post",
          body: formData,
        });

        if (response.ok) {
          const result = await response.json();
          if (result.errors != null) {
            categoryError.innerHTML = "";
            result.errors.forEach((element) => {
              categoryError.innerHTML += element;
              categoryError.innerHTML += "<br>";
            });
          } else {
            window.location = result;
            // setTimeout(categorySuccess.setAttribute("style", "display:block"),2000);
            // categorySuccess.innerHTML = result;
          }
        }
      }
    });
  }
}
fetchEditCategory();

function deleteOrder() {
  let id, button;
  $("#delete-order").on("show.bs.modal", function (event) {
    button = $(event.relatedTarget);
    id = button.data("id");
  });

  $("#submit-delete-order").click(async () => {
    const response = await fetch("/admin/order", {
      method: "post",
      body: JSON.stringify({
        deleteId: id,
      }),
    });

    if (response.ok) {
      window.location = "/admin/order";
    } else {
      $("#delete-order").modal("hide");
      $(".order-alert").html("");
      $(".order-alert").append("Đã có lỗi xảy ra");
    }
  });
}
deleteOrder();

function editStatusOrder() {
  let id, status, button;
  $("#edit-status-order").on("show.bs.modal", function (event) {
    button = $(event.relatedTarget);
    id = button.data("id");
  });

  $(".data-status").click(function () {
    status = $(this).data("status");
    fetchStatusOrder(id, status, button);
  });
}
async function fetchStatusOrder(id, status, button) {
  const response = await fetch("/admin/order", {
    method: "post",
    body: JSON.stringify({
      id: id,
      status: status,
    }),
  });

  if (response.ok) {
    const result = await response.json();
    $("#edit-status-order").modal("hide");
    $(".admin-order-success").remove();
    button.parent().append(result.html);
    button.remove();
    $(".paid-date-" + id).text(result.date);
  }
}
editStatusOrder();

function viewOrderDetailAdmin() {
  var id;
  $("#view-order-detail").on("show.bs.modal", function (event) {
    button = $(event.relatedTarget);
    id = button.data("id");
    fetchRequestOrderDetail(id);
  });
}
async function fetchRequestOrderDetail(id) {
  const response = await fetch("/admin/order", {
    method: "post",
    body: JSON.stringify({
      orderDetailId: id,
    }),
  });

  if (response.ok) {
    const result = await response.json();
    console.log(result);
    $("#order-detail-info").html("");
    $("#order-detail-info").append(result);
  }
}
viewOrderDetailAdmin();

function editStatusReview() {
  var id, status, button;
  $("#edit-status-review").on("show.bs.modal", function (event) {
    button = $(event.relatedTarget);
    id = button.data("id");
    status = button.data("status");
    status ? (status = 0) : (status = 1);
  });
  $("#submit-edit-status-review").click(async (e) => {
    e.preventDefault();
    const response = await fetch("/admin/review", {
      method: "post",
      body: JSON.stringify({
        id: id,
        status: status,
      }),
    });

    if (response.ok) {
      const result = await response.json();
      $("#edit-status-review").modal("hide");
      $(".admin-review-success").remove();
      $(".review-total-show").text(result.totalShow);
      button.parent().append(result.text);
      button.remove();
    } else {
      console.log("Error");
    }
  });
}
editStatusReview();

function viewCommentReview() {
  var id, button;
  $("#view-comment-review").on("show.bs.modal", function (event) {
    button = $(event.relatedTarget);
    id = button.data("id");
    fetchCommentReview(id);
  });
}
async function fetchCommentReview(id) {
  const response = await fetch("/admin/review", {
    method: "post",
    body: JSON.stringify({
      reviewId: id,
    }),
  });

  const result = await response.json();
  $("#review-comment").text(result);
}
viewCommentReview();

function deleteReview() {
  $("#delete-review").on("show.bs.modal", function (event) {
    button = $(event.relatedTarget);
    id = button.data("id");
  });

  $("#submit-delete-review").click(async (e) => {
    e.preventDefault();
    const response = await fetch("/admin/review", {
      method: "post",
      body: JSON.stringify({
        deleteId: id,
      }),
    });

    if (response.ok) {
      window.location = "/admin/review";
    } else {
      $("#deleteReview").modal("hide");
      $(".flash-success").remove();
      $(".comment-alert").html("");
      $(".comment-alert").append("Đã có lỗi xảy ra");
    }
  });
}
deleteReview();
