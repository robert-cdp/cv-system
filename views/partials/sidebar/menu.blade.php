<ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation" aria-label="Main navigation"
    data-accordion="false" id="navigation">

    <x-menu.item route="dashboard.index" icon="house" label="Dashboard" />

    <x-menu.group icon="people" label="Clientes" active-route="customer.*">
        <x-menu.item route="customer.search" icon="search" label="Consulta Cliente" />
        <x-menu.item route="customer.index" icon="people" label="Administrar Clientes" />
        <x-menu.item route="customer.create" icon="person-plus" label="Nuevo Cliente" />
    </x-menu.group>


    @can('users')
    <x-menu.group icon="person" label="Usuarios" active-route="user.*">
        <x-menu.item route="user.index" icon="people" label="Administrar Usuarios" />
        <x-menu.item route="user.create" icon="person-plus" label="Nuevo Usuario" />
    </x-menu.group>        
    @endcan

</ul>
