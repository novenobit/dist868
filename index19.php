<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Product Grid</title>
<style>
body {
    background-color: #121212;
    color: #fff;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    margin: 0;
    padding: 50px 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.product-grid-section {
    max-width: 1200px;
    width: 100%;
    padding: 20px;
}

.section-title {
    font-size: 2rem;
    font-weight: 600;
    text-align: center;
    margin-bottom: 40px;
}

.product-grid-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
    justify-content: center;
}

.product-card {
    background-color: #ffffff;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    color: #333;
    transition: transform 0.3s ease-in-out;
}

.product-card:hover {
    transform: translateY(-5px);
}

.product-header {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-weight: 600;
    margin-bottom: 20px;
}

.product-name {
    font-size: 1.2rem;
}

.price {
    font-size: 1.2rem;
}

.product-image-container {
    position: relative;
    width: 100%;
    border-radius: 15px;
    overflow: hidden;
    background-color: #f0f0f0;
    padding: 15px;
}

.product-image {
    width: 100%;
    height: auto;
    display: block;
    transition: transform 0.3s ease-in-out;
}

.product-card:hover .product-image {
    transform: scale(1.05); /* Zoom effect on hover */
}

.product-label {
    position: absolute;
    bottom: 25px;
    left: 15px;
    background-color: #000;
    color: #fff;
    padding: 5px 10px;
    border-radius: 5px;
    font-size: 0.8rem;
    font-weight: 500;
}
</style>
</head>
<body>

    <section class="product-grid-section">
        <h2 class="section-title">Products</h2>
        <div class="product-grid-container">
            <div class="product-card">
                <div class="product-header">
                    <span class="product-name">Product Name</span>
                    <span class="price">$759</span>
                </div>
                <div class="product-image-container">
                    <img src="https://via.placeholder.com/200x200" alt="Product Image" class="product-image">
                    <div class="product-label">Product</div>
                </div>
            </div>

            <div class="product-card">
                <div class="product-header">
                    <span class="product-name">Product Name</span>
                    <span class="price">$799</span>
                </div>
                <div class="product-image-container">
                    <img src="https://via.placeholder.com/200x200" alt="Product Image" class="product-image">
                    <div class="product-label">Product</div>
                </div>
            </div>

            <div class="product-card">
                <div class="product-header">
                    <span class="product-name">Product Name</span>
                    <span class="price">$759</span>
                </div>
                <div class="product-image-container">
                    <img src="https://via.placeholder.com/200x200" alt="Product Image" class="product-image">
                    <div class="product-label">Product</div>
                </div>
            </div>

        </div>
    </section>

</body>
</html>
