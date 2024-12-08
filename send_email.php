<?php
// Vérifiez si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $full_name = htmlspecialchars(trim($_POST['full_name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // mon adresse email 
    $to = "aallasoufiane.al@gmail.com"; 

    // Préparation de l'email
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $email_body = "You have received a new message from your website contact form.\n\n";
    $email_body .= "Name: $full_name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Subject: $subject\n";
    $email_body .= "Message:\n$message\n";

    // Envoi de l'email
    if (mail($to, $subject, $email_body, $headers)) {
        echo "<script>alert('Your message has been sent successfully!'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Sorry, something went wrong. Please try again.'); window.history.back();</script>";
    }
} else {
    // Redirige si l'utilisateur accède directement à la page
    header("Location: index.html");
    exit;
}
?>
