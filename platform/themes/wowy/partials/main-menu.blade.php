


@if (!empty($menu_nodes))
<ul class="multipage-menu">
    @foreach ($menu_nodes as $menu)
        <li class="menu-item {{ $menu->has_child ? 'menu-item-has-children' : '' }}">
            <a href="{{ url($menu->url) }}">
                {{ $menu->title }}
            </a>

            @if ($menu->has_child && !empty($menu->child))
                <ul class="submenu last-children">
                    @foreach ($menu->child as $child)
                        <li class="{{ $child->has_child ? 'has-arrow' : '' }}">
                            <a href="{{ url($child->url) }}" style="line-height: 20.2px;">
                                {{ $child->title }}
                            </a>

                            @if ($child->has_child && !empty($child->child))
                                <ul class="submenu">
                                    @foreach ($child->child as $subChild)
                                        <li>
                                            <a href="{{ url($subChild->url) }}">
                                                {{ $subChild->title }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                        </li>
                    @endforeach
                </ul>
            @endif

        </li>
    @endforeach
</ul>
@endif


{{-- <ul {!! $options !!}>
    @php $menu_nodes->loadMissing('metadata'); @endphp
    @foreach ($menu_nodes as $key => $row)
        <li class="{{ $row->css_class }}">
            <a href="{{ url($row->url) }}" @if ($row->active) class="active" @endif target="{{ $row->target }}">
                @if ($iconImage = $row->getMetadata('icon_image', true))
                    <img src="{{ RvMedia::getImageUrl($iconImage) }}" alt="icon image" width="14" height="14" style="vertical-align: middle; margin-top: -2px"/>
                @elseif ($row->icon_font)<i class='{{ trim($row->icon_font) }}'></i> @endif{{ $row->title }}
                @if ($row->has_child)
                    @if ($row->parent_id) <i class="fa fa-chevron-right"></i> @else <i class="fa fa-chevron-down"></i> @endif
                @endif
            </a>
            @if ($row->has_child)
                {!!
                    Menu::generateMenu([
                        'menu'       => $menu,
                        'view'       => 'main-menu',
                        'options'    => ['class' => $row->parent_id ? 'level-menu level-menu-modify' : 'sub-menu'],
                        'menu_nodes' => $row->child,
                    ])
                !!}
            @endif
        </li>
    @endforeach
</ul> --}}
