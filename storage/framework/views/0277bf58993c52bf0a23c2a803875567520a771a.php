<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title><?php if($__env->yieldContent('Title') == ''): ?>Cloud-Gatepass <?php else: ?> <?php echo $__env->yieldContent('Title'); ?> <?php endif; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" type="image/x-icon" href="<?php echo e(asset('assets/images/icon.png')); ?>" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo e(asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')); ?>">
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo e(asset('assets/css/perfect-scrollbar.min.css')); ?>" />
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo e(asset('assets/css/style.css')); ?>" />
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
        <link defer rel="stylesheet" type="text/css" media="screen" href="<?php echo e(asset('assets/css/animate.css')); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/nice-select2.css')); ?>" />

        <script src="<?php echo e(asset('assets/js/perfect-scrollbar.min.js')); ?>"></script>
        <script defer src="<?php echo e(asset('assets/js/popper.min.js')); ?>"></script>
        <script defer src="<?php echo e(asset('assets/js/tippy-bundle.umd.min.js')); ?>"></script>
        <script defer src="<?php echo e(asset('assets/js/sweetalert.min.js')); ?>"></script>

        <link rel="stylesheet" href="<?php echo e(asset('assets/css/flatpickr.min.css')); ?>" />
        <!-- jQuery -->
        <script src="<?php echo e(asset('plugins/jquery/jquery.min.js')); ?>"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="<?php echo e(asset('plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>

        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>



    </head>
   <style type="text/css">
  /* CSS for a sticky button */

  .sticky-button {
    position: fixed;
    background-color: #2596be;
    bottom: 60px;
    right: 20px;
    border-radius: 110px;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.1);
    z-index: 20;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 55px;
    height: 55px;
    transition: all 0.2s ease-out; /* Simplified vendor prefix */
  }

  .sticky-button:hover {
    width: 120px; /* Adjust the expanded width as needed */
  }

  .sticky-button svg {
    margin: auto;
    fill: #fff;
    width: 35px;
    height: 35px;
  }

   .sticky-button a,
  .sticky-button label {
    cursor: pointer;
    display: flex;
    align-items: center;
    width: 29px;
    height: 45px;
    transition: all 0.3s ease-out; /* Simplified vendor prefix */
  }


  .sticky-button label svg.close-icon {
    display: none;
  }

  .sticky-button span {
    display: none;
    color: white;
    font-size: 12px; /* Adjust font size as needed */
    margin-left: 10px; /* Adjust spacing as needed */
  }

  .sticky-button:hover span {
    display: inline; /* Show name on hover */
  }
  .btn-left{
    margin-left: auto;
  }
