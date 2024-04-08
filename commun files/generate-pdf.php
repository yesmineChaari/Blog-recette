
<?php
session_start(); // Start the session

require_once __DIR__ . '/../vendor/autoload.php';
require_once("GetRecipes.php");

use Dompdf\Dompdf;

if (isset($_GET['recipe_id'])) {
    $recipe_id = $_GET['recipe_id'];

    ob_start(); // Start output buffering to capture echoed HTML
    getRecipeDetails($recipe_id); // Echoes the HTML directly
    $recipe_html = ob_get_clean(); // Capture the echoed HTML

    // Remove the "Download PDF" link from the HTML
    $recipe_html_without_link = preg_replace('/<a\b[^>]*>(.*?)<\/a>/', '', $recipe_html);
        $recipe_html_without_image = preg_replace('/<img\b[^>]*>/', '', $recipe_html_without_link);

    // Write the HTML for PDF
    $html = '
    <html>
    <head>
    <style>
    /* Your CSS styles here */
    </style>
    </head>
    <body>' . $recipe_html_without_image.
    '</body>
    </html>';

    $dompdf = new Dompdf;
    $dompdf->loadHtml($html);
    $dompdf->render();
    $dompdf->stream("recipe.pdf");
} else {
    echo "Recipe ID not provided.";
}
?>