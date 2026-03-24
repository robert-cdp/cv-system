@extends('main')

<x-page-meta title="Crear Categoría" subtitle="Registrar una nueva categoría de productos" icon="tag" />

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-body">
            <form method="POST" action="{{ route('product.categories.update', $category->slug) }}">
                @csrf
                @method('PUT')
                <div class="row g-3">

                    <div class="col-12 col-md-6">
                        <x-form.input name="name" label="Nombre" icon="tag"
                            placeholder="Ej: Conectividad" value="{{ $category->name }}"/>
                    </div>

                    <div class="col-12">
                        <x-form.textarea name="description" label="Descripción" icon="blockquote-left"
                            placeholder="Descripción de la categoría" rows="3" value="{{ $category->description }}" />
                    </div>

                    <x-form.actions submit="Guardar" cancel-route="{{ route('product.categories.index') }}" />

                </div>
            </form>
        </div>
    </div>
@endsection
