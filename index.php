<!-- <?php
    include '../view/header.php';
    include '../view/menu.php';
?> -->

<html>
<body style="
    background-color: #bfbfbf;
    display: flex;
    align-items: center;
    justify-content: center;"
>
<img
    id="img"
    src="images/htcua.jpg"
    style="
    width: 200px;
    border-radius: 50%;
    "
/>
</body>
</html>
<script>
    audio = new Audio()
    audio.src = "audio/audio.mp3"
    analyser = null
    document.onclick = () => {
        context = new AudioContext()
        analyser = context.createAnalyser()
        context.createMediaElementSource(audio)
        .connect(analyser)
        analyser.connect(context.destination)
        audio.play()
        loop()
    }
    function loop() {
        window.requestAnimationFrame(loop)
        fbc = new Uint8Array(analyser.frequencyBinCount);
        analyser.getByteFrequencyData(fbc)
        avg = fbc.reduce((a,b) => a + b, 0) / fbc.length
        document.getElementById('img')
        .style.width = avg * 5
        document.body.style.backgroundColor =
        'rgb('+avg+','+avg+','+avg+')'
    }
</script>