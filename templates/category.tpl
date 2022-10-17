{include file='templates/header.tpl'}
<div class="item-container">
<h2>Nombre: {{$category->name}}</h2>
  {{foreach from=$products item=$product}}
    <div>
      <p>Producto: <span>{{$product->name}}</span></p>
      <p>Detalle producto: <span>{{$product->details}}</span></p>
      <p>Precio: {{$product->price}}</p>
    </div>

  {{/foreach}}
</div>