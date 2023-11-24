// Sample product data (to simulate products)
const my_products = [
    { name: "Beef Tapa with Egg", price: 149.99},
    { name: "Special Pork Sisig", price: 79.99 },
    { name: "Chicken BBQ with Egg", price: 59.99 },
    { name: "Chicken Creamy Mushroom & Sauce", price: 119.99 },
    { name: "Potato Mojo", price: 49.99 },
    // Add more products
];

// Function to display products in the UI
function displayProducts() {
    const productsContainer = document.querySelector('.products');
    my_products.forEach(product => {
        const productCard = document.createElement('div');
        productCard.classList.add('product-card');
        productCard.innerHTML = `
            <h3>${product.name}</h3>
            <p>Price: ₱${product.price}</p>
            <a href="menu.html"><button>See it Now</button></a>
        `;
        productsContainer.appendChild(productCard);
    });
}

// Call the function to display products when the page loads
window.onload = displayProducts;

//search Function
function searchFunction() {
  // Get the search input value
  const searchInput = document.getElementById("searchInput").value.toLowerCase();

  // Find the search input in the document
  const result = window.find(searchInput);

  if (result) {
      Alert("Found:", searchInput);
  } else {
      Alert("Not found:", searchInput);
  }
}


// popup
    // eto function for popup form
function displayPopup() {
    var popup = document.getElementById('popup');
    popup.style.display = 'block';
  }

  // Set timeout to call the displayPopup function after 2 seconds
  setTimeout(displayPopup, 2000);

function closePopup() {
  var popup = document.getElementById('popup');
  var popup2 = document.getElementById('popup2');
  popup2.style.display = 'none';
  popup.style.display = 'none';
  }

function showpopup2(){
  closePopup();
  var popup2 = document.getElementById('popup2');
  popup2.style.display = 'block';
}
//pag na submit
function submitForm(event) {
  event.preventDefault(); // Prevent the default form submission

  // Validate the form (you can add more validation logic if needed)
  const nameInput = document.getElementById('name');
  const emailInput = document.getElementById('phone');
  const dateInput = document.getElementById('date');
  const timeInput = document.getElementById('time');

  if (nameInput.value.trim() === '' || emailInput.value.trim() === '' || dateInput.value === '' || timeInput.value === '') {
    alert('Please fill in all required fields.');
    return;
  }

  // If the form is valid, show a success alert
  alert('Form submitted successfully!\nName: ' + nameInput.value + '\nEmail: ' + emailInput.value + '\nDate: ' + dateInput.value + '\nTime: ' + timeInput.value);
  closePopup();
}





        // pang  gawa ng smooth scroll function
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();

      const targetId = this.getAttribute('href').substring(1);
      const targetElement = document.getElementById(targetId);

      if (targetElement) {
        window.scrollTo({
          top: targetElement.offsetTop,
          behavior: 'smooth' // Smooth scrolling behavior
        });
      }
    });
  });


