<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/font.css') }}" rel="stylesheet">
    <title>Laravel - Vue - Test</title>
</head>

<!-- No bootstrap -->
<!-- It's no adaptive/resistive layout! -->
<body>
    <div class="container">
        <div class="content">
            <!-- Overlay Error -->
            <div id="overlay-error-container" class="overlay-container">
                <div class="overlay-container-box">
                    <div class="overlay-container-box-content">
                        <div class="overlay-message">
                            Error!<br><span id="error-message"></span>
                        </div>
                        <div class="overlay-buttons">
                            <div class="overlay-button overlay-button-ok" onclick="document.getElementById('overlay-error-container').style.display = 'none'">Okey :(</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Overlay Error -- END -->

            <div class="app-header">
                <span>Laravel - Vue - Test app</span>
            </div>
            <div id="app" class="app-container">
                
                <!-- Here is Service App Content -->
                
            </div>
        </div>
    </div>

    <script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>
