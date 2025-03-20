
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Toast Notification Styling */
        .toast-notification {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            color: white;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            gap: 10px;
            animation: slideIn 0.3s ease-in-out, fadeOut 0.5s ease-in-out 2.5s forwards;
            z-index: 9999;
        }

        /* Background Colors */
        .toast-success {
            background: #28a745;
        }

        /* Green for Success */
        .toast-error {
            background: #dc3545;
        }

        /* Red for Error */
        .toast-info {
            background: #007bff;
        }

        /* Blue for Info */
        .toast-warning {
            background: #ffc107;
        }

        /* Yellow for Warning */

        /* Icon Styling */
        .toast-icon {
            font-size: 18px;
            line-height: 1;
        }

        /* Animation for Toast */
        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes fadeOut {
            to {
                opacity: 0;
                transform: translateY(-10px);
            }
        }
    </style>

    @livewireStyles
    @yield('externalcss')
    @stack('styles')
</head>

<body>
    <!-- navigation -->
    <section class="mt-lg-14 mt-8">

        {{ $slot }}

    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>

        function onlyNumberKey(evt) {
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }

        document.addEventListener("DOMContentLoaded", function() {
            Livewire.on('notify', ({
                type,
                message
            }) => {
                let bgClass = type === 'success' ? 'toast-success' :
                    type === 'error' ? 'toast-error' :
                    type === 'info' ? 'toast-info' :
                    'toast-warning';

                let icon = type === 'success' ? '✅' :
                    type === 'error' ? '❌' :
                    type === 'info' ? 'ℹ️' :
                    '⚠️';

                // Remove existing notification if any
                $(".toast-notification").remove();

                // Create new notification
                let notification = `<div class="toast-notification ${bgClass}">
                                       <span class="toast-icon">${icon}</span>
                                       <span>${message}</span>
                                   </div>`;

                // Append to body
                $("body").append(notification);

                // Remove after 3 seconds
                setTimeout(() => {
                    $(".toast-notification").fadeOut(500, function() {
                        $(this).remove();
                    });
                }, 3000);
            });
        });
    </script>

    @livewireScripts
    @yield('externaljs')
    @stack('scripts')
</body>

</html>
