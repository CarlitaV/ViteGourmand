<header>
    <nav class="navBar">
        <div class="logo">
            <img src="/asset/images/Logo_Vite_Goumourmand_Gemini_Generated_Image.png" alt="Logo vite et gourmand">
        </div>
        <button id="burger" class="burger">
            <img src="/asset/images/icone_menu.png" alt="menu burger">
        </button>

        <ul class="listNav active" id="menu">
            <li class="nav"><a href="/accueil">ACCUEIL</a></li>
            <li class="nav"><a href="/menu">MENU</a></li>
            <li class="nav"><a href="/apropos">A PROPOS</a></li>
            <li class="nav"><a href="/avis">AVIS</a></li>
            
           
            
            <?php
            /*Ici si l'utilisateur est connecter on affiche deconnexion**/
            if (isset($_SESSION['idUser'])): ?>
            
                <li class="nav"><a href="/deconnexion">DECONNECTION</a></li>

            <?php else: ?>
                <li class="nav"><a href="/connexion">CONNECTION</a></li>
            <?php endif; ?>
            
            <li class="nav"><a href="/panier">PANIER</a></li>
        </ul>
        <h2>
            <?php
            /*Si connectee  */ 
            if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                <a href="/admin/commandes">Admin</a>
                <a href="/admin/stats">Dashboard</a>
            <?php endif; ?>

            <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'employe'): ?>
                <a href="/employe/commandes">Employé</a>
            <?php endif; ?>
        </h2>
    </nav>
</header>
