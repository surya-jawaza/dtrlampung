<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DTR Lampung</title>

    
    <style>


        .marquee-section {
    width: 100%;
    overflow: hidden;
    background: #ffc50b;
    padding: 18px 0;
    border-top: 1px solid #172554;
    border-bottom: 1px solid #172554;
}

.marquee-track {
    display: flex;
    width: max-content;
    animation: marquee 20s linear infinite;
}

.marquee-content {
    display: flex;
    align-items: center;
    white-space: nowrap;
    font-size: 20px;
    font-weight: 800;
    letter-spacing: 3px;
    color: #172554;
}

.marquee-content span {
    margin: 0 35px;
    font-size: 18px;
}

@keyframes marquee {
    from {
        transform: translateX(0);
    }

    to {
        transform: translateX(-50%);
    }
}

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #fff8df;
            color: #172554;
        }


        /* ========================================
           NAVBAR
        ======================================== */

        .navbar {
            position: fixed;
            top: 18px;
            left: 50%;
            transform: translateX(-50%);

            width: 92%;
            max-width: 1160px;
            height: 70px;

            padding: 0 25px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            background: rgba(255, 255, 255, 0.94);
            backdrop-filter: blur(12px);

            border-radius: 18px;

            box-shadow:
                0 8px 30px rgba(23, 37, 84, 0.15);

            z-index: 100;
        }


        .navbar-logo {
            display: flex;
            align-items: center;
            gap: 10px;

            color: #172554;
            text-decoration: none;
        }


        .navbar-logo img {
            width: 43px;
            height: 43px;

            object-fit: contain;
            border-radius: 50%;
        }


        .navbar-logo span {
            font-size: 17px;
            font-weight: 700;
        }


        .navbar-menu {
            display: flex;
            align-items: center;
            gap: 38px;
        }


        .navbar-menu a {
            color: #172554;
            text-decoration: none;

            font-size: 15px;
            font-weight: 600;

            transition: 0.25s;
        }


        .navbar-menu a:hover {
            color: #d99f00;
        }


        .navbar-button {
            padding: 12px 20px;

            border-radius: 11px;

            background: #ffc50b;
            color: #172554;

            text-decoration: none;

            font-size: 14px;
            font-weight: 700;

            transition: 0.25s;
        }


        .navbar-button:hover {
            transform: translateY(-2px);
        }

        .navbar-actions {
    display: flex;
    align-items: center;
    gap: 12px;

    
}

.navbar-login {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    padding: 12px 20px;

    border: 1.5px solid #172554;
    border-radius: 999px;

    color: #172554;
    background: transparent;

    font-size: 14px;
    font-weight: 700;
    text-decoration: none;

    transition: 0.25s ease;
}

.navbar-login:hover {
    background: #172554;
    color: white;
}

        
     /* =========================
   HERO
========================= */

.hero {
    position: relative;
    min-height: 100vh;
    overflow: hidden;
    background: #fff8df;
}


/* =========================
   HERO IMAGE
========================= */

.hero-image {
    position: absolute;
    top: 0;
    left: 0;

    width: 100%;
    height: 82%;

    z-index: 1;
}

.hero-image img {
    display: block;

    width: 100%;
    height: 100%;

    object-fit: cover;
    object-position: center 35%;
}


/* =========================
   FADE FOTO KE CREAM
========================= */

.hero-image::after {
    content: "";

    position: absolute;
    inset: 0;

    pointer-events: none;

    background:
        linear-gradient(
            105deg,
            #fff8df 18%,
            rgba(255, 248, 223, 0.96) 31%,
            rgba(255, 248, 223, 0.78) 42%,
            rgba(255, 248, 223, 0.40) 55%,
            rgba(255, 248, 223, 0.12) 68%,
            rgba(255, 248, 223, 0) 80%
        );

    z-index: 2;
}


/* =========================
   FADE BAGIAN BAWAH
========================= */

.hero-image::before {
    content: "";

    position: absolute;

    left: 0;
    right: 0;
    bottom: 0;

    height: 45%;

    pointer-events: none;

    background:
        linear-gradient(
            to bottom,
            rgba(255, 248, 223, 0) 0%,
            rgba(255, 248, 223, 0.08) 20%,
            rgba(255, 248, 223, 0.30) 45%,
            rgba(255, 248, 223, 0.72) 75%,
            #fff8df 100%
        );

    z-index: 3;
}


/* =========================
   HERO CONTENT
========================= */

.hero-content {
    position: relative;

    z-index: 5;

    width: 100%;
    max-width: 1400px;

    min-height: 100vh;

    margin: 0 auto;

    padding-left: 7%;
    padding-right: 7%;

    padding-top: 330px;
    padding-bottom: 100px;

    display: flex;
    align-items: flex-start;
}


/* =========================
   LABEL
========================= */

