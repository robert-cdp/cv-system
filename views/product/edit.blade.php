@extends('main')

<x-page-meta title="Editar Producto" subtitle="Actualizar información del producto" icon="pencil-square" />

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-body">
            <form method="POST" action="{{ route('product.update', $product->slug) }}">
                @csrf
                @method('PUT')

                <div class="row g-3">

                    <div class="col-12 col-md-6">
                        <x-form.input name="name" label="Nombre" icon="box" placeholder="Ej: Router TP-Link"
                            :value="old('name', $product->name)" />
                    </div>

                    <div class="col-12 col-md-6">
                        <x-form.select name="category_id" label="Categoría" icon="tag" :options="$categories->pluck('name', 'id')"
                            :value="old('category_id', $product->category_id)" placeholder="Seleccione una categoría" />
                    </div>

                    <div class="col-12 col-md-4">
                        <x-form.input name="price" label="Precio" icon="cash" type="number" step="0.01"
                            placeholder="0.00" :value="old('price', $product->price)" />
                    </div>

                    <div class="col-12 col-md-4">
                        <x-form.input name="stock" label="Stock" icon="boxes" type="number" placeholder="0"
                            :value="old('stock', $product->stock)" />
                    </div>

                    <div class="col-12 col-md-4 d-flex align-items-end">
                        <x-form.switch name="status" label="Activo" :checked="old('status', $product->status)" />
                    </div>

                    <div class="col-12">
                        <x-form.textarea name="description" label="Descripción" icon="blockquote-left"
                            placeholder="Descripción del producto" rows="3" :value="old('description', $product->description)" />
                    </div>

                    <x-form.actions submit="Actualizar" cancel-route="{{ route('product.index') }}" />

                </div>
            </form>
        </div>
    </div>
@endsection
