<body class="bg-white overflow-x-hidden ">
    <div id="container" class="flex flex-col w-screen h-auto overflow-x-hidden ">
        <figure id="coverpage" class="w-full">
            <img class="w-full h-40 object-center object-cover"
                src="<?= URLIMAGE . 'userprofile/cover/' . $data["coverphoto"] ?>" alt="">
            <div class="flex gap-2 relative items-center ml-4 mt-2">
                <img class="w-16 h-16 rounded-full object-center object-cover" src=<?= URLIMAGE . 'userprofile/profile/' . $data["profilephoto"] ?> alt="">
                <figcaption class=" font-inter ">
                    <h1 class="font-bold tracking-wider text-2xl -mb-1"> <?= $data["nama"]; ?> </h1>
                    <a href="<?= MAINURL . "home/logout" ?>">
                        <h2 class="font-semibold text-xl tracking-wide text-red-600">log out </h2>
                    </a>
                </figcaption>
                <i id="editbutton"
                    class="fas fa-edit cursor-pointer text-2xl text-green-400 -mt-5 absolute right-6"></i>
            </div>
        </figure>

        <div id="changephoto"
            class="flex scale-0 duration-200 flex-col items-center w-max h-max rounded-xl px-8 py-8 self-center bg-slate-50 border-green-300 border-2 fixed top-1/3 ">
            <button id="closeedit"
                class="font-black top-0 left-1 absolute self-end text-2xl justify-self-start mr-2 -mb-4">
                <i class="fas fa-close"></i>
            </button>
            <div class="flex flex-col gap-2 items-center scale-100">
                <h1 class="font-inter -mt-5 text-black text-xl font-bold">edit profile</h1>
                <button id="editprofile"
                    class="px-4 py-1 text-xl block font-inter font-semibold text-green-400 rounded-2xl bg-slate-100 border-green-400 border-2 ">profile
                    image</button>
                <button id="editcover"
                    class="px-4 py-1 text-xl font-inter block font-semibold text-green-400 rounded-2xl bg-slate-100 border-green-400 border-2 ">
                    cover image </button>
            </div>
            <p id="alert" class="text-red-600 font-poppins text-sm block w-[220px]">
                Alert:this feature is still at experimental state so maybe this is not gonna work perfectly like you
                expected
            </p>

            <form action="<?= MAINURL ?>profile/changeprofile/<?= $data['id'] ?>" method="post" id="changeprofile" enctype="multipart/form-data" class="hidden mt-3 flex-col gap-2 items-center">
                <label for="">
                    <h1 class="text-green-400 font-bold text-2xl font-inter tracking-wider">edit profile photo</h1>
                    <input type="file" name="changeprofile" class="font-inter font-semibold text-md mt-2" id="">
                </label>
                <button type="submit" class="block bg-slate-100 shadow-[1px_1px_5px_theme(colors.green.400)] border-2 border-green-400 px-5 py-2" > change </button>
            </form>

            <form action="<?= MAINURL ?>profile/changecover/<?= $data['id'] ?>" method="post" id="changecover" enctype="multipart/form-data" class="hidden mt-3 flex-col gap-2 items-center">
                <label for="" class="block">
                    <h1 class="text-green-400 font-bold text-2xl font-inter tracking-wider">edit cover photo</h1>
                    <input type="file" name="changecover" class="font-inter font-semibold text-md mt-2 " id="">
                </label>
                <button type="submit" class="block bg-slate-100 shadow-[1px_1px_5px_theme(colors.green.400)] border-2 border-green-400 px-5 py-2" > change </button>
            </form>
        </div>

        <form id="modal"
            class="self-center pl-2 scale-0 rounded-md flex duration-200 fixed top-1/4 gap-4 -ml-2 shadow-[5px_5px_10px_theme(colors.emerald.400)] flex-col bg-white border-2 border-emerald-300 w-[90vw] py-2"
            method="post" action="<?= MAINURL ?>profile/tambahimage/<?= $data['id'] ?>"enctype="multipart/form-data">
            <button id="close" class="font-black self-end text-2xl justify-self-start mr-2 -mb-4"> <i
                    class="fas fa-close"></i> </button>
            <h1 class="text-2xl font-inter -mt-2 font-bold justify-self-center">post data</h1>
            <label for="image">
                <span class="text-lg font-inter font-bold">choose image</span>
                <input type="file" name="image" id="image">
            </label>
            <label for="description">
                <span class="text-lg font-inter font-bold">description</span>
                <input type="textarea" name="description" id="">
            </label>
            <label for="">
                <span class="text-lg font-inter font-bold ">tags</span>
                <select class="bg-green-400" name="tags" id="tags">
                    <option value="ui/ux">Ui/Ux</option>
                    <option value="3d">3d Object</option>
                    <option value="fanart">Fanart</option>
                    <option value="architecture">Architecture</option>
                    <option value="photography">Photography</option>
                </select>
            </label>
            <button name="submitpost" type="submit"
                class="border-2 font-bold tracking-wide text-xl text-green-300 font-poppins border-green-400 px-16 rounded-lg py-2 justify-self-center self-center w-max">
                Post </button>
        </form>
        <article
            class="flex  flex-col mb-12 self-center justify-self-center rounded-t-2xl w-[97vw] gap-2 mt-2 shadow-[5px_5px_12px_theme(colors.slate.950)] py-2">
            <h1 class="text-xl font-inter ml-2 tracking-wider uppercase font-black">Your Post</h1>
            <div id="imagecontainer" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 auto-cols-fr w-full gap-y-6">
                <div id="post"
                    class="h-28 cursor-pointer ml-2 max-w-40 md:min-w-48 rounded-2xl border-2 border-dashed border-green-500 flex flex-col items-center justify-center ">
                    <button class=" px-4 text-2xl text-green-400 font-black font-inter ">Post</button>
                    <i class="fas fa-plus text-2xl "></i>
                </div>
                <?php foreach ($data["imagepost"] as $image): ?>
                    <figure id="imagewrap"
                        class="ml-4 mr-4 bg-white/0 h-min max-w-48 md:min-w-48 rounded-lg truncate duration-300 group">
                        <img class="object-center" src="<?= URLIMAGE . $image['file'] ?>" alt="">
                        <figcaption class="flex text-right items-center mb-2 justify-right">
                            <!-- <p class="authorname duration-300 "> <?= $image['deskripsi'] ?> </p> -->
                            <a href="<?= MAINURL . "profile/deleteimage/" . $image['imageid'] . "/" . $data["id"] ?>">
                                <h1 class="fas fa-trash-alt text-red-600 cursor-pointer mt-2 text-md"></h1>
                            </a>
                        </figcaption>
                    </figure>
                <?php endforeach; ?>
            </div>
        </article>
    </div>


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
            <a href="<?= MAINURL ?>profile"> <i
                    class="fas fa-user duration-300 group-hover:text-black text-white text-2xl "></i> </a>
        </div>
    </footer>

    <script>
        const closebutton = document.querySelector("#close");
        const form = document.querySelector("#modal");
        const post = document.querySelector("#post");
        const profile = document.querySelector("#changephoto");
        const editbutton = document.querySelector("#editbutton");
        const closeedit = document.querySelector("#closeedit");
        const editprofile = document.querySelector("#editprofile");
        const editcover = document.querySelector("#editcover");
        const changeprofile = document.querySelector("#changeprofile");
        const changecover = document.querySelector("#changecover");
        const alerttext = document.querySelector("#alert");
        // console.log(changeprofile);
        // console.log(changecover);

        editbutton.addEventListener("click", () => {
            profile.classList.replace("scale-0", "scale-100")
        })
        closeedit.addEventListener("click", () => {
            profile.classList.replace("scale-100", "scale-0")
            editprofile.classList.replace("hidden", "block")
            editcover.classList.replace("hidden", "block")
            changeprofile.classList.replace("flex", "hidden")
            changecover.classList.replace("flex", "hidden")
            alerttext.classList.replace("hidden", "block")
        })
        closebutton.addEventListener("click", (e) => {
            e.preventDefault();
            form.classList.replace("scale-100", "scale-0");
        })
        post.addEventListener("click", (e) => {
            form.classList.replace("scale-0", "scale-100");
        })

        editprofile.addEventListener("click", () => {
            editprofile.classList.replace("block", "hidden")
            editcover.classList.replace("block", "hidden")
            changeprofile.classList.replace("hidden", "flex")
            alerttext.classList.replace("block", "hidden")
        })
        editcover.addEventListener("click", () => {
            editprofile.classList.replace("block", "hidden")
            editcover.classList.replace("block", "hidden")
            changecover.classList.replace("hidden", "flex")
            alerttext.classList.replace("block", "hidden")
        })

    </script>
</body>

</html>