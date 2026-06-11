<?php
require_once(__DIR__ . "/../functions/tools.php");
?>

<header>
  <nav class="navbar navbar-expand-lg custom-navbar shadow-sm py-2">
    <div class="container">

     
      <a class="navbar-brand d-flex align-items-center" href="/">
        <img
          src="/myticket/assets/img/logo.png"
          alt="Logo MyTicket"
          height="60"
          class="me-2"
        >
      </a>

    
      <button
        class="navbar-toggler border-gold"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

   
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto align-items-center gap-2">

          <?php if(check_connected_user() && $_SESSION['role'] === 'utilisateur'): ?>

            <li class="nav-item">
              <a class="btn btn-outline-gold" href="/myticket/pages/tickets.php">
                Vos tickets
              </a>
            </li>

          <?php elseif(check_connected_user() && ($_SESSION['role'] === 'technicien' || $_SESSION['role'] === 'administrateur')): ?>

            <li class="nav-item">
              <a class="btn btn-outline-gold" href="/myticket/pages/tickets_by_technician.php">
                Vos tickets en cours
              </a>
            </li>

          <?php endif; ?>

          <?php if(check_connected_user()): ?>

            <?php if($_SESSION['role'] === 'utilisateur'): ?>

              <li class="nav-item">
                <a class="btn btn-gold" href="/myticket/pages/dashboard.php">
                  Créer un ticket
                </a>
              </li>

            <?php elseif($_SESSION['role'] === 'technicien' || $_SESSION['role'] === 'administrateur'): ?>

              <li class="nav-item">
                <a class="btn btn-gold" href="/myticket/pages/dashboard.php">
                  Tableau de bord
                </a>
              </li>

            <?php endif; ?>

            <li class="nav-item">
              <a class="btn btn-danger" href="/myticket/pages/deconnexion.php">
                Déconnexion
              </a>
            </li>

          <?php else: ?>

            <li class="nav-item">
              <a class="btn btn-outline-gold" href="/myticket/pages/connexion.php">
                Se connecter
              </a>
            </li>

          <?php endif; ?>

        </ul>
      </div>

    </div>
  </nav>
</header>