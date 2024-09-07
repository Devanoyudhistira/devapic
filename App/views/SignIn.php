<body class="flex h-[100vh] flex-col justify-center items-center">
    <form action="" method="post" class="flex justify-center flex-col"
        enctype="multipart/form-data">
        <h1 class="font-semibold font-inter text-xl text-center">sign in</h1>
        <label for="username" class="font-inter text-md">
            <h1>username</h1>
            <input type="text" autocomplete="off" class="border-green-500 outline-none focus:border-blue-400 border-2 rounded-xl"
                name="username" id="username">
        </label>
        <label for="username" class="font-inter text-md">
            <h1>password</h1>
            <input type="password" autocomplete="off" name="password"
                class="border-green-500 outline-none focus:border-blue-400 border-2 rounded-xl" id="password">
        </label>
        <button type="submit"
            class="px-2 p-1 rounded-md mt-2 font-inter text-xl border-black border-2" name="register" >register</button>
    </form>
    <h1 class="mt-2 text-lg font-inter text-red-600 font-bold" > <a href="<?=MAINURL ?>home/login">already sign up</a> </h1>
</body>

</html>