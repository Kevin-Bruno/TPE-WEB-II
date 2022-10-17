{{include file='templates/header.tpl'}}
<form action="updateProduct/{{$id}}"  method="POST">
<label>nombre</label>
<input type="text" name="name" value="{{$product->name}}">
<label >Detalle</label>
<input type="text" name="detail"  value="{{$product->details}}">
<label >Precio</label>
<input type="number" name="price" value="{{$product->price}}">
<select id="category" name="category">
{{foreach from=$categories item=$category}}
  <option value="{{$category->ID_Category}}" {{if isset($product->ID_Category_FK)}}
    {{if  {{$category->ID_Category}} eq {{$product->ID_Category_FK}} }}
    selected
    {{/if}}
  {{/if}}>{{$category->nameCategory}}
  </option>
{{/foreach}}
</select>
<button type="submit">Enviar</button>

</form>