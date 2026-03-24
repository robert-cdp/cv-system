@extends('main')

<x-page-meta title="Crear Producto" subtitle="Registrar un nuevo producto" icon="box-seam" />

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-body">
            <form method="POST" action="{{ route('product.store') }}">
                @csrf

                <div class="row g-3">

                    <div class="col-12 col-md-6">
                        <x-form.input name="name" label="Nombre" icon="box" placeholder="Ej: Router TP-Link" />
                    </div>

                    <div class="col-12 col-md-6">
                        <x-form.select name="category_id" label="Categoría" icon="tag" :options="$categories->pluck('name', 'id')"
                            placeholder="Seleccione una categoría" />
                    </div>

                    <div class="col-12 col-md-4">
                        <x-form.input name="price" label="Precio" icon="cash" type="number" step="0.01"
                            placeholder="0.00" />
                    </div>

                    <div class="col-12 col-md-4">
                        <x-form.input name="stock" label="Stock" icon="boxes" type="number" placeholder="0" />
                    </div>

                    <div class="col-12 col-md-4 d-flex align-items-end">
                        <x-form.switch name="status" label="Activo" :checked="true" />
                    </div>

                    <div class="col-12">
                        <x-form.textarea name="description" label="Descripción" icon="blockquote-left"
                            placeholder="Descripción del producto" rows="3" />
                    </div>

                    <x-form.actions submit="Guardar" cancel-route="{{ route('product.index') }}" />

                </div>
            </form>
        </div>
    </div>
@endsection
