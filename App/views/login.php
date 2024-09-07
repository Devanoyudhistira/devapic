<body class="flex h-[100vh] justify-center items-center" >
    
<form action="" method="post" class="flex justify-center flex-col" >
    <h1 class="font-semibold font-inter text-xl text-center" >welcome back</h1>
    <label for="username" class="font-inter text-md">
        <h1>username</h1>
        <input type="text" autocomplete="off" class="border-green-500 outline-none focus:border-blue-400 border-2 rounded-xl" name="username" id="username">
    </label>
    <label for="password" class="font-inter text-md">
        <h1>password</h1>
        <input type="password" autocomplete="off" name="loginpassword" class="border-green-500 outline-none focus:border-blue-400 border-2 rounded-xl" id="password">
    </label>
    <h1 class="text-red-600 font-semibold"> <?= $_SESSION["validation"] ?> </h1>
    <button name="loginbutton" type="submit" class="px-2 p-1 rounded-md mt-2 font-inter text-xl border-black border-2" >
     login
    </button>
     <h1 class="text-md text-emerald-500 tracking-wide text-center font-semibold font-inter " > <a href="<?= MAINURL ?>home/signin">don't have an account ? </a></h1> 
</form>   
</body>
</html>

