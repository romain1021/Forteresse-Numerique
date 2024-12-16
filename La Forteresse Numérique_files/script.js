
  const tile = document.querySelector('.tile'); // Sélectionner l'élément .tile

  tile.addEventListener('mousemove', function(e) {
    const tileRect = tile.getBoundingClientRect();
    const tileCenterX = tileRect.left + tileRect.width / 2;
    const tileCenterY = tileRect.top + tileRect.height / 2;

    const deltaX = (e.clientX - tileCenterX) / 10; // Déplacement léger sur l'axe X
    const deltaY = (e.clientY - tileCenterY) / 10; // Déplacement léger sur l'axe Y

    // Appliquer le déplacement de la tuile
    tile.style.transform = `scale(1.02) translate(${deltaX}px, ${deltaY}px)`;
  });

  tile.addEventListener('mouseleave', function() {
    tile.style.transform = 'scale(1.02)'; // Réinitialiser la position de la tuile lorsque la souris quitte
  });