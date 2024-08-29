<body class=" overflow-x-hidden">
    <nav class="flex justify-between bg-green-400 py-2 w-screen items-center">
        <h1 class="font-bubblegum font-bold text-2xl ml-2 text-white ">devapic :D</h1>
        <div class=" bg-white flex items-center border-2 mr-6 w-10 overflow-hidden h-10 border-[solid_2px_black] rounded-full">
           <a href="<?= MAINURL ?>profile/main/<?php echo isset($_SESSION['id']) ? $_SESSION["id"] : 17 ?>"> <img width="25" height="20" class=" h-16 w-16 rounded-full object-cover object-center"
                src="<?= URLIMAGE . 'userprofile/profile/' . $data['profileimage'] ?>" alt=""> </a>
        </div>
    </nav>

    <main
        class="flex flex-col self-center rounded-t-2xl mb-10 w-[97vw] gap-2 mt-[52px] shadow-[5px_5px_12px_theme(colors.slate.950)] py-2">
        <section id="detail" class="flex justify-between ">
        <?php if ($data["rowcount"] > 0): ?>
            <h1 class="text-2xl font-inter ml-2 tracking-wider uppercase font-black"> <?= " $data[judul] ($data[rowcount])" ?> </h1>
        <?php endif ?>
        </section>
        <div id="imagecontainer"
            class=" grid grid-cols-2 px-4 md:grid-cols-3 lg:grid-cols-4 auto-cols-fr w-full gap-x-6">
            <?php foreach ($data["image"] as $image): ?>
                <figure id="imagewrap" class="imageitem group">
                    <img class="object-center" src="<?= URLIMAGE . $image['file'] ?>" alt="">
                    <figcaption
                        class="flex gap-3 duration-300 group-hover:translate-y-0 group-hover:opacity-100 -translate-y-11 opacity-0">
                        <img class="w-8 h-8 rounded-full object-center object-cover"
                            src="<?= URLIMAGE . "userprofile/profile/" . $image['profilephoto'] ?>" alt="">
                        <a href="<?= MAINURL ?>discovery/imagepost/<?= $image['imageid'] ?>" class="">
                            <p class="authorname">
                                <?= $image["name"] ?>
                            </p>
                        </a>
                    </figcaption>
                </figure>
            <?php endforeach; ?>
        </div>
        <?php if ($data["rowcount"] < 1): ?>
            <h1 class="capitalize text-3xl ml-2 font-semibold font-poppins" >no image found</h1>
        <?php endif ?>
    </main>

    <footer class=" fixed bottom-0 w-screen bg-green-400 gap-2 h-12 flex justify-between self-center">
        <div class="w-1/3 h-full flex justify-center items-center hover:bg-white hover:border-2 group duration-300">
            <a href="<?= MAINURL ?>discovery"> <i
                    class="fas fa-home duration-300 group-hover:text-black text-white text-2xl "></i> </a>
        </div>
        <div class="w-1/3 h-full flex justify-center items-center hover:bg-white hover:border-2 group duration-300">
            <a href="<?= MAINURL ?>search"> <i
                    class="fas fa-filter duration-300 group-hover:text-black text-white text-2xl "></i> </a>
        </div>
        <div class="w-1/3 h-full flex justify-center items-center hover:bg-white hover:border-2 group duration-300">
            <a href="<?= MAINURL ?>profile/main/<?php echo isset($_SESSION['id']) ? $_SESSION["id"] : 17 ?>"> <i
                    class="fas fa-user duration-300 group-hover:text-black text-white text-2xl "></i> </a>
        </div>
    </footer>
</body>