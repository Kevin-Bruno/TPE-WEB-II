{{include file='templates/header.tpl'}}
<form action="verifyUser" method="post">
<label for="">Ingrese su email</label>
<input type="text" name="email">
<label for="">Ingrese su contraseña</label>
<input type="password" name="password">
<button type="submit">Ingresar</button>
</form>

<h2 class="alert-danger">{$error}</h2>