@extends('layouts.master')
@push('css')
    <style>
        /* About Section Styles */
        .about-section {
            padding: 40px 0;
            background-color: #f9f9f9;
            direction: rtl;
            /* Set direction to RTL for Arabic */
        }

        .all-head-page {
            text-align: center;
            position: relative;
            margin-bottom: 40px;
        }

        .all-head-page h4 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 0;
        }

        .circle-bg {
            width: 50px;
            height: 50px;
            background: #ddd;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        /* Content Container */
        .about-content {
            max-width: 800px;
            margin: 0 auto;
            text-align: right;
            color: #555;
        }

        .about-text-content,
        .vision-section,
        .mission-section {
            background: #ffffff;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .about-text-content h2,
        .vision-section h2,
        .mission-section h2 {
            font-size: 1.8rem;
            color: red;
            margin-bottom: 15px;
        }

        .about-text-content p,
        .vision-section p,
        .mission-section p {
            font-size: 1rem;
            line-height: 1.8;
            margin-bottom: 10px;
        }

        /* New Section Styles */
        .usage-section {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
        }

        .usage-section h2 {
            font-size: 1.8rem;
            color: red;
            margin-bottom: 20px;
        }

        .usage-step {
            margin-bottom: 15px;
            padding: 10px;
            border-left: 4px solid red;
            background: #f9f9f9;
        }

        /* Scroll to Top Button */
        #progress {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
            background: red;
            color: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        #progress-value .bx {
            font-size: 1.5rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {

            .about-text-content,
            .vision-section,
            .mission-section,
            .usage-section {
                padding: 15px 20px;
            }

            .all-head-page h4 {
                font-size: 1.5rem;
            }
        }
    </style>
    @if (app()->getLocale() != 'sa')
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
            rel="stylesheet">
        <style>
            body {
                font-family: "Roboto", sans-serif;
                font-weight: 100;
                font-style: normal;
            }

            /* About Section Styles */
            .about-section {
                padding: 40px 0;
                background-color: #f9f9f9;
                direction: ltr;
                /* Set direction to LTR for English */
            }

            .all-head-page {
                text-align: center;
                position: relative;
                margin-bottom: 40px;
            }

            .all-head-page h4 {
                font-size: 2rem;
                color: #333;
                margin-bottom: 0;
            }

            .circle-bg {
                width: 50px;
                height: 50px;
                background: #ddd;
                border-radius: 50%;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }

            /* Content Container */
            .about-content {
                max-width: 800px;
                margin: 0 auto;
                text-align: left;
                /* Align text to the left for English */
                color: #555;
            }

            .about-text-content,
            .vision-section,
            .mission-section,
            .usage-section {
                background: #ffffff;
                padding: 20px 30px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                margin-bottom: 20px;
            }

            .about-text-content h2,
            .vision-section h2,
            .mission-section h2,
            .usage-section h2 {
                font-size: 1.8rem;
                color: red;
                margin-bottom: 15px;
            }

            .about-text-content p,
            .vision-section p,
            .mission-section p,
            .usage-section p {
                font-size: 1rem;
                line-height: 1.8;
                margin-bottom: 10px;
            }

            .usage-step {
                margin-bottom: 15px;
                padding: 10px;
                border-left: none !important;
                border-right: 4px solid red;
                background: #f9f9f9;
            }

            /* Responsive Design */
            @media (max-width: 768px) {

                .about-text-content,
                .vision-section,
                .mission-section,
                .usage-section {
                    padding: 15px 20px;
                }

                .all-head-page h4 {
                    font-size: 1.5rem;
                }
            }
        </style>
    @endif

@endpush

@section('content')
    <!-- --- Start Main -->
    <main id="Main">
        {!! $content !!}
    </main>
    <!-- ---- End Main -->
@endsection
