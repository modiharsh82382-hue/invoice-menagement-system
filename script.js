// Save Product

function saveProduct(event){

    event.preventDefault();

    let product = {

        name: document.getElementById("productName").value,

        category: document.getElementById("category").value,

        price: document.getElementById("price").value,

        quantity: document.getElementById("quantity").value,

        description: document.getElementById("description").value,

        status: document.getElementById("status").value

    };

    let products = JSON.parse(localStorage.getItem("products")) || [];

    products.push(product);

    localStorage.setItem("products", JSON.stringify(products));

    alert("Product Added Successfully");

    window.location.href="view-product.html";

}