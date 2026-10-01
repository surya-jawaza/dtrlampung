<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profil Pengurus — DTR Lampung</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #fff8df;
            color: #172554;
            min-height: 100vh;
        }

        .navbar {
            position: sticky;
            top: 20px;
            z-index: 20;
            width: calc(100% - 10%);
            max-width: 1400px;
            margin: 20px auto 0;
            padding: 14px 20px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            background: #fff;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(23, 37, 84, .08);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;

            text-decoration: none;
            color: #172554;
            font-size: 15px;
            font-weight: 900;
            letter-spacing: 1px;
        }

        .logo img {
            width: 38px;
            height: 38px;
            object-fit: contain;
            border-radius: 8px;
        }

        .back-button {
            padding: 11px 17px;
            border: 1px solid #172554;
            border-radius: 9px;

            text-decoration: none;
            color: #172554;

            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1px;

            transition: .25s ease;
        }

        .back-button:hover {
            background: #172554;
            color: #fff;
        }

        .profile-section {
            max-width: 1200px;
            margin: 70px auto 100px;
            padding: 0 30px;
            text-align: center;
        }

        .section-label {
            margin-bottom: 12px;
            font-size: 11px;
            font-weight: 900;
            letter-spacing: 3px;
            color: #ffc50b;
        }

        .profile-section h1 {
            margin-bottom: 45px;
            font-size: clamp(45px, 7vw, 82px);
            line-height: .9;
            letter-spacing: -4px;
            font-weight: 900;
        }

        .slider {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .slider-window {
    width: min(430px, 58vw);
    overflow: hidden;
    border-radius: 20px;
    touch-action: pan-y;
}

        .slider-track {
            display: flex;
            transition: transform .45s ease;
        }

        .slide {
            min-width: 100%;
            aspect-ratio: 4 / 5;
            overflow: hidden;
            border-radius: 22px;
            background: #172554;
        }

        .slide img {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
        }

        .slider-button {
            position: absolute;
            z-index: 5;

            width: 52px;
            height: 52px;

            border: none;
            border-radius: 50%;

            background: #172554;
            color: #fff;

            font-size: 24px;
            cursor: pointer;

            display: flex;
            align-items: center;
            justify-content: center;

            transition: .25s ease;
        }

        .slider-button:hover {
            background: #ffc50b;
            color: #172554;
            transform: scale(1.05);
        }

        .slider-prev {
            left: 0;
        }

        .slider-next {
            right: 0;
        }

        .dots {
            margin-top: 25px;

            display: flex;
            justify-content: center;
            gap: 8px;
        }

        .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: rgba(23, 37, 84, .25);
            cursor: pointer;
            transition: .25s ease;
        }

        .dot.active {
            width: 24px;
            border-radius: 10px;
            background: #ffc50b;
        }

        .empty {
            padding: 60px 20px;
            background: #fff;
            border-radius: 20px;
            font-weight: 700;
        }

        @media (max-width: 600px) {

            .navbar {
                width: calc(100% - 30px);
            }

            .logo span {
                display: none;
            }

            .profile-section {
                margin-top: 55px;
                padding: 0 15px;
            }

            .profile-section h1 {
                margin-bottom: 35px;
                letter-spacing: -2px;
            }

            .slider-window {
                width: 82vw;
            }

            .slider-button {
                width: 42px;
                height: 42px;
                font-size: 19px;
            }

            .slider-prev {
                left: -5px;
            }

            .slider-next {
                right: -5px;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">

        <a href="{{ url('/') }}" class="logo">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo DTR Lampung">
            <span>DTR LAMPUNG</span>
        </a>

        <a href="{{ url('/') }}#tentang" class="back-button">
            ← KEMBALI
        </a>

    </nav>


    <main class="profile-section">

        <p class="section-label">DTR LAMPUNG</p>

        <h1>PROFIL PENGURUS</h1>


        @if ($pengurus->count() > 0)

            <div class="slider">

                <button class="slider-button slider-prev" onclick="prevSlide()">
                    ←
                </button>


                <div class="slider-window" id="sliderWindow">

                    <div class="slider-track" id="sliderTrack">

                        @foreach ($pengurus as $item)

                            <div class="slide">

                                @if ($item->foto)

                                    <img
                                        src="{{ asset('storage/' . $item->foto) }}"
                                        alt="Pengurus DTR Lampung"
                                    >

                                @endif

                            </div>

                        @endforeach

                    </div>

                </div>


                <button class="slider-button slider-next" onclick="nextSlide()">
                    →
                </button>

            </div>


            <div class="dots">

                @foreach ($pengurus as $index => $item)

                    <span
                        class="dot {{ $index === 0 ? 'active' : '' }}"
                        onclick="goToSlide({{ $index }})">
                    </span>

                @endforeach

            </div>

        @else

            <div class="empty">
                Belum ada data pengurus aktif.
            </div>

        @endif

    </main>


    <script>

        let currentSlide = 0;

        const track = document.getElementById('sliderTrack');
        const slides = document.querySelectorAll('.slide');
        const dots = document.querySelectorAll('.dot');

        function updateSlider() {

            if (!track || slides.length === 0) return;

            track.style.transform =
                `translateX(-${currentSlide * 100}%)`;

            dots.forEach((dot, index) => {

                dot.classList.toggle(
                    'active',
                    index === currentSlide
                );

            });

        }

        function nextSlide() {

            currentSlide =
                (currentSlide + 1) % slides.length;

            updateSlider();

        }

        function prevSlide() {

            currentSlide =
                (currentSlide - 1 + slides.length) % slides.length;

            updateSlider();

        }

        function goToSlide(index) {

            currentSlide = index;

            updateSlider();

        }


        let startX = 0;

        const sliderWindow =
            document.getElementById('sliderWindow');

        if (sliderWindow) {

            sliderWindow.addEventListener('touchstart', function(e) {

                startX = e.touches[0].clientX;

            });

            sliderWindow.addEventListener('touchend', function(e) {

                const endX = e.changedTouches[0].clientX;
                const distance = endX - startX;

                if (Math.abs(distance) > 50) {

                    if (distance < 0) {
                        nextSlide();
                    } else {
                        prevSlide();
                    }

                }

            });

        }

    </script>

</body>
</html>