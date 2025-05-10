<section>
    <div style="background: linear-gradient(139deg, rgba(246, 211, 77, 1) 0%, rgba(242, 222, 149, 1) 11%, rgba(238, 233, 225, 1) 32%, rgba(238, 233, 225, 1) 42%, rgba(49, 134, 123, 1) 100%);
    margin: 30px; border-radius: 30px; border: 1px solid rgba(0, 0, 0, 0.4); box-shadow: inset -5px -5px rgba(0, 0, 0, 0.4);">
        <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
            <aside class="relative block h-16 lg:col-span-5 lg:h-full xl:col-span-6">
                <img
                    alt=""
                    src="../img/logo/login2.png"
                    class="absolute inset-0 h-full w-full object-cover"
                    style="border-radius: 30px;" />
            </aside>

            <main class="flex items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:px-16 lg:py-12 xl:col-span-6">
                <div class="max-w-xl lg:max-w-3xl">
                    <h1 class="text-2xl font-bold text-teal-800 sm:text-3xl md:text-4xl" style="font-size: 2.5rem;">
                        Daftar <span style="color: #c41212;">Akun</span>
                    </h1>

                    <!-- PHP Alerts -->
                    <?php
                    // Display validation errors using Tailwind CSS
                    if (validation_errors()) {
                        echo '<div class="mt-2 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert" id="alert-box">';
                        echo '<strong class="font-bold"><i class="icon fas fa-exclamation-triangle"></i> Error!</strong>';
                        echo '<span class="block sm:inline">' . validation_errors() . '</span>';
                        echo '<span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display=\'none\'">';
                        echo '<svg class="fill-current h-6 w-6 text-red-500 cursor-pointer" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">';
                        echo '<title>Close</title>';
                        echo '<path d="M14.348 5.652a1 1 0 0 1 0 1.414L11.414 10l2.934 2.934a1 1 0 1 1-1.414 1.414L10 11.414l-2.934 2.934a1 1 0 1 1-1.414-1.414L8.586 10 5.652 7.066a1 1 0 0 1 1.414-1.414L10 8.586l2.934-2.934a1 1 0 0 1 1.414 0z"/>';
                        echo '</svg>';
                        echo '</span>';
                        echo '</div>';
                    }

                    // Display success message using Tailwind CSS
                    if ($this->session->flashdata('pesan')) {
                        echo '<div class="mt-2 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert" id="alert-box">';
                        echo '<strong class="font-bold"><i class="icon fas fa-check"></i> Sukses!</strong>';
                        echo '<span class="block sm:inline">' . $this->session->flashdata('pesan') . '</span>';
                        echo '<span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display=\'none\'">';
                        echo '<svg class="fill-current h-6 w-6 text-green-500 cursor-pointer" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">';
                        echo '<title>Close</title>';
                        echo '<path d="M14.348 5.652a1 1 0 0 1 0 1.414L11.414 10l2.934 2.934a1 1 0 1 1-1.414 1.414L10 11.414l-2.934 2.934a1 1 0 1 1-1.414-1.414L8.586 10 5.652 7.066a1 1 0 0 1 1.414-1.414L10 8.586l2.934-2.934a1 1 0 0 1 1.414 0z"/>';
                        echo '</svg>';
                        echo '</span>';
                        echo '</div>';
                    }
                    ?>

                    <!-- JavaScript to hide alert automatically -->
                    <script>
                        // Hide alert after 5 seconds
                        setTimeout(function() {
                            const alertBox = document.getElementById('alert-box');
                            if (alertBox) {
                                alertBox.style.transition = 'opacity 0.5s';
                                alertBox.style.opacity = '0';
                                setTimeout(() => alertBox.remove(), 500);
                            }
                        }, 5000); // 5000 milliseconds = 5 seconds
                    </script>

                    <!-- Form -->
                    <form method="post" action="<?= base_url('pelanggan/register') ?>" class="mt-8 grid grid-cols-6 gap-6">
                        <!-- Form fields -->
                        <div class="col-span-6">
                            <label class="block font-medium text-teal-700" style="font-size: 1rem;">Nama</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-3 flex items-center text-teal-800">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input
                                    type="text"
                                    id="Name"
                                    name="nama_pelanggan"
                                    value="<?= set_value('nama_pelanggan') ?>"
                                    placeholder="Masukkan nama anda"
                                    class="w-full pl-10 rounded-lg border-2 border-teal-700 bg-white py-2 text-teal-700 shadow-sm focus:border-red-500 focus:ring-1 focus:ring-teal-800" />
                            </div>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label class="block font-medium text-teal-700" style="font-size: 1rem;">Email</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-3 flex items-center text-teal-800">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input
                                    type="email"
                                    id="Email"
                                    name="email"
                                    value="<?= set_value('email') ?>"
                                    placeholder="Masukkan email anda"
                                    class="w-full pl-10 rounded-lg border-2 border-teal-700 bg-white py-2 text-teal-700 shadow-sm focus:border-red-500 focus:ring-1 focus:ring-teal-800" />
                            </div>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label class="block font-medium text-teal-700" style="font-size: 1rem;">Nomor Telepon</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-3 flex items-center text-teal-800">
                                    <i class="fas fa-phone"></i>
                                </span>
                                <input
                                    type="text"
                                    id="no_telp"
                                    name="no_telp"
                                    value="<?= set_value('no_telp') ?>"
                                    placeholder="Masukkan nomor anda"
                                    class="w-full pl-10 rounded-lg border-2 border-teal-700 bg-white py-2 text-teal-700 shadow-sm focus:border-red-500 focus:ring-1 focus:ring-teal-800" />
                            </div>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label class="block font-medium text-teal-700" style="font-size: 1rem;">Sandi</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-3 flex items-center text-teal-800">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input
                                    type="password"
                                    id="Password"
                                    name="password"
                                    value="<?= set_value('password') ?>"
                                    placeholder="Masukkan password anda"
                                    class="w-full pl-10 rounded-lg border-2 border-teal-700 bg-white py-2 text-teal-700 shadow-sm focus:border-red-500 focus:ring-1 focus:ring-teal-800" />
                            </div>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label class="block font-medium text-teal-700" style="font-size: 1rem;">Konfirmasi Sandi</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-3 flex items-center text-teal-800">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input
                                    type="password"
                                    id="PasswordConfirmation"
                                    name="ulangi_password"
                                    value="<?= set_value('ulangi_password') ?>"
                                    placeholder="Ulangi password anda"
                                    class="w-full pl-10 rounded-lg border-2 border-teal-700 bg-white py-2 text-teal-700 shadow-sm focus:border-red-500 focus:ring-1 focus:ring-teal-800" />
                            </div>
                        </div>

                        <div class="col-span-4 flex items-center">
                            <p class="mt-2 text-teal-700" style="font-size: 1rem;">
                                Sudah punya akun? <a href="<?= base_url('pelanggan/login') ?>" class="text-red-600 underline hover:underline">Masuk</a>
                            </p>
                        </div>

                        <div class="col-span-6 sm:flex sm:items-center sm:gap-4">
                            <button type="submit" class="btn btn-login btn-block">Daftar</button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</section>