.hero-label {
    margin-bottom: 22px;

    font-size: 15px;

    font-weight: 800;

    letter-spacing: 7px;

    color: #172554;
}


/* =========================
   JUDUL
========================= */

.hero h1 {
    margin: 0 0 24px;
    max-width: 1000px;

    font-size: clamp(48px, 5vw, 76px);
    line-height: .95;
    letter-spacing: -3px;
    font-weight: 900;

    color: #172554;
}

.hero h1 span {
    display: block;

    margin-top: 2px;

    font-size: clamp(24px, 2.5vw, 38px);
    line-height: 1.05;
    letter-spacing: -1.5px;
    font-weight: 800;

    white-space: nowrap;
}


/* =========================
   DESKRIPSI
========================= */

.hero-content p {
    max-width: 600px;

    margin: 0 0 30px;

    font-size: 19px;

    line-height: 1.55;

    color: #172554;
}


/* =========================
   BUTTON AREA
========================= */

.hero-actions {
    display: flex;

    align-items: center;

    gap: 12px;
}


/* =========================
   HERO BUTTON
========================= */

.hero-button {
    display: inline-flex;

    align-items: center;
    justify-content: center;

    gap: 25px;

    padding: 16px 28px;

    min-height: 56px;

    border-radius: 16px;

    background: #ffc50b;

    color: #172554;

    text-decoration: none;

    font-size: 18px;

    font-weight: 700;

    letter-spacing: 0;

    transition: 0.25s ease;
}

.hero-button span {
    font-size: 22px;

    line-height: 1;

    transition: transform 0.25s ease;
}

.hero-button:hover {
    transform: translateY(-2px);
}

.hero-button:hover span {
    transform: translateX(4px);
}



/* TOMBOL KUNING */

.hero-button.primary {
    background: #ffc50b;
    color: #172554;
}


/* TOMBOL OUTLINE */

.hero-button.secondary {
    background: transparent;

    border: 1.5px solid #172554;

    color: #172554;
}


/* HOVER */

.hero-button:hover {
    transform: translateY(-2px);
}

.hero-button.secondary:hover {
    background: #172554;
    color: white;
}


/* =========================
   MOBILE
========================= */

@media (max-width: 768px) {

    .hero {
        min-height: 850px;
    }

    .hero-image {
        height: 68%;
    }

    .hero-image img {
        object-position: 60% 30%;
    }

    .hero-content {
        min-height: 850px;

        padding-left: 6%;
        padding-right: 6%;

        padding-top: 390px;
        padding-bottom: 60px;
    }

    .hero-label {
        font-size: 11px;
        letter-spacing: 4px;

        margin-bottom: 16px;
    }

    .hero h1 {
        font-size: clamp(42px, 11vw, 60px);

        letter-spacing: -2px;

        line-height: 0.96;
    }

    .hero-content p {
        font-size: 16px;

        max-width: 450px;
    }

    .hero-actions {
        flex-wrap: wrap;
    }

}






  /* =========================
   WHO WE ARE
========================= */

.who-section {
    background: #fff;
    padding: 120px 7%;
    overflow: hidden;
}

.who-container {
    max-width: 1400px;
    margin: 0 auto;

    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 80px;

    align-items: center;
}


/* BAGIAN KIRI */

.who-left h2 {
    margin: 0 0 28px;

    font-size: clamp(48px, 5vw, 72px);
    line-height: .95;
    font-weight: 900;
    letter-spacing: -3px;

    color: #172554;
}

.who-description {
    max-width: 650px;

    margin: 0 0 30px;

    font-size: 17px;
    line-height: 1.6;

    color: #172554;
}

.who-description span {
    color: #ffc50b;
    font-weight: 700;
}

.who-left h3 {
    max-width: 650px;

    margin: 0 0 30px;

    font-size: 22px;
    line-height: 1.25;
    font-weight: 800;

    color: #172554;
}


/* BUTTON */

.who-button {
    display: inline-flex;
    align-items: center;
    gap: 20px;

    padding: 14px 18px;

    border: 1px solid #172554;
    border-radius: 9px;

    text-decoration: none;

    font-size: 12px;
    font-weight: 800;
    color: #172554;

    transition:
        background .25s ease,
        color .25s ease,
        transform .25s ease;
}

.who-button span {
    font-size: 18px;
}

.who-button:hover {
    background: #172554;
    color: #fff;
    transform: translateY(-2px);
}


/* =========================
   INFO CARD
========================= */

.who-card {
    overflow: hidden;

    border-radius: 0 0 14px 14px;

    background: #172554;

    color: #fff;

    box-shadow: 0 15px 35px rgba(23, 37, 84, .10);
}


/* TUGAS */

.who-card-top {
    padding: 25px 25px 28px;

    background: #ffc50b;

    color: #172554;

    border-radius: 0 0 12px 12px;
}

