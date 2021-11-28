<?php
    include 'header.php'
?>
<main>
    <div class='wrapper-main'>
    <section class='section-default'>
        <h1>Signup</h1>
        <form action="includes/signup.inc.php" method="post">
    <input type="text"name='uid' placeholder="username">
    <input type="text"name='mail' placeholder="email">
    <input type="password"name='pwd' placeholder="password">
    <input type="password"name='pwd-repeat' placeholder="repeat password">
    <button type="submit" name='signup-submit'>SIGNUP</button>
        </form>
    </section>
    </div>
</main>
<?php
    include 'footer.php'
?>