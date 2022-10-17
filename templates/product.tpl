{{include file="templates/header.tpl"}}
    <div class="item-container">
    <div>
      <h2 class="item-title">Producto: {{$product->name}}</h2>
      <p class="author">Detalle: <span>{{$product->details}}</span></p>
      <p class="release-date">Precio: {{$product->price}}</p>
      <div class="description-container">
    <p class="description-item">Categoria:{{$product->name}}<p>
      </div>
      </div>
    </div>
  {{include file="footer.tpl"}}