.who-card-label {
    margin-bottom: 12px;

    font-size: 11px;
    font-weight: 900;
    letter-spacing: .5px;
}

.who-card-title {
    max-width: 620px;

    font-size: 21px;
    line-height: 1.15;
    font-weight: 800;
}


/* WEWENANG */

.who-card-middle {
    display: grid;
    grid-template-columns: 125px 1fr;
    gap: 20px;

    padding: 25px;

    border-bottom: 1px solid rgba(255,255,255,.18);
}

.who-card-middle .who-card-label,
.who-card-bottom .who-card-label {
    color: #ffc50b;
}

.who-card-text {
    font-size: 15px;
    line-height: 1.55;
}


/* NILAI */

.who-card-bottom {
    display: grid;
    grid-template-columns: 125px 1fr;
    gap: 20px;

    padding: 25px;
}

.who-card-bottom strong {
    font-weight: 800;
}


/* =========================
   SLIDE IN FROM BOTTOM
========================= */

.reveal-bottom {
    opacity: 1;
    transform: translateY(80px);
    will-change: transform;
}

/* DELAY CARD KANAN */

.who-card.reveal-bottom {
    transition-delay: .15s;
}


/* =========================
   MOBILE
========================= */

@media (max-width: 900px) {

    .who-section {
        padding: 80px 6%;
    }

    .who-container {
        grid-template-columns: 1fr;
        gap: 50px;
    }

    .who-left h2 {
        font-size: 48px;
    }

    .who-card-middle,
    .who-card-bottom {
        grid-template-columns: 100px 1fr;
    }

}

@media (max-width: 600px) {

    .who-left h2 {
        font-size: 42px;
        letter-spacing: -2px;
    }

    .who-description {
        font-size: 15px;
    }

    .who-left h3 {
        font-size: 20px;
    }

    .who-card-title {
        font-size: 18px;
    }

    .who-card-middle,
    .who-card-bottom {
        grid-template-columns: 1fr;
        gap: 10px;
    }

}

/* ========================================
   OUR PROGRAM
======================================== */

.program-section {
    background: #ffffff;
    padding: 120px 7%;
    overflow: hidden;
}

.program-container {
    max-width: 1400px;
    margin: 0 auto;
}

.program-heading {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    gap: 40px;
    margin-bottom: 55px;
}

.program-label {
    margin: 0 0 15px;

    font-size: 13px;
    font-weight: 800;
    letter-spacing: 4px;
    color: #172554;
}

.program-title {
    margin: 0;

    font-size: clamp(48px, 5vw, 72px);
    line-height: .9;
    letter-spacing: -3px;
    font-weight: 900;
    color: #172554;
}

.program-intro {
    max-width: 360px;
    margin: 0;

    font-size: 16px;
    line-height: 1.6;
    color: #172554;
}


/* GRID */

.program-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 22px;
}


/* CARD */

.program-card {
    position: relative;
    overflow: hidden;

    min-height: 470px;

    background: #172554;
    border-radius: 18px;

    color: white;

    transition:
        transform .35s ease,
        box-shadow .35s ease;
}

.program-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(23, 37, 84, .18);
}


/* IMAGE */

.program-card-image {
    width: 100%;
    height: 245px;

    overflow: hidden;
}

.program-card-image img {
    width: 100%;
    height: 100%;

    object-fit: cover;

    transition: transform .5s ease;
}

.program-card:hover .program-card-image img {
    transform: scale(1.05);
}


/* CONTENT */

.program-card-content {
    position: relative;
    padding: 28px 30px 85px;
}

.program-number {
    display: block;

    margin-bottom: 18px;

    font-size: 12px;
    font-weight: 800;
    letter-spacing: 2px;

    color: #ffc50b;
}

.program-card h3 {
    margin: 0 0 12px;

    font-size: 30px;
    line-height: 1;
    font-weight: 900;
    letter-spacing: -1px;
}

.program-card p {
    max-width: 500px;

    margin: 0;

    font-size: 15px;
    line-height: 1.55;

    color: rgba(255,255,255,.78);
}


/* ARROW */

.program-arrow {
    position: absolute;

    right: 28px;
    bottom: 28px;

    display: flex;
    align-items: center;
    justify-content: center;

    width: 42px;
    height: 42px;

    border: 1px solid rgba(255,255,255,.35);
    border-radius: 50%;

    font-size: 20px;

    transition:
        background .3s ease,
        color .3s ease,
        transform .3s ease;
}

.program-card:hover .program-arrow {
    background: #ffc50b;
    color: #172554;
    transform: rotate(45deg);
}


/* MOBILE */

