<div class=" container-checkout">
    <div class="invoice" style="border-radius: 15px; background: linear-gradient(129deg, rgba(242, 237, 219, 1) 0%, rgba(39, 122, 111, 1) 100%); 
    box-shadow: inset -5px -5px rgba(0, 0, 0, 0.4); border: 1px solid rgba(0, 0, 0, 0.4);">
        <!-- title row -->
        <div class="row">
            <div class="col-12">
                <h3 style="font-size: 2rem; margin-bottom: 20px; font-weight: bold; color: #0b544b;">
                    <i class="fas fa-shopping-cart" style="color: #0b544b;"></i> Checkout <span style="color: #c41212;">Pesanan</span>
                    <small class="float-right" style="font-weight: bold; color: #c41212;">Invoice</small>
                </h3>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <?php
        // Ambil data dari database
        $query = $this->db->get('setting');
        $setting = $query->row();

        // Pastikan data yang diambil tidak kosong
        $alamat_toko = isset($setting->alamat_toko) ? $setting->alamat_toko : 'Alamat tidak tersedia';
        $no_telpon = isset($setting->no_telpon) ? $setting->no_telpon : 'Nomor telepon tidak tersedia';
        ?>
        <div class="row">
            <div class="col-4">
                <address>
                    <b>No. Telp :</b> <?= $no_telpon; ?><br>
                    <b>Website :</b> http://localhost/luxora-interiors<br>
                    <b>Alamat : </b> <?= $alamat_toko; ?>
                </address>
            </div>
            <div class="col-8">
                <h3 class="float-right">
                    Tanggal : <?= date('d-m-Y') ?>
                </h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row mt-3">
            <div class="col-12 table-responsive">
                <table class="table-striped w-full border-collapse bg-white rounded-lg shadow-md overflow-hidden mb-4">
                    <thead class="bg-gradient-to-r bg-gradient-to-r from-yellow-400 to-red-500 text-white">
                        <tr>
                            <th class="text-center p-2 ">Produk</th>
                            <th class="text-center p-2 ">Berat</th>
                            <th class="text-center p-2 ">Qty</th>
                            <th class="text-center p-2 ">Harga</th>
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
                            <tr>
                                <td class="text-center p-2"><?= $items['name']; ?></td>
                                <td class="text-center p-2"><?= $berat ?> Kg</td>
                                <td class="text-center p-2">
                                    <?php echo form_input(['name' => $i . '[qty]', 'value' => $items['qty'], 'type' => 'number', 'min' => '0', 'class' => 'w-16 text-center border rounded-md']); ?>
                                </td>
                                <td class="text-center p-2">IDR. <?= $this->cart->format_number($items['subtotal']); ?>.-</td>
                            </tr>
                            <?php $i++; ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>

        <?php
        if (validation_errors()) {
            echo '<div id="validation-error" class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded-md shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <h5 class="font-bold"><i class="fas fa-exclamation-circle mr-2"></i>Error</h5>
                    <p>' . validation_errors('', '<br>') . '</p>
                </div>
                <button id="close-error" class="text-red-700 hover:text-red-900">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            </div>';
        }
        ?>

        <?php
        echo form_open('belanja/checkout');
        $no_order = date('Ymd') . strtoupper(random_string('alnum', 8));
        ?>
        <div class="row">
            <!-- accepted payments column -->
            <div class="col-6 invoice-col">
                <strong> Tujuan : </strong>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label style="font-weight: normal;">Provinsi</label>
                            <select style="border: 2px solid #0b544b;" required name="provinsi" class="form-control"></select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label style="font-weight: normal;">Kota/Kabupaten</label>
                            <select style="border: 2px solid #0b544b;" required name="kota" class="form-control"></select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label style="font-weight: normal;">Expedisi</label>
                            <select style="border: 2px solid #0b544b;" required name="expedisi" class="form-control"></select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label style="font-weight: normal;">Paket</label>
                            <select style="border: 2px solid #0b544b;" required name="paket" class="form-control"></select>
                        </div>
                    </div>

                    <div class="col-sm-8">
                        <div class="form-group">
                            <label style="font-weight: normal;">Alamat Lengkap</label>
                            <input style="border: 2px solid #0b544b;" required name="alamat" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label style="font-weight: normal;">Kode Pos</label>
                            <input style="border: 2px solid #0b544b;" required name="kode_pos" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-sm-7">
                        <div class="form-group">
                            <label style="font-weight: normal;">Nama Penerima</label>
                            <input style="border: 2px solid #0b544b;" required name="nama_penerima" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-sm-5">
                        <div class="form-group">
                            <label style="font-weight: normal;">No. Telp Penerima</label>
                            <input style="border: 2px solid #0b544b;" required name="hp_penerima" class="form-control" required>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-2"></div>
            <!-- /.col -->
            <div class="col-4">

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%; color: #F2EDDB;">Total Berat : </th>
                            <td style="font-weight: bold; color: #F2EDDB;"><?= $total_berat ?> Kg</td>
                        </tr>
                        <tr>
                            <th style="color: #F2EDDB;">Sub Total : </th>
                            <td style="font-weight: bold; color: #F2EDDB;">IDR. <?= $this->cart->format_number($this->cart->total()); ?>.-</td>
                        </tr>
                        <tr>
                            <th style="color: #F2EDDB;">Ongkir : </th>
                            <td style="color: #F2EDDB;"><label style="font-weight: bold; color: #F2EDDB;" id="ongkir"></label>.-</td>
                        </tr>
                        <tr style="font-size: 1.3rem;">
                            <th style="color: #F2EDDB;">Grand Total : </th>
                            <td style="font-weight: bold; color: #F2EDDB;"><label style="border-bottom: 1px solid #F2EDDB;" id="total_bayar"></label>.-</td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- simpan transaksi -->
        <input name="no_order" value="<?= $no_order ?>" hidden>
        <input name="estimasi" hidden>
        <input name="ongkir" hidden>
        <input name="berat" value="<?= $total_berat ?>" hidden><br>
        <input name="sub_total" value="<?= $this->cart->total() ?>" hidden>
        <input name="grand_total" hidden>
        <!-- end simpan transaksi -->

        <!-- simpan rinci transaksi -->
        <?php
        $i = 1;
        foreach ($this->cart->contents() as $items) {
            echo form_hidden('qty' . $i++, $items['qty']);
        }
        ?>
        <!-- simpan rinci transaksi -->

        <div class="row">
            <div class="col-6">
                <p class="lead mt-2">Payment Methods:</p>
                <!-- Wrapper div with Flexbox classes -->
                <div class="flex space-x-2 ">
                    <img src="<?= base_url() ?>img/cart/logo-bank1.png" class="h-12">
                    <img src="<?= base_url() ?>img/cart/logo-bank2.png" class="h-10">
                    <img src="<?= base_url() ?>img/cart/logo-bank3.png" class="h-12">
                    <img src="<?= base_url() ?>img/cart/logo-bank4.png" class="h-12">
                </div>
            </div>
            <div class="col-6 mt-5">
                <button type="submit" class="btn btn-checkout-now float-right" style="margin-right: 5px;">
                    <i class="fas fa-cart-shopping"></i> Checkout Now
                </button>
                <a href="<?= base_url('belanja') ?>" class="btn btn-back-cart float-right"><i class="fas fa-backward"></i> Back to Cart</a>
                <!--<button class="btn btn-kirim" onclick="printSelectedData()"><i class="fas fa-print"></i> Print</button>-->
            </div>
        </div>

        <?php echo form_close(); ?>
    </div>
