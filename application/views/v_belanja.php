<div
    href="#"
    class="card-cart relative block overflow-hidden rounded-lg border border-gray-100 p-4 sm:p-6 lg:p-8">
    <span class="absolute inset-x-0 bottom-0 h-2 bg-gradient-to-r from-yellow-300 via-red-500 to-teal-600"></span>
    <h1 class="title-cart text-center mb-4"><i class="fa-solid fa-basket-shopping"></i> <?= $title ?></h1>
    <div class="col-sm-12">
        <?php
        if ($this->session->flashdata('pesan')) {
            echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>';
            echo $this->session->flashdata('pesan');
            echo '</h5></div>';
        }
        ?>
    </div>
    <?php echo form_open('belanja/update'); ?>
    <table class="w-full border-collapse bg-white rounded-lg shadow-md overflow-hidden mt-6">
        <thead class="bg-gradient-to-r from-yellow-400 via-red-500 to-purple-600 text-white">
            <tr>
                <th class="text-center p-2">Produk</th>
                <th class="text-center p-2">Berat</th>
                <th class="text-center p-2">QTY</th>
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
        <button type="submit" class="inline-block rounded btn-cart-update px-8 py-3 transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:bg-teal-700"><i class="fa fa-save"></i> Update Cart</button>
        <a href="<?= base_url('belanja/clear') ?>" class="inline-block btn-cart-clear px-8 py-3 transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:bg-red-800"><i class="fa fa-recycle"></i> Clear Cart</a>
        <a href="<?= base_url('belanja/checkout') ?>" class="inline-block rounded btn-cart-checkout px-8 py-3 transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:bg-yellow-700"><i class="fa fa-check-square"></i> Check Out</a>
    </div>
    <?php echo form_close(); ?>
</div>