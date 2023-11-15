<?php 

function icon($user) {
  $html = <<< "EOT"
    <a href="profil">
      <div class="user-info">
          <div class="user-icon">
              <i class="fas fa-user"></i>
          </div>
          <h3 >$user</h3>
      </div>
    </a>
  EOT;
  return $html;
}