</div>

<script>
    $(document).ready(function() {
        //masukan data ke select provinsi
        $.ajax({
            type: "POST",
            url: "<?= base_url('rajaongkir/provinsi') ?>",
            success: function(hasil_provinsi) {
                //console.log(hasil_provinsi);
                $("select[name=provinsi]").html(hasil_provinsi);
            }
        });

        //masukan data ke select kota
        $("select[name=provinsi]").on("change", function() {
            var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/kota') ?>",
                data: 'id_provinsi=' + id_provinsi_terpilih,
                success: function(hasil_kota) {
                    //console.log(hasil_kota);
                    $("select[name=kota]").html(hasil_kota);
                }
            });
        });

        //masukan data ke select expedisi
        $("select[name=kota]").on("change", function() {
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/expedisi') ?>",
                success: function(hasil_expedisi) {
                    $("select[name=expedisi]").html(hasil_expedisi);
                }
            });
        });

        //mendapatkan data paket
        $("select[name=expedisi]").on("change", function() {
            //mendapatkan expedisi terpilih
            var expedisi_terpilih = $("select[name=expedisi]").val()
            //mendapatkan id kota terpilih
            var id_kota_tujuan_terpilih = $("option:selected", "select[name=kota]").attr('id_kota');
            //mengambil data total berat
            var total_berat = <?= $total_berat ?>;

            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/paket') ?>",
                data: 'expedisi=' + expedisi_terpilih + '&id_kota=' + id_kota_tujuan_terpilih + '&berat=' + total_berat,
                success: function(hasil_paket) {
                    $("select[name=paket]").html(hasil_paket);
                }
            });
        });


        /* --- Versi Original ---
        $("select[name=paket]").on("change", function() {
            //menampilkan ongkir
            var dataongkir = $("option:selected", this).attr('ongkir');
            $("#ongkir").html("IDR. " + dataongkir)
            //menghitung grand total;
            var data_total_bayar = parseInt(dataongkir) + parseInt(<?= $this->cart->total() ?>);
            $("#total_bayar").html("IDR. " + data_total_bayar);
        });
        */

        // --- Versi Modifikasi GPT, untuk merubah format data ongkir dan data total bayar menjadi number format ---
        $("select[name=paket]").on("change", function() {
            //menampilkan ongkir
            var dataongkir = $("option:selected", this).attr('ongkir');
            var formattedOngkir = parseInt(dataongkir).toLocaleString('en-US'); // Format number with comma
            $("#ongkir").html("IDR. " + formattedOngkir);

            //menghitung grand total
            var data_total_bayar = parseInt(dataongkir) + parseInt(<?= $this->cart->total() ?>);
            var formattedTotalBayar = data_total_bayar.toLocaleString('en-US'); // Format number with comma
            $("#total_bayar").html("IDR. " + formattedTotalBayar);

            //estimasi dan ongkir
            var estimasi = $("option:selected", this).attr('estimasi');
            $("input[name=estimasi]").val(estimasi);
            $("input[name=ongkir]").val(dataongkir);
            $("input[name=grand_total]").val(data_total_bayar);

        });
    });

    // Auto-hide after 5 seconds
    setTimeout(() => {
        const errorElement = document.getElementById("validation-error");
        if (errorElement) {
            errorElement.style.transition = "opacity 0.5s ease-in-out";
            errorElement.style.opacity = "0";
            setTimeout(() => errorElement.remove(), 500);
        }
    }, 3000);

    // Close button functionality
    document.addEventListener("DOMContentLoaded", () => {
        const closeErrorButton = document.getElementById("close-error");
        if (closeErrorButton) {
            closeErrorButton.addEventListener("click", () => {
                const errorElement = document.getElementById("validation-error");
                if (errorElement) {
                    errorElement.remove();
                }
            });
        }
    });

    /*function print
    function printSelectedData() {
        const printArea = document.createElement("div");
        printArea.style.padding = "20px";
        printArea.style.fontFamily = "Arial, sans-serif";

        // Ambil elemen yang relevan untuk dicetak
        const table = document.querySelector(".table-responsive").cloneNode(true);
        const info = `
        <div>
            <p><strong>Alamat Lengkap:</strong> ${document.querySelector("input[name='alamat']").value}</p>
            <p><strong>Nama Penerima:</strong> ${document.querySelector("input[name='nama_penerima']").value}</p>
            <p><strong>No. Telp Penerima:</strong> ${document.querySelector("input[name='hp_penerima']").value}</p>
        </div>
    `;
        const totals = `
        <table style="margin-top: 20px; border-collapse: collapse; width: 100%;">
            <tr>
                <th style="text-align: left; border-bottom: 1px solid #ddd; padding: 8px;">Total Berat:</th>
                <td style="text-align: right; padding: 8px;">${document.querySelector("td[style='font-weight: bold;']").innerText}</td>
            </tr>
            <tr>
                <th style="text-align: left; border-bottom: 1px solid #ddd; padding: 8px;">Sub Total:</th>
                <td style="text-align: right; padding: 8px;">IDR ${parseInt(<?= $this->cart->total() ?>).toLocaleString('en-US')}.-</td>
            </tr>
            <tr>
                <th style="text-align: left; border-bottom: 1px solid #ddd; padding: 8px;">Ongkir:</th>
                <td style="text-align: right; padding: 8px;">IDR ${document.querySelector("#ongkir").innerText.split("IDR. ")[1]}</td>
            </tr>
            <tr>
                <th style="text-align: left; border-bottom: 1px solid #ddd; padding: 8px; font-size: 1.2rem;">Grand Total:</th>
                <td style="text-align: right; padding: 8px; font-weight: bold; font-size: 1.2rem;">IDR ${document.querySelector("#total_bayar").innerText.split("IDR. ")[1]}</td>
            </tr>
        </table>
    `;

        // Tambahkan konten ke div sementara
        printArea.innerHTML = `<h2 style="text-align: center; margin-bottom: 20px;">Ringkasan Pesanan</h2>`;
        printArea.appendChild(table);
        printArea.innerHTML += info;
        printArea.innerHTML += totals;

        // Buka jendela baru untuk mencetak
        const printWindow = window.open("", "_blank");
        printWindow.document.write(`
        <html>
            <head>
                <title>Cetak Invoice</title>
                <style>
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin-bottom: 20px;
                    }
                    table, th, td {
                        border: 1px solid #ddd;
                    }
                    th, td {
                        text-align: center;
                        padding: 8px;
                    }
                </style>
            </head>
            <body>
                ${printArea.outerHTML}
            </body>
        </html>
    `);
        printWindow.document.close();
        printWindow.print();
    }
    */
</script>