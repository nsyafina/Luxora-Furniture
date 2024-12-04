<!-- Begin Page Content -->
<div class="container mx-auto mt-5 mb-5 px-4">
    <!-- Flash Message -->
    <?php if ($this->session->flashdata('pesan')) : ?>
        <div class="bg-gradient-to-r from-green-400 to-green-600 text-white px-6 py-4 rounded-lg shadow-lg mb-6 max-w-3xl mx-auto flex items-center justify-between">
            <div class="flex items-center">
                <i class="fas fa-check-circle text-2xl mr-3"></i>
                <p><?= $this->session->flashdata('pesan'); ?></p>
            </div>
            <button type="button" class="text-white hover:text-gray-200 transition-all" aria-label="Close">
                <i class="fas fa-times"></i>
            </button>
        </div>
    <?php endif; ?>

    <!-- Profile Card -->
    <div class="relative max-w-5xl mx-auto text-white overflow-hidden p-6 md:p-12" style="border-radius: 15px; background: linear-gradient(129deg, rgba(242, 237, 219, 1) 0%, rgba(39, 122, 111, 1) 100%); 
    box-shadow: inset -5px -5px rgba(0, 0, 0, 0.4); border: 1px solid rgba(0, 0, 0, 0.4);">
        <!-- Background Geometric Shapes -->

        <!--<div class="absolute -top-10 right-1/3 w-16 h-16 rounded-lg rotate-45 opacity-100" style="background-color: #ebe6de; box-shadow: inset -5px -5px rgba(0, 0, 0, 0.7);"></div>-->

        <!-- Grid Layout -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 ml-3">
            <!-- Profile Picture -->
            <div class="flex flex-col items-center md:items-start">
                <div class="relative group" style="margin-left: 25px;">
                    <img
                        src="<?= base_url('img/profile/') . $pelanggan->foto; ?>"
                        alt="Foto Profil"
                        class="rounded-full border-7 elevation-5 border-indigo-500 shadow-lg w-48 h-48 object-cover transform group-hover:scale-105 transition duration-300">
                    <!-- Badge -->
                    <span class="absolute bottom-1 right-5 bg-gradient-to-tr from-yellow-800 via-yellow-500 to-yellow-800 text-white text-md font-semibold py-1 px-3 rounded-full shadow-md">
                        Luxora Member
                    </span>
                </div>
                <p class="mt-4 text-lg italic font-medium text-teal-800 text-center md:text-left">
                    "Your Satisfaction, Our Priority"
                </p>
                <a href="<?= base_url('pelanggan/edit'); ?>"
                    class="btn-edit-profil">
                    <i class="fas fa-user-edit mr-2"></i>Edit Profil
                </a>
            </div>

            <!-- Profile Details -->
            <div class="col-span-2">
                <h1 class="text-4xl font-extrabold mb-4 title-edit" style="text-align: left !important;"><span><i class="fa-solid fa-user"></i> My</span> Profile</h1>
                <div class="rounded-lg p-6" style="background-color: #F2EDDB; border: 1px solid rgba(11, 84, 75, 0.6);">
                    <p class="text-lg mb-2 text-teal-800" style="padding-bottom:5px; border-bottom: 1px solid black;">
                        <span class="font-bold">Nama :</span> <?= $pelanggan->nama_pelanggan; ?>
                    </p>
                    <p class="text-lg mb-2 text-teal-800" style="padding-bottom:5px; border-bottom: 1px solid black;">
                        <span class="font-bold">Email :</span> <?= $pelanggan->email; ?>
                    </p>
                    <p class="text-lg text-teal-800" style="padding-bottom:5px; ">
                        <span class="font-bold">Nomor Telpon :</span> <?= $pelanggan->no_telp; ?>
                    </p>
                </div>

                <!-- Edit Profile Button -->
                <div class="mt-6 flex gap-4">

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container -->