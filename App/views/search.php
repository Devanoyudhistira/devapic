<body class="flex flex-col">

    <div id="tagphoto" class="w-screen grid mt-4 grid-cols-2 md:grid-cols-4 -ml-3 gap-y-4">
        <a href=<?= MAINURL . "discovery/category/fanart" ?>>
        <figure class="figuretags after:content-['fanart'] group">
            <img src="<?= URLIMAGE ?>content/fanart.jpg" loading="lazy" class="rounded-2xl w-full h-full ml-4 object-cover object-center   
            duration-300  group-hover:scale-105 group-hover:rotate-[10deg] " alt="">
        </figure>
        </a>
        <a href=<?= MAINURL . "discovery/category/photography" ?>>
        <figure class="figuretags after:content-['photography'] group">
            <img src="<?= URLIMAGE ?>content/photograph.jpg" loading="lazy"
                class="rounded-2xl w-48 h-[138px] ml-4 object-cover object-center duration-300  group-hover:scale-105 group-hover:rotate-[10deg]"
                alt="">
        </figure>
        </a>
        <a href=<?= MAINURL . "discovery/category/ui" ?>>
        <figure class="figuretags after:content-['ui/ux'] group">
            <img src="<?= URLIMAGE ?>content/ui.png" loading="lazy"
                class="rounded-2xl w-48 h-[138px] ml-4 object-cover object-top duration-300  group-hover:scale-105 group-hover:rotate-[10deg]"
                alt="">
        </figure>
        </a>
        <a href=<?= MAINURL . "discovery/category/3d" ?>>
        <figure class="figuretags after:content-['3d-object'] group">
            <img src="<?= URLIMAGE ?>content/3.jpg" loading="lazy"
                class="rounded-2xl w-48 h-[138px] ml-4 object-cover object-center  duration-300 group-hover:scale-105 group-hover:rotate-[10deg]"
                alt="">
        </figure>
        </a>
        <a href=<?= MAINURL . "discovery/category/architecture" ?>>
        <figure class="figuretags after:content-['architecture'] group">
            <img src="<?= URLIMAGE ?>content/architecture.jpg" loading="lazy"
                class="rounded-2xl w-48 h-[138px] ml-4 object-cover object-center  duration-300 group-hover:scale-105 group-hover:rotate-[10deg]"
                alt="">
        </figure>
        </a>
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
            <a href="<?= MAINURL ?>profile/main/<?= $_SESSION['id'] ?>"> <i
                    class="fas fa-user duration-300 group-hover:text-black text-white text-2xl "></i> </a>
        </div>
    </footer>
    <script>
        const search = document.querySelector("#search")
            search.addEventListener("input",() => {
                console.log(search.value);
        })
    </script>
</body>

</html>