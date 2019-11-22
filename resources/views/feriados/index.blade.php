@extends('layouts.app')

@section('content')
    <div class="container">        
        @include('partials.alerts.js_confirm')  
        <!-- success messages -->
        @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
        @endif 
         <!-- Current feriado -->
            <div class="panel panel-default">
                <div class="panel-heading">
                     <h1>
                        Feriados
                        <div class="pull-right">
                            <!-- TRIGGER THE MODAL WITH A BUTTON -->
                            {!! Form::button('Nuevo feriado <i class="fa fa-bolt"></i>', ['class' => 'btn btn-success btn-create-feriado', 'type' => 'submit', 'data-toggle' => 'modal', 'data-target' => '#createModal']) !!}
                        </div> 
                    </h1>
                </div>
                <!--<div class="panel panel-info">
                    <div class="panel-heading">
                        {!! Form::open([
                            'method' => 'GET',
                            'route' => ['feriados.index'],
                            'class' => 'navbar-form',
                            'role' => 'search'                                
                        ]) !!}
                        {!! Form::text('description', '', ['class' => 'form-control enfocar', 'placeholder' => 'Descripci&oacute;n']) !!}                        
                        {!! Form::submit('Buscar', ['class' => 'btn btn-default']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>-->
                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>Descripci&oacute;n</th>
                            <th>Fecha</th>			  
                            <!-- <th>&nbsp;</th>-->
                            <th>Acci&oacute;n</th>
                        </thead>
                        <tbody>
                            @foreach ($feriados as $feriado)
                                <tr>
                                    <td class="table-text"><div>{{ $feriado->descripcion }}</div></td>
                                    <td>{{ $dias[date("w", strtotime((string)$feriado->fecha))]." ".date("d",strtotime((string)$feriado->fecha))." de ".
                                       $meses[date("n",strtotime((string)$feriado->fecha))-1]." de ".date("Y", strtotime((string)$feriado->fecha)) }}</td>
                                    <td>
                                        <!-- TRIGGER THE MODAL WITH A BUTTON -->
                                        
                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'route' => ['feriados.destroy', $feriado->id],
                                            'onsubmit' => 'return ConfirmDelete()'                  
                                        ]) !!}

                                        {!! Form::button('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>', ['class' => 'btn btn-warning btn-edit-feriado', 'type' => 'submit', 'data-id' => $feriado->id,  'data-toggle' => 'modal', 'data-target' => '#editModal']) !!}                                            

                                        {!! Form::button('<span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>', ['class' => 'btn btn-danger', 'type' => 'submit']) !!}

                                        {!! Form::close() !!}                                           
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>                
            </div>
        </div>    
    </div>
    @include('feriados.create')
    @include('feriados.edit')
@endsection

@section('scripts')
    {!! Html::script('js/funciones/focus.js') !!}
    {!! Html::script('js/feriados/edit.js') !!}
    {!! Html::script('js/feriados/create.js') !!}
    {!! Html::script('js/funciones/datepicker.js') !!}
@endsection
