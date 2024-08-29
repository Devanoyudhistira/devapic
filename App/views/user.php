<body class="bg-white overflow-x-hidden ">
    <nav
        class="flex justify-between border-b-2 border-b-green-500 bg-green-400 backdrop-blur-2xl  py-2 w-screen items-center">
        <h1 class="font-bubblegum font-bold text-2xl ml-2 text-white">devapic</h1>
        <div class=" bg-white border-2 mr-6 w-10 h-10 border-[solid_2px_black] rounded-full">
            <img width="25" height="20" class=" h-full w-full rounded-full object-cover object-center"
                src="<?= URLIMAGE . 'userprofile/profile/' . $data['profilephoto'] ?>" alt="">
        </div>
    </nav>
    <div id="container" class="flex flex-col w-screen h-auto overflow-x-hidden ">
        <figure id="coverpage" class="w-full">
            <img class="w-full h-40 object-center object-cover"
                src="<?= URLIMAGE . 'userprofile/cover/' . $data["coveruser"] ?>" alt="">
            <div class="flex gap-2 relative items-center ml-4 mt-2">
                <img class="w-16 h-16 rounded-full object-center object-cover" src=<?= URLIMAGE . 'userprofile/profile/' . $data["profileuser"] ?> alt="">
                <figcaption class=" font-inter ">
                    <h1 class="font-bold tracking-wider text-2xl -mb-1"> <?= $data["userprofile"]["name"] ?> </h1>
                </figcaption>
            </div>
        </figure>
        <div
            class="flex flex-col pb-2 mb-12 self-center justify-self-center rounded-t-2xl w-[97vw] gap-2 mt-2 shadow-[5px_5px_12px_theme(colors.slate.950)] py-2">
            <h1 class="text-xl font-inter ml-2 tracking-wider uppercase font-black">Post</h1>
            <div id="imagecontainer" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 auto-cols-fr w-full gap-y-6">
                <?php foreach ($data["imagepost"] as $image): ?>
                    <a href="<?= MAINURL . "discovery/imagepost/" . $image['imageid'] ?> ">
                    <figure id="imagewrap"
                        class="ml-4 mr-4 bg-white/0 h-min max-w-48 md:min-w-48 rounded-lg truncate duration-300 group">
                        <img class="object-center" src="<?= URLIMAGE . $image['file'] ?>" alt="">
                        <figcaption class="flex text-right items-center mb-2 justify-right">
                            <!-- <p class="authorname duration-300 "> <?= $image['deskripsi'] ?> </p> -->
                        </figcaption>
                    </figure>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>


    <footer class=" fixed bottom-0 w-screen bg-green-400 gap-2 h-12 flex justify-between self-center">
        <div class="w-1/3 h-full flex justify-center items-center hover:bg-white hover:border-2 group duration-300">
            <a href="<?= MAINURL ?>discovery"> <i
                    class="fas fa-home duration-300 group-hover:text-black text-white text-2xl "></i> </a>
        </div>
        <div class="w-1/3 h-full flex justify-center items-center hover:bg-white hover:border-2 group duration-300">
            <a href="<?= MAINURL ?>search"> <i
                    class="fas fa-search duration-300 group-hover:text-black text-white text-2xl "></i> </a>
        </div>
        <div class="w-1/3 h-full flex justify-center items-center hover:bg-white hover:border-2 group duration-300">
            <a href="<?= MAINURL ?>profile"> <i
                    class="fas fa-user duration-300 group-hover:text-black text-white text-2xl "></i> </a>
        </div>
    </footer>