@media (max-width: 800px) {

    .program-section {
        padding: 80px 6%;
    }

    .program-heading {
        display: block;
        margin-bottom: 40px;
    }

    .program-intro {
        margin-top: 25px;
    }

    .program-grid {
        grid-template-columns: 1fr;
    }

    .program-card {
        min-height: 430px;
    }

}
.program-card:last-child p {
    max-width: calc(100% - 150px);
}

/* ========================================
   PROGRAM HOVER
======================================== */

/* SAMWIL, WORKSHOP, NGETIM */

.program-card:nth-child(1):hover,
.program-card:nth-child(2):hover,
.program-card:nth-child(3):hover {
    background: #ffc50b;
    color: #172554;
}

.program-card:nth-child(1):hover .program-number,
.program-card:nth-child(2):hover .program-number,
.program-card:nth-child(3):hover .program-number {
    color: #172554;
}

.program-card:nth-child(1):hover p,
.program-card:nth-child(2):hover p,
.program-card:nth-child(3):hover p {
    color: rgba(23, 37, 84, .78);
}


/* KAJIAN */

.program-article-button {
    position: absolute;

    right: 30px;
    bottom: 28px;

    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 12px;

    min-width: 125px;
    height: 58px;

    padding: 0 20px;

    background: #ffc50b;
    border: 1px solid #ffc50b;
    border-radius: 10px;

    text-decoration: none;

    font-size: 12px;
    font-weight: 800;
    letter-spacing: 1px;

    color: #172554;

    transition:
        background .3s ease,
        color .3s ease,
        transform .3s ease;
}

.program-article-button span {
    font-size: 17px;
}

.program-article-button:hover {
    background: #fff;
    border-color: #fff;
    color: #172554;
    transform: translateY(-3px);
}


       /* ========================================
   BERITA & KEGIATAN
======================================== */

.news-section {
    background: #fff;
    padding: 120px 7%;
}

.news-container {
    max-width: 1400px;
    margin: 0 auto;
}

.news-heading {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    gap: 40px;
    margin-bottom: 55px;
}

.news-label {
    margin: 0 0 15px;

    font-size: 13px;
    font-weight: 800;
    letter-spacing: 4px;

    color: #172554;
}

.news-title {
    margin: 0;

    font-size: clamp(48px, 5vw, 72px);
    line-height: .9;
    letter-spacing: -3px;
    font-weight: 900;

    color: #172554;
}

.news-intro {
    max-width: 360px;
    margin: 0;

    font-size: 16px;
    line-height: 1.6;

    color: #172554;
}


/* CARD */

.news-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 22px;
}

.news-card {
    display: flex;
    flex-direction: column;

    overflow: hidden;

    background: #172554;
    border-radius: 18px;

    color: #fff;

    transition:
        transform .35s ease,
        box-shadow .35s ease;
}

.news-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 40px rgba(23, 37, 84, .18);
}

/* IMAGE */

.news-image {
    width: 100%;
    height: 230px;
    overflow: hidden;
}

.news-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;

    transition: transform .5s ease;
}

.news-card:hover .news-image img {
    transform: scale(1.04);
}

/* CONTENT */

.news-content {
    display: flex;
    flex-direction: column;

    flex: 1;

    padding: 28px;
}

.news-content h3 {
    margin: 0 0 15px;

    font-size: 28px;
    line-height: 1;
    font-weight: 900;
}

.news-content p {
    margin: 0 0 25px;

    font-size: 14px;
    line-height: 1.6;

    color: rgba(255,255,255,.78);
}

.news-button {
    margin-top: auto;
}


/* BUTTON */

.news-button {
    display: inline-flex;
    align-items: center;
    gap: 12px;

    width: fit-content;

    padding: 13px 18px;

    background: #ffc50b;
    border-radius: 9px;

    text-decoration: none;

    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1px;

    color: #172554;

    transition:
        background .25s ease,
        transform .25s ease;
}

.news-button span {
    font-size: 17px;
}

.news-button:hover {
    background: #fff;
    transform: translateY(-2px);
}


/* MOBILE */

@media (max-width: 800px) {

    .news-section {
        padding: 80px 6%;
    }

    .news-heading {
        display: block;
        margin-bottom: 40px;
    }

    .news-intro {
        margin-top: 25px;
    }

    .news-card {
        grid-template-columns: 1fr;
    }

    .news-image {
        height: 280px;
        min-height: 280px;
    }

    .news-content {
        padding: 35px 28px;
    }

    .news-content h3 {
        font-size: 30px;
    }

}
@media (max-width: 900px) {

    .news-grid {
        grid-template-columns: 1fr;
    }

}

.cta-section {
    background: #172554;
    padding: 120px 7%;
    overflow: hidden;
}

.cta-container {
    max-width: 1100px;
    margin: 0 auto;
    text-align: center;

    display: flex;
    flex-direction: column;
    align-items: center;
}

.cta-label {
    margin: 0 0 22px;
    font-size: 12px;
    font-weight: 800;
    letter-spacing: 4px;
    color: #ffc50b;
}

