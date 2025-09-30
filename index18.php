<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern E-commerce</title>
<style>
/* General Body and Typography */
body {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f2f5;
    color: #333;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.section-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: #000;
    margin: 40px 0 20px;
}

/* Header and Search Bar */
.header {
    background-color: #00BCD4; /* Main Teal accent color */
    color: white;
    display: flex;
    flex-direction: column; /* Changed to column to stack elements */
    align-items: center;
    padding-bottom: 40px; /* Add padding to the bottom of the main header area */
}

/* Top Menu Styling */
.top-menu-bar {
    background-color: #00838F; /* Darker Teal for the top menu bar */
    width: 100%;
    padding: 15px 20px;
    display: flex;
    justify-content: space-between; /* Space out logo and nav items */
    align-items: center;
}

.logo {
    font-size: 1.2rem;
    font-weight: bold;
    color: white;
    text-decoration: none;
}

.top-nav {
    display: flex;
    gap: 25px; /* Spacing between menu items */
}

.top-nav .menu-item {
    text-decoration: none;
    color: white;
    font-size: 0.9rem;
    font-weight: 500;
    transition: opacity 0.3s ease;
}

.top-nav .menu-item:hover {
    opacity: 0.8;
}

/* Search Container within the main header */
.search-container {
    width: 60%;
    max-width: 600px;
    display: flex;
    background-color: white;
    border-radius: 50px;
    overflow: hidden;
    margin-top: 40px; /* Adjust margin to visually align in the hero area */
}

.search-bar {
    width: 100%;
    border: none;
    padding: 15px 25px;
    font-size: 1rem;
    outline: none;
}

.search-button {
    background: none;
    border: none;
    padding: 15px;
    cursor: pointer;
    color: #666;
    display: flex;
    align-items: center;
}

.search-button:hover {
    color: #000;
}

/* Category Section */
.category-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
}

.category-card {
    background-color: white;
    color: white;
    border-radius: 15px;
    padding: 40px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.category-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.category-card h3 {
    margin-top: 0;
    font-size: 1.5rem;
}

.category-card p {
    font-size: 0.9rem;
    opacity: 0.9;
}

/* Product Section */
.product-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
}

.product-card {
    background-color: #f7f7f7; /* Light gray background */
    border-radius: 15px;
    padding: 15px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    overflow: hidden;
}

.product-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}

.product-image {
    width: 100%;
    height: auto;
    border-radius: 10px;
}

.product-info {
    padding: 10px 0;
}

.product-info h3 {
    font-size: 1.1rem;
    margin: 10px 0;
}

.product-info p {
    font-size: 0.9rem;
    color: #666;
}

.add-to-cart-button {
    background-color: #00BCD4; /* Teal accent color */
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 0.9rem;
    margin-top: 10px;
    transition: background-color 0.3s ease;
}

.add-to-cart-button:hover {
    background-color: #0097A7;
}
</style>

</head>
<body>

  <header class="header">
        <div class="top-menu-bar">
            <a href="#" class="logo">HOET</a>
            <nav class="top-nav">
                <a href="#" class="menu-item">VENDEDOR</a>
                <a href="#" class="menu-item">CREDENCIAS</a>
                <a href="#" class="menu-item">MENSAGEM</a>
                <a href="#" class="menu-item">PEDIDO</a>
                <a href="#" class="menu-item">BIGURIA</a>
            </nav>
            <div class="top-icons">
                <a href="#" class="menu-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </a>
                <a href="#" class="menu-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 12.63a2 2 0 0 0 1.84 1.37h9.24a2 2 0 0 0 1.84-1.37L23 5H6"></path></svg>
                </a>
            </div>
        </div>
        <div class="search-container">
            <input type="text" class="search-bar" placeholder="SEARCH">
            <button class="search-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            </button>
        </div>
    </header>

    <main class="container">
        <section class="category-section">
            <h2 class="section-title">PRODUCT CATEGORY</h2>
            <div class="category-grid">
                <div class="category-card" style="background-color: #26C6DA;">
                    <h3>Senpror</h3>
                    <p>Lorem ipsum dolor sit amet consecteur adipiscing</p>
                    <button class="card-button">VIEW MORE</button>
                </div>
                <div class="category-card" style="background-color: #F44336;">
                    <h3>Vendect</h3>
                    <p>Lorem ipsum dolor sit amet consecteur adipiscing</p>
                    <button class="card-button">VIEW MORE</button>
                </div>
                <div class="category-card" style="background-color: #4CAF50;">
                    <h3>Sbonge</h3>
                    <p>Lorem ipsum dolor sit amet consecteur adipiscing</p>
                    <button class="card-button">VIEW MORE</button>
                </div>
                <div class="category-card" style="background-color: #3F51B5;">
                    <h3>Batter</h3>
                    <p>Lorem ipsum dolor sit amet consecteur adipiscing</p>
                    <button class="card-button">VIEW MORE</button>
                </div>
            </div>
        </section>

        <section class="product-section">
            <h2 class="section-title">PRODUCT</h2>
            <div class="product-grid">
                <div class="product-card">
                    <img src="https://via.placeholder.com/200x200" alt="Product Image 1" class="product-image">
                    <div class="product-info">
                        <h3>Porled Bows</h3>
                        <p>Lorem ipsum dolor sit amet consecteur adipiscing cred bonence</p>
                        <button class="add-to-cart-button">ADD TO CART</button>
                    </div>
                </div>
                <div class="product-card">
                    <img src="https://via.placeholder.com/200x200" alt="Product Image 2" class="product-image">
                    <div class="product-info">
                        <h3>Sprled Pows</h3>
                        <p>Lorem ipsum dolor sit amet consecteur adipiscing cred bonence</p>
                        <button class="add-to-cart-button">ADD TO CART</button>
                    </div>
                </div>
                <div class="product-card">
                    <img src="https://via.placeholder.com/200x200" alt="Product Image 3" class="product-image">
                    <div class="product-info">
                        <h3>Sprled Bows</h3>
                        <p>Lorem ipsum dolor sit amet consecteur adipiscing cred bonence</p>
                        <button class="add-to-cart-button">ADD TO CART</button>
                    </div>
                </div>
                <div class="product-card">
                    <img src="https://via.placeholder.com/200x200" alt="Product Image 4" class="product-image">
                    <div class="product-info">
                        <h3>Sprled Pows</h3>
                        <p>Lorem ipsum dolor sit amet consecteur adipiscing cred bonence</p>
                        <button class="add-to-cart-button">ADD TO CART</button>
                    </div>
                </div>
            </div>
        </section>

    </main>

</body>
</html>
