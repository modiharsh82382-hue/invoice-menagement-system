// Load Invoice Data
let invoices = JSON.parse(localStorage.getItem("invoices")) || [];

// Total Invoices
document.getElementById("totalInvoices").innerHTML = invoices.length;

// Total Customers
let customers = new Set();

invoices.forEach(function(invoice) {
    customers.add(invoice.customer);
});

document.getElementById("totalCustomers").innerHTML = customers.size;

// Total Sales
let totalSales = 0;

invoices.forEach(function(invoice) {
    totalSales += Number(invoice.total);
});

document.getElementById("totalSales").innerHTML = "₹" + totalSales;

// Total Products (Temporary)
document.getElementById("totalProducts").innerHTML = "150";