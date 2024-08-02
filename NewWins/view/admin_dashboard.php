<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://cdn.tiny.cloud/1/fj76e7aualveq77f2n0uc7mcz6cdimvxob2lx0yl9o4rwkhp/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#contenido',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
            toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            image_class_list: [
                { title: 'None', value: '' },
                { title: 'Responsive', value: 'img-fluid' }
            ],
            content_style: 'img { max-width: 100%; height: auto; }'
        });
    </script>
</head>

<body>
    <?php include 'header.php'; ?> <!-- Incluir el encabezado común -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div id="noticias" class="mt-4">
                    <h4>Noticias</h4>
                    <div class="card">
                        <div class="card-body">
                            <!-- Formulario para subir noticias -->
                            <form action="../controller/subir_noticia.php" method="post">
                                <div class="form-group">
                                    <label for="titulo">Título:</label>
                                    <input type="text" class="form-control" id="titulo" name="titulo" required>
                                </div>
                                <div class="form-group">
                                    <label for="contenido">Contenido:</label>
                                    <textarea class="form-control" id="contenido" name="contenido" rows="10"></textarea>

                                </div>
                                <div class="form-group">
                                    <label for="url">URL:</label>
                                    <input type="text" class="form-control" id="url" name="url" required>
                                </div>
                                <div class="form-group">
                                    <label for="categoria_id">Categoría:</label>
                                    <select class="form-control" id="categoria_id" name="categoria_id" required>
                                        <?php
                                        require_once '../controller/listar_categoria.php';
                                        echo aa();
                                        ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Subir Noticia <br><i class='bx bx-upload'></i></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div id="categorias" class="mt-4">
                    <h4>Categorías</h4>
                    <div class="card">
                        <div class="card-body">
                            <!-- Formulario para crear categorías -->
                            <form action="../controller/crear_categoria.php" method="post">
                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripción:</label>
                                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="imagen">Imagen (URL):</label>
                                    <input type="text" class="form-control" id="imagen" name="imagen">
                                </div>
                                <button type="submit" class="btn btn-secondary">Crear Categoría <br><i class='bx bxs-category'></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Incluir SweetAlert (Swal) desde CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Archivo JavaScript para manejar alertas -->
    <script src="../js/alert.js"></script>

    <?php
    // Verificar si hay un mensaje de éxito o error después de subir noticia
    if (isset($_GET['noticia'])) {
        if ($_GET['noticia'] == 'exito') {
            echo "<script> mostrarAlertaExito('Noticia subida correctamente.'); </script>";
        } elseif ($_GET['noticia'] == 'error') {
            echo "<script> mostrarAlertaError('Error al subir la noticia.'); </script>";
        }
    }

    // Verificar si hay un mensaje de éxito o error después de crear categoría
    if (isset($_GET['categoria'])) {
        if ($_GET['categoria'] == 'exito') {
            echo "<script> mostrarAlertaExito('Categoría creada correctamente.'); </script>";
        } elseif ($_GET['categoria'] == 'error') {
            echo "<script> mostrarAlertaError('Error al crear la categoría.'); </script>";
        }
    }
    ?>

</body>

</html>