.cta-section h2 {
    max-width: 950px;
    margin: 0 0 40px;

    font-size: clamp(48px, 7vw, 96px);
    line-height: .9;
    letter-spacing: -4px;
    font-weight: 900;

    color: #fff;
}

.cta-button {
    display: inline-flex;
    align-items: center;
    gap: 14px;

    padding: 17px 24px;

    background: #ffc50b;
    border-radius: 10px;

    text-decoration: none;

    font-size: 12px;
    font-weight: 800;
    letter-spacing: 1px;

    color: #172554;

    transition: .25s ease;
}

.cta-button span {
    font-size: 18px;
}

.cta-button:hover {
    background: #fff;
    transform: translateY(-3px);
}


        /* ========================================
           TRAINING
        ======================================== */

        .training-section {
            padding: 120px 7%;

            background: #ffc50b;

            color: #172554;

            text-align: center;
        }


        .training-container {
            max-width: 850px;

            margin: 0 auto;
        }


        .training-section h2 {
            margin-bottom: 20px;

            font-size: clamp(
                45px,
                6vw,
                75px
            );

            letter-spacing: -3px;
        }


        .training-section p {
            margin-bottom: 30px;

            font-size: 18px;

            line-height: 1.7;
        }


        .training-button {
            display: inline-block;

            padding: 15px 25px;

            border-radius: 11px;

            background: #172554;

            color: white;

            text-decoration: none;

            font-weight: 700;

            transition: 0.25s;
        }


        .training-button:hover {
            transform: translateY(-2px);
        }



        /* ========================================
           KOLABORASI
        ======================================== */

        .collaboration-section {
            min-height: 70vh;

            padding: 120px 7%;

            background: #fff8df;

            display: flex;

            align-items: center;
        }


        .collaboration-container {
            width: 100%;

            max-width: 1250px;

            margin: 0 auto;
        }


        .collaboration-section h2 {
            margin-bottom: 25px;

            font-size: clamp(
                45px,
                6vw,
                75px
            );

            letter-spacing: -3px;
        }


        .collaboration-section p {
            max-width: 650px;

            margin-bottom: 30px;

            font-size: 18px;

            line-height: 1.8;
        }


        .collaboration-button {
            display: inline-block;

            padding: 14px 22px;

            border-radius: 11px;

            background: #172554;

            color: white;

            text-decoration: none;

            font-weight: 700;
        }



  /* =========================
   HUBUNGI KAMI
========================= */

.contact-section {
    background: #fff;
    padding: 120px 7%;
    overflow: hidden;
}

.contact-container {
    max-width: 1400px;
    margin: 0 auto;

    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 80px;
    align-items: center;
}

.contact-container h2 {
    margin: 0;

    font-size: clamp(55px, 7vw, 100px);
    line-height: .9;
    letter-spacing: -4px;
    font-weight: 900;

    color: #172554;
}

.contact-info {
    display: flex;
    flex-direction: column;
    gap: 0;
}

.contact-item {
    display: flex;
    align-items: center;
    justify-content: space-between;

    padding: 25px 0;

    border-bottom: 1px solid rgba(23, 37, 84, .15);
}

.contact-item:first-child {
    border-top: 1px solid rgba(23, 37, 84, .15);
}

.contact-item small {
    font-size: 10px;
    font-weight: 900;
    letter-spacing: 2px;

    color: #ffc50b;
}

.contact-item span {
    font-size: 15px;
    font-weight: 700;
    text-align: right;

    color: #172554;
}


/* =========================
   RESPONSIVE
========================= */

@media (max-width: 900px) {

    .contact-container {
        grid-template-columns: 1fr;
        gap: 50px;
    }

    .contact-container h2 {
        font-size: clamp(55px, 12vw, 80px);
    }

}

