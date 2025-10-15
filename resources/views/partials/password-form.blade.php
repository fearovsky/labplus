    <div class="container password-protection">
        <div class="password-form-wrapper">
            <div class="password-form-content">
                <h1 class="password-form-title">
                    Treść jest chroniona hasłem
                </h1>

                <div class="password-form">
                    {!! $password_form_html !!}
                </div>
            </div>
        </div>
    </div>

    <style>
        .password-protection {
            display: flex;
            align-items: center;
            justify-content: center;
            padding-top: 2rem;
            padding-bottom: 2rem;
        }

        .password-form-wrapper {
            max-width: 500px;
            width: 100%;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 3rem 2rem;
            text-align: center;
        }

        .password-form-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 1rem;
        }


        .password-form {
            text-align: left;
        }

        .password-form p {
            margin-bottom: 1rem;
        }

        .password-form label {
            padding: 0;
        }
    </style>
