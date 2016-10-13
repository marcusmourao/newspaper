@extends('template')
@section('content')

    <h1>Criar nova notícia</h1>

    <div class="row">
        <form class="col s12 m12 l12" action="store" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="input-field col s12 m12 l12">
                <input id="title" name="title" type="text" class="validate">
                <label for="title">Título</label>
            </div>

            <div class="input-field col s12 m12 l12">
                <textarea id="text" name="text" class="materialize-textarea"></textarea>
                <label for="text">Texto</label>
            </div>

            <div class="input-field col s12 m6 l6">
                <select name="category" id="category">
                    <option value="null" disabled selected>Selecione uma categoria</option>
                    <option value="Ambiente">Ambiente</option>
                    <option value="Educação">Educação</option>
                    <option value="Esporte">Esporte</option>
                    <option value="Diversão">Diversão</option>
                    <option value="Geral">Geral</option>
                    <option value="Policial">Policial</option>
                    <option value="Política">Política</option>
                    <option value="Saúde">Saúde</option>
                </select>
                <label for="category">Categoria</label>
            </div>

            <div class="input-field col s12 m6 l6">
                <input id="author" name="author" type="text" class="validate">
                <label for="author">Autor</label>
            </div>

            <div class="input-field col s12 m6 l6">

                <input id="publishDate" name="publishDate" type="text" class="validate datepicker">
                <label for="publishDate"> Data de publicação </label>
            </div>

            <div class="input-field col s12 m6 l6">
                <input id="publishTime" name="publishTime" type="text" class="validate" value="{{date('h:i:sa')}}" placeholder="{{date('h:i:sa')}}">
                <label for="publishTime">Horário de publicação</label>
            </div>

            <div class="file-field input-field col s12 m12 l12">
                <div class="btn right blue-grey">
                    <span>Adicionar fotos</span>
                    <input type="file" name="photo[]" multiple>
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Selecione uma ou mais imagens">
                </div>
            </div>

            <div class="col">
                <input type="submit" class="btn btn-large blue-grey" value="Enviar">
            </div>
        </form>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('select').material_select();
            $('.datepicker').pickadate({
                selectMonths: true, // Creates a dropdown to control month
                selectYears: 15, // Creates a dropdown of 15 years to control year
                format: 'yyyy/mm/dd'

            });
        });
    </script>
@stop