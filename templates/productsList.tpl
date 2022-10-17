{{include file="templates/header.tpl"}}
{{if isset($smarty.session.IS_LOGGED)}}
<form action="addProducts" method="POST">
<label>nombre</label>
<input type="text" name="name" id="">
<label >Detalle</label>
<input type="text" name="detail" id="">
<label >Precio</label>
<input type="text" name="price" id="">
<select id="category" name="category">
{{foreach from=$categories item=$category}}
  <option value="{{$category->ID_Category}}">{{$category->nameCategory}}</option>
{{/foreach}}
</select>
<button type="submit">Enviar</button>
</form>
{{/if}}
    {{foreach from=$products item=$product}}
            <div class="card" style="width: 18rem;">
            <div class="card-body">
            <h5 class="card-title">{$product->name}</h5>
            </div>
            <div class="card-body">
            {{if isset($smarty.session.IS_LOGGED)}}
            <a class="btn btn-danger" href="deleteProduct/{$product->ID_Products}"> Borrar </a>
            <a class="btn btn-danger" href="showEditProduct/{$product->ID_Products}"> Actualizar </a>
            {{/if}}
            <a href="product/{$product->ID_Products}">Ver mas</a>
            </div>
            </div>
    {{/foreach}}
    {{include file="templates/footer.tpl"}}



    