<div id="connectionPage" data-aos='fade' data-aos-duration='1000'>
    <h1>connexion</h1>
    
    <?php $titlePage = "PN - connexion"; ?>
    
    <form id="connectionForm" action="../logins/connection" method="post" onsubmit="return FormLoginCheck()">
        <div>
            <input name="cus_mail" id="cus_mail" type="text" placeholder="email">
        </div>
        <div>
            <input name="cus_password" id="cus_password" type="password" placeholder="mot de passe">
        </div>
        <button type="submit">Me connecter</button>
    </form>

    <?php 
    if (!empty($message)) {
        echo "<p>".$message."</p>";
    }
    ?>
</div>