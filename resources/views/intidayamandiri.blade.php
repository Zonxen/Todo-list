<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inti Daya Mandiri - Sushi Conveyor Maker</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body class="bg-gray-50 text-gray-800">

    <nav id="navbar" class="w-full p-6 z-50 right-0 fixed md:block hidden">
        <ul class="flex justify-end items-center gap-9">
            <li
                class="text-white font-medium tracking-tight hover:underline transition-all duration-100 hover:text-slate-300 font-[poppins]">
                <a href="#">Home</a>
            </li>
            <li
                class="text-white font-medium tracking-tight hover:underline transition-all duration-100 hover:text-slate-300 font-[poppins]">
                <a href="#about">About</a>
            </li>
            <li
                class="text-white font-medium tracking-tight hover:underline transition-all duration-100 hover:text-slate-300 font-[poppins]">
                <a href="#services">Services</a>
            </li>
            <li
                class="text-white font-medium tracking-tight hover:underline transition-all duration-100 hover:text-slate-300 font-[poppins]">
                <a href="#contact">Contact</a>
            </li>
        </ul>
    </nav>

    {{-- mobile --}}
    <nav id="navbarmob"
        class="md:hidden fixed p-5 z-50 bg-gray-700 rounded-md bg-clip-padding backdrop-filter backdrop-blur-lg bg-opacity-10 border border-gray-100 justify-center items-center mx-auto text-center bottom-0 left-1/2 -translate-x-1/2 -translate-y-1/2">
        <ul class="flex items-center mx-auto justify-center gap-6">
            <li class="font-[poppins] font-bold text-white"><a href="#">Home</a></li>
            <li class="font-[poppins] font-bold text-white"><a href="#about">About</a></li>
            <li class="font-[poppins] font-bold text-white"><a href="#services">Services</a></li>
            <li class="font-[poppins] font-bold text-white"><a href="#contact">Contact</a></li>
        </ul>
    </nav>

    <section id="#" class="relative text-white w-full h-screen flex items-center text-left overflow-hidden">
        <!-- Background Blur + Parallax -->
        <div class="absolute inset-0 bg-center bg-cover bg-fixed" style="background-image: url('/sushi-blur.webp')">
        </div>

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/40"></div>

        <!-- Content with animation -->
        <div class="relative md:pl-20 pl-8 z-20 opacity-0 translate-y-10 transition-all duration-1000 ease-out"
            id="hero-text">
            <h1 class="lg:text-8xl md:text-6xl text-6xl font-medium mb-4 font-[Poppins]">
                Spesialis Sushi<br><span class="bg-indigo-700 absolute -z-10 md:p-6 md:mt-0 p-3 mt-1"></span>Conveyor.
            </h1>
            <p class="mb-6 md:text-xl text-lg font-[Poppins]">Sejak 2009, dipercaya restoran Jepang & hotel ternama di
                seluruh
                Indonesia.</p>
            <a href="#contact"
                class="text-lg font-[Poppins] bg-indigo-600 hover:bg-white hover:text-indigo-800 px-6 py-3 rounded-lg font-semibold transition-all">
                Hubungi Kami
            </a>
        </div>
    </section>


    <!-- Tentang Kami -->
    <section id="about" class="max-w-7xl mx-auto py-16 lg:px-4 px-10 flex flex-col items-center">
        <h2 class="md:text-4xl text-3xl font-bold mb-4 font-[Poppins] text-center opacity-0 transition-all duration-1000"
            id="my-fade-element">Tentang Kami</h2>
        <p class="mb-4 md:text-lg text-base font-[Poppins] text-center text-wrap lg:w-1/2">
            PT Inti Daya Mandiri adalah perusahaan manufaktur yang berfokus pada pembuatan
            <span class="font-semibold">sushi conveyor</span>. Produk kami dibuat di Indonesia dengan standar kualitas
            internasional.
        </p>

        <div class="lg:flex lg:flex-row flex flex-col-reverse gap-10 lg:max-w-7xl">
            <div class="lg:w-1/2">
                <ol class="relative border-s border-gray-200 mt-6">
                    <li class="mb-10 ms-4">
                        <div class="absolute w-3 h-3 bg-indigo-600 rounded-full mt-1.5 -start-1.5 border border-white">
                        </div>
                        <time class="mb-1 text-sm font-normal leading-none text-gray-400 font-[Poppins]">Skill</time>
                        <h3 class="text-xl font-semibold text-gray-900 font-[Poppins]">Presisi Machining & Fabrication
                        </h3>
                        <p class="mb-4 text-base font-normal text-gray-500 font-[Poppins]">Kami memiliki kemampuan
                            machining
                            dan fabrication presisi tinggi, memastikan setiap komponen conveyor memiliki tingkat akurasi
                            dan
                            keseimbangan yang sempurna.
                            Dengan pengalaman di industri otomotif dan manufaktur, kami terbiasa bekerja dengan
                            toleransi
                            ketat
                            dan material kompleks.</p>
                        {{-- <a href="#"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-100 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">Learn
                    more <svg class="w-3 h-3 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg></a> --}}
                    </li>
                    <li class="mb-10 ms-4">
                        <div class="absolute w-3 h-3 bg-indigo-600 rounded-full mt-1.5 -start-1.5 border border-white">
                        </div>
                        <time
                            class="mb-1 text-sm font-normal leading-none text-gray-400 font-[Poppins]">Rancangan</time>
                        <h3 class="text-xl font-semibold text-gray-900 font-[Poppins]">Rekayasa Mekanik & Desain Sistem
                        </h3>
                        <p class="mb-4 text-base font-normal text-gray-500 font-[Poppins]">Tim engineering kami mampu
                            merancang
                            sistem mekanik,
                            gear, dan motor penggerak yang stabil, senyap, dan efisien.
                            Kami memahami bagaimana mekanisme conveyor harus berjalan halus untuk menciptakan pengalaman
                            makan
                            yang nyaman.</p>
                    </li>
                    <li class="ms-4">
                        <div class="absolute w-3 h-3 bg-indigo-600 rounded-full mt-1.5 -start-1.5 border border-white">
                        </div>
                        <time class="mb-1 text-sm font-normal leading-none text-gray-400 font-[Poppins]">Keamanan</time>
                        <h3 class="text-xl font-semibold text-gray-900 font-[Poppins]">Standar Food Grade & Keamanan
                        </h3>
                        <p class="mb-4 text-base font-normal text-gray-500 font-[Poppins]">Karena digunakan di
                            lingkungan
                            makanan, seluruh
                            material kami memenuhi standar food grade stainless steel, tahan karat, dan mudah
                            dibersihkan.
                            Kami memastikan sistem conveyor aman digunakan dalam operasional restoran harian.</p>
                    </li>
                </ol>
            </div>
            <div class="lg:w-1/2 flex items-center justify-center"><img class="lg:w-auto md:w-1/2" src="/engineer.webp"
                    alt=""></div>
        </div>





        {{-- <div class="flex min-h-screen items-center justify-center bg-gradient-to-tr to-blue-700 from-indigo-900 p-10">
            <div class="w-max">
                <h1
                    class="animate-typing overflow-hidden whitespace-nowrap border-r-4 border-r-white pr-5 text-5xl text-white font-bold">
                    Hello World
                </h1>
            </div>
        </div> --}}

        <script src="https://cdn.tailwindcss.com"></script>

        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        keyframes: {
                            fadein: {
                                "0%": {
                                    opacity: '0'
                                },
                                "100%": {
                                    opacity: '1'
                                }
                            },
                            typing: {
                                "0%": {
                                    width: "0%",
                                    visibility: "hidden"
                                },
                                "100%": {
                                    width: "100%"
                                }
                            },
                            blink: {
                                "50%": {
                                    borderColor: "transparent"
                                },
                                "100%": {
                                    borderColor: "white"
                                }
                            }
                        },
                        animation: {
                            typing: "typing 3s steps(20) infinite alternate, blink .7s infinite",
                            fadein: "fadein 1s ease-out forwards"
                        }
                    },
                },
                plugins: [],
            }

            const myFadeElement = document.getElementById('my-fade-element');

            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fade-in');
                        entry.target.classList.remove('opacity-0'); // Remove initial opacity
                        observer.unobserve(entry.target); // Stop observing once animated
                    }
                });
            }, {
                threshold: 0.1
            }); // Trigger when 10% of the element is visible

            observer.observe(myFadeElement);


            window.addEventListener('scroll', function() {
                const navbar = document.getElementById('navbar');
                if (window.scrollY > 50) { // Adjust this value as needed
                    navbar.classList.add('bg-slate-900', 'shadow-md', 'backdrop-filter', 'backdrop-blur-md',
                        'bg-opacity-50');
                    navbar.classList.remove('bg-transparent');
                } else {
                    navbar.classList.add('bg-transparent');
                }
            });

            window.addEventListener('scroll', function() {
                const navbar = document.getElementById('navbarmob');
                if (window.scrollY > 50) { // Adjust this value as needed
                    navbar.classList.add('bg-slate-900', 'shadow-md', 'backdrop-filter', 'backdrop-blur-md',
                        'bg-opacity-50');
                    navbar.classList.remove('text-white');
                } else {
                    navbar.classList.add('bg-transparent');
                }
            });
        </script>

    </section>

    <!-- Produk -->
    <section id="services" class="bg-gray-100 py-16 px-4">
        <div class="max-w-5xl mx-auto">
            <h2 class="text-2xl font-bold mb-8 text-center">Produk Sushi Conveyor</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="p-6 bg-white shadow rounded">
                    <h3 class="font-semibold mb-2">Straight Line</h3>
                    <p>Desain linear untuk restoran dengan tata ruang sederhana.</p>
                </div>
                <div class="p-6 bg-white shadow rounded">
                    <h3 class="font-semibold mb-2">U-Shape</h3>
                    <p>Desain melingkar, memberi pengalaman interaksi lebih dekat.</p>
                </div>
                <div class="p-6 bg-white shadow rounded">
                    <h3 class="font-semibold mb-2">Custom</h3>
                    <p>Conveyor sesuai kebutuhan restoran Anda.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Form Kontak -->
    <section id="contact" class="max-w-3xl mx-auto py-16 px-4">
        <h2 class="text-2xl font-bold mb-4 text-center">Hubungi Kami</h2>
        <form action="send_mail.php" method="POST" class="bg-white shadow p-6 rounded space-y-4">
            <input type="text" name="name" placeholder="Nama" required class="w-full border px-4 py-2 rounded">
            <input type="email" name="email" placeholder="Email" required class="w-full border px-4 py-2 rounded">
            <textarea name="message" placeholder="Pesan" rows="5" class="w-full border px-4 py-2 rounded"></textarea>
            <button type="submit"
                class="w-full bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded font-semibold">Kirim
                Pesan</button>
        </form>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 text-center py-6">
        <p>© <?= date('Y') ?> PT Inti Daya Mandiri. Semua Hak Dilindungi.</p>
    </footer>


    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const target = document.getElementById("hero-text");

            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        target.classList.remove("opacity-0", "translate-y-10");
                        target.classList.add("opacity-100", "translate-y-0");
                    }
                });
            });

            observer.observe(target);
        });
    </script>
</body>

</html>
