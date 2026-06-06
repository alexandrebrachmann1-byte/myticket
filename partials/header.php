<?php

require_once(__DIR__ . "/../functions/tools.php");

?>
<header>
  <nav class="navbar navbar-expand-lg custom-navbar shadow-sm">
    <div class="container">

      <!-- Logo -->
      <a class="navbar-brand d-flex align-items-center text-gold" href="/">
        <img src="/myticket/assets/img/logo.png" alt="Logo MyTicket" height="40" class="me-2">
        <span class="fw-bold">MyTicket</span>
      </a>

      <!-- Toggle -->
      <button class="navbar-toggler border-gold" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Menu -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto align-items-center gap-3">

          <li class="nav-item">
            <a class="nav-link text-gold" href="/myticket/">Accueil</a>
          </li>

        <?php if(check_connected_user() && $_SESSION['role'] === 'utilisateur'): ?>

          <li class="nav-item">
            <a class="nav-link text-gold" href="/myticket/pages/tickets.php">Vos tickets</a>
          </li>

        <?php elseif(check_connected_user() && $_SESSION['role'] === 'technicien'): ?>

          <li class="nav-item">
            <a class="nav-link text-gold" href="/myticket/pages/tickets_by_technician.php">Vos tickets en cours</a>
          </li>

        <?php endif; ?>


          <li class="nav-item">
            <a class="nav-link text-gold" href="/myticket/pages/contact.php">Nous contacter</a>
          </li>

          <?php if(check_connected_user()): ?>

            <?php if($_SESSION['role'] === 'utilisateur'): ?>

              <li class="nav-item">
                <a class="btn btn-gold btn-sm ms-2" href="/myticket/pages/dashboard.php">
                  Créer un ticket
                </a>
              </li>

            <?php elseif($_SESSION['role'] === 'technicien'): ?>

              <li class="nav-item">
                <a class="btn btn-gold btn-sm ms-2" href="/myticket/pages/dashboard_technician.php">
                  Espace technicien
                </a>
              </li>

            <?php endif; ?>

            <li class="nav-item">
              <a class="btn btn-gold btn-sm ms-2" href="/myticket/pages/deconnexion.php">
                Se deconnecter
              </a>
            </li>
          <?php else: ?>
            <li class="nav-item">
              <a class="btn btn-outline-gold btn-sm ms-2" href="/myticket/pages/connexion.php">
                Se connecter
              </a>
            </li>
          <?php endif; ?>
        </ul>
      </div>

    </div>
  </nav>
</header>
