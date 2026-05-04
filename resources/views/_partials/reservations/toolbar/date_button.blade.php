@php
    $filterSessionKey = 'widget.Reservations-filter-list-filter.scope-date';
    $activeDate = make_carbon(array_get(session($filterSessionKey), 0, now()))->startOfDay();

    $targetDate = match ($button->name) {
        'previous_day' => $activeDate->copy()->subDay(),
        'next_day' => $activeDate->copy()->addDay(),
        default => $activeDate->copy(),
    };

    $formattedDate = $targetDate->format('d/m/Y');
    $formattedDateShort = $targetDate->format('d/m');
    $href = admin_url('reservations?date='.$targetDate->toDateString());

    $label = match ($button->name) {
        'previous_day' => '<i class="fa fa-chevron-left"></i>&nbsp;&nbsp;'.$formattedDateShort,
        'next_day' => $formattedDateShort.'&nbsp;&nbsp;<i class="fa fa-chevron-right"></i>',
        default => '<i class="fa fa-calendar"></i>&nbsp;&nbsp;'.$formattedDateShort,
    };
@endphp

<a
    href="{{ $href }}"
    class="{{ $button->cssClass }}"
    tabindex="0"
>{!! $label !!}</a>
