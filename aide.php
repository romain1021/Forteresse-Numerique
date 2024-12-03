</head>
<body>
    <button class="question-mark" onclick="togglePhoto()">?</button>
    <img src="<?php echo $aideImage; ?>" alt="Une belle photo" class="photo" id="photo">
    <script>
        function togglePhoto() {
            var photo = document.getElementById('photo');
            if (photo.style.display === "none" || photo.style.display === "") {
                photo.style.display = "block";
            } else {
                photo.style.display = "none";
            }
        }
    </script>

</body>
</html>