// =============================
// Invoice Management System
// Part 1
// =============================

console.log("NEW invoice.js Loaded");
let invoices = JSON.parse(localStorage.getItem("invoices")) || [];
let editIndex = -1;

// -------------------------
// Page Load
// -------------------------
window.onload = function () {

    displayInvoices();

    generateInvoiceNumber();

};

// -------------------------
// Calculate Total
// -------------------------
function calculateTotal() {

    let qty = document.getElementById("quantity").value;
    let price = document.getElementById("price").value;

    if (qty === "" || price === "") {
        document.getElementById("total").value = "";
        return;
    }

    document.getElementById("total").value = qty * price;

}
function generateInvoiceNumber() {

    let nextNumber = invoices.length + 1;

    document.getElementById("invoiceNo").value =
        "INV" + String(nextNumber).padStart(3, "0");

}
// -------------------------
// Save Invoice
// -------------------------
function saveInvoice(event) {

    event.preventDefault();

    let invoice = {

        invoiceNo: document.getElementById("invoiceNo").value,
        customer: document.getElementById("customerName").value,
        product: document.getElementById("productName").value,
        quantity: document.getElementById("quantity").value,
        price: document.getElementById("price").value,
        total: document.getElementById("total").value

    };

    if (editIndex == -1) {

        invoices.push(invoice);

    } else {

        invoices[editIndex] = invoice;
        editIndex = -1;

    }

    localStorage.setItem("invoices", JSON.stringify(invoices));
    console.log(invoice);

    displayInvoices();

document.querySelector("form").reset();

document.getElementById("total").value = "";

editIndex = -1;

generateInvoiceNumber();

alert("Invoice Saved Successfully!");

}
// =============================
// Display All Invoices
// =============================

function displayInvoices() {

   console.log(invoices);
   
   let table = document.getElementById("invoiceTable");

    table.innerHTML = `
        <tr>
            <th>Invoice No</th>
            <th>Customer</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
    `;

    invoices.forEach((invoice, index) => {
        console.log(invoice);

        let row = table.insertRow();

        row.insertCell(0).innerHTML = invoice.invoiceNo;
        row.insertCell(1).innerHTML = invoice.customer;
        row.insertCell(2).innerHTML = invoice.product;
        row.insertCell(3).innerHTML = invoice.quantity;
        row.insertCell(4).innerHTML = invoice.price;
        row.insertCell(5).innerHTML = invoice.total;

        row.insertCell(6).innerHTML =
    '<button onclick="editRow(' + index + ')">Edit</button> ' +
    '<button onclick="deleteRow(' + index + ')">Delete</button>';
    });

}

// =============================
// Edit Invoice
// =============================

function editRow(index) {

    document.getElementById("invoiceNo").value = invoices[index].invoiceNo;
    document.getElementById("customerName").value = invoices[index].customer;
    document.getElementById("productName").value = invoices[index].product;
    document.getElementById("quantity").value = invoices[index].quantity;
    document.getElementById("price").value = invoices[index].price;
    document.getElementById("total").value = invoices[index].total;

    editIndex = index;
    

}

// =============================
// Delete Invoice
// =============================

function deleteRow(index) {

    if (confirm("Delete this invoice?")) {

        invoices.splice(index, 1);

        localStorage.setItem("invoices", JSON.stringify(invoices));

        displayInvoices();

    }

}
// =============================
// Search Invoice
// =============================

function searchInvoice() {

    let input = document.getElementById("search").value.toUpperCase();

    let table = document.getElementById("invoiceTable");

    let tr = table.getElementsByTagName("tr");

    for (let i = 1; i < tr.length; i++) {

        let td1 = tr[i].getElementsByTagName("td")[0];
        let td2 = tr[i].getElementsByTagName("td")[1];

        if (td1 || td2) {

            let txt1 = td1.textContent || td1.innerText;
            let txt2 = td2.textContent || td2.innerText;

            if (
                txt1.toUpperCase().indexOf(input) > -1 ||
                txt2.toUpperCase().indexOf(input) > -1
            ) {

                tr[i].style.display = "";

            } else {

                tr[i].style.display = "none";

            }

        }

    }

}

// =============================
// Download PDF
// =============================

async function downloadPDF() {

    const { jsPDF } = window.jspdf;

    const doc = new jsPDF();

    doc.setFontSize(18);
    doc.text("Invoice Management System", 20, 20);

    doc.setFontSize(12);

    doc.text("Invoice No : " + document.getElementById("invoiceNo").value, 20, 40);
    doc.text("Customer : " + document.getElementById("customerName").value, 20, 50);
    doc.text("Product : " + document.getElementById("productName").value, 20, 60);
    doc.text("Quantity : " + document.getElementById("quantity").value, 20, 70);
    doc.text("Price : " + document.getElementById("price").value, 20, 80);
    doc.text("Total : " + document.getElementById("total").value, 20, 90);

    doc.save("Invoice.pdf");

}

// =============================
// Print
// =============================

function printInvoice() {

    window.print();

}