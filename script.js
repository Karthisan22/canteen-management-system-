document.getElementById("orderForm").addEventListener("submit", function (event) {
    event.preventDefault();

    const orderData = {
        customer_name: document.getElementById("name").value,
        phone: document.getElementById("phone").value,
        address: document.getElementById("address").value,
        food_item: document.getElementById("food_item").value,
        quantity: document.getElementById("quantity").value
    };

    fetch("order.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(orderData)
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById("status").innerText = data.status === "success" ? "Order placed!" : "Error!";
    });
});
