<ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation"
    aria-label="Main navigation" data-accordion="false" id="navigation">

    <x-menu.item route="dashboard.index" icon="fas fa-home" label="Dashboard" />

    <x-menu.group icon="fas fa-concierge-bell" label="Servicios" active-route="services.*">
        <x-menu.item route="services.categories.index" icon="far fa-folder"
            label="Administrar Categorías" />

        <x-menu.item route="services.categories.create" icon="fas fa-folder-plus"
            label="Nueva Categoría" />

        <x-menu.item route="services.index" icon="fas fa-list" label="Administrar Servicios" />

        <x-menu.item route="services.create" icon="fas fa-plus-circle" label="Nuevo Servicio" />
    </x-menu.group>

    <x-menu.group icon="fas fa-user-friends" label="Clientes" active-route="customer.*">
        <x-menu.item route="customer.index" icon="fas fa-users" label="Administrar Clientes" />

        <x-menu.item route="customer.create" icon="fas fa-user-plus" label="Nuevo Cliente" />

        <x-menu.item route="customer.search" icon="fas fa-search" label="Consulta Cliente" />
    </x-menu.group>

</ul>
