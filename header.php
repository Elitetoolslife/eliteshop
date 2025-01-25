
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>   WaXa - Main
</title>
    <!-- Icons -->
    <link rel="shortcut icon" href="../assets/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../assets/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/media/favicons/apple-touch-icon-180x180.png">
    <!-- Include Choices CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
		<!-- Stylesheets -->
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
    <link rel="stylesheet" href="../assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="../assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="../assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="../assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="../assets/js/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.css">
    <link rel="stylesheet" href="../assets/js/plugins/dropzone/min/dropzone.min.css">
    <link rel="stylesheet" href="../assets/js/plugins/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" id="css-main" href="../assets/css/oneui.min.css">
	  <script src="https://code.jivosite.com/widget/ldI22iBcwW" async></script>

  </head>

<!-- END Logo -->

<style>.luxury-logo-container {
    display: inline-block;
    position: relative;
    padding: 6px;
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
}

.luxury-frame {
    position: relative;
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background: linear-gradient(45deg, 
        #daa520 0%, 
        #ffd700 25%, 
        #fff3a0 50%, 
        #ffd700 75%, 
        #daa520 100%);
    padding: 2px;
    box-shadow: 0 0 20px rgba(218, 165, 32, 0.3);
    animation: frame-pulse 3s ease-in-out infinite;
}

.luxury-logo-image {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    object-fit: cover;
    transition: all 0.4s ease;
    position: relative;
    z-index: 2;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

/* Luxury Particles */
.luxury-particle {
    position: absolute;
    background: radial-gradient(circle, #ffd700 30%, transparent 70%);
    border-radius: 50%;
    animation: luxury-orbits 6s linear infinite;
    filter: blur(1px);
    opacity: 0.8;
}

.lp1 { width: 3px; height: 3px; top: 10%; left: 20%; }
.lp2 { width: 4px; height: 4px; top: 70%; left: 75%; }
.lp3 { width: 2px; height: 2px; top: 40%; left: 65%; }
.lp4 { width: 3px; height: 3px; top: 80%; left: 30%; }

/* Animations */
@keyframes frame-pulse {
    0%, 100% { 
        transform: scale(1);
        box-shadow: 0 0 20px rgba(218, 165, 32, 0.3); 
    }
    50% { 
        transform: scale(1.02);
        box-shadow: 0 0 30px rgba(218, 165, 32, 0.5); 
    }
}

@keyframes luxury-orbits {
    0% { transform: rotate(0deg) translateX(12px) rotate(0deg); }
    100% { transform: rotate(360deg) translateX(12px) rotate(-360deg); }
}

/* Hover Effects */
.luxury-logo-container:hover .luxury-frame {
    animation: frame-pulse 1s ease-in-out infinite;
    transform: scale(1.06);
}

.luxury-logo-container:hover .luxury-logo-image {
    transform: rotate(5deg) scale(1.05);
}

.luxury-logo-container:hover .luxury-particle {
    animation-duration: 3s;
    opacity: 1;
}

/* Golden Shine Effect */
.luxury-frame::after {
    content: '';
    position: absolute;
    top: -2px;
    left: -2px;
    right: -2px;
    bottom: -2px;
    border-radius: 50%;
    background: linear-gradient(45deg, 
        transparent 0%, 
        rgba(255, 215, 0, 0.2) 50%, 
        transparent 100%);
    animation: golden-shine 3s linear infinite;
    z-index: 1;
}

@keyframes golden-shine {
    0% { transform: rotate(0deg); opacity: 0; }
    25% { opacity: 0.6; }
    50% { opacity: 0; }
    100% { transform: rotate(360deg); opacity: 0; }
}

/* Mobile Optimization */
@media (max-width: 768px) {
    .luxury-frame {
        width: 40px;
        height: 40px;
    }
    .luxury-logo-image {
        width: 32px;
        height: 32px;
    }
}
</style>
