<section class="py-4" style="background: linear-gradient(139deg, rgba(246, 211, 77, 1) 0%, rgba(242, 222, 149, 1) 11%, rgba(238, 233, 225, 1) 32%, rgba(238, 233, 225, 1) 42%, rgba(49, 134, 123, 1) 100%);">
    <div class="container mx-auto px-6">
        <!-- Card Container -->
        <div class=" p-8 overflow-hidden relative" style="background: linear-gradient(129deg, rgba(242,237,219,1) 0%, rgba(39,122,111,1) 100%); 
        box-shadow: inset -5px -5px rgba(0, 0, 0, 0.4); border: 1px solid rgba(0, 0, 0, 0.4); border-radius: 15px;">

            <!-- Ribbon Eco-friendly -->
            <div class="absolute top-0 left-0 bg-gradient-to-r from-yellow-400 to-red-500 text-white px-5 py-2 rounded-br-lg text-xm font-bold uppercase z-10">
                <?= $title ?>
            </div>

            <div class="flex flex-wrap items-center justify-between">
                <!-- Left Section (Details) -->
                <div class="lg:w-1/2 w-full lg:pr-10 lg:py-6 mb-6 lg:mb-0">

                    <!-- Title and Description -->
                    <div class="relative p-4 rounded-lg mb-4 shadow-lg elevation-5" style="background-color: #0b544b;">
                        <h1 class="text-4xl font-extrabold text-black leading-tight relative text-center" style="position: relative; padding:30px;">
                            <span class="absolute inset-x-0 top-1/2 -translate-y-1/2 text-center w-full font-extrabold text-white" style="opacity: 1; font-size: 3rem;">
                                <?= $barang->nama_barang ?>
                            </span>
                            <span class="absolute inset-x-0 -bottom-2 h-1 w-full bg-gradient-to-r from-yellow-400 to-red-500 rounded"></span>
                        </h1>
                    </div>

                    <!-- Product Rating -->
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-500" style="font-size: 23px;">★ ★ ★ ★ ☆</span>
                        <span class="ml-2 text-black">(4.5 / 5) | 250 reviews</span>
                    </div>

                    <p class="text-black leading-relaxed mb-6">
                        Temukan beragam pilihan furniture berkualitas tinggi yang dirancang dengan estetika modern dan kenyamanan. Dari meja hingga kursi, semua produk dibuat dengan material premium untuk melengkapi setiap ruang di rumah Anda.
                    </p>

                    <!-- Product Features with Icons -->
                    <div class="grid grid-cols-2 gap-4 mb-12">
                        <div class="flex items-center bg-green-100 p-2 rounded-lg shadow-sm">
                            <i class="fas fa-shield-alt text-green-600 text-lg mr-2"></i>
                            <span class="text-gray-800 text-sm">Garansi 1 Tahun</span>
                        </div>
                        <div class="flex items-center bg-blue-100 p-2 rounded-lg shadow-sm">
                            <i class="fa-solid fa-truck-fast text-blue-600 text-lg mr-2"></i>
                            <span class="text-gray-800 text-sm">Pengiriman Cepat</span>
                        </div>
                        <div class="flex items-center bg-yellow-100 p-2 rounded-lg shadow-sm">
                            <i class="fa-solid fa-leaf text-yellow-600 text-lg mr-2"></i>
                            <span class="text-gray-800 text-sm">Bahan Eco-friendly</span>
                        </div>
                        <div class="flex items-center bg-purple-100 p-2 rounded-lg shadow-sm">
                            <i class="fa-solid fa-couch text-purple-600 text-lg mr-2"></i>
                            <span class="text-gray-800 text-sm">Desain Modern</span>
                        </div>
                    </div>

                    <!-- Product Details Card -->
                    <div class="bg-gray-100 rounded-lg shadow-inner p-4 mb-6">
                        <div class="flex justify-between py-2 border-b border-gray-300">
                            <span class="text-teal-800 font-medium">ID Produk</span>
                            <span class="text-gray-800"><?= $barang->id_barang ?></span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-gray-300">
                            <span class="text-teal-800 font-medium">Berat</span>
                            <span class="text-gray-800"><?= $barang->berat ?> Kg</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-gray-300">
                            <span class="text-teal-800 font-medium">Warna</span>
                            <span class="text-gray-800"><?= $barang->warna ?></span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-gray-300">
                            <span class="text-teal-800 font-medium">Material</span>
                            <span class="text-gray-800"><?= $barang->material ?></span>
                        </div>
                        <div class="flex justify-between py-2">
                            <span class="text-teal-800 font-medium">Kapasitas</span>
                            <span class="text-gray-800"><?= $barang->kapasitas ?></span>
                        </div>
                    </div>
                </div>

                <!-- Right Section (Product Image and Reviews) -->
                <div class="lg:w-1/2 w-full">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
                        <img alt="ecommerce" class="object-cover object-center rounded-lg transition duration-500 transform hover:scale-105"
                            src="<?= base_url('img/kategori/' . $barang->gambar) ?>">
                    </div>

                    <!-- Sticky Bar for Price & Add to Cart Button -->
                    <div class="sticky bottom-0 left-0 w-full py-4 px-4 rounded-t-lg text-white shadow-lg flex justify-between items-center z-10" style="background-color: #0b544b;">
                        <span class="text-xl font-bold">IDR. <?= number_format($barang->harga, 0) ?>.-</span>
                        <?php
                        echo form_open('belanja/add');
                        echo form_hidden('id', $barang->id_barang);
                        echo form_hidden('qty', 1);
                        echo form_hidden('price', $barang->harga);
                        echo form_hidden('name', $barang->nama_barang);
                        echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                        ?>
                        <button type="submit" class="flex items-center px-4 py-2 rounded font-bold transition btn-merah">
                            <i class="fa-solid fa-cart-plus mr-2"></i> Masukkan ke Keranjang
                        </button>
                        <?php echo form_close(); ?>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Alert Box for Add to Cart -->
    <?php if ($this->session->flashdata('pesan')): ?>
        <div id="cart-alert" class="mt-5 fixed top-12 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-lg z-50" role="alert">
            <strong class="font-bold"><i class="fas fa-check-circle"></i></strong>
            <span class="block sm:inline"><?= $this->session->flashdata('pesan') ?></span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none'">
            </span>
        </div>

        <!-- JavaScript to Hide Alert Automatically -->
        <script>
            // Hide alert after 5 seconds
            setTimeout(function() {
                const alertBox = document.getElementById('cart-alert');
                if (alertBox) {
                    alertBox.style.transition = 'opacity 0.5s';
                    alertBox.style.opacity = '0';
                    setTimeout(() => alertBox.remove(), 500);
                }
            }, 5000); // 5000 milliseconds = 5 seconds
        </script>
    <?php endif; ?>
</section>