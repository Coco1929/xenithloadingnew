<style>
    .oncenter {
        height: 100%;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -moz-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
    }

    .loader__center {
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -moz-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
    }

    .loader {
        height: 200px;
        width: 200px;

    }

    .loader svg {

        overflow: visible;
        -webkit-animation: rotate 2s ease-in-out infinite;
        -moz-animation: rotate 2s ease-in-out infinite;
        -o-animation: rotate 2s ease-in-out infinite;
        animation: rotate 2s ease-in-out infinite;
        display: block;
    }

    .loader svg .c {
        stroke-width: 3px;
    }

    .loader svg .l {
        fill: none;
        stroke: currentColor;
        stroke-linecap: round;
        stroke-dasharray: 5, 202;
        /* 1%, 101% circumference */
        -webkit-animation: dash 2s ease-in-out infinite;
        -moz-animation: dash 2s ease-in-out infinite;
        -o-animation: dash 2s ease-in-out infinite;
        animation: dash 2s ease-in-out infinite;
    }

    .loader svg .s {
        fill: none;
        stroke-width: 3px;
        stroke: #<?=$circle_bg_color;?>;
        opacity:0.9;
    }

    @-webkit-keyframes rotate {
        0% {
            color: #<?=$first_circle_color;?>;
        }

        50% {
            color: #<?=$second_circle_color;?>;
            stroke-width: 6px;
        }

        100% {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
            color: #<?=$first_circle_color;?>;
        }
    }

    @-moz-keyframes rotate {
        100% {
            -moz-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @-o-keyframes rotate {
        100% {
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @keyframes rotate {
        0% {
            color: #<?=$first_circle_color;?>;
        }
        50% {
            color: #<?=$second_circle_color;?>;
            stroke-width: 6px;
        }

        100% {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
            color: #<?=$first_circle_color;?>;
        }
    }

    @-webkit-keyframes dash {
        0% {
            stroke-dasharray: 2px, 202px;
            /* 1%, 101% circumference */
            stroke-dashoffset: 0px;
        }
        50% {
            stroke-dasharray: 140px, 202;px
            /* 70%, 101% circumference */
            stroke-dashoffset: -50px;
            /* 25% circumference */
            stroke: darkgreen;
        }
        100% {
            stroke-dasharray: 140px, 202px;
            /* 70%, 101% circumference */
            stroke-dashoffset: -198px;
            /* -99% circumference */
        }
    }

    @-moz-keyframes dash {
        0% {
            stroke-dasharray: 2px, 202px;
            /* 1%, 101% circumference */
            stroke-dashoffset: 0px;
        }
        50% {
            stroke-dasharray: 140px, 202px;
            /* 70%, 101% circumference */
            stroke-dashoffset: -50px;
            /* 25% circumference */
            stroke: darkgreen;
        }
        100% {
            stroke-dasharray: 140px, 202px;
            /* 70%, 101% circumference */
            stroke-dashoffset: -198px;
            /* -99% circumference */
        }
    }

    @-o-keyframes dash {
        0% {
            stroke-dasharray: 2px, 202px;
            /* 1%, 101% circumference */
            stroke-dashoffset: 0;
        }
        50% {
            stroke-dasharray: 140px, 202px;
            /* 70%, 101% circumference */
            stroke-dashoffset: -50px;
            /* 25% circumference */
            stroke: darkgreen;
        }
        100% {
            stroke-dasharray: 140px, 202px;
            /* 70%, 101% circumference */
            stroke-dashoffset: -198px;
            /* -99% circumference */
        }
    }

    @keyframes dash {
        0% {
            stroke-dasharray: 2px, 202px;
            /* 1%, 101% circumference */
            stroke-dashoffset: 0;
        }
        50% {
            stroke-dasharray: 140px, 202px;
            /* 70%, 101% circumference */
            stroke-dashoffset: -50px;
            /* 25% circumference */

        }
        100% {
            stroke-dasharray: 140px, 202px;
            /* 70%, 101% circumference */
            stroke-dashoffset: -198px;
            /* -99% circumference */
        }
    }

    .heading_ {
        font-family: 'Quicksand', sans-serif;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -moz-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        font-size:21px;
        text-shadow: 0 0 10px #FFFFFF;
        color: #<?=$text_color;?>;
    }
</style>
<div class="loader__center">
    <div class="loader">
        <div class="loader__wrap">
            <svg style="absolute; top: 0px; left: 0px, " height="100%" width="100%" viewBox="0 0 100 100">
                <defs>
                    <filter id="blur" x="0" y="0" filterUnits="userSpaceOnUse">
                        <feGaussianBlur in="SourceGraphic" stdDeviation="8"/>
                    </filter>
                </defs>
                <circle class="c s" r="32" cx="50" cy="50"></circle>
                <circle class="c l b" filter="url(#blur)" r="32" cx="50" cy="50"></circle>
                <circle class="c l" r="32" cx="50" cy="50"></circle>
            </svg>
        </div>
    </div>
</div>
<span id="status" class="heading_">Loading</span>