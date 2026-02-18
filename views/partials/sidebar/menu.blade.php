<ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation"
    aria-label="Main navigation" data-accordion="false" id="navigation">

    <x-menu.item route="dashboard.index" icon="house" label="Dashboard" />

    <x-menu.group icon="box-seam" label="Servicios" active-route="services.*">
        <x-menu.item route="services.categories.index" icon="folder" label="Administrar Categorías" />
        <x-menu.item route="services.categories.create" icon="folder-plus" label="Nueva Categoría" />
        <x-menu.item route="services.index" icon="list" label="Administrar Servicios" />
        <x-menu.item route="services.create" icon="plus-circle" label="Nuevo Servicio" />
    </x-menu.group>

    <x-menu.group icon="people" label="Clientes" active-route="customer.*">
        <x-menu.item route="customer.search" icon="search" label="Consulta Cliente" />
        <x-menu.item route="customer.index" icon="people" label="Administrar Clientes" />
        <x-menu.item route="customer.create" icon="person-plus" label="Nuevo Cliente" />
    </x-menu.group>

    <x-menu.group icon="person" label="Usuarios" active-route="user.*">
        <x-menu.item route="user.index" icon="people" label="Administrar Usuarios" />
        <x-menu.item route="user.create" icon="person-plus" label="Nuevo Usuario" />
    </x-menu.group>

    <x-menu.group icon="lock" label="Roles de Usuario" active-route="roles.*">
        <x-menu.item route="roles.index" icon="person-lock" label="Roles" />
        <x-menu.item route="roles.create" icon="person-fill-lock" label="Nuevo Rol" />
    </x-menu.group>
</ul>