@media (max-width: 600px) {

    .contact-section {
        padding: 90px 20px;
    }

    .contact-item {
        align-items: flex-start;
        flex-direction: column;
        gap: 8px;
    }

    .contact-item span {
        text-align: left;
    }

}

        /* ========================================
           FOOTER
        ======================================== */

        footer {
            padding: 30px 7%;

            background: #101a3a;

            color:
                rgba(255,255,255,0.65);

            text-align: center;

            font-size: 13px;
        }



        /* ========================================
           MOBILE
        ======================================== */

        @media (max-width: 900px) {

            .program-grid {
                grid-template-columns:
                    repeat(2, 1fr);
            }


            .who-container {
                grid-template-columns: 1fr;

                gap: 50px;
            }
        }


        @media (max-width: 768px) {

            .navbar {
                top: 10px;

                width: 94%;

                height: 62px;

                padding: 0 14px;

                border-radius: 15px;
            }


            .navbar-logo img {
                width: 36px;
                height: 36px;
            }


            .navbar-logo span {
                font-size: 13px;
            }


            .navbar-menu {
                display: none;
            }


            .navbar-button {
                padding: 9px 13px;

                font-size: 12px;
            }



            /* HERO */

            .hero {
                min-height: 92vh;
            }


            .hero-image {
                height: 82%;
            }


            .hero-image img {
                object-position: center center;
            }


            .hero-image::after {
                background:
                    linear-gradient(
                        105deg,

                        #fff8df 18%,

                        rgba(255, 248, 223, 0.90) 32%,

                        rgba(255, 248, 223, 0.50) 48%,

                        rgba(255, 248, 223, 0.12) 65%,

                        rgba(255, 248, 223, 0) 80%
                    );
            }


            .hero-image::before {
                height: 27%;

                background:
                    linear-gradient(
                        to bottom,

                        rgba(255, 248, 223, 0) 0%,

                        rgba(255, 248, 223, 0.15) 30%,

                        rgba(255, 248, 223, 0.55) 65%,

                        #fff8df 100%
                    );
            }


            .hero-content {
                min-height: 92vh;

                padding-left: 7%;
                padding-right: 7%;

                padding-bottom: 55px;
            }


            .hero-text {
                max-width: 100%;
            }


            .hero-small {
                font-size: 10px;

                letter-spacing: 4px;

                margin-bottom: 10px;
            }


            .hero-tagline {
                font-size: 10px;

                letter-spacing: 2px;

                margin-bottom: 18px;
            }


            .hero h1 {
                font-size: 46px;

                letter-spacing: -2px;

                line-height: 0.95;

                margin-bottom: 20px;
            }


            .hero-description {
                font-size: 15px;

                line-height: 1.55;

                margin-bottom: 22px;
            }


            .hero-button {
                padding: 13px 18px;

                font-size: 14px;
            }



            /* WHO WE ARE */

            .who-section {
                min-height: auto;

                padding: 90px 7%;
            }


            .who-heading h2 {
                font-size: 60px;

                letter-spacing: -3px;
            }


            .who-intro {
                font-size: 25px;
            }


            .who-description {
                font-size: 16px;
            }



            /* PROGRAM */

            .program-section {
                padding: 90px 7%;
            }


            .program-grid {
                grid-template-columns: 1fr;
            }


            .program-card {
                min-height: 240px;
            }



            /* NEWS */

            .news-section {
                padding: 90px 7%;
            }



            /* TRAINING */

            .training-section {
                padding: 90px 7%;
            }



            /* COLLABORATION */

            .collaboration-section {
                min-height: auto;

                padding: 90px 7%;
            }



            /* CONTACT */

            .contact-section {
                padding: 80px 7%;
            }


            .contact-info {
                flex-direction: column;

                gap: 25px;
            }

        }

    </style>
</head>


<body>


    <!-- ========================================
         NAVBAR
    ========================================= -->

   <nav class="navbar">

    <a
        href="#beranda"
        class="navbar-logo"
    >

        <img
            src="{{ asset('images/logo.jpg') }}"
            alt="Logo DTR Lampung"
        >

        <span>
            DTR LAMPUNG
        </span>

    </a>


    <div class="navbar-menu">

        <a href="#tentang">
            Tentang Kami
        </a>

       <a
    href="https://drive.google.com/drive/folders/1j9qjOC6gr8BxNlmpKAOv3DjN6PzKKwiZ?usp=sharing"
    target="_blank"
    rel="noopener noreferrer"
>
    Informasi
</a>

        <a href="https://zaap.bio/dtr-lampung"
   target="_blank"
   rel="noopener noreferrer">
    Artikel
</a>

    </div>


    <div class="navbar-actions">

        <a
            href="https://linktr.ee/dtrlampung.official"
            class="navbar-button"
        >
            Daftar Training
        </a>

        <a
            href="{{ route('login') }}"
            class="navbar-login"
        >
            Login Admin
        </a>

    </div>

</nav>



    <!-- ========================================
         HERO
    ========================================= -->

    <section
        id="beranda"
        class="hero"
    >

        <div class="hero-image">

            <img
                src="{{ asset('images/hero2.png') }}"
                alt="DTR Lampung"
            >

        </div>


        <div class="hero-content">

            <div class="hero-text">

                


              <h1>
    SELAMAT DATANG
    <span>Di Laman Resmi DTR LAMPUNG</span>
</h1>




                <p class="hero-description">
                    Ruang belajar dan berlatih bersma untuk seluruh masyarakat pelajar.
                </p>


                <a
                    href="#tentang"
                    class="hero-button"
                >
                    Kenali Kami

                    <span>
                        →
                    </span>

                </a>

            </div>

        </div>

    </section>

    <!-- ========================================
     MARQUEE
========================================= -->

