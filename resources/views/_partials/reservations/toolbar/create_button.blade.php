@php
    $filterSessionKey = 'widget.Reservations-filter-list-filter.scope-date';
    $activeDate = make_carbon(array_get(session($filterSessionKey), 0, now()))->toDateString();
    $href = admin_url('reservations/create?date='.$activeDate);
@endphp

<a
    href="{{ $href }}"
    class="{{ $button->cssClass }}"
    tabindex="0"
>{!! $button->label ?: $button->name !!}</a>
