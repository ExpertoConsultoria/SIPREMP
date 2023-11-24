<div class="flex items-center">

    <div>
        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="edificio 1">
                <g id="Group">
                    <path id="Vector"
                        d="M10.8493 30V24.4303H19.1513V30H25.4078V0H4.5918V30H10.8493ZM19.1513 2.75595H22.6528V6.2575H19.1513V2.75595ZM19.1513 7.84627H22.6528V11.3488H19.1513V7.84627ZM19.1513 12.9375H22.6528V16.4381H19.1513V12.9375ZM19.1513 18.0269H22.6528V21.5303H19.1513V18.0269ZM13.25 2.75595H16.7525V6.2575H13.25V2.75595ZM13.25 7.84627H16.7525V11.3488H13.25V7.84627ZM13.25 12.9375H16.7525V16.4381H13.25V12.9375ZM13.25 18.0269H16.7525V21.5303H13.25V18.0269ZM7.3487 2.75595H10.8502V6.2575H7.3487V2.75595ZM7.3487 7.84627H10.8502V11.3488H7.3487V7.84627ZM7.3487 12.9375H10.8502V16.4381H7.3487V12.9375ZM7.3487 18.0269H10.8502V21.5303H7.3487V18.0269Z"
                        class="fill-neutral-600 dark:fill-neutral-500" />
                </g>
            </g>
        </svg>
    </div>
    <!-- // todo CAMBIAR EL ROL POR LA SUCURSAL -->
    <div class="grid justify-end">

        @php
            $area = Auth::user()?->org4empleado?->org3Puesto?->org2Area ? Auth::user()?->org4empleado?->org3Puesto?->org2Area->AreaNombre : 'Sin Cargo';
        @endphp

        <p class="px-3 text-base">
            {{ $area }}
        </p>
    </div>

</div>