<section class="marquee-section">

    <div class="marquee-track">

        <div class="marquee-content">
            MUSLIM CENDIKIA PEMIMPIN
            <span>✦</span>
            MUSLIM CENDIKIA PEMIMPIN
            <span>✦</span>
            MUSLIM CENDIKIA PEMIMPIN
            <span>✦</span>
        </div>

        <div class="marquee-content">
            MUSLIM CENDIKIA PEMIMPIN
            <span>✦</span>
            MUSLIM CENDIKIA PEMIMPIN
            <span>✦</span>
            MUSLIM CENDIKIA PEMIMPIN
            <span>✦</span>
        </div>

    </div>

</section>



    <!-- ========================================
         WHO WE ARE
    ========================================= -->

<section id="tentang" class="who-section">

    <div class="who-container">

        <!-- BAGIAN KIRI -->
        <div class="who-left reveal-bottom">

            <h2>WHO WE ARE?</h2>

            <p class="who-description">
                Dewan Taddib Regional Lampung datang dengan semangat
                <span>#lifelonglearner.</span>
                Sebagai Lembaga Khusus PW PII Lampung untuk menghadirkan kebermanfaatan kepada seluruh masyarakat pelajar.
            </p>

            <h3>
                Kami hadir untuk menghubungkan potensi menjadi dampak.
            </h3>

            <a href="/profilpengurusdtr" class="who-button">
                LIHAT PENGURUS
                <span>↗</span>
            </a>

        </div>


        <!-- BAGIAN KANAN -->
        <div class="who-card reveal-bottom">

            <div class="who-card-top">
                <div class="who-card-label">
                    TUGAS
                </div>

                <div class="who-card-title">
                    Pengelolaan, monitoring dan evaluasi
                    sistem Ta’dib di Regional Lampung.
                </div>
            </div>


            <div class="who-card-middle">

                <div class="who-card-label">
                    WEWENANG
                </div>

                <div class="who-card-text">
                    Setiap eselon dewan ta’dib berhak
                    mengembangkan sistem Ta’dib di teritorial
                    masing-masing.
                </div>

            </div>


            <div class="who-card-bottom">

                <div class="who-card-label">
                    NILAI
                </div>

                <div class="who-card-text">
                    <strong>
                        Muslim · Cendikia · Pemimpin
                    </strong>
                    dengan semangat
                    <strong>#Lifelonglearner</strong>
                </div>

            </div>

        </div>

    </div>

</section>


 <!-- ========================================
     OUR PROGRAM
======================================== -->

<section id="program" class="program-section">

    <div class="program-container">

        <div class="program-heading">

            <div>

                <h2 class="program-title">
                    OUR PROGRAM
                </h2>
            </div>

            <p class="program-intro">
                Ruang untuk belajar, bertumbuh,
                dan membangun pengalaman bersama.
            </p>

        </div>


        <div class="program-grid">

            <!-- SAMWIL -->
            <article class="program-card">

                <div class="program-card-image">
                    <img
                        src="{{ asset('images/hero.png') }}"
                        alt="SAMWIL"
                    >
                </div>

                <div class="program-card-content">

                    <span class="program-number">
                        01
                    </span>

                    <h3>
                        SAMWIL
                    </h3>

                    <p>
                        sarasehan muaddib wilayah yang akan rutin 
                        di lakukan sebelum dan sesudah training.
                    </p>

        

                    

                </div>

            </article>


            <!-- WORKSHOP -->
            <article class="program-card">

                <div class="program-card-image">
                    <img
                        src="{{ asset('images/hero.png') }}"
                        alt="Workshop"
                    >
                </div>

                <div class="program-card-content">

                    <span class="program-number">
                        02
                    </span>

                    <h3>
                        WORKSHOP
                    </h3>

                    <p>
                        kegiatan atau pertemuan interaktif untuk belajar, berdiskusi, 
                        dan mempraktikkan keterampilan  secara langsung.
                    </p>

                   

                </div>

            </article>


            <!-- NGETIM -->
            <article class="program-card">

                <div class="program-card-image">
                    <img
                        src="{{ asset('images/hero.png') }}"
                        alt="Ngetim"
                    >
                </div>

                <div class="program-card-content">

                    <span class="program-number">
                        03
                    </span>

                    <h3>
                        NGETIM
                    </h3>

                    <p>
                        Berproses dengan membentuk tim untuk mengelola 
                        kegiatan ; training, kursus, lalu belajar dari setiap hasil.
                    </p>

            

                </div>

            </article>


            <!-- KAJIAN -->
            <article class="program-card">

                <div class="program-card-image">
                    <img
                        src="{{ asset('images/hero.png') }}"
                        alt="Kajian"
                    >
                </div>

                <div class="program-card-content">

                    <span class="program-number">
                        04
                    </span>

                    <h3>
                        KAJIAN
                    </h3>

                    <p>
                        Merawat rasa ingin tahu melalui diskusi, mengkaji isu, 
                        membuat riset hingga di tuangkan dalam tulisan.
                    </p>

                    <a href="https://zaap.bio/dtr-lampung"
   class="program-article-button"
   target="_blank"
   rel="noopener noreferrer">
    ARTIKEL
    <span>↗</span>
