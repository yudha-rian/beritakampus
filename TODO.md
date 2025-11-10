# TODO List for Product Features Implementation

## 1. Update ProductController.php
- [x] Add 'stok-melimpah' filter in index method (stock > 20)
- [x] Add 'harga-rata-rata-atas' filter in index method (price > avg price)
- [x] Add detail method to display single product

## 2. Update routes/web.php
- [x] Add route for /products/detail/{id}

## 3. Update resources/views/products/index.blade.php
- [x] Add "Stok Melimpah" filter link
- [x] Add "Harga Rata-rata ke Atas" filter link
- [x] Add category background colors (Fashion: light pink, Elektronik: light blue)

## 4. Create resources/views/products/detail.blade.php
- [x] Create new detail view file for product details

## 5. Testing
- [x] Test new filters on index page
- [x] Test detail route and view
