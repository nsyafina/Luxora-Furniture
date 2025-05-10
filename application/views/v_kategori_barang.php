<div class="main-container-kategori">
    <!-- Banner vertikal -->
    <div data-aos="fade-right" data-aos-duration="1000" class="banner-vertical-kategori"></div>
    <div>
        <!----------------- Title Kategori ------------------>
        <h1 data-aos="fade-up" data-aos-duration="1000" class="title-kategori">Kategori <span><?= $title ?></span></h1>
        <p data-aos="fade-up" data-aos-duration="1000" class="des-title-kategori">Temukan koleksi terbaik kami untuk setiap ruangan.</p>
        <!----------------- Title Kategori ------------------>

        <!---------------- Produk Kategori ------------------>
        <div data-aos="fade-up" data-aos-duration="1000" class="mt-2 container-3 grid grid-cols-1 gap-4 lg:grid-cols-3 lg:gap-8">
            <?php foreach ($barang as $key => $value) { ?>
                <div class="bg-grid">
                    <?php
                    echo form_open('belanja/add');
                    echo form_hidden('id', $value->id_barang);
                    echo form_hidden('qty', 1);
                    echo form_hidden('price', $value->harga);
                    echo form_hidden('name', $value->nama_barang);
                    echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                    ?>
                    <article class="group">
                        <a href="#">
                            <h1 class="title-produk">— <?= $value->nama_barang ?> —</h1>
                        </a>
                        <img
                            alt=""
                            src="<?= base_url('img/kategori/' . $value->gambar) ?>"
                            class="img-produk h-56 w-full rounded-xl object-cover shadow-xl transition group-hover:grayscale-[50%]" />

                        <div class="p-3">
                            <p class="harga-produk" align="center">IDR. <?= number_format($value->harga, 0) ?>.-</p>
                            <button
                                class="inline-block rounded btn-produk-cart px-3 py-2 transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:bg-teal-700"
                                type="submit" style="margin-left: px;">
                                <i class="fa-solid fa-cart-plus"></i>
                            </button>

                            <a
                                class="inline-block rounded btn-produk-detail px-3 py-2 transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:bg-yellow-500"
                                href="<?= base_url('home/detail_barang/' . $value->id_barang) ?>" style="margin-left: px;">
                                <i class="fa-solid fa-circle-info"></i> Lihat Detail
                            </a>
                        </div>
                    </article>
                    <?php echo form_close(); ?>
                </div>
            <?php } ?>
        </div>
        <!---------------- Produk Kategori ------------------>
    </div>
</div>


<?php if ($this->session->flashdata('pesan')) { ?>
    <div id="cart-alert" class="mt-5 fixed top-12 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-lg z-50" id="cartAlert">
        <strong class="font-bold"><i class="fas fa-check-circle"></i></strong>
        <span class="block sm:inline"><?= $this->session->flashdata('pesan') ?></span>
    </div>
<?php } ?>


<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        const alertElement = document.getElementById('cart-alert');
        if (alertElement) {
            setTimeout(() => {
                alertElement.classList.add('opacity-0');
                setTimeout(() => alertElement.classList.add('hidden'), 500);
            }, 3000);
        }
    });
</script>