<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('css/app.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('css/remixicon.css'); ?>">
    <script src="<?= base_url('js/darkMode.js'); ?>"></script>
</head>
<body class="bg-white dark:bg-gray-900">

    <div class="flex min-h-full flex-col justify-center mt-8 px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="<?= base_url('assets/img/CILogo.png'); ?>" alt="Logo">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-black dark:text-white">Sign in to your account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" method="post" action="<?php echo site_url('login/process'); ?>">
                <div>
                    <label for="username" class="block text-sm font-medium leading-6 text-gray-600 dark:text-gray-300">Username</label>
                    <div class="mt-2 relative w-full min-w-[200px] h-10">
                        <input type="text" id="username" name="username" placeholder="" class="peer w-full h-full bg-transparent text-blue-gray-700 dark:text-gray-300 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-2.5 rounded-[7px] border-blue-gray-200 focus:border-rose-600" />
                        <label class="flex w-full h-full select-none pointer-events-none absolute left-0 font-normal !overflow-visible truncate peer-placeholder-shown:text-blue-gray-500 leading-tight peer-focus:leading-tight peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500 transition-all -top-1.5 peer-placeholder-shown:text-sm text-[11px] peer-focus:text-[11px] before:content[' '] before:block before:box-border before:w-2.5 before:h-1.5 before:mt-[6.5px] before:mr-1 peer-placeholder-shown:before:border-transparent before:rounded-tl-md before:border-t peer-focus:before:border-t-2 before:border-l peer-focus:before:border-l-2 before:pointer-events-none before:transition-all peer-disabled:before:border-transparent after:content[' '] after:block after:flex-grow after:box-border after:w-2.5 after:h-1.5 after:mt-[6.5px] after:ml-1 peer-placeholder-shown:after:border-transparent after:rounded-tr-md after:border-t peer-focus:after:border-t-2 after:border-r peer-focus:after:border-r-2 after:pointer-events-none after:transition-all peer-disabled:after:border-transparent peer-placeholder-shown:leading-[3.75] text-gray-500 peer-focus:text-rose-600 before:border-blue-gray-200 peer-focus:before:!border-rose-600 after:border-blue-gray-200 peer-focus:after:!border-rose-600">
                            Enter your username
                        </label>
                    </div>
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-600 dark:text-gray-300">Password</label>
                    <div class="mt-2 relative w-full min-w-[200px] h-10">
                        <input type="password" id="password" name="password" placeholder="" class="peer w-full h-full bg-transparent text-blue-gray-700 dark:text-gray-300 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-2.5 rounded-[7px] border-blue-gray-200 focus:border-rose-600" />
                        <label class="flex w-full h-full select-none pointer-events-none absolute left-0 font-normal !overflow-visible truncate peer-placeholder-shown:text-blue-gray-500 leading-tight peer-focus:leading-tight peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500 transition-all -top-1.5 peer-placeholder-shown:text-sm text-[11px] peer-focus:text-[11px] before:content[' '] before:block before:box-border before:w-2.5 before:h-1.5 before:mt-[6.5px] before:mr-1 peer-placeholder-shown:before:border-transparent before:rounded-tl-md before:border-t peer-focus:before:border-t-2 before:border-l peer-focus:before:border-l-2 before:pointer-events-none before:transition-all peer-disabled:before:border-transparent after:content[' '] after:block after:flex-grow after:box-border after:w-2.5 after:h-1.5 after:mt-[6.5px] after:ml-1 peer-placeholder-shown:after:border-transparent after:rounded-tr-md after:border-t peer-focus:after:border-t-2 after:border-r peer-focus:after:border-r-2 after:pointer-events-none after:transition-all peer-disabled:after:border-transparent peer-placeholder-shown:leading-[3.75] text-gray-500 peer-focus:text-rose-600 before:border-blue-gray-200 peer-focus:before:!border-rose-600 after:border-blue-gray-200 peer-focus:after:!border-rose-600">
                            Enter your password
                        </label>
                    </div>
                    <div class="flex justify-end">
                        <div class="text-sm">
                            <div class="inline-flex items-center">
                                <label class="font-semibold text-rose-500 cursor-pointer select-none" htmlFor="ripple-on">Show Password</label>
                                <label class="relative flex items-center py-3 ml-3 rounded-full cursor-pointer" htmlFor="ripple-on" data-ripple-dark="true">
                                    <input id="show-password" type="checkbox" class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-rose-600 checked:bg-rose-600 checked:before:bg-rose-600 hover:before:opacity-10" onchange="togglePasswordVisibility()"/>
                                    <span class="absolute text-white transition-opacity opacity-0 pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100">
                                        <i class="ri-check-line"></i>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-rose-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-rose-700">
                        Sign in
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
<script>
    const togglePasswordVisibility = () => {
        const passwordInput = document.getElementById('password');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
    }
</script>

</html>