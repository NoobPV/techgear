function alertError() {
  Swal.fire({
    icon: "error",
    title: "Oops...",
    text: "Đã có lỗi xảy ra!",
  });
}

function alertDelete(result) {
  // location.reload();
  $(".show-cart-quantity").html("");
  $(".show-cart-subtotal").html("");
  $(".show-cart-aside").html("");
  $(".show-cart-item").html("");
  $(".show-cart-quantity").html(result.amount);
  $(".show-cart-subtotal").html(result.subtotal + "đ");
  $(".show-cart-aside").append(result.htmlCartAside);
  $(".show-cart-item").append(result.htmlCartItem);

  Swal.fire({
    title: "Đã xóa!",
    icon: "success",
    showCloseButton: true,
    confirmButtonText: `Hoàn tất`,
    confirmButtonColor: "#7367f0",
  });
}

function productAddCartAlert(result) {
  $(".show-cart-quantity").html("");
  $(".show-cart-subtotal").html("");
  $(".show-cart-aside").html("");
  $(".show-cart-quantity").html(result.amount);
  $(".show-cart-subtotal").html(result.subtotal + "đ");
  $(".show-cart-aside").append(result.htmlCartAside);

  Swal.fire({
    title: "Thêm sản phẩm thành công",
    text: "Bạn có muốn xem giỏ hàng!",
    icon: "success",
    showCancelButton: true,
    showCloseButton: true,
    // confirmButtonColor: "#3085d6",
    cancelButtonColor: "#7367f0",
    confirmButtonText: "Xem giỏ hàng",
    cancelButtonText: "Tiếp tục mua",
    reverseButtons: true,
  }).then((button) => {
    if (button.isConfirmed) {
      window.location = "/cart";
    }
  });
}

function productUpdateCartAlert(result) {
  $(".show-cart-quantity").html("");
  $(".show-cart-subtotal").html("");
  $(".show-cart-aside").html("");
  $(".show-cart-item").html("");
  $(".show-cart-item").html("");
  $(".show-cart-quantity").html(result.amount);
  $(".show-cart-subtotal").html(result.subtotal + "đ");
  $(".show-cart-aside").append(result.htmlCartAside);
  $(".show-cart-item").append(result.htmlCartItem);

  Swal.fire({
    title: "Cập nhập thành công",
    icon: "success",
    showCloseButton: true,
    confirmButtonColor: "#3085d6",
    confirmButtonText: "Tiếp tục",
  });
}

$(".product-add-cart-alert").click(async function () {
  var id = $(this).data("id");
  const response = await fetch("/cart", {
    method: "post",
    body: JSON.stringify({
      addId: id,
    }),
  });
  if (response.ok) {
    const result = await response.json();
    productAddCartAlert(result);
  } else {
    alertError();
  }
});

function productAddCartForm() {
  const form = document.querySelector("#product-add-cart-form");
  if (form != null) {
    form.addEventListener("submit", async (e) => {
      e.preventDefault();
      const formData = new FormData(form);
      const response = await fetch("/cart", {
        method: "post",
        body: formData,
      });

      if (response.ok) {
        const result = await response.json();
        productAddCartAlert(result);
      } else {
        alertError();
      }
    });
  }
}
productAddCartForm();

function updateCartForm() {
  const form = document.querySelector("#update-cart-form");
  if (form != null) {
    form.addEventListener("submit", async (e) => {
      e.preventDefault();
      const formData = new FormData(form);
      const response = await fetch("/cart", {
        method: "post",
        body: formData,
      });

      if (response.ok) {
        const result = await response.json();
        console.log(result);
        productUpdateCartAlert(result);
        deleteProductCart();
      } else {
        alertError();
      }
    });
  }
}
updateCartForm();

async function fetchDeleteProductCart(id) {
  const response = await fetch("/cart", {
    method: "post",
    body: JSON.stringify({
      deleteId: id,
    }),
  });
  if (response.ok) {
    const result = await response.json();
    alertDelete(result);
    deleteProductCart();
  } else {
    alertError();
  }
}

function deleteProductCart() {
  $(".delete-product-cart").click(function () {
    var id = $(this).data("id");
    // $(".swal2-container").css("z-index", 100000000);
    Swal.fire({
      title: "Xóa sản phẩm trong giỏ hàng?",
      icon: "question",
      showCloseButton: true,
      showCancelButton: true,
      confirmButtonText: `Xóa sản phẩm`,
      // confirmButtonColor: "#3085d6",
      confirmButtonColor: "#d33",
      cancelButtonText: `Quay lại`,
      cancelButtonColor: "#7367f0",
      reverseButtons: true,
    }).then((button) => {
      if (button.isConfirmed) {
        fetchDeleteProductCart(id);
      }
    });
  });
}
deleteProductCart();

async function fetchDeleteAllProductCart() {
  const response = await fetch("/cart", {
    method: "post",
    body: JSON.stringify({
      deleteAll: true,
    }),
  });
  if (response.ok) {
    const result = await response.json();
    alertDelete(result);
  } else {
    alertError();
  }
}
$(".delete-all-product-cart").click(function () {
  Swal.fire({
    title: "Xóa tất cả sản phẩm có trong giỏ hàng?",
    icon: "question",
    showCloseButton: true,
    showCancelButton: true,
    confirmButtonText: `Xóa sản phẩm`,
    // confirmButtonColor: "#3085d6",
    confirmButtonColor: "#d33",
    cancelButtonText: `Quay lại`,
    cancelButtonColor: "#7367f0",
    reverseButtons: true,
  }).then((button) => {
    if (button.isConfirmed) {
      fetchDeleteAllProductCart();
    }
  });
});
