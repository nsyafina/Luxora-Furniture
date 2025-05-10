<div
    href="#"
    class="card-cart relative block overflow-hidden p-4 sm:p-6 lg:p-8">
    <span class="absolute inset-x-0 bottom-0 h-2 bg-gradient-to-r from-yellow-400 to-red-500"></span>
    <h1 class="font-bold text-teal-800 text-center" style="font-size: 2.8rem; margin: auto;">
        <span style="color: #c41212;"><i class="fa-solid fa-bag-shopping"></i> Keranjang</span> Belanja
    </h1>
    <div class="col-sm-12">
        <?php if ($this->session->flashdata('pesan')) { ?>
            <div id="cart-alert" class="mt-5 fixed top-12 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-lg z-50">
                <strong class="font-bold"><i class="fas fa-check-circle"></i></strong>
                <span class="block sm:inline"><?= $this->session->flashdata('pesan') ?></span>
            </div>
        <?php } ?>
    </div>
    <?php echo form_open('belanja/update'); ?>
    <table class="w-full border-collapse bg-white rounded-lg shadow-md overflow-hidden mt-6">
        <thead class="bg-gradient-to-r bg-gradient-to-r from-yellow-400 to-red-500 text-white">
            <tr>
                <th class="text-center p-2">Gambar</th>
                <th class="text-center p-2">Produk</th>
                <th class="text-center p-2">Berat</th>
                <th class="text-center p-2">Jumlah</th>
                <th class="text-center p-2">Harga</th>
                <th class="text-center p-2">Sub-Total</th>
                <th class="text-center p-2">Hapus</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php
            $total_berat = 0;
            foreach ($this->cart->contents() as $items) {
                $barang = $this->m_home->detail_barang($items['id']);
                $berat = $items['qty'] * $barang->berat;
                $total_berat = $total_berat + $berat;
            ?>
                <tr class="border-t text-center bg-gray-100 hover:bg-gray-200">
                    <td class="p-2">
                        <img style="margin: auto;" src="<?= base_url('img/kategori/' . $barang->gambar) ?>" width="150px">
                    </td>

                    <td class="p-2"><?= $items['name']; ?></td>
                    <td class="p-2"><?= $berat ?> Kg</td>
                    <td class="p-2">
                        <?php echo form_input(['name' => $i . '[qty]', 'value' => $items['qty'], 'type' => 'number', 'min' => '0', 'class' => 'w-16 text-center border rounded-md']); ?>
                    </td>
                    <td class="p-2">IDR. <?= $this->cart->format_number($items['price']); ?>.-</td>
                    <td class="p-2">IDR. <?= $this->cart->format_number($items['subtotal']); ?>.-</td>
                    <td class="p-2">
                        <a href="<?= base_url('belanja/delete/' . $items['rowid']) ?>" class="text-red-700 hover:text-red-800"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php } ?>
            <tr class="border-t font-semibold text-center bg-gray-50">
                <td colspan="3" class="p-2">Total Berat: <?= $total_berat ?> Kg</td>
                <td colspan="2" class="p-2">Total: IDR. <?= $this->cart->format_number($this->cart->total()); ?>.-</td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <div class="flex justify-end mt-4">
        <button type="submit" class="inline-block rounded btn-cart-update px-8 py-3 transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:bg-teal-700"><i class="fa fa-save"></i> Update</button>
        <a href="<?= base_url('belanja/clear') ?>" class="inline-block btn-cart-clear px-8 py-3 transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:bg-red-800"><i class="fa fa-recycle"></i> Hapus Semua</a>
        <a href="<?= base_url('belanja/checkout') ?>" class="inline-block rounded btn-cart-checkout px-8 py-3 transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:bg-yellow-700"><i class="fa fa-check-square"></i> Check Out</a>
    </div>
    <?php echo form_close(); ?>
</div>

<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        const alertElement = document.getElementById('cart-alert');
        if (alertElement) {
            setTimeout(() => {
                alertElement.style.transition = 'opacity 0.5s ease';
                alertElement.style.opacity = '0';
                setTimeout(() => {
                    alertElement.style.display = 'none';
                }, 100);
            }, 2000);
        }
    });
</script>