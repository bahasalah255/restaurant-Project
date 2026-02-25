<?php
require 'connexion.php';

$success = '';
$error   = '';

if (isset($_POST['reservation'])) {
    $nom       = trim($_POST['nom']       ?? '');
    $email     = trim($_POST['email']     ?? '');
    $tele      = trim($_POST['telephone'] ?? '');
    $nbrperson = trim($_POST['nbrperson'] ?? '');
    $date      = trim($_POST['date']      ?? '');
    $heure     = trim($_POST['heure']     ?? '');
    $occasion  = trim($_POST['occasion']  ?? '');
    $demande   = trim($_POST['demande']   ?? '');

    if (empty($nom) || empty($email) || empty($nbrperson) || empty($date) || empty($heure)) {
        $error = 'Veuillez remplir tous les champs obligatoires (*) .';
    } else {
        try {
            $stmt = $connexion->prepare('
                INSERT INTO informations
                (nom, email, telephone, nombre_couverts, date, heure, occassion_speciale, textinformations)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)
            ');
            $stmt->execute([$nom, $email, $tele, $nbrperson, $date, $heure, $occasion, $demande]);
            $success = 'Votre réservation a bien été enregistrée ! Nous vous confirmerons par email sous 24 heures.';
        } catch (Exception $e) {
            $error = 'Une erreur est survenue lors de l\'enregistrement. Veuillez réessayer ou nous contacter par téléphone.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Le Festin Royal – Réservation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css" />
  </head>

  <body>


    <nav id="mainNav" class="navbar navbar-expand-lg navbar-dark fixed-top scrolled">
      <div class="container">
        <a class="navbar-brand" href="index.html">
          <span class="brand-icon">✦</span> Le Festin Royal
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarNav" aria-controls="navbarNav"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto gap-lg-2">
            <li class="nav-item"><a class="nav-link" href="index.html">Accueil</a></li>
            <li class="nav-item"><a class="nav-link" href="menu.html">Menu</a></li>
            <li class="nav-item"><a class="nav-link" href="equipe.html">Notre Équipe</a></li>
            <li class="nav-item">
              <a class="nav-link btn btn-gold px-3 active" href="reservation.html">Réserver</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <section class="page-hero d-flex align-items-center justify-content-center text-center text-white">
      <div class="page-hero-overlay"></div>
      <div class="position-relative z-1">
        <p class="section-label text-gold letter-spacing">LE FESTIN ROYAL</p>
        <h1 class="display-4 fw-bold" style="font-family:'Playfair Display',serif;">Réservation</h1>
        <nav aria-label="breadcrumb" class="mt-3">
          <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="index.html" class="text-white-50 text-decoration-none">Accueil</a></li>
            <li class="breadcrumb-item active text-gold" aria-current="page">Réservation</li>
          </ol>
        </nav>
      </div>
    </section>

    <section class="section-padding reservation-section">
      <div class="reservation-overlay"></div>
      <div class="container position-relative z-1">
        <div class="text-center mb-5 text-white">
          <p class="section-label text-gold letter-spacing">RÉSERVER UNE TABLE</p>
          <h2 class="section-title text-white">Votre Table Vous Attend</h2>
          <p class="opacity-75">Nous vous confirmerons votre réservation sous 24 heures.</p>
        </div>
        <div class="row g-5 justify-content-center align-items-start">

          <div class="col-lg-4">
            <div class="reservation-info text-white">
              <h5 class="mb-4" style="font-family:'Playfair Display',serif;">Informations Pratiques</h5>
              <ul class="list-unstyled">
                <li class="d-flex gap-3 mb-4">
                  <i class="bi bi-clock fs-4 text-gold flex-shrink-0"></i>
                  <div>
                    <strong class="d-block">Horaires</strong>
                    <span class="text-white-50 small">Lun – Ven : 12h – 23h<br />Sam – Dim : 12h – 00h</span>
                  </div>
                </li>
                <li class="d-flex gap-3 mb-4">
                  <i class="bi bi-geo-alt fs-4 text-gold flex-shrink-0"></i>
                  <div>
                    <strong class="d-block">Adresse</strong>
                    <span class="text-white-50 small">12 Rue de la Paix<br />Paris 75001, France</span>
                  </div>
                </li>
                <li class="d-flex gap-3 mb-4">
                  <i class="bi bi-telephone fs-4 text-gold flex-shrink-0"></i>
                  <div>
                    <strong class="d-block">Téléphone</strong>
                    <span class="text-white-50 small">+33 1 23 45 67 89</span>
                  </div>
                </li>
                <li class="d-flex gap-3 mb-4">
                  <i class="bi bi-envelope fs-4 text-gold flex-shrink-0"></i>
                  <div>
                    <strong class="d-block">Email</strong>
                    <span class="text-white-50 small">reservation@lefestinroyal.fr</span>
                  </div>
                </li>
                <li class="d-flex gap-3">
                  <i class="bi bi-info-circle fs-4 text-gold flex-shrink-0"></i>
                  <div>
                    <strong class="d-block">À noter</strong>
                    <span class="text-white-50 small">
                      Pour les groupes de plus de 8 personnes, veuillez nous contacter
                      directement par téléphone.
                    </span>
                  </div>
                </li>
              </ul>
            </div>
          </div>

          <div class="col-lg-7">
            <div class="reservation-card p-5 rounded-3">
              <?php if ($success): ?>
              <div class="alert alert-success d-flex align-items-start gap-3 mb-4" role="alert">
                <i class="bi bi-check-circle-fill fs-4 flex-shrink-0 mt-1" style="color:#198754"></i>
                <div>
                  <strong class="d-block mb-1">Réservation confirmée !</strong>
                  <?= htmlspecialchars($success) ?>
                </div>
              </div>
              <?php endif; ?>

              <?php if ($error): ?>
              <div class="alert alert-danger d-flex align-items-start gap-3 mb-4" role="alert">
                <i class="bi bi-exclamation-circle-fill fs-4 flex-shrink-0 mt-1"></i>
                <div>
                  <strong class="d-block mb-1">Erreur</strong>
                  <?= htmlspecialchars($error) ?>
                </div>
              </div>
              <?php endif; ?>

              <?php if (!$success): ?>              <form id="reservationForm" method='post'>
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label fw-semibold">Prénom &amp; Nom *</label>
                    <input type="text" class="form-control form-control-lg" placeholder="Jean Dupont" name='nom' required />
                  </div>
                  <div class="col-md-6">
                    <label class="form-label fw-semibold">Email *</label>
                    <input type="email" class="form-control form-control-lg" placeholder="jean@example.com" name='email' required />
                  </div>
                  <div class="col-md-6">
                    <label class="form-label fw-semibold">Téléphone</label>
                    <input type="tel" class="form-control form-control-lg" name='telephone' placeholder="+33 6 00 00 00 00" />
                  </div>
                  <div class="col-md-6">
                    <label class="form-label fw-semibold">Nombre de Couverts *</label>
                    <select class="form-select form-select-lg" name='nbrperson' required>
                      <option value="" selected disabled>Sélectionner</option>
                      <option>1 personne</option>
                      <option>2 personnes</option>
                      <option>3 personnes</option>
                      <option>4 personnes</option>
                      <option>5 personnes</option>
                      <option>6 personnes</option>
                      <option>+ de 6 personnes</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label fw-semibold">Date *</label>
                    <input type="date" class="form-control form-control-lg" name='date' required />
                  </div>
                  <div class="col-md-6">
                    <label class="form-label fw-semibold">Heure *</label>
                    <select class="form-select form-select-lg" name='heure' required>
                      <option value="" selected disabled>Sélectionner</option>
                      <option>12h00</option>
                      <option>12h30</option>
                      <option>13h00</option>
                      <option>13h30</option>
                      <option>19h00</option>
                      <option>19h30</option>
                      <option>20h00</option>
                      <option>20h30</option>
                      <option>21h00</option>
                      <option>21h30</option>
                    </select>
                  </div>
                  <div class="col-12">
                    <label class="form-label fw-semibold">Occasion Spéciale</label>
                    <select class="form-select" name='occasion'>
                      <option value="" selected>Aucune occasion particulière</option>
                      <option>Anniversaire</option>
                      <option>Dîner romantique</option>
                      <option>Repas d'affaires</option>
                      <option>Événement familial</option>
                      <option>Autre</option>
                    </select>
                  </div>
                  <div class="col-12">
                    <label class="form-label fw-semibold">Demande Spéciale</label>
                    <textarea class="form-control" rows="3" name='demande'
                      placeholder="Allergies, préférences alimentaires, disposition de table…"></textarea>
                  </div>
                  <div class="col-12 text-center mt-3">
                    <button type="submit" class="btn btn-gold btn-lg px-5 py-3 w-100" name='reservation'>
                      <i class="bi bi-calendar-check me-2"></i>Confirmer la Réservation
                    </button>
                  </div>
                </div>
              </form>
              <?php endif; ?>

            </div>
          </div>

        </div>
      </div>
    </section>

    <section class="py-0">
      <div class="map-placeholder d-flex align-items-center justify-content-center bg-light-beige" style="height:320px">
        <div class="text-center">
          <i class="bi bi-map fs-1 text-gold mb-3 d-block"></i>
          <p class="fw-semibold mb-1">12 Rue de la Paix, Paris 75001</p>
          <a href="https://maps.google.com" target="_blank" class="btn btn-outline-dark mt-2 px-4">
            <i class="bi bi-geo-alt me-2"></i>Voir sur Google Maps
          </a>
        </div>
      </div>
    </section>

    <footer class="footer bg-dark text-white pt-5 pb-3">
      <div class="container">
        <div class="row g-4 mb-4">
          <div class="col-lg-4">
            <h5 class="footer-brand mb-3"><span class="text-gold">✦</span> Le Festin Royal</h5>
            <p class="text-muted small">Un restaurant gastronomique d'exception au cœur de Paris.</p>
            <div class="social-links mt-3 d-flex gap-3">
              <a href="#" class="social-link"><i class="bi bi-facebook"></i></a>
              <a href="#" class="social-link"><i class="bi bi-instagram"></i></a>
              <a href="#" class="social-link"><i class="bi bi-twitter-x"></i></a>
              <a href="#" class="social-link"><i class="bi bi-youtube"></i></a>
            </div>
          </div>
          <div class="col-sm-6 col-lg-2 offset-lg-1">
            <h6 class="footer-heading mb-3">Navigation</h6>
            <ul class="list-unstyled footer-links">
              <li><a href="index.html">Accueil</a></li>
              <li><a href="menu.html">Menu &amp; Galerie</a></li>
              <li><a href="equipe.html">Notre Équipe</a></li>
              <li><a href="reservation.php">Réservation</a></li>
            </ul>
          </div>
          <div class="col-sm-6 col-lg-2">
            <h6 class="footer-heading mb-3">Services</h6>
            <ul class="list-unstyled footer-links">
              <li><a href="#">Privatisation</a></li>
              <li><a href="#">Événements</a></li>
              <li><a href="#">Cours de Cuisine</a></li>
              <li><a href="#">Carte Cadeau</a></li>
            </ul>
          </div>
          <div class="col-lg-3">
            <h6 class="footer-heading mb-3">Contact</h6>
            <ul class="list-unstyled text-muted small">
              <li class="mb-2"><i class="bi bi-geo-alt text-gold me-2"></i>12 Rue de la Paix, Paris 75001</li>
              <li class="mb-2"><i class="bi bi-telephone text-gold me-2"></i>+33 1 23 45 67 89</li>
              <li class="mb-2"><i class="bi bi-envelope text-gold me-2"></i>contact@lefestinroyal.fr</li>
              <li class="mb-2"><i class="bi bi-clock text-gold me-2"></i>Lun–Ven · 12h–23h</li>
            </ul>
          </div>
        </div>
        <hr class="border-secondary" />
        <div class="row align-items-center">
          <div class="col-md-6 text-center text-md-start">
            <small class="text-muted">&copy; 2026 Le Festin Royal. Tous droits réservés.</small>
          </div>
          <div class="col-md-6 text-center text-md-end mt-2 mt-md-0">
            <small class="text-muted">
              <a href="#" class="text-muted text-decoration-none me-3">Mentions légales</a>
              <a href="#" class="text-muted text-decoration-none">Confidentialité</a>
            </small>
          </div>
        </div>  
      </div>
    </footer>

   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>