</style>

    <body
        x-data="main"
        class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased"
        :class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ?  'dark' : '', $store.app.menu, $store.app.layout,$store.app.rtlClass]"
    >
        <!-- All type error msg -->
        <section class="container">
            <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success" style="margin-left: 70%; display:none;">
               <p id="success"><?php echo e($message); ?></p>
            </div>
            <?php endif; ?> 
            <?php if($message = Session::get('danger')): ?>
               <div class="alert alert-danger" style="margin-left: 70%; display:none;">
                  <p id="danger"><?php echo e($message); ?></p>
               </div>
            <?php endif; ?> 
            <?php if($errors->any()): ?>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="alert alert-danger" style="margin-left: 70%; display:none;">
                <p id="error"><?php echo e($error); ?></p>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </section>
        <!-- sidebar menu overlay -->
        <div x-cloak class="fixed inset-0 z-50 bg-[black]/60 lg:hidden" :class="{'hidden' : !$store.app.sidebar}" @click="$store.app.toggleSidebar()"></div>

        <!-- screen loader -->
        <div class="screen_loader animate__animated fixed inset-0 z-[60] grid place-content-center bg-[#fafafa] dark:bg-[#060818]">
            <svg width="64" height="64" viewBox="0 0 135 135" xmlns="http://www.w3.org/2000/svg" fill="#4361ee">
                <path
                    d="M67.447 58c5.523 0 10-4.477 10-10s-4.477-10-10-10-10 4.477-10 10 4.477 10 10 10zm9.448 9.447c0 5.523 4.477 10 10 10 5.522 0 10-4.477 10-10s-4.478-10-10-10c-5.523 0-10 4.477-10 10zm-9.448 9.448c-5.523 0-10 4.477-10 10 0 5.522 4.477 10 10 10s10-4.478 10-10c0-5.523-4.477-10-10-10zM58 67.447c0-5.523-4.477-10-10-10s-10 4.477-10 10 4.477 10 10 10 10-4.477 10-10z"
                >
                    <animateTransform attributeName="transform" type="rotate" from="0 67 67" to="-360 67 67" dur="2.5s" repeatCount="indefinite" />
                </path>
                <path
                    d="M28.19 40.31c6.627 0 12-5.374 12-12 0-6.628-5.373-12-12-12-6.628 0-12 5.372-12 12 0 6.626 5.372 12 12 12zm30.72-19.825c4.686 4.687 12.284 4.687 16.97 0 4.686-4.686 4.686-12.284 0-16.97-4.686-4.687-12.284-4.687-16.97 0-4.687 4.686-4.687 12.284 0 16.97zm35.74 7.705c0 6.627 5.37 12 12 12 6.626 0 12-5.373 12-12 0-6.628-5.374-12-12-12-6.63 0-12 5.372-12 12zm19.822 30.72c-4.686 4.686-4.686 12.284 0 16.97 4.687 4.686 12.285 4.686 16.97 0 4.687-4.686 4.687-12.284 0-16.97-4.685-4.687-12.283-4.687-16.97 0zm-7.704 35.74c-6.627 0-12 5.37-12 12 0 6.626 5.373 12 12 12s12-5.374 12-12c0-6.63-5.373-12-12-12zm-30.72 19.822c-4.686-4.686-12.284-4.686-16.97 0-4.686 4.687-4.686 12.285 0 16.97 4.686 4.687 12.284 4.687 16.97 0 4.687-4.685 4.687-12.283 0-16.97zm-35.74-7.704c0-6.627-5.372-12-12-12-6.626 0-12 5.373-12 12s5.374 12 12 12c6.628 0 12-5.373 12-12zm-19.823-30.72c4.687-4.686 4.687-12.284 0-16.97-4.686-4.686-12.284-4.686-16.97 0-4.687 4.686-4.687 12.284 0 16.97 4.686 4.687 12.284 4.687 16.97 0z"
                >
                    <animateTransform attributeName="transform" type="rotate" from="0 67 67" to="360 67 67" dur="8s" repeatCount="indefinite" />
                </path>
            </svg>
        </div>

        <!-- scroll to top button -->
        <div class="fixed bottom-6 z-50 ltr:right-6 rtl:left-6" x-data="scrollToTop">
            <template x-if="showTopButton">
                <button
                    type="button"
                    class="btn btn-outline-primary animate-pulse rounded-full bg-[#fafafa] p-2 dark:bg-[#060818] dark:hover:bg-primary"
                    @click="goToTop"
                >
                    <svg width="24" height="24" class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            opacity="0.5"
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M12 20.75C12.4142 20.75 12.75 20.4142 12.75 20L12.75 10.75L11.25 10.75L11.25 20C11.25 20.4142 11.5858 20.75 12 20.75Z"
                            fill="currentColor"
                        />
                        <path
                            d="M6.00002 10.75C5.69667 10.75 5.4232 10.5673 5.30711 10.287C5.19103 10.0068 5.25519 9.68417 5.46969 9.46967L11.4697 3.46967C11.6103 3.32902 11.8011 3.25 12 3.25C12.1989 3.25 12.3897 3.32902 12.5304 3.46967L18.5304 9.46967C18.7449 9.68417 18.809 10.0068 18.6929 10.287C18.5768 10.5673 18.3034 10.75 18 10.75L6.00002 10.75Z"
                            fill="currentColor"
                        />
                    </svg>
                </button>
            </template>
        </div>

        <!-- start theme customizer section -->
        <div x-data="customizer">
            <div
                class="fixed inset-0 z-[51] hidden bg-[black]/60 px-4 transition-[display]"
                :class="{'!block': showCustomizer}"
                @click="showCustomizer = false"
            ></div>

            <nav
                class="fixed bottom-0 top-0 z-[51] w-full max-w-[400px] bg-white p-4 shadow-[5px_0_25px_0_rgba(94,92,154,0.1)] transition-[right] duration-300 ltr:-right-[400px] rtl:-left-[400px] dark:bg-[#0e1726]"
                :class="{'ltr:!right-0 rtl:!left-0' : showCustomizer}"
            >
                <a
                    href="javascript:;"
                    class="absolute bottom-0 top-0 my-auto flex h-10 w-12 cursor-pointer items-center justify-center bg-primary text-white ltr:-left-12 ltr:rounded-bl-full ltr:rounded-tl-full rtl:-right-12 rtl:rounded-br-full rtl:rounded-tr-full"
                    @click="showCustomizer = !showCustomizer"
                >
                    <svg
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 animate-[spin_3s_linear_infinite]"
                    >
                        <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.5" />
                        <path
                            opacity="0.5"
                            d="M13.7654 2.15224C13.3978 2 12.9319 2 12 2C11.0681 2 10.6022 2 10.2346 2.15224C9.74457 2.35523 9.35522 2.74458 9.15223 3.23463C9.05957 3.45834 9.0233 3.7185 9.00911 4.09799C8.98826 4.65568 8.70226 5.17189 8.21894 5.45093C7.73564 5.72996 7.14559 5.71954 6.65219 5.45876C6.31645 5.2813 6.07301 5.18262 5.83294 5.15102C5.30704 5.08178 4.77518 5.22429 4.35436 5.5472C4.03874 5.78938 3.80577 6.1929 3.33983 6.99993C2.87389 7.80697 2.64092 8.21048 2.58899 8.60491C2.51976 9.1308 2.66227 9.66266 2.98518 10.0835C3.13256 10.2756 3.3397 10.437 3.66119 10.639C4.1338 10.936 4.43789 11.4419 4.43786 12C4.43783 12.5581 4.13375 13.0639 3.66118 13.3608C3.33965 13.5629 3.13248 13.7244 2.98508 13.9165C2.66217 14.3373 2.51966 14.8691 2.5889 15.395C2.64082 15.7894 2.87379 16.193 3.33973 17C3.80568 17.807 4.03865 18.2106 4.35426 18.4527C4.77508 18.7756 5.30694 18.9181 5.83284 18.8489C6.07289 18.8173 6.31632 18.7186 6.65204 18.5412C7.14547 18.2804 7.73556 18.27 8.2189 18.549C8.70224 18.8281 8.98826 19.3443 9.00911 19.9021C9.02331 20.2815 9.05957 20.5417 9.15223 20.7654C9.35522 21.2554 9.74457 21.6448 10.2346 21.8478C10.6022 22 11.0681 22 12 22C12.9319 22 13.3978 22 13.7654 21.8478C14.2554 21.6448 14.6448 21.2554 14.8477 20.7654C14.9404 20.5417 14.9767 20.2815 14.9909 19.902C15.0117 19.3443 15.2977 18.8281 15.781 18.549C16.2643 18.2699 16.8544 18.2804 17.3479 18.5412C17.6836 18.7186 17.927 18.8172 18.167 18.8488C18.6929 18.9181 19.2248 18.7756 19.6456 18.4527C19.9612 18.2105 20.1942 17.807 20.6601 16.9999C21.1261 16.1929 21.3591 15.7894 21.411 15.395C21.4802 14.8691 21.3377 14.3372 21.0148 13.9164C20.8674 13.7243 20.6602 13.5628 20.3387 13.3608C19.8662 13.0639 19.5621 12.558 19.5621 11.9999C19.5621 11.4418 19.8662 10.9361 20.3387 10.6392C20.6603 10.4371 20.8675 10.2757 21.0149 10.0835C21.3378 9.66273 21.4803 9.13087 21.4111 8.60497C21.3592 8.21055 21.1262 7.80703 20.6602 7C20.1943 6.19297 19.9613 5.78945 19.6457 5.54727C19.2249 5.22436 18.693 5.08185 18.1671 5.15109C17.9271 5.18269 17.6837 5.28136 17.3479 5.4588C16.8545 5.71959 16.2644 5.73002 15.7811 5.45096C15.2977 5.17191 15.0117 4.65566 14.9909 4.09794C14.9767 3.71848 14.9404 3.45833 14.8477 3.23463C14.6448 2.74458 14.2554 2.35523 13.7654 2.15224Z"
                            stroke="currentColor"
                            stroke-width="1.5"
                        />
                    </svg>
                </a>
                <div class="perfect-scrollbar h-full overflow-y-auto overflow-x-hidden">
                    <div class="relative pb-5 text-center">
                        <a
                            href="javascript:;"
                            class="absolute top-0 opacity-30 hover:opacity-100 ltr:right-0 rtl:left-0 dark:text-white"
                            @click="showCustomizer = false"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24px"
                                height="24px"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.5"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="h-5 w-5"
                            >
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </a>
                        <h4 class="mb-1 dark:text-white">TEMPLATE CUSTOMIZER</h4>
                        <p class="text-white-dark">Set preferences that will be cookied for your live preview demonstration.</p>
                    </div>
                    <div class="mb-3 rounded-md border border-dashed border-[#e0e6ed] p-3 dark:border-[#1b2e4b]">
                        <h5 class="mb-1 text-base leading-none dark:text-white">Color Scheme</h5>
                        <p class="text-xs text-white-dark">Overall light or dark presentation.</p>
                        <div class="mt-3 grid grid-cols-3 gap-2">
                            <button
                                type="button"
                                class="btn"
                                :class="[$store.app.theme === 'light' ? 'btn-primary' :'btn-outline-primary']"
                                @click="$store.app.toggleTheme('light')"
                            >
                                <svg
                                    width="20"
                                    height="20"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2"
                                >
                                    <circle cx="12" cy="12" r="5" stroke="currentColor" stroke-width="1.5"></circle>
                                    <path d="M12 2V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    <path d="M12 20V22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    <path d="M4 12L2 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    <path d="M22 12L20 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    <path
                                        opacity="0.5"
                                        d="M19.7778 4.22266L17.5558 6.25424"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                    ></path>
                                    <path
                                        opacity="0.5"
                                        d="M4.22217 4.22266L6.44418 6.25424"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                    ></path>
                                    <path
                                        opacity="0.5"
                                        d="M6.44434 17.5557L4.22211 19.7779"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                    ></path>
                                    <path
                                        opacity="0.5"
                                        d="M19.7778 19.7773L17.5558 17.5551"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                    ></path>
                                </svg>
                                Light
                            </button>
                            <button
                                type="button"
                                class="btn"
                                :class="[$store.app.theme === 'dark' ? 'btn-primary' :'btn-outline-primary']"
                                @click="$store.app.toggleTheme('dark')"
                            >
                                <svg
                                    width="20"
                                    height="20"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2"
                                >
                                    <path
                                        d="M21.0672 11.8568L20.4253 11.469L21.0672 11.8568ZM12.1432 2.93276L11.7553 2.29085V2.29085L12.1432 2.93276ZM21.25 12C21.25 17.1086 17.1086 21.25 12 21.25V22.75C17.9371 22.75 22.75 17.9371 22.75 12H21.25ZM12 21.25C6.89137 21.25 2.75 17.1086 2.75 12H1.25C1.25 17.9371 6.06294 22.75 12 22.75V21.25ZM2.75 12C2.75 6.89137 6.89137 2.75 12 2.75V1.25C6.06294 1.25 1.25 6.06294 1.25 12H2.75ZM15.5 14.25C12.3244 14.25 9.75 11.6756 9.75 8.5H8.25C8.25 12.5041 11.4959 15.75 15.5 15.75V14.25ZM20.4253 11.469C19.4172 13.1373 17.5882 14.25 15.5 14.25V15.75C18.1349 15.75 20.4407 14.3439 21.7092 12.2447L20.4253 11.469ZM9.75 8.5C9.75 6.41182 10.8627 4.5828 12.531 3.57467L11.7553 2.29085C9.65609 3.5593 8.25 5.86509 8.25 8.5H9.75ZM12 2.75C11.9115 2.75 11.8077 2.71008 11.7324 2.63168C11.6686 2.56527 11.6538 2.50244 11.6503 2.47703C11.6461 2.44587 11.6482 2.35557 11.7553 2.29085L12.531 3.57467C13.0342 3.27065 13.196 2.71398 13.1368 2.27627C13.0754 1.82126 12.7166 1.25 12 1.25V2.75ZM21.7092 12.2447C21.6444 12.3518 21.5541 12.3539 21.523 12.3497C21.4976 12.3462 21.4347 12.3314 21.3683 12.2676C21.2899 12.1923 21.25 12.0885 21.25 12H22.75C22.75 11.2834 22.1787 10.9246 21.7237 10.8632C21.286 10.804 20.7293 10.9658 20.4253 11.469L21.7092 12.2447Z"
                                        fill="currentColor"
                                    ></path>
                                </svg>
                                Dark
                            </button>
                            <button
                                type="button"
                                class="btn"
                                :class="[$store.app.theme === 'system' ? 'btn-primary' :'btn-outline-primary']"
                                @click="$store.app.toggleTheme('system')"
                            >
                                <svg
                                    width="20"
                                    height="20"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2"
                                >
                                    <path
                                        d="M3 9C3 6.17157 3 4.75736 3.87868 3.87868C4.75736 3 6.17157 3 9 3H15C17.8284 3 19.2426 3 20.1213 3.87868C21 4.75736 21 6.17157 21 9V14C21 15.8856 21 16.8284 20.4142 17.4142C19.8284 18 18.8856 18 17 18H7C5.11438 18 4.17157 18 3.58579 17.4142C3 16.8284 3 15.8856 3 14V9Z"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                    ></path>
                                    <path opacity="0.5" d="M22 21H2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    <path opacity="0.5" d="M15 15H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                </svg>
                                System
                            </button>
                        </div>
                    </div>

                    <div class="mb-3 rounded-md border border-dashed border-[#e0e6ed] p-3 dark:border-[#1b2e4b]">
                        <h5 class="mb-1 text-base leading-none dark:text-white">Navigation Position</h5>
                        <p class="text-xs text-white-dark">Select the primary navigation paradigm for your app.</p>
                        <div class="mt-3 grid grid-cols-3 gap-2">
                            <button
                                type="button"
                                class="btn"
                                :class="[$store.app.menu === 'horizontal' ? 'btn-primary' :'btn-outline-primary']"
                                @click="$store.app.toggleMenu('horizontal')"
                            >
                                Horizontal
                            </button>
                            <button
                                type="button"
                                class="btn"
                                :class="[$store.app.menu === 'vertical' ? 'btn-primary' :'btn-outline-primary']"
                                @click="$store.app.toggleMenu('vertical')"
                            >
                                Vertical
                            </button>
                            <button
                                type="button"
                                class="btn"
                                :class="[$store.app.menu === 'collapsible-vertical' ? 'btn-primary' :'btn-outline-primary']"
                                @click="$store.app.toggleMenu('collapsible-vertical')"
                            >
                                Collapsible
                            </button>
                        </div>
                        <div class="mt-5 text-primary">
                            <label class="mb-0 inline-flex">
                                <input
                                    x-model="$store.app.semidark"
                                    type="checkbox"
                                    :value="true"
                                    class="form-checkbox"
                                    @change="$store.app.toggleSemidark()"
                                />
                                <span>Semi Dark (Sidebar & Header)</span>
                            </label>
                        </div>
                    </div>
                    <div class="mb-3 rounded-md border border-dashed border-[#e0e6ed] p-3 dark:border-[#1b2e4b]">
                        <h5 class="mb-1 text-base leading-none dark:text-white">Layout Style</h5>
                        <p class="text-xs text-white-dark">Select the primary layout style for your app.</p>
                        <div class="mt-3 flex gap-2">
                            <button
                                type="button"
                                class="btn flex-auto"
                                :class="[$store.app.layout === 'boxed-layout' ? 'btn-primary' :'btn-outline-primary']"
                                @click="$store.app.toggleLayout('boxed-layout')"
                            >
                                Box
                            </button>
                            <button
                                type="button"
                                class="btn flex-auto"
                                :class="[$store.app.layout === 'full' ? 'btn-primary' :'btn-outline-primary']"
                                @click="$store.app.toggleLayout('full')"
                            >
                                Full
                            </button>
                        </div>
                    </div>
                    <div class="mb-3 rounded-md border border-dashed border-[#e0e6ed] p-3 dark:border-[#1b2e4b]">
                        <h5 class="mb-1 text-base leading-none dark:text-white">Direction</h5>
                        <p class="text-xs text-white-dark">Select the direction for your app.</p>
                        <div class="mt-3 flex gap-2">
                            <button
                                type="button"
                                class="btn flex-auto"
                                :class="[$store.app.rtlClass === 'ltr' ? 'btn-primary' :'btn-outline-primary']"
                                @click="$store.app.toggleRTL('ltr')"
                            >
                                LTR
                            </button>
                            <button
                                type="button"
                                class="btn flex-auto"
                                :class="[$store.app.rtlClass === 'rtl' ? 'btn-primary' :'btn-outline-primary']"
                                @click="$store.app.toggleRTL('rtl')"
                            >
                                RTL
                            </button>
                        </div>
                    </div>

                    <div class="mb-3 rounded-md border border-dashed border-[#e0e6ed] p-3 dark:border-[#1b2e4b]">
                        <h5 class="mb-1 text-base leading-none dark:text-white">Navbar Type</h5>
                        <p class="text-xs text-white-dark">Sticky or Floating.</p>
                        <div class="mt-3 flex items-center gap-3 text-primary">
                            <label class="mb-0 inline-flex">
                                <input x-model="$store.app.navbar" type="radio" value="navbar-sticky" class="form-radio" @change="$store.app.toggleNavbar()" />
                                <span>Sticky</span>
                            </label>
                            <label class="mb-0 inline-flex">
                                <input
                                    x-model="$store.app.navbar"
                                    type="radio"
                                    value="navbar-floating"
                                    class="form-radio"
                                    @change="$store.app.toggleNavbar()"
                                />
                                <span>Floating</span>
                            </label>
                            <label class="mb-0 inline-flex">
                                <input x-model="$store.app.navbar" type="radio" value="navbar-static" class="form-radio" @change="$store.app.toggleNavbar()" />
                                <span>Static</span>
                            </label>
                        </div>
                    </div>

                    <div class="mb-3 rounded-md border border-dashed border-[#e0e6ed] p-3 dark:border-[#1b2e4b]">
                        <h5 class="mb-1 text-base leading-none dark:text-white">Router Transition</h5>
                        <p class="text-xs text-white-dark">Animation of main content.</p>
                        <div class="mt-3">
                            <select x-model="$store.app.animation" class="form-select border-primary text-primary" @change="$store.app.toggleAnimation()">
                                <option value="">None</option>
                                <option value="animate__fadeIn">Fade</option>
                                <option value="animate__fadeInDown">Fade Down</option>
                                <option value="animate__fadeInUp">Fade Up</option>
                                <option value="animate__fadeInLeft">Fade Left</option>
                                <option value="animate__fadeInRight">Fade Right</option>
                                <option value="animate__slideInDown">Slide Down</option>
                                <option value="animate__slideInLeft">Slide Left</option>
                                <option value="animate__slideInRight">Slide Right</option>
                                <option value="animate__zoomIn">Zoom In</option>
                            </select>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- end theme customizer section -->

        <div class="main-container min-h-screen text-black dark:text-white-dark" :class="[$store.app.navbar]">
            <!-- start sidebar section -->
            <div :class="{'dark text-white-dark' : $store.app.semidark}">
                <nav
                    x-data="sidebar"
                    class="sidebar fixed bottom-0 top-0 z-50 h-full min-h-screen w-[260px] shadow-[5px_0_25px_0_rgba(94,92,154,0.1)] transition-all duration-300"
                >
                    <div class="h-full bg-white dark:bg-[#0e1726]">
                        <div class="flex items-center justify-between px-4 py-3">
                            <a href="index.html" class="main-logo flex shrink-0 items-center">
                                <img class="ml-[5px] w-8 flex-none" src="<?php echo e(asset('assets/images/icon.png')); ?>" alt="image" />
                                <span style="Color:#196876" class="align-middle text-xl font-semibold ltr:ml-1.5 rtl:mr-1.5 dark:text-white-light lg:inline">ENDEL DIGITAL</span>
                            </a>
                            <a
                                href="javascript:;"
                                class="collapse-icon flex h-8 w-8 items-center rounded-full transition duration-300 hover:bg-gray-500/10 rtl:rotate-180 dark:text-white-light dark:hover:bg-dark-light/10"
                                @click="$store.app.toggleSidebar()"
                            >
                                <svg class="m-auto h-5 w-5" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        opacity="0.5"
                                        d="M16.9998 19L10.9998 12L16.9998 5"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </a>
                        </div>
                        <ul
                            class="perfect-scrollbar relative h-[calc(100vh-80px)] space-y-0.5 overflow-y-auto overflow-x-hidden p-4 py-0 font-semibold"
                            x-data="{ activeDropdown: 'dashboard' }"
                        >
                            <li class="menu nav-item">
                                <a href="<?php echo e(route('home')); ?>" 
                                    type="button"
                                    class="nav-link group"
                                    :class="{'active' : activeDropdown === 'dashboard'}"
                                    @click="activeDropdown === 'dashboard' ? activeDropdown = null : activeDropdown = 'dashboard'"
                                >
                                    <div class="flex items-center">
                                        <svg
                                            class="shrink-0 group-hover:!text-primary"
                                            width="20"
                                            height="20"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                opacity="0.5"
                                                d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z"
                                                fill="currentColor"
                                            />
                                            <path
                                                d="M9 17.25C8.58579 17.25 8.25 17.5858 8.25 18C8.25 18.4142 8.58579 18.75 9 18.75H15C15.4142 18.75 15.75 18.4142 15.75 18C15.75 17.5858 15.4142 17.25 15 17.25H9Z"
                                                fill="currentColor"
                                            />
                                        </svg>

                                        <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Dashboard</span>
                                    </div>
                                    <!-- <div class="rtl:rotate-180" :class="{'!rotate-90' : activeDropdown === 'dashboard'}">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div> -->
                                </a>
                              <!--   <ul x-cloak x-show="activeDropdown === 'dashboard'" x-collapse class="sub-menu text-gray-500">
                                    <li>
                                        <a href="index.html">Sales</a>
                                    </li>
                                    <li>
                                        <a href="analytics.html">Analytics</a>
                                    </li>
                                    <li>
                                        <a href="finance.html" class="active">Finance</a>
                                    </li>
                                    <li>
                                        <a href="crypto.html">Crypto</a>
                                    </li>
                                </ul> -->
                            </li>
                             <li class="menu nav-item">
                                <a  href="<?php echo e(route('gatepass.index')); ?>" 
                                    type="button"
                                    class="nav-link group"
                                    :class="{'active' : activeDropdown === 'Gate'}"
                                    @click="activeDropdown === 'Gate' ? activeDropdown = null : activeDropdown = 'Gate'"
                                >
                                    <div class="flex items-center">
                                       
                                       <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                                         width="512.000000pt" height="512.000000pt" viewBox="0 0 512.000000 512.000000"
                                         preserveAspectRatio="xMidYMid meet">

                                        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                        fill="#000000" stroke="none">
                                        <path d="M3930 5109 c-14 -5 -638 -622 -1387 -1371 l-1361 -1361 -64 18 c-90
                                        26 -245 31 -338 11 -305 -65 -529 -339 -530 -649 0 -59 3 -71 25 -92 30 -31
                                        69 -32 99 -2 19 19 24 37 29 112 10 154 59 259 168 359 68 64 157 109 246 126
                                        62 12 217 10 230 -4 4 -4 -70 -84 -164 -179 -94 -95 -179 -187 -188 -206 -26
                                        -53 -31 -139 -10 -202 36 -107 148 -189 260 -189 97 0 136 26 320 210 136 137
                                        171 167 177 152 3 -9 7 -326 7 -704 l1 -688 -75 0 -75 0 0 353 c0 226 -4 366
                                        -11 392 -15 53 -91 129 -144 144 -55 15 -386 14 -439 -1 -54 -16 -128 -90
                                        -144 -144 -8 -29 -12 -145 -12 -393 l0 -351 -75 0 -75 0 0 470 0 471 -25 24
                                        c-31 32 -69 32 -100 0 l-25 -24 0 -621 0 -620 -100 0 c-94 0 -103 -2 -125 -25
                                        -32 -31 -32 -69 0 -100 l24 -25 2511 0 2511 0 24 25 c32 31 32 69 0 100 -22
                                        23 -32 25 -109 25 l-84 0 -4 179 c-3 205 -9 221 -78 221 -69 0 -75 -16 -78
                                        -221 l-4 -179 -219 0 -219 0 0 710 0 709 22 21 c20 19 34 20 197 20 141 -1
                                        180 -4 196 -16 19 -14 20 -30 25 -404 5 -384 5 -390 27 -411 29 -29 77 -29
                                        106 0 22 21 22 27 25 368 2 202 -1 374 -7 412 -20 128 -109 201 -245 201 l-72
                                        0 -48 62 -48 63 119 5 c135 6 172 19 227 80 32 35 66 118 66 160 0 53 -34 127
                                        -79 170 -61 60 -100 70 -260 70 -142 0 -173 -7 -228 -54 l-31 -26 -16 42 c-9
                                        24 -47 132 -85 241 -77 218 -108 272 -185 324 -81 55 -125 63 -356 63 -195 0
                                        -209 -1 -234 -21 -33 -26 -36 -77 -5 -105 19 -17 43 -19 243 -24 223 -5 223
                                        -5 262 -32 53 -37 66 -62 131 -246 30 -86 81 -232 113 -324 l59 -168 -1302 0
                                        -1302 0 385 385 385 385 378 0 378 0 24 25 c14 13 25 36 25 50 0 14 -11 37
                                        -25 50 l-24 25 -303 0 -303 0 877 878 c494 493 882 889 888 905 29 79 3 137
                                        -108 251 -115 116 -182 146 -262 115z m152 -216 c43 -43 78 -82 78 -88 0 -6
                                        -76 -87 -170 -180 l-170 -170 0 175 0 175 82 82 c46 46 87 83 93 83 5 0 45
                                        -35 87 -77z m-547 -723 l-135 -135 0 175 0 175 133 133 132 132 3 -172 2 -172
                                        -135 -136z m-425 -425 l-140 -140 0 175 0 175 138 138 137 137 3 -172 2 -172
                                        -140 -141z m-425 -425 l-135 -135 0 175 0 175 133 133 132 132 3 -172 2 -172
                                        -135 -136z m-425 -425 l-140 -140 0 175 0 175 138 138 137 137 3 -172 2 -172
                                        -140 -141z m-425 -425 l-135 -135 0 175 0 175 133 133 132 132 3 -172 2 -172
                                        -135 -136z m-422 -422 c-76 -76 -141 -138 -145 -138 -5 0 -8 75 -8 167 l0 168
                                        143 143 142 142 3 -172 2 -172 -137 -138z m3283 157 c34 -23 49 -69 34 -105
                                        -23 -54 -41 -60 -192 -60 l-138 0 0 70 c0 104 9 110 158 110 87 0 123 -4 138
                                        -15z m-3628 -503 c-73 -75 -124 -89 -185 -52 -54 33 -78 102 -52 153 6 12 70
                                        82 143 155 l131 132 3 -172 2 -172 -42 -44z m3267 126 l46 -63 -253 -5 c-251
                                        -5 -253 -5 -304 -32 -59 -31 -98 -73 -166 -177 -53 -81 -60 -118 -31 -178 32
                                        -68 51 -73 296 -73 l217 0 0 -115 0 -115 -681 -2 -681 -3 -19 -24 c-25 -30
                                        -24 -72 1 -99 21 -22 24 -22 350 -22 l330 0 0 -78 c0 -47 -5 -83 -12 -90 -17
                                        -17 -1099 -17 -1116 0 -7 7 -12 43 -12 90 l0 78 99 0 c96 0 100 1 120 26 12
                                        15 21 33 21 40 0 26 -23 62 -47 73 -16 7 -161 11 -458 11 l-435 0 0 115 0 115
                                        218 0 c244 0 263 5 295 73 29 60 22 97 -31 178 -68 105 -107 146 -166 177 -46
                                        24 -64 27 -183 30 l-133 4 0 26 c0 15 -3 44 -6 65 l-7 37 1351 0 1350 0 47
                                        -62z m-2486 -236 c19 -9 54 -45 79 -79 l44 -63 -186 0 -186 0 0 80 0 80 108 0
                                        c82 0 115 -4 141 -18z m2297 -62 l-10 -80 -184 0 -184 0 44 63 c62 87 87 97
                                        228 97 l115 0 -9 -80z m-3021 -355 l25 -24 0 -351 0 -350 -225 0 -225 0 0 350
                                        0 351 25 24 c24 25 27 25 200 25 173 0 176 0 200 -25z m1025 -345 c0 -104 14
                                        -146 61 -190 55 -50 85 -52 689 -48 l555 3 47 27 c67 40 88 88 88 206 l0 92
                                        275 0 275 0 0 -235 0 -235 -1270 0 -1270 0 0 235 0 235 275 0 275 0 0 -90z
                                        m-700 -605 l0 -75 -525 0 -525 0 0 75 0 75 525 0 525 0 0 -75z m370 0 l0 -75
                                        -110 0 -110 0 0 75 0 75 110 0 110 0 0 -75z m1950 0 l0 -75 -900 0 -900 0 0
                                        75 0 75 900 0 900 0 0 -75z m370 0 l0 -75 -110 0 -110 0 0 75 0 75 110 0 110
                                        0 0 -75z"/>
                                        <path d="M2259 1750 c-9 -5 -22 -23 -29 -39 -11 -28 -6 -42 65 -203 42 -95 86
                                        -181 97 -190 19 -17 56 -18 478 -18 422 0 459 1 478 18 11 9 55 95 97 190 72
                                        161 76 175 65 203 -7 16 -21 34 -31 39 -24 13 -1198 13 -1220 0z m1061 -145
                                        c0 -3 -14 -39 -32 -80 l-32 -75 -386 0 -386 0 -32 75 c-18 41 -32 77 -32 80 0
                                        3 203 5 450 5 248 0 450 -2 450 -5z"/>
                                        <path d="M875 1015 c-14 -13 -25 -36 -25 -50 0 -33 42 -75 75 -75 14 0 37 11
                                        50 25 14 13 25 36 25 50 0 14 -11 37 -25 50 -13 14 -36 25 -50 25 -14 0 -37
                                        -11 -50 -25z"/>
                                        <path d="M875 735 c-14 -13 -25 -36 -25 -50 0 -33 42 -75 75 -75 14 0 37 11
                                        50 25 14 13 25 36 25 50 0 14 -11 37 -25 50 -13 14 -36 25 -50 25 -14 0 -37
                                        -11 -50 -25z"/>
                                        <path d="M4473 1440 c-30 -27 -35 -76 -31 -297 3 -171 5 -193 22 -212 26 -29
                                        86 -29 112 0 17 19 19 41 22 212 2 105 1 211 -3 234 -7 50 -37 83 -75 83 -14
                                        0 -36 -9 -47 -20z" fill="currentColor"/>
                                        </g>
                                        </svg>



                                        <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Gate Entries</span>
                                    </div>
                                </a>
                             
                            </li>

                            <h2 class="-mx-4 mb-1 flex items-center bg-white-light/30 px-7 py-3 font-extrabold uppercase dark:bg-dark dark:bg-opacity-[0.08]">
                                <svg
                                    class="hidden h-5 w-4 flex-none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                                <span>Datasetup</span>
                            </h2>

                            <li class="nav-item">
                                <ul>
                                    <!-- Location -->
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('locations.index')); ?>" class="group">
                                            <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                                  <path d="M12 2C8.1 2 5 5.1 5 9c0 4.9 7 13 7 13s7-8.1 7-13c0-3.9-3.1-7-7-7zm0 9.5c-1.4 0-2.5-1.1-2.5-2.5s1.1-2.5 2.5-2.5 2.5 1.1 2.5 2.5-1.1 2.5-2.5 2.5z" fill="currentColor"/>
                                                </svg>

                                                <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Location</span>
                                            </div>
                                        </a>
                                    </li>
                                   <!-- Product -->
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('products.index')); ?>" class="group">
                                            <div class="flex items-center">
                                               <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                                                 width="512.000000pt" height="512.000000pt" viewBox="0 0 512.000000 512.000000"
                                                 preserveAspectRatio="xMidYMid meet">

                                                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                                fill="#000000" stroke="none">
                                                <path d="M1920 4916 c-333 -112 -620 -210 -637 -220 -72 -36 -67 17 -73 -955
                                                l-5 -874 -545 -182 c-300 -100 -560 -189 -577 -199 -19 -9 -42 -34 -53 -56
                                                -20 -38 -20 -57 -20 -975 0 -918 0 -937 20 -975 11 -22 34 -47 53 -56 50 -26
                                                1249 -424 1277 -424 14 0 289 88 612 196 l588 196 588 -196 c323 -108 598
                                                -196 612 -196 28 0 1227 398 1277 424 19 9 42 34 53 56 20 38 20 57 20 975 0
                                                918 0 937 -20 975 -11 22 -34 47 -53 56 -17 10 -277 99 -577 199 l-545 182 -5
                                                874 c-6 972 -1 919 -73 955 -58 31 -1251 424 -1282 423 -16 0 -302 -92 -635
                                                -203z m997 -223 c194 -65 353 -120 353 -123 0 -3 -160 -58 -355 -123 l-355
                                                -119 -355 119 c-195 65 -355 120 -355 123 0 5 685 238 705 239 5 1 168 -52
                                                362 -116z m-942 -486 l430 -144 3 -747 c2 -709 1 -747 -15 -742 -10 3 -211 70
                                                -448 149 l-430 144 -3 747 c-2 709 -1 747 15 742 10 -3 212 -70 448 -149z
                                                m1633 -594 l-3 -746 -430 -144 c-236 -79 -438 -146 -448 -149 -16 -5 -17 33
                                                -15 742 l3 747 440 148 c242 81 443 148 448 148 4 1 6 -335 5 -746z m-1891
                                                -1130 c194 -65 353 -120 353 -123 0 -3 -160 -58 -355 -123 l-355 -119 -355
                                                119 c-195 65 -355 120 -355 123 0 5 685 238 705 239 5 1 168 -52 362 -116z
                                                m2400 0 c194 -65 353 -120 353 -123 0 -3 -160 -58 -355 -123 l-355 -119 -355
                                                119 c-195 65 -355 120 -355 123 0 5 685 238 705 239 5 1 168 -52 362 -116z
                                                m-3342 -486 l430 -144 3 -747 c2 -709 1 -747 -15 -742 -10 3 -211 70 -448 149
                                                l-430 144 -3 747 c-2 709 -1 747 15 742 10 -3 212 -70 448 -149z m1633 -594
                                                l-3 -746 -430 -144 c-236 -79 -438 -146 -448 -149 -16 -5 -17 33 -15 742 l3
                                                747 440 148 c242 81 443 148 448 148 4 1 6 -335 5 -746z m767 594 l430 -144 3
                                                -747 c2 -709 1 -747 -15 -742 -10 3 -211 70 -448 149 l-430 144 -3 747 c-2
                                                709 -1 747 15 742 10 -3 212 -70 448 -149z m1633 -594 l-3 -746 -430 -144
                                                c-236 -79 -438 -146 -448 -149 -16 -5 -17 33 -15 742 l3 747 440 148 c242 81
                                                443 148 448 148 4 1 6 -335 5 -746z" fill="currentColor"/>
                                                </g>
                                                </svg>


                                                <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Product</span>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- Driver -->
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('drivers.index')); ?>" class="group">
                                            <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                                  <path d="M12 2c-2.76 0-5 2.24-5 5s2.24 5 5 5 5-2.24 5-5-2.24-5-5-5zm0 8c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm0 2c2.67 0 8 1.34 8 4v2H4v-2c0-2.66 5.33-4 8-4zm-7 7h14v2H5v-2z" fill="currentColor"/>
                                                </svg>

                                                <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Driver / Visitor</span>
                                            </div>
                                        </a>
                                    </li>
                                     <!-- Transpoter -->
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('transporter.index')); ?>" class="group">
                                            <div class="flex items-center">
                                               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                                  <path d="M11 9H9v4H7l3 3 3-3h-2V9zm11-6H2c-1.1 0-1.99.9-1.99 2L0 17c0 1.1.89 2 1.99 2H22c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 14H2V5h20v12z" fill="currentColor"/>
                                                </svg>

                                                <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Transpoter</span>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- Vehicle -->
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('vehicles.index')); ?>" class="group">
                                            <div class="flex items-center">
                                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                                                     width="512.000000pt" height="24" viewBox="0 0 512.000000 512.000000"
                                                     preserveAspectRatio="xMidYMid meet">

                                                    <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                                    fill="#000000" stroke="none">
                                                    <path d="M2565 3960 l-201 -200 -804 0 -804 0 -121 120 -122 120 -152 0 c-148
                                                    0 -153 -1 -176 -25 l-25 -24 0 -753 0 -752 183 -183 183 -183 57 0 57 0 0 -80
                                                    0 -80 -135 0 c-131 0 -137 -1 -160 -25 -25 -24 -25 -26 -25 -215 0 -189 0
                                                    -191 25 -215 23 -24 29 -25 165 -25 128 0 140 -2 140 -18 0 -36 42 -143 79
                                                    -200 71 -109 177 -192 299 -234 95 -32 249 -32 344 0 176 61 321 212 365 383
                                                    l17 69 699 0 698 0 24 25 c16 15 25 36 25 55 0 19 -9 40 -25 55 l-24 25 -698
                                                    0 -699 0 -17 68 c-38 147 -152 285 -292 352 -44 22 -102 43 -130 48 -33 7 192
                                                    10 678 11 l727 1 0 -80 0 -80 -415 0 -416 0 -24 -25 c-33 -32 -33 -78 0 -110
                                                    l24 -25 761 0 c418 0 760 -2 760 -3 0 -2 -10 -30 -22 -63 -31 -85 -31 -264 0
                                                    -348 63 -171 193 -300 360 -358 89 -30 249 -32 332 -4 197 67 338 216 383 405
                                                    l12 51 218 0 218 0 24 25 c25 24 25 26 25 215 0 189 0 191 -25 215 -20 21 -34
                                                    25 -80 25 l-55 0 0 448 0 447 -129 425 c-70 234 -137 443 -149 465 -11 22 -35
                                                    54 -54 72 -66 64 -59 63 -584 63 -345 0 -488 -3 -518 -12 -55 -16 -138 -99
                                                    -154 -154 -9 -31 -12 -232 -12 -793 l0 -752 25 -24 c32 -33 78 -33 110 0 l25
                                                    24 0 751 0 751 25 24 24 25 463 0 c400 0 467 -2 485 -15 24 -17 38 -58 192
                                                    -572 l91 -302 0 -435 0 -436 -164 0 -163 0 -51 40 c-196 157 -476 157 -682 1
                                                    l-54 -41 -323 0 -323 0 0 80 0 80 55 0 c46 0 60 4 80 25 l25 24 0 798 0 797
                                                    160 161 c140 142 160 165 160 194 0 21 -9 41 -25 56 l-24 25 -272 0 -273 0
                                                    -201 -200z m417 -64 l-102 -103 0 -777 0 -776 -1142 0 -1143 0 -137 137 -138
                                                    138 0 662 0 663 62 0 62 0 121 -120 122 -120 873 0 874 0 200 200 201 200 124
                                                    0 125 0 -102 -104z m-1896 -1828 c-67 -12 -182 -67 -234 -111 -24 -21 -46 -37
                                                    -48 -37 -2 0 -4 36 -4 80 l0 80 168 -1 c135 -1 158 -3 118 -11z m202 -158
                                                    c119 -28 213 -103 269 -218 36 -72 38 -81 38 -172 0 -91 -2 -100 -37 -172 -45
                                                    -91 -103 -147 -196 -191 -61 -29 -76 -32 -163 -32 -90 0 -99 2 -171 38 -251
                                                    124 -305 441 -108 637 100 101 234 140 368 110z m2720 0 c119 -28 213 -103
                                                    269 -218 36 -72 38 -81 38 -172 0 -91 -2 -100 -37 -172 -45 -91 -103 -147
                                                    -196 -191 -61 -29 -76 -32 -162 -32 -86 0 -101 3 -162 32 -91 43 -151 101
                                                    -193 187 -79 159 -50 332 75 456 100 101 234 140 368 110z m-3318 -153 c0 -2
                                                    -9 -30 -20 -62 -11 -32 -20 -66 -20 -77 0 -16 -9 -18 -85 -18 l-85 0 0 80 0
                                                    80 105 0 c58 0 105 -2 105 -3z m4110 -77 l0 -80 -165 0 c-154 0 -165 1 -165
                                                    18 0 11 -9 45 -20 77 -11 32 -20 60 -20 62 0 1 83 3 185 3 l185 0 0 -80z"/>
                                                    <path d="M665 3415 l-25 -24 0 -471 0 -471 25 -24 c24 -25 26 -25 215 -25 189
                                                    0 191 0 215 25 l25 24 0 471 0 471 -25 24 c-24 25 -26 25 -215 25 -189 0 -191
                                                    0 -215 -25z m295 -495 l0 -360 -80 0 -80 0 0 360 0 360 80 0 80 0 0 -360z"/>
                                                    <path d="M1385 3415 l-25 -24 0 -471 0 -471 25 -24 c24 -25 26 -25 215 -25
                                                    189 0 191 0 215 25 l25 24 0 471 0 471 -25 24 c-24 25 -26 25 -215 25 -189 0
                                                    -191 0 -215 -25z m295 -495 l0 -360 -80 0 -80 0 0 360 0 360 80 0 80 0 0 -360z"/>
                                                    <path d="M2105 3415 l-25 -24 0 -471 0 -471 25 -24 c24 -25 26 -25 215 -25
                                                    189 0 191 0 215 25 l25 24 0 471 0 471 -25 24 c-24 25 -26 25 -215 25 -189 0
                                                    -191 0 -215 -25z m295 -495 l0 -360 -80 0 -80 0 0 360 0 360 80 0 80 0 0 -360z"/>
                                                    <path d="M1120 1747 c-49 -16 -133 -102 -148 -153 -35 -120 19 -237 132 -290
                                                    96 -45 206 -19 277 65 85 98 78 222 -16 316 -70 71 -152 91 -245 62z m135
                                                    -172 c16 -15 25 -36 25 -55 0 -19 -9 -40 -25 -55 -15 -16 -36 -25 -55 -25 -19
                                                    0 -40 9 -55 25 -16 15 -25 36 -25 55 0 19 9 40 25 55 15 16 36 25 55 25 19 0
                                                    40 -9 55 -25z"/>
                                                    <path d="M3840 1747 c-49 -16 -133 -102 -148 -153 -25 -85 -9 -160 47 -225 64
                                                    -76 161 -105 255 -77 55 16 138 99 154 154 28 94 8 169 -63 239 -70 71 -152
                                                    91 -245 62z m135 -172 c50 -49 15 -135 -55 -135 -41 0 -80 39 -80 80 0 41 39
                                                    80 80 80 19 0 40 -9 55 -25z"/>
                                                    <path d="M3545 3495 l-25 -24 0 -271 0 -271 25 -24 c23 -24 30 -25 141 -25
                                                    l118 0 82 -80 82 -80 219 0 c236 0 253 3 273 56 14 36 -182 690 -217 722 -24
                                                    22 -26 22 -349 22 l-325 0 -24 -25z m661 -373 l70 -237 -119 -3 -120 -3 -82
                                                    81 -83 80 -96 0 -96 0 0 160 0 160 228 0 227 0 71 -238z"/>
                                                    <path d="M3546 2539 c-37 -29 -37 -89 0 -118 23 -18 41 -21 136 -21 102 0 110
                                                    1 133 25 16 15 25 36 25 55 0 19 -9 40 -25 55 -23 24 -31 25 -133 25 -95 0
                                                    -113 -3 -136 -21z" fill="currentColor"/>
                                                    </g>
                                                    </svg>



                                                <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark"
                                                    >Vehicle</span
                                                >
                                            </div>
                                        </a>
                                    </li>
                                    
                                </ul>
                            </li>
                            <!-- ADMINISTRATOR -->
                            <h2 class="-mx-4 mb-1 flex items-center bg-white-light/30 px-7 py-3 font-extrabold uppercase dark:bg-dark dark:bg-opacity-[0.08]">
                                <svg
                                    class="hidden h-5 w-4 flex-none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                                <span>ADMINISTRATOR</span>
                            </h2>
                            <!-- User Role -->
                            <li class="menu nav-item">
                                <a href="<?php echo e(route('userroles.index')); ?>" class="nav-link group">
                                    <div class="flex items-center">
                                        <div class="flex items-center">

                                        <svg fill="#000000" height="800px" width="800px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 60.001 60.001" xml:space="preserve">
                                    <g>
                                        <path d="M59.693,55.136L47.849,34.83c-0.405-0.695-1.128-1.11-1.933-1.11c-0.805,0-1.528,0.415-1.933,1.11L32.137,55.136
                                            c-0.409,0.7-0.412,1.539-0.008,2.242c0.404,0.703,1.129,1.123,1.94,1.123h23.691c0.811,0,1.536-0.42,1.939-1.123
                                            C60.104,56.675,60.102,55.837,59.693,55.136z M57.966,56.382c-0.03,0.055-0.092,0.119-0.205,0.119H34.07
                                            c-0.114,0-0.175-0.064-0.206-0.119s-0.056-0.14,0.001-0.238L45.71,35.838c0.057-0.098,0.143-0.118,0.206-0.118
                                            c0.062,0,0.148,0.021,0.205,0.118l11.845,20.306C58.022,56.242,57.998,56.327,57.966,56.382z" fill="currentColor"/>
                                        <path d="M46,40.501c-0.552,0-1,0.447-1,1v8c0,0.553,0.448,1,1,1s1-0.447,1-1v-8C47,40.948,46.552,40.501,46,40.501z" fill="currentColor"/>
                                        <path d="M45.29,52.791c-0.18,0.189-0.29,0.45-0.29,0.71s0.11,0.52,0.29,0.71c0.19,0.18,0.45,0.29,0.71,0.29
                                            c0.26,0,0.52-0.11,0.71-0.29c0.18-0.19,0.29-0.45,0.29-0.71s-0.11-0.521-0.29-0.71C46.33,52.421,45.67,52.421,45.29,52.791z"fill="currentColor"/>
                                        <path d="M45.916,30.719c0.051,0,0.101,0.009,0.152,0.01c0.626-1.145,1.171-2.347,1.605-3.612C49.084,26.47,50,25.076,50,23.501v-4
                                            c0-0.963-0.36-1.896-1-2.625v-5.319c0.056-0.55,0.276-3.824-2.092-6.525c-2.054-2.343-5.387-3.53-9.908-3.53
                                            s-7.854,1.188-9.908,3.53c-1.435,1.637-1.918,3.481-2.064,4.805C23.314,8.949,21.294,8.501,19,8.501c-10.389,0-10.994,8.855-11,9
                                            v4.579c-0.648,0.706-1,1.521-1,2.33v3.454c0,1.079,0.483,2.085,1.311,2.765c0.825,3.11,2.854,5.46,3.644,6.285v2.743
                                            c0,0.787-0.428,1.509-1.171,1.915l-6.653,4.173C1.583,47.135,0,49.802,0,52.704v3.797h14h2h12.85
                                            c-0.045-0.992,0.18-1.993,0.696-2.877l11.845-20.306C42.325,31.716,44.059,30.719,45.916,30.719z M14,54.501H2v-1.797
                                            c0-2.17,1.183-4.164,3.089-5.203l0.053-0.029l0.052-0.032l6.609-4.146c1.349-0.764,2.152-2.118,2.152-3.636v-2.743v-0.803
                                            l-0.555-0.58c-0.558-0.583-2.435-2.698-3.156-5.415l-0.165-0.624L9.58,29.083C9.211,28.781,9,28.336,9,27.864V24.41
                                            c0-0.298,0.168-0.645,0.474-0.978L10,22.858V22.08v-4.506c0.078-0.921,0.901-7.073,9-7.073c2.392,0,4.408,0.552,6,1.644v4.73
                                            c-0.648,0.731-1,1.647-1,2.626v4c0,0.304,0.035,0.603,0.101,0.893c0.199,0.867,0.687,1.646,1.393,2.214
                                            c0.001,0.001,0.002,0.002,0.003,0.003c0.006,0.023,0.014,0.043,0.019,0.066c0.055,0.212,0.116,0.432,0.192,0.686l0.074,0.239
                                            c0.011,0.036,0.024,0.067,0.035,0.103c0.063,0.197,0.129,0.386,0.197,0.576c0.031,0.088,0.06,0.184,0.092,0.27
                                            c0.06,0.162,0.117,0.303,0.173,0.444c0.048,0.12,0.096,0.236,0.146,0.353c0.037,0.088,0.075,0.18,0.113,0.266l0.004-0.002
                                            c0.018,0.042,0.037,0.083,0.055,0.125l-0.004,0.002c0.025,0.055,0.05,0.105,0.075,0.159c0.098,0.215,0.195,0.424,0.295,0.625
                                            c0.017,0.034,0.032,0.071,0.049,0.104c0.027,0.053,0.054,0.097,0.08,0.149c0.156,0.305,0.31,0.591,0.463,0.86
                                            c0.018,0.031,0.034,0.06,0.052,0.091c0.575,0.997,1.101,1.74,1.391,2.12L29,37.156c0,0.242-0.033,0.479-0.096,0.706
                                            c-0.188,0.68-0.644,1.267-1.282,1.615l-8.921,4.866c-0.247,0.135-0.474,0.294-0.705,0.449c-0.108,0.072-0.225,0.133-0.329,0.21
                                            c-0.018,0.013-0.033,0.03-0.051,0.043C15.361,46.732,14,49.394,14,52.262V54.501z" fill="currentColor"/>
                                    </g>
                                    </svg>

                                            <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">User Role</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <!-- User -->
                            <li class="menu nav-item">
                                <a href="<?php echo e(route('users.index')); ?>" class="nav-link group">
                                    <div class="flex items-center">
                                        <div class="flex items-center">
                                        <svg
                                            class="shrink-0 group-hover:!text-primary"
                                            width="20"
                                            height="20"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <circle opacity="0.5" cx="15" cy="6" r="3" fill="currentColor" />
                                            <ellipse opacity="0.5" cx="16" cy="17" rx="5" ry="3" fill="currentColor" />
                                            <circle cx="9.00098" cy="6" r="4" fill="currentColor" />
                                            <ellipse cx="9.00098" cy="17.001" rx="7" ry="4" fill="currentColor" />
                                        </svg>
                                        <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">User</span>
                                    </div>
                                    </div>
                                </a>
                            </li>
                            <!--App Directory -->
                            <li class="menu nav-item">
                                <a href="<?php echo e(route('appdirectory.index')); ?>" class="nav-link group">
                                    <div class="flex items-center">
                                        <div class="flex items-center">
                                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                                             width="512.000000pt" height="512.000000pt" viewBox="0 0 512.000000 512.000000"
                                             preserveAspectRatio="xMidYMid meet">

                                            <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                            fill="#000000" stroke="none">
                                            <path d="M2410 5106 c-82 -18 -158 -47 -233 -89 -32 -17 -407 -315 -834 -662
                                            -847 -689 -839 -681 -890 -828 -65 -184 -29 -390 93 -539 22 -26 143 -131 269
                                            -233 127 -102 230 -190 230 -195 0 -4 -103 -92 -230 -195 -126 -102 -247 -207
                                            -269 -233 -158 -193 -167 -475 -22 -675 44 -60 152 -151 826 -698 673 -547
                                            787 -636 865 -674 128 -64 195 -79 345 -79 150 0 217 15 345 79 78 38 191 126
                                            835 650 410 333 774 635 809 672 199 207 200 534 3 745 -25 26 -384 323 -798
                                            660 -531 432 -777 625 -832 655 -118 65 -212 87 -362 87 -222 0 -331 -45 -577
                                            -239 -90 -70 -173 -143 -185 -163 -71 -115 4 -278 138 -298 77 -11 119 8 269
                                            127 166 131 184 142 254 163 73 21 135 20 213 -4 73 -22 36 7 1020 -794 406
                                            -330 582 -478 592 -501 20 -42 20 -88 0 -130 -11 -24 -223 -202 -751 -632
                                            -405 -329 -754 -610 -776 -625 -96 -64 -244 -74 -349 -24 -54 26 -1526 1213
                                            -1561 1259 -24 31 -32 96 -17 141 10 30 56 72 276 252 l265 215 32 -24 c18
                                            -14 187 -151 377 -306 367 -299 432 -342 576 -383 63 -18 104 -22 204 -22 223
                                            0 333 46 590 249 175 139 195 164 195 255 0 134 -121 227 -250 191 -26 -7 -98
                                            -56 -200 -136 -173 -135 -233 -165 -335 -165 -60 0 -155 29 -201 61 -19 13
                                            -366 293 -771 622 -562 456 -740 607 -753 634 -21 44 -16 114 11 150 36 47
                                            1508 1233 1562 1259 105 50 249 40 346 -23 62 -40 1477 -1191 1508 -1226 57
                                            -64 50 -139 -21 -220 -27 -31 -55 -73 -61 -93 -40 -120 58 -254 185 -254 69 0
                                            120 27 186 97 101 106 144 217 144 373 0 158 -50 283 -154 385 -31 30 -391
                                            327 -801 660 -645 524 -757 611 -835 650 -49 25 -117 52 -150 60 -85 22 -265
                                            28 -345 11z" fill="currentColor"/>
                                            </g>
                                            </svg>

                                        <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">App Directory</span>
                                    </div>
                                    </div>
                                </a>
                            </li>

                            

                            <h2 class="-mx-4 mb-1 flex items-center bg-white-light/30 px-7 py-3 font-extrabold uppercase dark:bg-dark dark:bg-opacity-[0.08]">
                                <svg
                                    class="hidden h-5 w-4 flex-none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                                <span>REPORT</span>
                            </h2>

                            

                            <li class="menu nav-item">
                                
                                
                            </li>

                            <li class="menu nav-item">
                            
                            </li>

                            
                        </ul>
                    </div>
                </nav>
            </div>
            <!-- end sidebar section -->

            <div class="main-content flex min-h-screen flex-col">
                <!-- start header section -->
                <header class="z-40" :class="{'dark' : $store.app.semidark && $store.app.menu === 'horizontal'}">
                    <div class="shadow-sm">
                        <div class="relative flex w-full items-center bg-white px-5 py-2.5 dark:bg-[#0e1726]">
                            <div class="horizontal-logo flex items-center justify-between ltr:mr-2 rtl:ml-2 lg:hidden">
                                <a
                                    href="javascript:;"
                                    class="collapse-icon flex  rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 hover:text-primary  dark:bg-dark/40 dark:text-[#d0d2d6] dark:hover:bg-dark/60 dark:hover:text-primary lg:hidden"
                                    @click="$store.app.toggleSidebar()"
                                >
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20 7L4 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                        <path opacity="0.5" d="M20 12L4 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                        <path d="M20 17L4 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                </a>
                                <a href="index.html" class="main-logo flex shrink-0 items-center">
                                    <img class="inline w-8 ltr:-ml-3 rtl:-mr-1" src="<?php echo e(asset('assets/images/icon.png')); ?>" alt="image" />
                                    <span style="Color:#196876" 
                                        class="hidden align-middle text-xl font-semibold transition-all duration-300 ltr:ml-1.5 rtl:mr-1.5 dark:text-white-light md:inline"
                                        >ENDEL DIGITAL</span
                                    >
                                </a>
                                
                            </div>
                            
                            <div
                                x-data="header"
                                class="flex items-center space-x-1.5 ltr:ml-auto rtl:mr-auto rtl:space-x-reverse dark:text-[#d0d2d6] sm:flex-1 ltr:sm:ml-0 sm:rtl:mr-0 lg:space-x-2"
                            >
                                <div class="sm:ltr:mr-auto sm:rtl:ml-auto" x-data="{ search: false }" @click.outside="search = false">
                                   
                                        
                                    <button
                                        type="button"
                                        class="search_btn rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 dark:bg-dark/40 dark:hover:bg-dark/60 sm:hidden"
                                        @click="search = ! search"
                                    >
                                        <svg
                                            class="mx-auto h-4.5 w-4.5 dark:text-[#d0d2d6]"
                                            width="20"
                                            height="20"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <circle cx="11.5" cy="11.5" r="9.5" stroke="currentColor" stroke-width="1.5" opacity="0.5" />
                                            <path d="M18.5 18.5L22 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                        </svg>
                                    </button>
                                </div>
                                <div>
                                    <a
                                        href="javascript:;"
                                        x-cloak
                                        x-show="$store.app.theme === 'light'"
                                        href="javascript:;"
                                        class="flex items-center rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 hover:text-primary dark:bg-dark/40 dark:hover:bg-dark/60"
                                        @click="$store.app.toggleTheme('dark')"
                                    >
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="12" cy="12" r="5" stroke="currentColor" stroke-width="1.5" />
                                            <path d="M12 2V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                            <path d="M12 20V22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                            <path d="M4 12L2 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                            <path d="M22 12L20 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                            <path
                                                opacity="0.5"
                                                d="M19.7778 4.22266L17.5558 6.25424"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                            />
                                            <path
                                                opacity="0.5"
                                                d="M4.22217 4.22266L6.44418 6.25424"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                            />
                                            <path
                                                opacity="0.5"
                                                d="M6.44434 17.5557L4.22211 19.7779"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                            />
                                            <path
                                                opacity="0.5"
                                                d="M19.7778 19.7773L17.5558 17.5551"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                            />
                                        </svg>
                                    </a>
                                    <a
                                        href="javascript:;"
                                        x-cloak
                                        x-show="$store.app.theme === 'dark'"
                                        href="javascript:;"
                                        class="flex items-center rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 hover:text-primary dark:bg-dark/40 dark:hover:bg-dark/60"
                                        @click="$store.app.toggleTheme('system')"
                                    >
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M21.0672 11.8568L20.4253 11.469L21.0672 11.8568ZM12.1432 2.93276L11.7553 2.29085V2.29085L12.1432 2.93276ZM21.25 12C21.25 17.1086 17.1086 21.25 12 21.25V22.75C17.9371 22.75 22.75 17.9371 22.75 12H21.25ZM12 21.25C6.89137 21.25 2.75 17.1086 2.75 12H1.25C1.25 17.9371 6.06294 22.75 12 22.75V21.25ZM2.75 12C2.75 6.89137 6.89137 2.75 12 2.75V1.25C6.06294 1.25 1.25 6.06294 1.25 12H2.75ZM15.5 14.25C12.3244 14.25 9.75 11.6756 9.75 8.5H8.25C8.25 12.5041 11.4959 15.75 15.5 15.75V14.25ZM20.4253 11.469C19.4172 13.1373 17.5882 14.25 15.5 14.25V15.75C18.1349 15.75 20.4407 14.3439 21.7092 12.2447L20.4253 11.469ZM9.75 8.5C9.75 6.41182 10.8627 4.5828 12.531 3.57467L11.7553 2.29085C9.65609 3.5593 8.25 5.86509 8.25 8.5H9.75ZM12 2.75C11.9115 2.75 11.8077 2.71008 11.7324 2.63168C11.6686 2.56527 11.6538 2.50244 11.6503 2.47703C11.6461 2.44587 11.6482 2.35557 11.7553 2.29085L12.531 3.57467C13.0342 3.27065 13.196 2.71398 13.1368 2.27627C13.0754 1.82126 12.7166 1.25 12 1.25V2.75ZM21.7092 12.2447C21.6444 12.3518 21.5541 12.3539 21.523 12.3497C21.4976 12.3462 21.4347 12.3314 21.3683 12.2676C21.2899 12.1923 21.25 12.0885 21.25 12H22.75C22.75 11.2834 22.1787 10.9246 21.7237 10.8632C21.286 10.804 20.7293 10.9658 20.4253 11.469L21.7092 12.2447Z"
                                                fill="currentColor"
                                            />
                                        </svg>
                                    </a>
                                    <a
                                        href="javascript:;"
                                        x-cloak
                                        x-show="$store.app.theme === 'system'"
                                        href="javascript:;"
                                        class="flex items-center rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 hover:text-primary dark:bg-dark/40 dark:hover:bg-dark/60"
                                        @click="$store.app.toggleTheme('light')"
                                    >
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3 9C3 6.17157 3 4.75736 3.87868 3.87868C4.75736 3 6.17157 3 9 3H15C17.8284 3 19.2426 3 20.1213 3.87868C21 4.75736 21 6.17157 21 9V14C21 15.8856 21 16.8284 20.4142 17.4142C19.8284 18 18.8856 18 17 18H7C5.11438 18 4.17157 18 3.58579 17.4142C3 16.8284 3 15.8856 3 14V9Z"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                            />
                                            <path opacity="0.5" d="M22 21H2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                            <path opacity="0.5" d="M15 15H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                        </svg>
                                    </a>
                                </div>

                                <div class="dropdown flex-shrink-0" x-data="dropdown" @click.outside="open = false">
                                    <a href="javascript:;" class="group relative" @click="toggle()">
                                        <span
                                            ><img
                                                class="h-9 w-9 rounded-full object-cover saturate-50 group-hover:saturate-100"
                                                src="<?php echo e(asset('assets/images/auth/user.png')); ?>"
                                                alt="image"
                                        /></span>
                                    </a>
                                    <ul
                                        x-cloak
                                        x-show="open"
                                        x-transition
                                        x-transition.duration.300ms
                                        class="top-11 w-[230px] !py-0 font-semibold text-dark ltr:right-0 rtl:left-0 dark:text-white-dark dark:text-white-light/90"
                                    >
                                        <li>
                                            <div class="flex items-center px-4 py-4">
                                                <div class="flex-none">
                                                    <img class="h-10 w-10 rounded-md object-cover" src="<?php echo e(asset('assets/images/auth/user.png')); ?>" alt="image" />
                                                </div>
                                                <div class="truncate ltr:pl-4 rtl:pr-4">
                                                    <h4 class="text-base">
                                                        <?php echo e(Session::get('FirstName')); ?> <?php echo e(Session::get('LastName')); ?> 
                                                    </h4>
                                                    <a
                                                        class="text-black/60 hover:text-primary dark:text-dark-light/60 dark:hover:text-white"
                                                        href="javascript:;"
                                                        ><?php echo e(Session::get('EmailID')); ?></a
                                                    >
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="users-profile.html" class="dark:hover:text-white" @click="toggle">
                                                <svg
                                                    class="h-4.5 w-4.5 shrink-0 ltr:mr-2 rtl:ml-2"
                                                    width="18"
                                                    height="18"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <circle cx="12" cy="6" r="4" stroke="currentColor" stroke-width="1.5" />
                                                    <path
                                                        opacity="0.5"
                                                        d="M20 17.5C20 19.9853 20 22 12 22C4 22 4 19.9853 4 17.5C4 15.0147 7.58172 13 12 13C16.4183 13 20 15.0147 20 17.5Z"
                                                        stroke="currentColor"
                                                        stroke-width="1.5"
                                                    />
                                                </svg>
                                                <?php echo e(Session::get('email')); ?></a
                                            >
                                        </li>
                                        
                                        <li>
                                            <a href="auth-boxed-lockscreen.html" class="dark:hover:text-white" @click="toggle">
                                                <svg
                                                    class="h-4.5 w-4.5 shrink-0 ltr:mr-2 rtl:ml-2"
                                                    width="18"
                                                    height="18"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path
                                                        d="M2 16C2 13.1716 2 11.7574 2.87868 10.8787C3.75736 10 5.17157 10 8 10H16C18.8284 10 20.2426 10 21.1213 10.8787C22 11.7574 22 13.1716 22 16C22 18.8284 22 20.2426 21.1213 21.1213C20.2426 22 18.8284 22 16 22H8C5.17157 22 3.75736 22 2.87868 21.1213C2 20.2426 2 18.8284 2 16Z"
                                                        stroke="currentColor"
                                                        stroke-width="1.5"
                                                    />
                                                    <path
                                                        opacity="0.5"
                                                        d="M6 10V8C6 4.68629 8.68629 2 12 2C15.3137 2 18 4.68629 18 8V10"
                                                        stroke="currentColor"
                                                        stroke-width="1.5"
                                                        stroke-linecap="round"
                                                    />
                                                    <g opacity="0.5">
                                                        <path
                                                            d="M9 16C9 16.5523 8.55228 17 8 17C7.44772 17 7 16.5523 7 16C7 15.4477 7.44772 15 8 15C8.55228 15 9 15.4477 9 16Z"
                                                            fill="currentColor"
                                                        />
                                                        <path
                                                            d="M13 16C13 16.5523 12.5523 17 12 17C11.4477 17 11 16.5523 11 16C11 15.4477 11.4477 15 12 15C12.5523 15 13 15.4477 13 16Z"
                                                            fill="currentColor"
                                                        />
                                                        <path
                                                            d="M17 16C17 16.5523 16.5523 17 16 17C15.4477 17 15 16.5523 15 16C15 15.4477 15.4477 15 16 15C16.5523 15 17 15.4477 17 16Z"
                                                            fill="currentColor"
                                                        />
                                                    </g>
                                                </svg>
                                                Lock Screen</a
                                            >
                                        </li>
                                        <li class="border-t border-white-light dark:border-white-light/10">
                                            <a  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="!py-3 text-danger" @click="toggle">
                                                <svg
                                                    class="h-4.5 w-4.5 rotate-90 ltr:mr-2 rtl:ml-2"
                                                    width="18"
                                                    height="18"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path
                                                        opacity="0.5"
                                                        d="M17 9.00195C19.175 9.01406 20.3529 9.11051 21.1213 9.8789C22 10.7576 22 12.1718 22 15.0002V16.0002C22 18.8286 22 20.2429 21.1213 21.1215C20.2426 22.0002 18.8284 22.0002 16 22.0002H8C5.17157 22.0002 3.75736 22.0002 2.87868 21.1215C2 20.2429 2 18.8286 2 16.0002L2 15.0002C2 12.1718 2 10.7576 2.87868 9.87889C3.64706 9.11051 4.82497 9.01406 7 9.00195"
                                                        stroke="currentColor"
                                                        stroke-width="1.5"
                                                        stroke-linecap="round"
                                                    />
                                                    <path
                                                        d="M12 15L12 2M12 2L15 5.5M12 2L9 5.5"
                                                        stroke="currentColor"
                                                        stroke-width="1.5"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    />
                                                </svg>
                                                Sign Out
                                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                                   <?php echo csrf_field(); ?>
                                                </form>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- horizontal menu -->
                        <ul
                            class="horizontal-menu hidden border-t border-[#ebedf2] bg-white px-6 py-1.5 font-semibold text-black rtl:space-x-reverse dark:border-[#191e3a] dark:bg-[#0e1726] dark:text-white-dark lg:space-x-1.5 xl:space-x-8"
                        >
                            <li class="menu nav-item relative">
                                <a href="javascript:;" class="nav-link active">
                                    <div class="flex items-center">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="shrink-0">
                                            <path
                                                opacity="0.5"
                                                d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z"
                                                fill="currentColor"
                                            />
                                            <path
                                                d="M9 17.25C8.58579 17.25 8.25 17.5858 8.25 18C8.25 18.4142 8.58579 18.75 9 18.75H15C15.4142 18.75 15.75 18.4142 15.75 18C15.75 17.5858 15.4142 17.25 15 17.25H9Z"
                                                fill="currentColor"
                                            />
                                        </svg>
                                        <span class="px-1">Dashboard</span>
                                    </div>
                                    <!-- <div class="right_arrow">
                                        <svg
                                            class="h-4 w-4 rotate-90"
                                            width="16"
                                            height="16"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div> -->
                                </a>
                               <!--  <ul class="sub-menu">
                                    <li>
                                        <a href="index.html">Sales</a>
                                    </li>
                                    <li>
                                        <a href="analytics.html">Analytics</a>
                                    </li>
                                    <li>
                                        <a href="finance.html" class="active">Finance</a>
                                    </li>
                                    <li>
                                        <a href="crypto.html">Crypto</a>
                                    </li>
                                </ul> -->
                            </li>
                            <li class="menu nav-item relative">
                                <a href="javascript:;" class="nav-link">
                                    <div class="flex items-center">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="shrink-0">
                                            <g opacity="0.5">
                                                <path
                                                    d="M14 2.75C15.9068 2.75 17.2615 2.75159 18.2892 2.88976C19.2952 3.02503 19.8749 3.27869 20.2981 3.7019C20.7213 4.12511 20.975 4.70476 21.1102 5.71085C21.2484 6.73851 21.25 8.09318 21.25 10C21.25 10.4142 21.5858 10.75 22 10.75C22.4142 10.75 22.75 10.4142 22.75 10V9.94359C22.75 8.10583 22.75 6.65019 22.5969 5.51098C22.4392 4.33856 22.1071 3.38961 21.3588 2.64124C20.6104 1.89288 19.6614 1.56076 18.489 1.40314C17.3498 1.24997 15.8942 1.24998 14.0564 1.25H14C13.5858 1.25 13.25 1.58579 13.25 2C13.25 2.41421 13.5858 2.75 14 2.75Z"
                                                    fill="currentColor"
                                                />
                                                <path
                                                    d="M9.94358 1.25H10C10.4142 1.25 10.75 1.58579 10.75 2C10.75 2.41421 10.4142 2.75 10 2.75C8.09318 2.75 6.73851 2.75159 5.71085 2.88976C4.70476 3.02503 4.12511 3.27869 3.7019 3.7019C3.27869 4.12511 3.02503 4.70476 2.88976 5.71085C2.75159 6.73851 2.75 8.09318 2.75 10C2.75 10.4142 2.41421 10.75 2 10.75C1.58579 10.75 1.25 10.4142 1.25 10V9.94358C1.24998 8.10583 1.24997 6.65019 1.40314 5.51098C1.56076 4.33856 1.89288 3.38961 2.64124 2.64124C3.38961 1.89288 4.33856 1.56076 5.51098 1.40314C6.65019 1.24997 8.10583 1.24998 9.94358 1.25Z"
                                                    fill="currentColor"
                                                />
                                                <path
                                                    d="M22 13.25C22.4142 13.25 22.75 13.5858 22.75 14V14.0564C22.75 15.8942 22.75 17.3498 22.5969 18.489C22.4392 19.6614 22.1071 20.6104 21.3588 21.3588C20.6104 22.1071 19.6614 22.4392 18.489 22.5969C17.3498 22.75 15.8942 22.75 14.0564 22.75H14C13.5858 22.75 13.25 22.4142 13.25 22C13.25 21.5858 13.5858 21.25 14 21.25C15.9068 21.25 17.2615 21.2484 18.2892 21.1102C19.2952 20.975 19.8749 20.7213 20.2981 20.2981C20.7213 19.8749 20.975 19.2952 21.1102 18.2892C21.2484 17.2615 21.25 15.9068 21.25 14C21.25 13.5858 21.5858 13.25 22 13.25Z"
                                                    fill="currentColor"
                                                />
                                                <path
                                                    d="M2.75 14C2.75 13.5858 2.41421 13.25 2 13.25C1.58579 13.25 1.25 13.5858 1.25 14V14.0564C1.24998 15.8942 1.24997 17.3498 1.40314 18.489C1.56076 19.6614 1.89288 20.6104 2.64124 21.3588C3.38961 22.1071 4.33856 22.4392 5.51098 22.5969C6.65019 22.75 8.10583 22.75 9.94359 22.75H10C10.4142 22.75 10.75 22.4142 10.75 22C10.75 21.5858 10.4142 21.25 10 21.25C8.09318 21.25 6.73851 21.2484 5.71085 21.1102C4.70476 20.975 4.12511 20.7213 3.7019 20.2981C3.27869 19.8749 3.02503 19.2952 2.88976 18.2892C2.75159 17.2615 2.75 15.9068 2.75 14Z"
                                                    fill="currentColor"
                                                />
                                            </g>
                                            <path
                                                d="M5.52721 5.52721C5 6.05442 5 6.90294 5 8.6C5 9.73137 5 10.2971 5.35147 10.6485C5.70294 11 6.26863 11 7.4 11H8.6C9.73137 11 10.2971 11 10.6485 10.6485C11 10.2971 11 9.73137 11 8.6V7.4C11 6.26863 11 5.70294 10.6485 5.35147C10.2971 5 9.73137 5 8.6 5C6.90294 5 6.05442 5 5.52721 5.52721Z"
                                                fill="currentColor"
                                            />
                                            <path
                                                d="M5.52721 18.4728C5 17.9456 5 17.0971 5 15.4C5 14.2686 5 13.7029 5.35147 13.3515C5.70294 13 6.26863 13 7.4 13H8.6C9.73137 13 10.2971 13 10.6485 13.3515C11 13.7029 11 14.2686 11 15.4V16.6C11 17.7314 11 18.2971 10.6485 18.6485C10.2971 19 9.73138 19 8.60002 19C6.90298 19 6.05441 19 5.52721 18.4728Z"
                                                fill="currentColor"
                                            />
                                            <path
                                                d="M13 7.4C13 6.26863 13 5.70294 13.3515 5.35147C13.7029 5 14.2686 5 15.4 5C17.0971 5 17.9456 5 18.4728 5.52721C19 6.05442 19 6.90294 19 8.6C19 9.73137 19 10.2971 18.6485 10.6485C18.2971 11 17.7314 11 16.6 11H15.4C14.2686 11 13.7029 11 13.3515 10.6485C13 10.2971 13 9.73137 13 8.6V7.4Z"
                                                fill="currentColor"
                                            />
                                            <path
                                                d="M13.3515 18.6485C13 18.2971 13 17.7314 13 16.6V15.4C13 14.2686 13 13.7029 13.3515 13.3515C13.7029 13 14.2686 13 15.4 13H16.6C17.7314 13 18.2971 13 18.6485 13.3515C19 13.7029 19 14.2686 19 15.4C19 17.097 19 17.9456 18.4728 18.4728C17.9456 19 17.0971 19 15.4 19C14.2687 19 13.7029 19 13.3515 18.6485Z"
                                                fill="currentColor"
                                            />
                                        </svg>
                                        <span class="px-1">Datasetup</span>
                                    </div>
                                    <div class="right_arrow">
                                        <svg
                                            class="h-4 w-4 rotate-90"
                                            width="16"
                                            height="16"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="apps-chat.html">Chat</a>
                                    </li>
                                    <li>
                                        <a href="apps-mailbox.html">Mailbox</a>
                                    </li>
                                    <li>
                                        <a href="apps-todolist.html">Todo List</a>
                                    </li>
                                    <li>
                                        <a href="apps-notes.html">Notes</a>
                                    </li>
                                    <li>
                                        <a href="apps-scrumboard.html">Scrumboard</a>
                                    </li>
                                    <li>
                                        <a href="apps-contacts.html">Contacts</a>
                                    </li>
                                    <li class="relative">
                                        <a href="javascript:;"
                                            >Invoice
                                            <div class="ltr:ml-auto rtl:mr-auto rtl:rotate-180">
                                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9 5L15 12L9 19"
                                                        stroke="currentColor"
                                                        stroke-width="1.5"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    />
                                                </svg>
                                            </div>
                                        </a>
                                        <ul
                                            class="absolute top-0 z-[10] hidden min-w-[180px] rounded bg-white p-0 py-2 text-dark shadow ltr:left-[95%] rtl:right-[95%] dark:bg-[#1b2e4b] dark:text-white-dark"
                                        >
                                            <li>
                                                <a href="apps-invoice-list.html">List</a>
                                            </li>
                                            <li>
                                                <a href="apps-invoice-preview.html">Preview</a>
                                            </li>
                                            <li>
                                                <a href="apps-invoice-add.html">Add</a>
                                            </li>
                                            <li>
                                                <a href="apps-invoice-edit.html">Edit</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="apps-calendar.html">Calendar</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu nav-item relative">
                                <a href="javascript:;" class="nav-link">
                                    <div class="flex items-center">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="shrink-0">
                                            <path
                                                d="M8.42229 20.6181C10.1779 21.5395 11.0557 22.0001 12 22.0001V12.0001L2.63802 7.07275C2.62423 7.09491 2.6107 7.11727 2.5974 7.13986C2 8.15436 2 9.41678 2 11.9416V12.0586C2 14.5834 2 15.8459 2.5974 16.8604C3.19479 17.8749 4.27063 18.4395 6.42229 19.5686L8.42229 20.6181Z"
                                                fill="currentColor"
                                            />
                                            <path
                                                opacity="0.7"
                                                d="M17.5774 4.43152L15.5774 3.38197C13.8218 2.46066 12.944 2 11.9997 2C11.0554 2 10.1776 2.46066 8.42197 3.38197L6.42197 4.43152C4.31821 5.53552 3.24291 6.09982 2.6377 7.07264L11.9997 12L21.3617 7.07264C20.7564 6.09982 19.6811 5.53552 17.5774 4.43152Z"
                                                fill="currentColor"
                                            />
                                            <path
                                                opacity="0.5"
                                                d="M21.4026 7.13986C21.3893 7.11727 21.3758 7.09491 21.362 7.07275L12 12.0001V22.0001C12.9443 22.0001 13.8221 21.5395 15.5777 20.6181L17.5777 19.5686C19.7294 18.4395 20.8052 17.8749 21.4026 16.8604C22 15.8459 22 14.5834 22 12.0586V11.9416C22 9.41678 22 8.15436 21.4026 7.13986Z"
                                                fill="currentColor"
                                            />
                                        </svg>
                                        <span class="px-1">Components</span>
                                    </div>
                                    <div class="right_arrow">
                                        <svg
                                            class="h-4 w-4 rotate-90"
                                            width="16"
                                            height="16"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="components-tabs.html">Tabs</a>
                                    </li>
                                    <li>
                                        <a href="components-accordions.html">Accordions</a>
                                    </li>
                                    <li>
                                        <a href="components-modals.html">Modals</a>
                                    </li>
                                    <li>
                                        <a href="components-cards.html">Cards</a>
                                    </li>
                                    <li>
                                        <a href="components-carousel.html">Carousel</a>
                                    </li>
                                    <li>
                                        <a href="components-countdown.html">Countdown</a>
                                    </li>
                                    <li>
                                        <a href="components-counter.html">Counter</a>
                                    </li>
                                    <li>
                                        <a href="components-sweetalert.html">Sweet Alerts</a>
                                    </li>
                                    <li>
                                        <a href="components-timeline.html">Timeline</a>
                                    </li>
                                    <li>
                                        <a href="components-notifications.html">Notifications</a>
                                    </li>
                                    <li>
                                        <a href="components-media-object.html">Media Object</a>
                                    </li>
                                    <li>
                                        <a href="components-list-group.html">List Group</a>
                                    </li>
                                    <li>
                                        <a href="components-pricing-table.html">Pricing Tables</a>
                                    </li>
                                    <li>
                                        <a href="components-lightbox.html">Lightbox</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu nav-item relative">
                                <a href="javascript:;" class="nav-link">
                                    <div class="flex items-center">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="shrink-0">
                                            <path
                                                fill-rule="evenodd"
                                                clip-rule="evenodd"
                                                d="M8.73167 5.77133L5.66953 9.91436C4.3848 11.6526 3.74244 12.5217 4.09639 13.205C4.10225 13.2164 4.10829 13.2276 4.1145 13.2387C4.48945 13.9117 5.59888 13.9117 7.81775 13.9117C9.05079 13.9117 9.6673 13.9117 10.054 14.2754L10.074 14.2946L13.946 9.72466L13.926 9.70541C13.5474 9.33386 13.5474 8.74151 13.5474 7.55682V7.24712C13.5474 3.96249 13.5474 2.32018 12.6241 2.03721C11.7007 1.75425 10.711 3.09327 8.73167 5.77133Z"
                                                fill="currentColor"
                                            ></path>
                                            <path
                                                opacity="0.5"
                                                d="M10.4527 16.4432L10.4527 16.7528C10.4527 20.0374 10.4527 21.6798 11.376 21.9627C12.2994 22.2457 13.2891 20.9067 15.2685 18.2286L18.3306 14.0856C19.6154 12.3474 20.2577 11.4783 19.9038 10.7949C19.8979 10.7836 19.8919 10.7724 19.8857 10.7613C19.5107 10.0883 18.4013 10.0883 16.1824 10.0883C14.9494 10.0883 14.3329 10.0883 13.9462 9.72461L10.0742 14.2946C10.4528 14.6661 10.4527 15.2585 10.4527 16.4432Z"
                                                fill="currentColor"
                                            ></path>
                                        </svg>
                                        <span class="px-1">Elements</span>
                                    </div>
                                    <div class="right_arrow">
                                        <svg
                                            class="h-4 w-4 rotate-90"
                                            width="16"
                                            height="16"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="elements-alerts.html">Alerts</a>
                                    </li>
                                    <li>
                                        <a href="elements-avatar.html">Avatar</a>
                                    </li>
                                    <li>
                                        <a href="elements-badges.html">Badges</a>
                                    </li>
                                    <li>
                                        <a href="elements-breadcrumbs.html">Breadcrumbs</a>
                                    </li>
                                    <li>
                                        <a href="elements-buttons.html">Buttons</a>
                                    </li>
                                    <li>
                                        <a href="elements-buttons-group.html">Button Groups</a>
                                    </li>
                                    <li>
                                        <a href="elements-color-library.html">Color Library</a>
                                    </li>
                                    <li>
                                        <a href="elements-dropdown.html">Dropdown</a>
                                    </li>
                                    <li>
                                        <a href="elements-infobox.html">Infobox</a>
                                    </li>
                                    <li>
                                        <a href="elements-jumbotron.html">Jumbotron</a>
                                    </li>
                                    <li>
                                        <a href="elements-loader.html">Loader</a>
                                    </li>
                                    <li>
                                        <a href="elements-pagination.html">Pagination</a>
                                    </li>
                                    <li>
                                        <a href="elements-popovers.html">Popovers</a>
                                    </li>
                                    <li>
                                        <a href="elements-progress-bar.html">Progress Bar</a>
                                    </li>
                                    <li>
                                        <a href="elements-search.html">Search</a>
                                    </li>
                                    <li>
                                        <a href="elements-tooltips.html">Tooltips</a>
                                    </li>
                                    <li>
                                        <a href="elements-treeview.html">Treeview</a>
                                    </li>
                                    <li>
                                        <a href="elements-typography.html">Typography</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu nav-item relative">
                                <a href="javascript:;" class="nav-link">
                                    <div class="flex items-center">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="shrink-0">
                                            <path
                                                d="M4.97883 9.68508C2.99294 8.89073 2 8.49355 2 8C2 7.50645 2.99294 7.10927 4.97883 6.31492L7.7873 5.19153C9.77318 4.39718 10.7661 4 12 4C13.2339 4 14.2268 4.39718 16.2127 5.19153L19.0212 6.31492C21.0071 7.10927 22 7.50645 22 8C22 8.49355 21.0071 8.89073 19.0212 9.68508L16.2127 10.8085C14.2268 11.6028 13.2339 12 12 12C10.7661 12 9.77318 11.6028 7.7873 10.8085L4.97883 9.68508Z"
                                                fill="currentColor"
                                            />
                                            <path
                                                fill-rule="evenodd"
                                                clip-rule="evenodd"
                                                d="M2 8C2 8.49355 2.99294 8.89073 4.97883 9.68508L7.7873 10.8085C9.77318 11.6028 10.7661 12 12 12C13.2339 12 14.2268 11.6028 16.2127 10.8085L19.0212 9.68508C21.0071 8.89073 22 8.49355 22 8C22 7.50645 21.0071 7.10927 19.0212 6.31492L16.2127 5.19153C14.2268 4.39718 13.2339 4 12 4C10.7661 4 9.77318 4.39718 7.7873 5.19153L4.97883 6.31492C2.99294 7.10927 2 7.50645 2 8Z"
                                                fill="currentColor"
                                            />
                                            <path
                                                opacity="0.7"
                                                d="M5.76613 10L4.97883 10.3149C2.99294 11.1093 2 11.5065 2 12C2 12.4935 2.99294 12.8907 4.97883 13.6851L7.7873 14.8085C9.77318 15.6028 10.7661 16 12 16C13.2339 16 14.2268 15.6028 16.2127 14.8085L19.0212 13.6851C21.0071 12.8907 22 12.4935 22 12C22 11.5065 21.0071 11.1093 19.0212 10.3149L18.2339 10L16.2127 10.8085C14.2268 11.6028 13.2339 12 12 12C10.7661 12 9.77318 11.6028 7.7873 10.8085L5.76613 10Z"
                                                fill="currentColor"
                                            />
                                            <path
                                                opacity="0.4"
                                                d="M5.76613 14L4.97883 14.3149C2.99294 15.1093 2 15.5065 2 16C2 16.4935 2.99294 16.8907 4.97883 17.6851L7.7873 18.8085C9.77318 19.6028 10.7661 20 12 20C13.2339 20 14.2268 19.6028 16.2127 18.8085L19.0212 17.6851C21.0071 16.8907 22 16.4935 22 16C22 15.5065 21.0071 15.1093 19.0212 14.3149L18.2339 14L16.2127 14.8085C14.2268 15.6028 13.2339 16 12 16C10.7661 16 9.77318 15.6028 7.7873 14.8085L5.76613 14Z"
                                                fill="currentColor"
                                            />
                                        </svg>
                                        <span class="px-1">Tables</span>
                                    </div>
                                    <div class="right_arrow">
                                        <svg
                                            class="h-4 w-4 rotate-90"
                                            width="16"
                                            height="16"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="tables.html">Tables</a>
                                    </li>
                                    <li class="relative">
                                        <a href="javascript:;"
                                            >Data Tables
                                            <div class="ltr:ml-auto rtl:mr-auto rtl:rotate-180">
                                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9 5L15 12L9 19"
                                                        stroke="currentColor"
                                                        stroke-width="1.5"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    />
                                                </svg>
                                            </div>
                                        </a>
                                        <ul
                                            class="absolute top-0 z-[10] hidden min-w-[180px] rounded bg-white p-0 py-2 text-dark shadow ltr:left-[95%] rtl:right-[95%] dark:bg-[#1b2e4b] dark:text-white-dark"
                                        >
                                            <li>
                                                <a href="datatables-basic.html">Basic</a>
                                            </li>
                                            <li>
                                                <a href="datatables-advanced.html">Advanced</a>
                                            </li>
                                            <li>
                                                <a href="datatables-skin.html">Skin</a>
                                            </li>
                                            <li>
                                                <a href="datatables-order-sorting.html">Order Sorting</a>
                                            </li>
                                            <li>
                                                <a href="datatables-multi-column.html">Multi Column</a>
                                            </li>
                                            <li>
                                                <a href="datatables-multiple-tables.html">Multiple Tables</a>
                                            </li>
                                            <li>
                                                <a href="datatables-alt-pagination.html">Alt. Pagination</a>
                                            </li>
                                            <li>
                                                <a href="datatables-checkbox.html">Checkbox</a>
                                            </li>
                                            <li>
                                                <a href="datatables-range-search.html">Range Search</a>
                                            </li>
                                            <li>
                                                <a href="datatables-export.html">Export</a>
                                            </li>
                                            <li>
                                                <a href="datatables-sticky-header.html">Sticky Header</a>
                                            </li>
                                            <li>
                                                <a href="datatables-clone-header.html">Clone Header</a>
                                            </li>
                                            <li>
                                                <a href="datatables-column-chooser.html">Column Chooser</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu nav-item relative">
                                <a href="javascript:;" class="nav-link">
                                    <div class="flex items-center">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="shrink-0">
                                            <path
                                                opacity="0.5"
                                                d="M3 10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H13C16.7712 2 18.6569 2 19.8284 3.17157C21 4.34315 21 6.22876 21 10V14C21 17.7712 21 19.6569 19.8284 20.8284C18.6569 22 16.7712 22 13 22H11C7.22876 22 5.34315 22 4.17157 20.8284C3 19.6569 3 17.7712 3 14V10Z"
                                                fill="currentColor"
                                            />
                                            <path
                                                d="M16.5189 16.5013C16.6939 16.3648 16.8526 16.2061 17.1701 15.8886L21.1275 11.9312C21.2231 11.8356 21.1793 11.6708 21.0515 11.6264C20.5844 11.4644 19.9767 11.1601 19.4083 10.5917C18.8399 10.0233 18.5356 9.41561 18.3736 8.94849C18.3292 8.82066 18.1644 8.77687 18.0688 8.87254L14.1114 12.8299C13.7939 13.1474 13.6352 13.3061 13.4987 13.4811C13.3377 13.6876 13.1996 13.9109 13.087 14.1473C12.9915 14.3476 12.9205 14.5606 12.7786 14.9865L12.5951 15.5368L12.3034 16.4118L12.0299 17.2323C11.9601 17.4419 12.0146 17.6729 12.1708 17.8292C12.3271 17.9854 12.5581 18.0399 12.7677 17.9701L13.5882 17.6966L14.4632 17.4049L15.0135 17.2214L15.0136 17.2214C15.4394 17.0795 15.6524 17.0085 15.8527 16.913C16.0891 16.8004 16.3124 16.6623 16.5189 16.5013Z"
                                                fill="currentColor"
                                            />
                                            <path
                                                d="M22.3665 10.6922C23.2112 9.84754 23.2112 8.47812 22.3665 7.63348C21.5219 6.78884 20.1525 6.78884 19.3078 7.63348L19.1806 7.76071C19.0578 7.88348 19.0022 8.05496 19.0329 8.22586C19.0522 8.33336 19.0879 8.49053 19.153 8.67807C19.2831 9.05314 19.5288 9.54549 19.9917 10.0083C20.4545 10.4712 20.9469 10.7169 21.3219 10.847C21.5095 10.9121 21.6666 10.9478 21.7741 10.9671C21.945 10.9978 22.1165 10.9422 22.2393 10.8194L22.3665 10.6922Z"
                                                fill="currentColor"
                                            />
                                            <path
                                                fill-rule="evenodd"
                                                clip-rule="evenodd"
                                                d="M7.25 9C7.25 8.58579 7.58579 8.25 8 8.25H14.5C14.9142 8.25 15.25 8.58579 15.25 9C15.25 9.41421 14.9142 9.75 14.5 9.75H8C7.58579 9.75 7.25 9.41421 7.25 9ZM7.25 13C7.25 12.5858 7.58579 12.25 8 12.25H11C11.4142 12.25 11.75 12.5858 11.75 13C11.75 13.4142 11.4142 13.75 11 13.75H8C7.58579 13.75 7.25 13.4142 7.25 13ZM7.25 17C7.25 16.5858 7.58579 16.25 8 16.25H9.5C9.91421 16.25 10.25 16.5858 10.25 17C10.25 17.4142 9.91421 17.75 9.5 17.75H8C7.58579 17.75 7.25 17.4142 7.25 17Z"
                                                fill="currentColor"
                                            />
                                        </svg>
                                        <span class="px-1">Forms</span>
                                    </div>
                                    <div class="right_arrow">
                                        <svg
                                            class="h-4 w-4 rotate-90"
                                            width="16"
                                            height="16"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="forms-basic.html">Basic</a>
                                    </li>
                                    <li>
                                        <a href="forms-input-group.html">Input Group</a>
                                    </li>
                                    <li>
                                        <a href="forms-layouts.html">Layouts</a>
                                    </li>
                                    <li>
                                        <a href="forms-validation.html">Validation</a>
                                    </li>
                                    <li>
                                        <a href="forms-input-mask.html">Input Mask</a>
                                    </li>
                                    <li>
                                        <a href="forms-select2.html">Select2</a>
                                    </li>
                                    <li>
                                        <a href="forms-touchspin.html">TouchSpin</a>
                                    </li>
                                    <li>
                                        <a href="forms-checkbox-radio.html">Checkbox & Radio</a>
                                    </li>
                                    <li>
                                        <a href="forms-switches.html">Switches</a>
                                    </li>
                                    <li>
                                        <a href="forms-wizards.html">Wizards</a>
                                    </li>
                                    <li>
                                        <a href="forms-file-upload.html">File Upload</a>
                                    </li>
                                    <li>
                                        <a href="forms-quill-editor.html">Quill Editor</a>
                                    </li>
                                    <li>
                                        <a href="forms-markdown-editor.html">Markdown Editor</a>
                                    </li>
                                    <li>
                                        <a href="forms-date-picker.html">Date & Range Picker</a>
                                    </li>
                                    <li>
                                        <a href="forms-clipboard.html">Clipboard</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu nav-item relative">
                                <a href="javascript:;" class="nav-link">
                                    <div class="flex items-center">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="shrink-0">
                                            <path
                                                opacity="0.5"
                                                fill-rule="evenodd"
                                                clip-rule="evenodd"
                                                d="M14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14V10C2 6.22876 2 4.34315 3.17157 3.17157C4.34315 2 6.23869 2 10.0298 2C10.6358 2 11.1214 2 11.53 2.01666C11.5166 2.09659 11.5095 2.17813 11.5092 2.26057L11.5 5.09497C11.4999 6.19207 11.4998 7.16164 11.6049 7.94316C11.7188 8.79028 11.9803 9.63726 12.6716 10.3285C13.3628 11.0198 14.2098 11.2813 15.0569 11.3952C15.8385 11.5003 16.808 11.5002 17.9051 11.5001L18 11.5001H21.9574C22 12.0344 22 12.6901 22 13.5629V14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22Z"
                                                fill="currentColor"
                                            />
                                            <path
                                                d="M6 13.75C5.58579 13.75 5.25 14.0858 5.25 14.5C5.25 14.9142 5.58579 15.25 6 15.25H14C14.4142 15.25 14.75 14.9142 14.75 14.5C14.75 14.0858 14.4142 13.75 14 13.75H6Z"
                                                fill="currentColor"
                                            />
                                            <path
                                                d="M6 17.25C5.58579 17.25 5.25 17.5858 5.25 18C5.25 18.4142 5.58579 18.75 6 18.75H11.5C11.9142 18.75 12.25 18.4142 12.25 18C12.25 17.5858 11.9142 17.25 11.5 17.25H6Z"
                                                fill="currentColor"
                                            />
                                            <path
                                                d="M11.5092 2.2601L11.5 5.0945C11.4999 6.1916 11.4998 7.16117 11.6049 7.94269C11.7188 8.78981 11.9803 9.6368 12.6716 10.3281C13.3629 11.0193 14.2098 11.2808 15.057 11.3947C15.8385 11.4998 16.808 11.4997 17.9051 11.4996L21.9574 11.4996C21.9698 11.6552 21.9786 11.821 21.9848 11.9995H22C22 11.732 22 11.5983 21.9901 11.4408C21.9335 10.5463 21.5617 9.52125 21.0315 8.79853C20.9382 8.6713 20.8743 8.59493 20.7467 8.44218C19.9542 7.49359 18.911 6.31193 18 5.49953C17.1892 4.77645 16.0787 3.98536 15.1101 3.3385C14.2781 2.78275 13.862 2.50487 13.2915 2.29834C13.1403 2.24359 12.9408 2.18311 12.7846 2.14466C12.4006 2.05013 12.0268 2.01725 11.5 2.00586L11.5092 2.2601Z"
                                                fill="currentColor"
                                            />
                                        </svg>
                                        <span class="px-1">Pages</span>
                                    </div>
                                    <div class="right_arrow">
                                        <svg
                                            class="h-4 w-4 rotate-90"
                                            width="16"
                                            height="16"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </a>
                                <ul class="sub-menu">
                                    <li class="relative">
                                        <a href="javascript:;"
                                            >Users
                                            <div class="ltr:ml-auto rtl:mr-auto rtl:rotate-180">
                                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9 5L15 12L9 19"
                                                        stroke="currentColor"
                                                        stroke-width="1.5"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    />
                                                </svg>
                                            </div>
                                        </a>
                                        <ul
                                            class="absolute top-0 z-[10] hidden min-w-[180px] rounded bg-white p-0 py-2 text-dark shadow ltr:left-[95%] rtl:right-[95%] dark:bg-[#1b2e4b] dark:text-white-dark"
                                        >
                                            <li>
                                                <a href="users-profile.html">Profile</a>
                                            </li>
                                            <li>
                                                <a href="users-account-settings.html">Account Settings</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="pages-knowledge-base.html">Knowledge Base</a>
                                    </li>
                                    <li>
                                        <a href="pages-contact-us-boxed.html" target="_blank">Contact Us Boxed</a>
                                    </li>
                                    <li>
                                        <a href="pages-contact-us-cover.html" target="_blank">Contact Us Cover</a>
                                    </li>
                                    <li>
                                        <a href="pages-faq.html">Faq</a>
                                    </li>
                                    <li>
                                        <a href="pages-coming-soon-boxed.html" target="_blank">Coming Soon Boxed</a>
                                    </li>
                                    <li>
                                        <a href="pages-coming-soon-cover.html" target="_blank">Coming Soon Cover</a>
                                    </li>
                                    <li>
                                        <a href="pages-maintenence.html" target="_blank">Maintanence</a>
                                    </li>
                                    <li class="relative">
                                        <a href="javascript:;"
                                            >Error
                                            <div class="ltr:ml-auto rtl:mr-auto rtl:rotate-180">
                                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9 5L15 12L9 19"
                                                        stroke="currentColor"
                                                        stroke-width="1.5"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    />
                                                </svg>
                                            </div>
                                        </a>
                                        <ul
                                            class="absolute top-0 z-[10] hidden min-w-[180px] rounded bg-white p-0 py-2 text-dark shadow ltr:left-[95%] rtl:right-[95%] dark:bg-[#1b2e4b] dark:text-white-dark"
                                        >
                                            <li>
                                                <a href="pages-error404.html" target="_blank">404</a>
                                            </li>
                                            <li>
                                                <a href="pages-error500.html" target="_blank">500</a>
                                            </li>
                                            <li>
                                                <a href="pages-error503.html" target="_blank">503</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="relative">
                                        <a href="javascript:;"
                                            >Login
                                            <div class="ltr:ml-auto rtl:mr-auto rtl:rotate-180">
                                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9 5L15 12L9 19"
                                                        stroke="currentColor"
                                                        stroke-width="1.5"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    />
                                                </svg>
                                            </div>
                                        </a>
                                        <ul
                                            class="absolute top-0 z-[10] hidden min-w-[180px] rounded bg-white p-0 py-2 text-dark shadow ltr:left-[95%] rtl:right-[95%] dark:bg-[#1b2e4b] dark:text-white-dark"
                                        >
                                            <li>
                                                <a href="auth-cover-login.html" target="_blank">Login Cover</a>
                                            </li>
                                            <li>
                                                <a href="auth-boxed-signin.html" target="_blank">Login Boxed</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="relative">
                                        <a href="javascript:;"
                                            >Register
                                            <div class="ltr:ml-auto rtl:mr-auto rtl:rotate-180">
                                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9 5L15 12L9 19"
                                                        stroke="currentColor"
                                                        stroke-width="1.5"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    />
                                                </svg>
                                            </div>
                                        </a>
                                        <ul
                                            class="absolute top-0 z-[10] hidden min-w-[180px] rounded bg-white p-0 py-2 text-dark shadow ltr:left-[95%] rtl:right-[95%] dark:bg-[#1b2e4b] dark:text-white-dark"
                                        >
                                            <li>
                                                <a href="auth-cover-register.html" target="_blank">Register Cover</a>
                                            </li>
                                            <li>
                                                <a href="auth-boxed-signup.html" target="_blank">Register Boxed</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="relative">
                                        <a href="javascript:;"
                                            >Password Recovery
                                            <div class="ltr:ml-auto rtl:mr-auto rtl:rotate-180">
                                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9 5L15 12L9 19"
                                                        stroke="currentColor"
                                                        stroke-width="1.5"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    />
                                                </svg>
                                            </div>
                                        </a>
                                        <ul
                                            class="absolute top-0 z-[10] hidden min-w-[180px] rounded bg-white p-0 py-2 text-dark shadow ltr:left-[95%] rtl:right-[95%] dark:bg-[#1b2e4b] dark:text-white-dark"
                                        >
                                            <li>
                                                <a href="auth-cover-password-reset.html" target="_blank">Recover ID Cover</a>
                                            </li>
                                            <li>
                                                <a href="auth-boxed-password-reset.html" target="_blank">Recover ID Boxed</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="relative">
                                        <a href="javascript:;"
                                            >Lockscreen
                                            <div class="ltr:ml-auto rtl:mr-auto rtl:rotate-180">
                                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9 5L15 12L9 19"
                                                        stroke="currentColor"
                                                        stroke-width="1.5"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    />
                                                </svg>
                                            </div>
                                        </a>
                                        <ul
                                            class="absolute top-0 z-[10] hidden min-w-[180px] rounded bg-white p-0 py-2 text-dark shadow ltr:left-[95%] rtl:right-[95%] dark:bg-[#1b2e4b] dark:text-white-dark"
                                        >
                                            <li>
                                                <a href="auth-cover-lockscreen.html" target="_blank">Unlock Cover</a>
                                            </li>
                                            <li>
                                                <a href="auth-boxed-lockscreen.html" target="_blank">Unlock Boxed</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu nav-item relative">
                                <a href="javascript:;" class="nav-link">
                                    <div class="flex items-center">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="shrink-0">
                                            <path
                                                opacity="0.5"
                                                d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z"
                                                fill="currentColor"
                                            />
                                            <path
                                                d="M12.75 9C12.75 8.58579 12.4142 8.25 12 8.25C11.5858 8.25 11.25 8.58579 11.25 9L11.25 11.25H9C8.58579 11.25 8.25 11.5858 8.25 12C8.25 12.4142 8.58579 12.75 9 12.75H11.25V15C11.25 15.4142 11.5858 15.75 12 15.75C12.4142 15.75 12.75 15.4142 12.75 15L12.75 12.75H15C15.4142 12.75 15.75 12.4142 15.75 12C15.75 11.5858 15.4142 11.25 15 11.25H12.75V9Z"
                                                fill="currentColor"
                                            />
                                        </svg>
                                        <span class="px-1">More</span>
                                    </div>
                                    <div class="right_arrow">
                                        <svg
                                            class="h-4 w-4 rotate-90"
                                            width="16"
                                            height="16"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="dragndrop.html">Drag and Drop</a>
                                    </li>
                                    <li>
                                        <a href="charts.html">Charts</a>
                                    </li>
                                    <li>
                                        <a href="font-icons.html">Font Icons</a>
                                    </li>
                                    <li>
                                        <a href="widgets.html">Widgets</a>
                                    </li>
                                    <li>
                                        <a href="https://vristo.sbthemes.com" target="_blank">Documentation</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </header>
                <!-- end header section -->

                <div class="dvanimation animate__animated p-3" :class="[$store.app.animation]">
                    <a href="<?php echo e(route('gatepass.create')); ?>">
                        <div class="sticky-button" id="sticky-button">
                            <label for="offchat-menu">
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="24"
                              height="24"
                              viewBox="0 0 24 24"
                              fill="none"
                              stroke="white"
                              stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            >
                              <line x1="12" y1="5" x2="12" y2="19"></line>
                              <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            </label>
                            <span>Create Gatepass</span> <!-- Name of the button -->
                        </div>
                    </a>

                    <?php echo $__env->yieldContent('content'); ?>
                </div>

                <!-- start footer section -->
                <div class="mt-auto p-6 pt-0 text-center dark:text-white-dark ltr:sm:text-left rtl:sm:text-right">
                    © <span id="footer-year">2024</span>. Endel All rights reserved.
                </div>
                <!-- end footer section -->
            </div>
        </div>

        <script src="<?php echo e(asset('assets/js/alpine-collaspe.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/alpine-persist.min.js')); ?>"></script>
        <script defer src="<?php echo e(asset('assets/js/alpine-ui.min.js')); ?>"></script>
        <script defer src="<?php echo e(asset('assets/js/alpine-focus.min.js')); ?>"></script>
        <script defer src="<?php echo e(asset('assets/js/alpine.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/custom.js')); ?>"></script>
        <script  src="<?php echo e(asset('assets/js/apexcharts.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/simple-datatables.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/nice-select2.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/alpine-mask.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/flatpickr.js')); ?>"></script>
         
         <script>
            // main section
            document.addEventListener('alpine:init', () => {
                Alpine.data('scrollToTop', () => ({
                    showTopButton: false,
                    init() {
                        window.onscroll = () => {
                            this.scrollFunction();
                        };
                    },

                    scrollFunction() {
                        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                            this.showTopButton = true;
                        } else {
                            this.showTopButton = false;
                        }
                    },

                    goToTop() {
                        document.body.scrollTop = 0;
                        document.documentElement.scrollTop = 0;
                    },
                }));

                // theme customization
                Alpine.data('customizer', () => ({
                    showCustomizer: false,
                }));

                // sidebar section
                Alpine.data('sidebar', () => ({
                    init() {
                        const selector = document.querySelector('.sidebar ul a[href="' + window.location.pathname + '"]');
                        if (selector) {
                            selector.classList.add('active');
                            const ul = selector.closest('ul.sub-menu');
                            if (ul) {
                                let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                                if (ele) {
                                    ele = ele[0];
                                    setTimeout(() => {
                                        ele.click();
                                    });
                                }
                            }
                        }
                    },
                }));

                // header section
                Alpine.data('header', () => ({
                    init() {
                        const selector = document.querySelector('ul.horizontal-menu a[href="' + window.location.pathname + '"]');
                        if (selector) {
                            selector.classList.add('active');
                            const ul = selector.closest('ul.sub-menu');
                            if (ul) {
                                let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                                if (ele) {
                                    ele = ele[0];
                                    setTimeout(() => {
                                        ele.classList.add('active');
                                    });
                                }
                            }
                        }
                    },

                    removeNotification(value) {
                        this.notifications = this.notifications.filter((d) => d.id !== value);
                    },

                    removeMessage(value) {
                        this.messages = this.messages.filter((d) => d.id !== value);
                    },
                }));

                Alpine.data("form", () => ({
                    init() {
                        flatpickr(document.getElementById('dateTime'), {
                            defaultDate: this.date2,
                            enableTime: true,
                            dateFormat: 'd-m-Y H:i'
                        })
                    }
                }));

            });

        
        </script>
        <script type="text/javascript">
        const dataTable = new simpleDatatables.DataTable("#myTable", {
           searchable: true,
           fixedHeight: true,
        });
      
        </script>
        <?php echo $__env->yieldContent('Script'); ?>
        <script type="text/javascript">
        $( document ).ready(function() {
            var error=$('#error').text()
            var success=$('#success').text()
            var danger=$('#danger').text()
            if (error != '') { showMessage(error,'error') }
            if (success != '') { showMessage(success,'success') }
            if (danger != '') { showMessage(error,'error') }
        });
        function showMessage(msg = '', type = '') {
            const toast = Swal.mixin({
              toast: true,
              position: 'top',
              showConfirmButton: false,
              timer: 3000
            });
            toast.fire({
              icon: type,
              title: msg,
              padding: '10px 20px'
            });
        }
        async  function showAlert(link) {
            const swalWithBootstrapButtons = window.Swal.mixin({
                confirmButtonClass: 'btn btn-secondary',
                cancelButtonClass: 'btn btn-dark ltr:mr-3 rtl:ml-3',
                buttonsStyling: false,
            });
            swalWithBootstrapButtons
            .fire({
                title: 'Are you sure?',
                text: "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true,
                padding: '2em',
            })
            .then((result) => {
                if (result.value) {
                   window.location.href = link;
                    swalWithBootstrapButtons.fire('Deleted!', '', 'success');
                } else if (result.dismiss === window.Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire('Cancelled', '', 'error');
                }
            });
        }
        function preventSpace(event) {
            // Get the key code of the pressed key
            var keyCode = event.keyCode || event.which;

            // If the pressed key is space (key code 32), prevent the default action
            if (keyCode === 32) {
                event.preventDefault();
                return false;
            }
          }

         
        </script>

    </body>
</html>
<?php /**PATH C:\Program Files\Ampps\www\cloud-gatepass\resources\views/layouts/admin.blade.php ENDPATH**/ ?>