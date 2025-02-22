<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Error 500 - Internal Server Error</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
      font-family: 'Arial', sans-serif;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0;
      overflow: hidden;
    }

    .error-container {
      text-align: center;
      color: #333;
    }

    .error-code {
      font-size: 150px;
      font-weight: bold;
      line-height: 1;
      margin-bottom: 20px;
      position: relative;
      animation: shake 1s infinite;
    }

    .error-message {
      font-size: 24px;
      margin-bottom: 30px;
    }

    .error-button {
      padding: 10px 20px;
      font-size: 16px;
      color: #fff;
      background-color: #dc3545;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .error-button:hover {
      background-color: #b02a37;
    }

    @keyframes shake {

      0%,
      100% {
        transform: translateX(0);
      }

      25% {
        transform: translateX(-10px);
      }

      50% {
        transform: translateX(10px);
      }

      75% {
        transform: translateX(-10px);
      }
    }

    /* Illustration Animation */
    .santri {
      width: 200px;
      height: auto;
      animation: panic 2s infinite;
    }

    @keyframes panic {

      0%,
      100% {
        transform: scale(1) rotate(0deg);
      }

      50% {
        transform: scale(1.1) rotate(5deg);
      }
    }

    /* Background Animation */
    .background-animation {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
      overflow: hidden;
    }

    .circle {
      position: absolute;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.1);
      animation: float 10s infinite ease-in-out;
    }

    .circle:nth-child(1) {
      width: 200px;
      height: 200px;
      top: 10%;
      left: 20%;
      animation-duration: 8s;
    }

    .circle:nth-child(2) {
      width: 300px;
      height: 300px;
      top: 50%;
      left: 70%;
      animation-duration: 12s;
    }

    .circle:nth-child(3) {
      width: 150px;
      height: 150px;
      top: 80%;
      left: 40%;
      animation-duration: 6s;
    }

    @keyframes float {
      0% {
        transform: translateY(0) scale(1);
      }

      50% {
        transform: translateY(-50px) scale(1.1);
      }

      100% {
        transform: translateY(0) scale(1);
      }
    }
  </style>
</head>

<body>
  <!-- Background Animation -->
  <div class="background-animation">
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="circle"></div>
  </div>

  <!-- Error Content -->
  <div class="error-container">
    <img src="/errors/500.png" alt="Anak Santri" class="santri">
    <div class="error-code">500</div>
    <div class="error-message">Waduh! Ada masalah di server, kayak santri yang lagi bingung cari kunci pesantren.</div>
    <button class="error-button" onclick="goBack()">Kembali dulu yuk</button>
  </div>

  <!-- JavaScript -->
  <script>
    function goBack() {
      window.history.back();
    }
  </script>
</body>

</html>
