<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern E-commerce</title>
    <!-- Tailwind CSS from CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .main-hero-bg {
            background-color: #00BCD4;
        }
        .top-menu-bar {
            background-color: #00838F;
        }
        .product-card-image {
            transition: transform 0.3s ease-in-out;
        }
        .product-card:hover .product-card-image {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="bg-gray-100">

    <!-- Header Section -->
    <header>
        <!-- Top Menu Bar (Darker Teal) -->
        <div class="top-menu-bar text-white py-4 px-8 flex justify-between items-center">
            <a href="#" class="font-bold text-lg rounded-full">HOET</a>
            <nav class="flex space-x-6">
                <a href="#" class="hover:underline">Vendedor</a>
                <a href="#" class="hover:underline">Credencias</a>
                <a href="#" class="hover:underline">Mensagem</a>
                <a href="#" class="hover:underline">Pedidos</a>
                <a href="#" class="hover:underline">Biguria</a>
            </nav>
            <div class="flex items-center space-x-4">
                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg></a>
                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H6.5M7 13L6.5 5M7 13a2 2 0 100 4m-4-4a2 2 0 100 4m-4-4a2 2 0 100 4m-4-4a2 2 0 100 4m-4-4a2 2 0 100 4m-4-4a2 2 0 100 4m-4-4a2 2 0 100 4m-4-4a2 2 0 100 4m-4-4a2 2 0 100 4m-4-4a2 2 0 100 4M3 3a2 2 0 100 4m-4-4a2 2 0 100 4m-4-4a2 2 0 100 4M3 3a2 2 0 100 4" /></svg></a>
            </div>
        </div>

        <!-- Main Hero Section (Lighter Teal) -->
        <div class="main-hero-bg text-white py-20 px-8 flex flex-col items-center">
            <div class="w-full max-w-2xl flex items-center bg-white rounded-full shadow-lg overflow-hidden">
                <input type="text" placeholder="Search..." class="w-full py-4 px-6 text-gray-800 focus:outline-none rounded-full">
                <button class="bg-gray-800 text-white px-8 py-4 rounded-full hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                </button>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto py-12 px-4 md:px-0">

        <!-- Product Category Section -->
        <section class="mb-12">
            <h2 class="text-3xl font-bold mb-8 text-center">PRODUCT CATEGORY</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white rounded-xl shadow-lg p-8 transform transition-transform duration-300 hover:scale-105" style="background-color: #26C6DA;">
                    <h3 class="text-xl font-bold text-white mb-2">Senpror</h3>
                    <p class="text-white text-opacity-80">Lorem ipsum dolor sit amet consecteur adipiscing</p>
                    <button class="mt-4 bg-white text-gray-800 py-2 px-6 rounded-full font-semibold hover:bg-gray-200">VIEW MORE</button>
                </div>
                <div class="bg-white rounded-xl shadow-lg p-8 transform transition-transform duration-300 hover:scale-105" style="background-color: #F44336;">
                    <h3 class="text-xl font-bold text-white mb-2">Vendect</h3>
                    <p class="text-white text-opacity-80">Lorem ipsum dolor sit amet consecteur adipiscing</p>
                    <button class="mt-4 bg-white text-gray-800 py-2 px-6 rounded-full font-semibold hover:bg-gray-200">VIEW MORE</button>
                </div>
                <div class="bg-white rounded-xl shadow-lg p-8 transform transition-transform duration-300 hover:scale-105" style="background-color: #4CAF50;">
                    <h3 class="text-xl font-bold text-white mb-2">Sbonge</h3>
                    <p class="text-white text-opacity-80">Lorem ipsum dolor sit amet consecteur adipiscing</p>
                    <button class="mt-4 bg-white text-gray-800 py-2 px-6 rounded-full font-semibold hover:bg-gray-200">VIEW MORE</button>
                </div>
                <div class="bg-white rounded-xl shadow-lg p-8 transform transition-transform duration-300 hover:scale-105" style="background-color: #3F51B5;">
                    <h3 class="text-xl font-bold text-white mb-2">Batter</h3>
                    <p class="text-white text-opacity-80">Lorem ipsum dolor sit amet consecteur adipiscing</p>
                    <button class="mt-4 bg-white text-gray-800 py-2 px-6 rounded-full font-semibold hover:bg-gray-200">VIEW MORE</button>
                </div>
            </div>
        </section>

        <!-- Product Grid Section -->
        <section>
            <h2 class="text-3xl font-bold mb-8 text-center">POPULAR PRODUCTS</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Product Card 1 -->
                <div class="product-card bg-white rounded-xl shadow-lg p-4 transform transition-all duration-300 hover:scale-105">
                    <div class="flex flex-col items-center">
                        <img src="https://placehold.co/300x300/e5e7eb/7f8c8d?text=Product" alt="Product Image" class="product-card-image rounded-xl w-full h-auto mb-4">
                        <div class="text-center">
                            <h3 class="text-lg font-semibold text-gray-800">Porled Bows</h3>
                            <p class="text-gray-500 text-sm mt-1 mb-2">Lorem ipsum dolor sit amet.</p>
                            <div class="text-xl font-bold text-gray-900">$759</div>
                            <button class="mt-4 bg-teal-500 text-white py-2 px-6 rounded-full font-semibold hover:bg-teal-600">ADD TO CART</button>
                        </div>
                    </div>
                </div>

                <!-- Product Card 2 -->
                <div class="product-card bg-white rounded-xl shadow-lg p-4 transform transition-all duration-300 hover:scale-105">
                    <div class="flex flex-col items-center">
                        <img src="https://placehold.co/300x300/e5e7eb/7f8c8d?text=Product" alt="Product Image" class="product-card-image rounded-xl w-full h-auto mb-4">
                        <div class="text-center">
                            <h3 class="text-lg font-semibold text-gray-800">Sprled Pows</h3>
                            <p class="text-gray-500 text-sm mt-1 mb-2">Lorem ipsum dolor sit amet.</p>
                            <div class="text-xl font-bold text-gray-900">$799</div>
                            <button class="mt-4 bg-teal-500 text-white py-2 px-6 rounded-full font-semibold hover:bg-teal-600">ADD TO CART</button>
                        </div>
                    </div>
                </div>

                <!-- Product Card 3 -->
                <div class="product-card bg-white rounded-xl shadow-lg p-4 transform transition-all duration-300 hover:scale-105">
                    <div class="flex flex-col items-center">
                        <img src="https://placehold.co/300x300/e5e7eb/7f8c8d?text=Product" alt="Product Image" class="product-card-image rounded-xl w-full h-auto mb-4">
                        <div class="text-center">
                            <h3 class="text-lg font-semibold text-gray-800">Sprled Bran</h3>
                            <p class="text-gray-500 text-sm mt-1 mb-2">Lorem ipsum dolor sit amet.</p>
                            <div class="text-xl font-bold text-gray-900">$759</div>
                            <button class="mt-4 bg-teal-500 text-white py-2 px-6 rounded-full font-semibold hover:bg-teal-600">ADD TO CART</button>
                        </div>
                    </div>
                </div>

                <!-- Product Card 4 -->
                <div class="product-card bg-white rounded-xl shadow-lg p-4 transform transition-all duration-300 hover:scale-105">
                    <div class="flex flex-col items-center">
                        <img src="https://placehold.co/300x300/e5e7eb/7f8c8d?text=Product" alt="Product Image" class="product-card-image rounded-xl w-full h-auto mb-4">
                        <div class="text-center">
                            <h3 class="text-lg font-semibold text-gray-800">Boredon</h3>
                            <p class="text-gray-500 text-sm mt-1 mb-2">Lorem ipsum dolor sit amet.</p>
                            <div class="text-xl font-bold text-gray-900">$459</div>
                            <button class="mt-4 bg-teal-500 text-white py-2 px-6 rounded-full font-semibold hover:bg-teal-600">ADD TO CART</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- Footer Section -->
    <footer class="bg-gray-900 text-gray-400 py-12 mt-12">
        <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-white font-bold mb-4">Customer Service</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:underline">Contact Us</a></li>
                    <li><a href="#" class="hover:underline">Returns & Exchanges</a></li>
                    <li><a href="#" class="hover:underline">Shipping Information</a></li>
                    <li><a href="#" class="hover:underline">FAQs</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-white font-bold mb-4">About Us</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:underline">Our Story</a></li>
                    <li><a href="#" class="hover:underline">Careers</a></li>
                    <li><a href="#" class="hover:underline">Blog</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-white font-bold mb-4">Legal</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:underline">Terms of Service</a></li>
                    <li><a href="#" class="hover:underline">Privacy Policy</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-white font-bold mb-4">Connect With Us</h3>
                <div class="flex space-x-4">
                    <a href="#" class="hover:text-white"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.58.013 4.85.074 1.25.06 1.83.25 2.22.42.4.17.74.4.99.64.25.25.47.6.64.99.17.39.36.97.42 2.22.06 1.27.074 1.646.074 4.85s-.013 3.58-.074 4.85c-.06 1.25-.25 1.83-.42 2.22-.17.4-.4.74-.64.99-.25.25-.6.47-.99.64-.39.17-.97.36-2.22.42-1.27.06-1.646.074-4.85.074s-3.58-.013-4.85-.074c-1.25-.06-1.83-.25-2.22-.42-.4-.17-.74-.4-.99-.64-.25-.25-.47-.6-.64-.99-.17-.39-.36-.97-.42-2.22-.06-1.27-.074-1.646-.074-4.85s.013-3.58.074-4.85c.06-1.25.25-1.83.42-2.22.17-.4.4-.74.64-.99.25-.25.6-.47.99-.64.39-.17.97-.36 2.22-.42 1.27-.06 1.646-.074 4.85-.074zm0-2.163c-3.264 0-3.674.013-4.95.074-1.32.062-2.008.273-2.61.517a4.997 4.997 0 00-1.782 1.144c-.604.604-1.015 1.292-1.144 2.61-.061 1.27-.074 1.686-.074 4.95s.013 3.68.074 4.95c.062 1.32.273 2.008.517 2.61a5.002 5.002 0 001.144 1.782c.604.604 1.292 1.015 2.61 1.144 1.27.061 1.686.074 4.95.074s3.68-.013 4.95-.074c1.32-.062 2.008-.273 2.61-.517a4.997 4.997 0 001.782-1.144c.604-.604 1.015-1.292 1.144-2.61.061-1.27.074-1.686.074-4.95s-.013-3.68-.074-4.95c-.062-1.32-.273-2.008-.517-2.61a5.002 5.002 0 00-1.144-1.782c-.604-.604-1.292-1.015-2.61-1.144-1.27-.061-1.686-.074-4.95-.074zm0 6.645a3.68 3.68 0 100 7.36 3.68 3.68 0 000-7.36zm0 6.273a2.592 2.592 0 110-5.184 2.592 2.592 0 010 5.184zm6.645-5.91a.952.952 0 100-1.904.952.952 0 000 1.904z" /></svg></a>
                    <a href="#" class="hover:text-white"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10c5.523 0 10-4.477 10-10S17.523 2 12 2zm3 15h-2v-4h-2v4H9v-6h4l.164-2H9V8h2.387c.604-1.32 1.292-2.008 2.61-2.517A4.997 4.997 0 0015 2h-3c-5.523 0-10 4.477-10 10s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm3 8h-4v4h2v6h2V8z" /></svg></a>
                    <a href="#" class="hover:text-white"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557a9.83 9.83 0 01-2.828.775 4.932 4.932 0 002.165-2.724 9.864 9.864 0 01-3.13 1.196A4.922 4.922 0 0018.716 4a4.922 4.922 0 00-4.922 4.922c0 .385.04.757.118 1.12A13.924 13.924 0 013.823 4.29a4.92 4.92 0 00-1.968 6.574 4.925 4.925 0 002.664-3.54v.062a4.92 4.92 0 003.957 4.827 4.912 4.912 0 01-2.223.084 4.922 4.922 0 004.577 3.414 9.89 9.89 0 01-6.12 2.112c-.397 0-.788-.023-1.173-.069a13.92 13.92 0 007.545 2.215 13.91 13.91 0 008.203-2.614 13.92 13.92 0 003.047-3.235A9.854 9.854 0 0024 4.557z" /></svg></a>
                </div>
            </div>
        </div>
        <div class="bg-gray-800 text-center py-4">
            <p class="text-sm text-gray-500">&copy; 2023 Your Store. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
