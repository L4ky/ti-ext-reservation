@php
    $dateButtonNames = ['previous_day', 'today', 'next_day'];
    $primaryButtons = [];
    $dateButtons = [];

    foreach ($availableButtons as $name => $buttonObj) {
        if (in_array($name, $dateButtonNames)) {
            $dateButtons[$name] = $buttonObj;
        } else {
            $primaryButtons[$name] = $buttonObj;
        }
    }
@endphp

<style>
    #{{ $toolbarId }} .reservation-toolbar-primary,
    #{{ $toolbarId }} .reservation-date-nav {
        gap: .75rem;
    }

    #{{ $toolbarId }} .reservation-date-nav {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        max-width: 560px;
    }

    #{{ $toolbarId }} .reservation-date-nav .btn {
        min-width: 0;
        white-space: nowrap;
    }

    @media (max-width: 480px) {
        #{{ $toolbarId }} .reservation-toolbar-primary {
            gap: .5rem;
        }

        #{{ $toolbarId }} .reservation-date-nav {
            gap: .5rem;
            max-width: none;
            width: 100%;
        }

        #{{ $toolbarId }} .reservation-date-nav .btn {
            padding-left: .5rem;
            padding-right: .5rem;
        }
    }
</style>

<div
    id="{{ $toolbarId }}"
    class="toolbar btn-toolbar {{ $cssClasses }}"
>
    @if($availableButtons)
        <div class="toolbar-action px-3 py-2 w-100">
            <div class="progress-indicator-container d-flex flex-column">
                @if($primaryButtons)
                    <div class="reservation-toolbar-primary d-flex flex-wrap align-items-center">
                        @foreach($primaryButtons as $buttonObj)
                            {!! $this->renderButtonMarkup($buttonObj) !!}
                        @endforeach
                    </div>
                @endif

                @if($dateButtons)
                    <div class="reservation-date-nav mt-2">
                        @foreach($dateButtons as $buttonObj)
                            {!! $this->renderButtonMarkup($buttonObj) !!}
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    @endif
</div>
