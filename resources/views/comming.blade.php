<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CryptoGainers : Coming Soon</title>
    <script src="https://kit.fontawesome.com/de84253868.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script defer src="https://unpkg.com/alpinejs@3.2.2/dist/cdn.min.js"></script>
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
</head>

<body class="antialiased font-primary">
    <div class="bg-home px-8 w-full">
        <div
            class="
                    py-12
                    flex flex-col
                    justify-between
                    min-h-screen
                    md:max-w-2xl
                    lg:max-w-3xl
                    mx-auto
                ">
            <div>
                <!-- Countdown timer -->
                <div class="flex flex-wrap justify-center gap-4" x-data="timer()" x-init="countdown()">
                    <div class="timer-circle">
                        <div>
                            <span class="timer-count" x-text="days"></span>
                            <span class="timer-type">Days</span>
                        </div>
                    </div>
                    <div class="timer-circle">
                        <div>
                            <span class="timer-count" x-text="hours"></span>
                            <span class="timer-type">Hours</span>
                        </div>
                    </div>
                    <div class="timer-circle">
                        <div>
                            <span class="timer-count" x-text="minutes"></span>
                            <span class="timer-type">Minutes</span>
                        </div>
                    </div>
                    <div class="timer-circle">
                        <div>
                            <span class="timer-count" x-text="seconds"></span>
                            <span class="timer-type">Seconds</span>
                        </div>
                    </div>
                </div>
                <!-- Countdown timer ends -->
                <div class="mt-12 text-white text-center">
                    <h1 class="font-bold text-4xl md:text-5xl">
                        Project Coming Soon
                    </h1>
                    <p class="pt-4 text-lg md:text-xl">
                        We love to create dependable business solutions for
                        companies of all sizes and any industry. Our goal is
                        to improve accuracy and efficiency to reduce
                        operational costs
                    </p>
                </div>
            </div>
            <footer class="mt-8">
                <div
                    class="
                            mt-4
                            mx-auto
                            text-pink-800 text-lg
                            space-x-2
                            text-center
                        ">
                    <a href="https://facebook.com/CryptoGainersIO" class="social-link">
                        <i class="fab fa-facebook-f m-auto"></i>
                    </a>
                    <a href="https://twitter.com/CryptoGainersIO" class="social-link">
                        <i class="fab fa-twitter m-auto"></i>
                    </a>
                    <a href="https://www.pinterest.com/cryptogainersio/" class="social-link">
                        <i class="fab fa-pinterest-p m-auto"></i>
                    </a>
                    <a href="https://www.instagram.com/cryptogainers.io/" class="social-link">
                        <i class="fab fa-instagram m-auto"></i>
                    </a>
                </div>
            </footer>
        </div>
    </div>
    <script>
        function timer() {
            return {
                days: "00",
                hours: "00",
                minutes: "00",
                seconds: "00",
                endTime: new Date(
                    "June 31, 2022 23:59:59 GMT+0530"
                ).getTime(),
                now: new Date().getTime(),
                timeLeft: 0,
                countdown: function() {
                    let counter = setInterval(() => {
                        this.now = new Date().getTime();
                        this.timeLeft = (this.endTime - this.now) / 1000;
                        this.seconds = this.format(this.timeLeft % 60);
                        this.minutes = this.format(this.timeLeft / 60) % 60;
                        this.hours =
                            this.format(this.timeLeft / (60 * 60)) % 24;
                        this.days = this.format(
                            this.timeLeft / (60 * 60 * 24)
                        );
                        if (this.timeLeft <= 0) {
                            clearInterval(counter);
                            this.seconds = "00";
                            this.minutes = "00";
                            this.hours = "00";
                            this.days = "00";
                        }
                    }, 1000);
                },
                format: function(value) {
                    if (value < 10) {
                        return "0" + Math.floor(value);
                    } else return Math.floor(value);
                },
            };
        }
    </script>
</body>

</html>