</a>

                </div>

            </article>

        </div>

    </div>

</section>


    <!-- ========================================
     BERITA & KEGIATAN
======================================== -->

<section id="berita" class="news-section">

    <div class="news-container">

        <div class="news-heading">

            <div>
                <h2 class="news-title">
                    BERITA & KEGIATAN
                </h2>
            </div>

        </div>


        <!-- SATU KARTU BERITA -->

    <div class="news-grid">

    @forelse ($kegiatan as $item)

        <article class="news-card">

            <div class="news-image">
                @if ($item->foto_utama)
                    <img
                        src="{{ asset('storage/' . $item->foto_utama) }}"
                        alt="{{ $item->judul_kegiatan }}"
                    >
                @else
                    <img
                        src="{{ asset('images/hero.png') }}"
                        alt="{{ $item->judul_kegiatan }}"
                    >
                @endif
            </div>

            <div class="news-content">

                <div class="news-meta">
                    <span>{{ strtoupper($item->kategori) }}</span>
                    <span>•</span>
                    <span>{{ $item->tanggal->format('Y') }}</span>
                </div>

                <h3>
                    {{ $item->judul_kegiatan }}
                </h3>

                <p>
                    {{ $item->ringkasan }}
                </p>

                <a href="{{ route('berita.show', $item) }}" class="news-button">
    BACA SELENGKAPNYA
    <span>↗</span>
</a>

            </div>

        </article>

    @empty

        <p>Belum ada kegiatan.</p>

    @endforelse

</div>

</section>

<section class="cta-section">

    <div class="cta-container">

        <p class="cta-label">BERSAMA DTR LAMPUNG</p>

        <h2>
            SIAP UNTUK<br>
            BERKEMBANG BERSAMA?
        </h2>

        <a href="https://linktr.ee/dtrlampung.official"
   class="cta-button"
   target="_blank"
   rel="noopener noreferrer">
            DAFTAR TRAINING
            <span>↗</span>
        </a>

    </div>

</section>




    <!-- ========================================
         KOLABORASI
    ========================================= -->

    <section
        id="kolaborasi"
        class="collaboration-section"
    >

        <div class="collaboration-container">

            <h2>
                KOLABORASI
            </h2>


            <p>
                DTR Lampung terbuka untuk berbagai bentuk
                kolaborasi, partnership, dan media partner
                dalam kegiatan yang memberikan manfaat
                bagi generasi muda.
            </p>


            <a
    href="https:#"
    class="collaboration-button"
    target="_blank"
    rel="noopener noreferrer"
>
    Partnership & Media Partner →
</a>

        </div>

    </section>



    <!-- ========================================
         HUBUNGI KAMI
    ========================================= -->

    <section
        id="kontak"
        class="contact-section"
    >

        <div class="contact-container">

            <h2>
                HUBUNGI KAMI
            </h2>


            <div class="contact-info">


                <div class="contact-item">

                    <small>
                        INSTAGRAM
                    </small>

                    <span>
                        DTR Lampung
                    </span>

                </div>


                <div class="contact-item">

                    <small>
                        EMAIL
                    </small>

                    <span>
                        dtrlampung.official@gmail.com
                    </span>

                </div>


                <div class="contact-item">

                    <small>
                        LOKASI
                    </small>

                    <span>
                        Lampung, Indonesia
                    </span>

                </div>


            </div>

        </div>

    </section>



    <!-- ========================================
         FOOTER
    ========================================= -->

    <footer>

        © {{ date('Y') }} DTR Lampung.
        All rights reserved.

    </footer>



 <script>
document.addEventListener('DOMContentLoaded', function () {

    const elements = document.querySelectorAll('.reveal-bottom');

    function updateScrollAnimation() {

        const windowHeight = window.innerHeight;

        elements.forEach(element => {

            const rect = element.getBoundingClientRect();

            const start = windowHeight * 0.85;
            const end = windowHeight * 0.45;

            let progress = (start - rect.top) / (start - end);

            progress = Math.max(0, Math.min(1, progress));

            /*
             * Smooth easing
             */
            const eased = 1 - Math.pow(1 - progress, 3);

            /*
             * Gerakan hanya 35px
             */
            const moveY = 35 * (1 - eased);

            element.style.transform =
                `translate3d(0, ${moveY}px, 0)`;
        });

        requestAnimationFrame(updateScrollAnimation);
    }

    updateScrollAnimation();

});
</script>

</body>
</html>