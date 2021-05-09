<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i
            class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('category') }}'><i
            class='nav-icon la la-object-group'></i> Категории</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('product') }}'><i class='nav-icon la la-adn'></i>
        Продукты</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('sofa') }}'> <i class='nav-icon la la-adn'></i>
        -Диваны</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('page') }}'><i class='nav-icon la la-pager'></i> Страницы</a>
</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('material') }}'><i class='nav-icon la la-magic'></i>
        Материалы</a></li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-atom"></i> Атрибуты</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('configurationsetting') }}"><i
                    class="nav-icon fa fa-question"></i> Конфигурация</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('configurationsize') }}"><i
                    class="nav-icon fa fa-question"></i> Размеры</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('configurationtexture') }}"><i
                    class="nav-icon fa fa-question"></i> Текстура</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('configurationcolor') }}"><i
                    class="nav-icon fa fa-question"></i> Цвет ткани</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('configurationmechanism') }}"><i
                    class="nav-icon fa fa-question"></i> Механизм</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('configurationleg') }}"><i
                    class="nav-icon fa fa-question"></i> Ножки</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('configurationsoftnesssofa') }}"><i
                    class="nav-icon fa fa-question"></i> Мягкость дивана</a></li>
        {{--<li class="nav-item"><a class="nav-link" href=""><i class="nav-icon fa fa-question"></i> Наполнитель</a></li>--}}
    </ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-atom"></i> Каталог тканей</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('fabrics') }}'><i
                    class='nav-icon la la-question'></i> Ткани</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('fabrics-type') }}'><i
                    class='nav-icon la la-question'></i> Тип ткани</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('color') }}'><i
                    class='nav-icon la la-question'></i> Цвет</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('producer') }}'><i
                    class='nav-icon la la-question'></i> Поставщик</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('fabrics-collection') }}'><i
                    class='nav-icon la la-question'></i> Коллекция</a></li>
    </ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Аунтефикация</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i>
                <span>Пользователи</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon fa fa-group"></i>
                <span>Роли</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i
                    class="nav-icon fa fa-key"></i> <span>Права доступа</span></a></li>
    </ul>
</li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('estimatework') }}'><i
            class='nav-icon la la-question'></i> Смета Работ</a></li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('contract') }}'><i class='nav-icon la la-question'></i>
        Contracts</a></li>
