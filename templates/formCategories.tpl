{{include file='templates/header.tpl'}}
{{if isset($smarty.session.IS_LOGGED)}}
<form action="addCategory" method="POST">
<label>Agregar categoria nueva</label>
<input type="text" name="name" required>
<button type="submit">Enviar</button>

</form>
{{/if}}

<ul>
{{foreach from=$categories item=$category}}
  <li>
      <div class="card-body">
      {$category->nameCategory}:  
      {{if isset($smarty.session.IS_LOGGED)}}
      <a class="btn btn-danger" href="deleteCategory/{$category->ID_Category}"> Borrar </a>
      <a class="btn btn-danger" href="showUpdateCategory/{$category->ID_Category}"> Actualizar </a>
      {{/if}}
      <a href="showCategory/{$category->ID_Category}">Ver mas</a><!-- FIJARSE EN MODIFICAR ESTO-->
      </div>
{{/foreach}}
</ul>
