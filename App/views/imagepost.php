<body class="flex items-center w-screen overflow-x-hidden flex-col">
    <nav class="flex justify-between bg-green-400 py-2 w-screen items-center">
        <h1 class="font-bubblegum font-bold text-2xl ml-2 text-white "> <a href="<?= MAINURL ?>">devapic :D</a></h1>
        <div class=" bg-white border-2 mr-6 w-10 h-10 border-[solid_2px_black] rounded-full">
            <img width="25" height="20" class=" h-full w-full rounded-full object-cover object-center"
                src="<?= URLIMAGE . 'userprofile/profile/' . $data['profileimage'] ?>" alt="">
        </div>
    </nav>
    <figure class="w-screen flex flex-col justify-center items-center box-border mt-2 py-2 px-2">
        <a href="<?= URLIMAGE . $data['postingan']['file'] ?> ">
            <img id="gambarpostingan" width="150" height="50"
                class="w-[85vw]  h-auto rounded-2xl object-contain object-center" loading="lazy"
                src="<?= URLIMAGE . $data['postingan']['file'] ?>" alt="">
        </a>
        <figcaption class="flex justify-between mt-4 items-center py-2 relative w-screen">
            <div id="interaction" class="flex gap-2 ml-2">
                <input type="checkbox" name="like" class="opacity-0 mt-2 w-10 absolute peer " id="like">
                <i
                    class="fa-solid fa-heart text-2xl peer-checked:text-red-600 peer-checked:outline-2 peer-checked:outline-black duration-300 text-black"></i>
                <h1> <i class="fa-solid fa-share mr-2 text-2xl text-black"></i> </h1>
            </div>
            <div id="profilepost" class="flex items-center -mr-36">
                <h1 class="text-xl font-inter font-bold tracking-wider"><a
                        href="<?= MAINURL ?>profile/user/<?= $data['userid'] ?> "> <?= $data['user'] ?> </h1>
                <img width="25" height="20" class="w-12 h-12 rounded-full object-cover object-center"
                    src="<?= URLIMAGE . 'userprofile/profile/' . $data['profilephoto'] ?>" alt="">
            </div>
        </figcaption>
        <div class="w-screen text-left h-32 font-poppins" >
             <span class="font-semibold text-lg" > @<?= $data['user'] ?></span> <p class="text-md " > <?=  $data["postingan"]['deskripsi'] ?> </p>
        </div>
    </figure>
    <br>
    <br>
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

</html>