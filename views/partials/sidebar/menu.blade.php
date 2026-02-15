<ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation" aria-label="Main navigation"
    data-accordion="false" id="navigation">

    <x-menu.item route="dashboard.index" icon="lni lni-home-2" label="Dashboard" />

    <x-menu.group icon="lni lni-box-archive-1" label="Servicios" active-route="services.*">
        <x-menu.item route="services.categories.index" icon="lni lni-folder" label="Administrar Categorías" />
        <x-menu.item route="services.categories.create" icon="lni lni-folder-add" label="Nueva Categoría" />
        <x-menu.item route="services.index" icon="lni lni-list" label="Administrar Servicios" />
        <x-menu.item route="services.create" icon="lni lni-plus" label="Nuevo Servicio" />
    </x-menu.group>

    <x-menu.group icon="lni lni-user-multiple-4" label="Clientes" active-route="customer.*">
        <x-menu.item route="customer.index" icon="lni lni-users" label="Administrar Clientes" />
        <x-menu.item route="customer.create" icon="lni lni-user-add" label="Nuevo Cliente" />
        <x-menu.item route="customer.search" icon="lni lni-search" label="Consulta Cliente" />
    </x-menu.group>

    <x-menu.group icon="lni lni-user-4" label="Usuarios" active-route="user.*">
        <x-menu.item route="user.index" icon="lni lni-users" label="Administrar Usuarios" />
        <x-menu.item route="user.create" icon="lni lni-user-add" label="Nuevo Usuario" />
    </x-menu.group>

</ul>
