//Script para mostrar la imagen

const $seleccionArchivos = document.querySelector("#seleccionArchivos"),
$imagen = document.querySelector("#imagen");

$seleccionArchivos.addEventListener("change", () =>
{
  const archivos = $seleccionArchivos.files;

  if (!archivos || !archivos.length)
  {
    $imagen.src = "";
    return;
  }

  const primerArchivo = archivos[0];
  const objectURL = URL.createObjectURL(primerArchivo);

  $imagen.src = objectURL;
});