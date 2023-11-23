// Sample product data (to simulate products)
const my_products = [
    { name: "Product 1", price: 19.99 },
    { name: "Product 2", price: 29.99 },
    { name: "Product 3", price: 39.99 },
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
            <p>Price: $${product.price}</p>
            <button>Get It Now</button>
        `;
        productsContainer.appendChild(productCard);
    });
}

// Call the function to display products when the page loads
window.onload = displayProducts;

// popup
    // eto function for popup form
    function displayPopup() {
        var popup = document.getElementById('popup');
        popup.style.display = 'block';
      }
  
      // Set timeout to call the displayPopup function after 3 seconds
      setTimeout(displayPopup, 2000);
  
      function closePopup() {
          var popup = document.getElementById('popup');
          popup.style.display = 'none';
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