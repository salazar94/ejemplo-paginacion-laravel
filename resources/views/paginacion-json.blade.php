@extends('layouts.app')
@push('scripts')
<script defer>
    getItem();
    function getItem(pagNum = 0) {
        $.ajax({
            url: `/paginacion-ajax?page=${pagNum}`,
            success: function(respuesta) {
                // console.log(respuesta)
                const card = document.querySelector('#table');
                let resultHtml = '';
                respuesta.data.forEach(item =>
                    resultHtml += `
              <tr>
              <td>${item.id}</td>
               <td>${item.title}</td>
               <td><button class="btn btn-primary">Agregar</button></td>
              </tr>`
                );
                // resultHtml += 
                const footer = document.querySelector('#footer');
                footer.innerHTML = paginacion(respuesta);
                card.innerHTML = resultHtml;
                resultHtml = '';
            },
            error: function() {
                console.log("No se ha podido obtener la información");
            }
        });
    }

    function paginacion({
        total,
        per_page,
        current_page
    }) {
        const totalPage = Math.round(total / per_page);
        let result = `<nav>
    <ul class="pagination">
        <li aria-disabled="true" aria-label="« Previous" class="page-item disabled">
            <span aria-hidden="true" class="page-link"> ‹</span></li>`;
        for (let index = 0; index < totalPage; index++) {
            let a =index+1;
            result += `<li class="page-item">
            <a onclick="getItem(${a})" class="page-link ${current_page == index ? 'active': ''}"> ${a} </a> </li>`;            
        }
        result += `      
        <li class="page-item">
            <a href="getItem(${current_page++})" rel="next" aria-label="Next »" class="page-link"> › </a> </li>
    </ul>
</nav>`;
        return result;
    }
</script>
@endpush

@section('content')
@stack('scripts')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <p style="padding: 50px;">Descripción: Simple, quiero paginar los items de la tabla con ajax sin recargar la página de la manera más simple y limpia hablando en cuanto código.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Item</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody id="table">
                    </tbody>
                </table>
                <div id="footer">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection