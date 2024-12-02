<section>
    <div style="background: linear-gradient(139deg, rgba(246, 211, 77, 1) 0%, rgba(242, 222, 149, 1) 11%, rgba(238, 233, 225, 1) 32%, rgba(238, 233, 225, 1) 42%, rgba(49, 134, 123, 1) 100%);
    margin: 30px; border-radius: 20px; border: 1px solid rgba(0, 0, 0, 0.4); box-shadow: inset -5px -5px rgba(0, 0, 0, 0.4);">
        <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
            <aside class="relative block h-16 lg:col-span-5 lg:h-full xl:col-span-6">
                <img
                    alt=""
                    src="../img/logo/login2.png"
                    class="absolute inset-0 h-full w-full object-cover"
                    style="border-radius: 20px;" />
            </aside>

            <main class="flex items-center justify-center px-1 py-1 sm:px-12 lg:col-span-7 lg:px-16 lg:py-1 xl:col-span-6">
                <div class="max-w-xl lg:max-w-3xl">
                    <h1 class="font-bold text-teal-800" style="font-size: 2.8rem;">
                        Login <span style="color: #c41212;">Customer</span>
                    </h1>

                    <p class="mt-2 leading-relaxed text-teal-700">
                        Sign in to access your account.
                    </p>

                    <!-- PHP Alerts for Email or Password Error -->
                    <?php
                    // Display error message with Tailwind CSS
                    if ($this->session->flashdata('error')) {
                        echo '<div class="mt-4 bg-red-100 text-red-800 text-sm p-3 rounded alert-dismissible" role="alert" id="alert-box">';
                        echo '<span>' . $this->session->flashdata('error') . '</span>';
                        echo '</div>';
                    }

                    // Display success message with Tailwind CSS
                    if ($this->session->flashdata('pesan')) {
                        echo '<div class="mt-4 bg-green-100 text-green-800 text-sm p-3 rounded alert-dismissible" role="alert" id="alert-box">';
                        echo '<span>' . $this->session->flashdata('pesan') . '</span>';
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
                        }, 3000); // 5000 milliseconds = 5 seconds
                    </script>

                    <form method="post" action="<?= base_url('pelanggan/login') ?>" class="mt-4 grid grid-cols-6 gap-6">
                        <div class="col-span-6 mt-3">
                            <label for="Email" class="block font-medium text-teal-700 mb-2" style="font-size: 1rem;"> Email </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-3 flex items-center text-teal-700">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input
                                    required
                                    type="email"
                                    id="Email"
                                    name="email"
                                    placeholder="Masukkan email anda"
                                    class="w-full pl-10 rounded-lg border-2 border-teal-700 bg-white py-2 text-gray-700 shadow-sm focus:border-red-500 focus:ring-1 focus:ring-teal-800" />
                            </div>
                        </div>

                        <div class="col-span-6 mt-2">
                            <label for="Password" class="block font-medium text-teal-700 mb-2" style="font-size: 1rem;"> Password </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-3 flex items-center text-teal-700">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input
                                    required
                                    type="password"
                                    id="Password"
                                    name="password"
                                    placeholder="Masukkan password anda"
                                    class="w-full pl-10 rounded-lg border-2 border-teal-700 bg-white py-2 text-gray-700 shadow-sm focus:border-red-500 focus:ring-1 focus:ring-teal-800" />
                            </div>
                        </div>

                        <div class="col-span-4 flex items-center">
                            <p class="mt-2 text-teal-700" style="font-size: 1rem;">
                                Belum punya akun?
                                <a href="<?= base_url('pelanggan/register') ?>" class="text-red-600 underline hover:underline">Daftar</a>.
                            </p>
                        </div>

                        <div class="col-span-6 sm:flex sm:items-center sm:gap-4">
                            <button type="submit" class="btn btn-login btn-block">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</section>