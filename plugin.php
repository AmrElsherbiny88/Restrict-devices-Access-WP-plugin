<?php
/*
Plugin Name: Restrict iOS Access
Description: Restrict access to the website to only iOS devices.
Version: 1.8
Author: Your Name
*/

function restrict_ios_access() {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];

    if (strpos($user_agent, 'iPhone') !== false || strpos($user_agent, 'iPad') !== false || strpos($user_agent, 'iPod') !== false  || strpos($user_agent, 'Windows NT') !== false ||  // Windows Phone
    strpos($user_agent, 'Macintosh') !== false ||  // Mac devices (laptops/desktops)
        strpos($user_agent, 'wv') !== false) {
        
        return;
    } else {
        // Block access for non-iOS devices and show download image
        $download_image = '<a href="https://atqinarabic.com/wp-content/uploads/2024/09/com.atqin_.arabic.apk"><img src="https://www.svgrepo.com/show/303139/google-play-badge-logo.svg" alt="Download on Google Play" style="width:150px;"></a>';
        
        $custom_styles = '<style>
            @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@800&family=Roboto:wght@100;300&display=swap");
            :root {
                --button: #b3b3b3;
                --button-color: #0a0a0a;
                --shadow: #000;
                --bg: #737373;
                --header: #7a7a7a;
                --color: #fafafa;
                --lit-header: #e6e6e6;
                --speed: 2s;
            }
            * {
                box-sizing: border-box;
                transform-style: preserve-3d;
            }
            body {
                min-height: 100vh;
                display: flex;
                font-family: "Roboto", sans-serif;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                background: var(--bg);
                color: var(--color);
                perspective: 1200px;
            }
            a {
                text-transform: uppercase;
                text-decoration: none;
                background: var(--button);
                color: var(--button-color);
                padding: 1rem 4rem;
                border-radius: 4rem;
                font-size: 0.875rem;
                letter-spacing: 0.05rem;
            }
            h1 {
                animation: swing var(--speed) infinite alternate ease-in-out;
                font-size: clamp(5rem, 40vmin, 20rem);
                font-family: "Open Sans", sans-serif;
                margin: 0;
                margin-bottom: 1rem;
                letter-spacing: 1rem;
                background: radial-gradient(var(--lit-header), var(--header) 45%);
                -webkit-background-clip: text;
                color: transparent;
            }
            h1:after {
                content: "404";
                position: absolute;
                top: 0;
                left: 0;
                color: var(--shadow);
                filter: blur(1.5vmin);
                transform: scale(1.05) translate3d(0, 12%, -10vmin);
            }
            .cloak {
                animation: swing var(--speed) infinite alternate-reverse ease-in-out;
                height: 100%;
                width: 100%;
                transform-origin: 50% 30%;
                background: radial-gradient(40% 40% at 50% 42%, transparent, #000 35%);
            }
            .cloak__wrapper {
                position: fixed;
                top: 0;
                left: 0;
                bottom: 0;
                right: 0;
                overflow: hidden;
            }
            .cloak__container {
                height: 250vmax;
                width: 250vmax;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
            .info {
                text-align: center;
                line-height: 1.5;
                max-width: clamp(16rem, 90vmin, 25rem);
            }
            .info > p {
                margin-bottom: 3rem;
            }
            @keyframes swing {
                0% {
                    --swing-x: -100;
                    --swing-y: -100;
                }
                50% {
                    --swing-y: 0;
                }
                100% {
                    --swing-x: 100;
                    --swing-y: -100;
                }
            }
        </style>';

        wp_die('
            <h1>404</h1>
            <div class="cloak__wrapper">
                <div class="cloak__container">
                    <div class="cloak"></div>
                </div>
            </div>
            <div class="info">
                <h2>هذا الموقع لا يعمل علي هواتف الاندرويد</h2>
                <p>يرجي تحميل التطبيق بالضغط علي الزر في الاسفل</p>
                <a href="https://atqinarabic.com/wp-content/uploads/2024/09/com.atqin_.arabic.apk" target="_blank" rel="noreferrer noopener">تحميل التطبيق</a>
            </div>
            ' . $download_image . $custom_styles);
    }
}

add_action('template_redirect', 'restrict_ios_access');
?>
