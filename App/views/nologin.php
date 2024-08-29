
<body class="grid h-screen place-content-center" >
    <div class="flex flex-col items-center lg:w-[70vh] w-[80vw] gap-2 px-2 py-4 shadow-[0px_2px_10px_black]" >
    <h1 class="capitalize text-md text-red-600 font-semibold">kamu belum login</h1>
    <div id="action" class="w-full gap-2 flex flex-col items-center" >
        <a class="w-full inline-block" href="<?= MAINURL ?>home/login"> <button class="w-full text-2xl font-bold capitalize rounded-md py-1 bg-green-400" >login</button> </a>
        <h1 class="text-lg text-red-600 font-semibold" > <a href="<?= MAINURL ?>home/signin">don't have an account?</a> </h1>
    </div>
    </div>
</body>

</html>