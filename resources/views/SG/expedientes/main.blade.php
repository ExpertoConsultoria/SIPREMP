<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">

            <div>
                <h2 class="text-xl font-bold leading-tight text-gray-800 font dark:text-gray-200">
                    {{ __('Expedientes') }}
                </h2>
            </div>

            <div class="grid" style="justify-content: end; padding-right: 5.5rem">
                <a href="{{ route('dashboard') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 40 40"
                        fill="none">
                        <path
                            d="M36.6666 18.3334H7.35664L16.1783 9.51172C16.3375 9.35798 16.4645 9.17407 16.5518 8.97073C16.6392 8.76739 16.6851 8.54869 16.6871 8.32739C16.689 8.10609 16.6468 7.88662 16.563 7.6818C16.4792 7.47697 16.3554 7.29088 16.199 7.1344C16.0425 6.97791 15.8564 6.85415 15.6516 6.77035C15.4467 6.68655 15.2273 6.64438 15.006 6.6463C14.7847 6.64823 14.566 6.6942 14.3626 6.78155C14.1593 6.8689 13.9754 6.99587 13.8216 7.15505L2.15497 18.8217C1.84252 19.1343 1.66699 19.5581 1.66699 20.0001C1.66699 20.442 1.84252 20.8658 2.15497 21.1784L13.8216 32.8451C14.136 33.1487 14.557 33.3166 14.994 33.3128C15.431 33.309 15.849 33.1338 16.158 32.8248C16.467 32.5157 16.6423 32.0977 16.6461 31.6607C16.6499 31.2237 16.4819 30.8027 16.1783 30.4884L7.35664 21.6667H36.6666C37.1087 21.6667 37.5326 21.4911 37.8451 21.1786C38.1577 20.866 38.3333 20.4421 38.3333 20.0001C38.3333 19.558 38.1577 19.1341 37.8451 18.8215C37.5326 18.509 37.1087 18.3334 36.6666 18.3334Z"
                            class="fill-neutral-600 dark:fill-neutral-500" />
                    </svg>
                </a>
            </div>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl lg:px-8">
            <div class="grid justify-center overflow-hidden bg-transparent">

                <div class="container grid grid-cols-2 gap-6 px-8 m-auto justify-content-center mb-6">
                    <div
                        class="w-52 p-6 mt-8 bg-white border-gray-200 rounded-lg shadow-lg  shadow-zinc-300 dark:shadow-none dark:bg-zinc-800 dark:border-zinc-800">
                        <a href="{{ route('vales.aprobados') }}" class="text-right">

                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_156_6058)">
                                <path d="M16.9648 40.1787H4.46484V45.5357H16.9648V40.1787ZM9.82182 43.75H7.14352C6.65028 43.75 6.2505 43.3502 6.2505 42.857C6.2505 42.3641 6.65028 41.9643 7.14352 41.9643H9.82182C10.3151 41.9643 10.7148 42.3641 10.7148 42.857C10.7148 43.3502 10.3151 43.75 9.82182 43.75ZM14.2862 43.75H13.3935C12.9003 43.75 12.5005 43.3502 12.5005 42.857C12.5005 42.3641 12.9003 41.9643 13.3935 41.9643H14.2862C14.7794 41.9643 15.1792 42.3641 15.1792 42.857C15.1792 43.3502 14.7794 43.75 14.2862 43.75Z" class="fill-neutral-600 dark:fill-neutral-500"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M31.4437 7.44629L35.1302 0.062561C35.0318 0.0228882 34.9269 0.00190734 34.8205 0H0.892166C0.785736 0.00190734 0.680832 0.0228882 0.582031 0.062561L4.27046 7.4501C4.7309 8.35228 5.65596 8.92258 6.66876 8.92868H16.9635V6.97861C15.7336 6.54373 14.9959 5.28603 15.2164 4.00009C15.4368 2.71454 16.5519 1.7746 17.8561 1.7746C19.1608 1.7746 20.2758 2.71454 20.4963 4.00009C20.7168 5.28603 19.979 6.54373 18.7491 6.97861V8.92868H29.0439C30.0582 8.9222 30.984 8.35037 31.4437 7.44629Z" class="fill-neutral-600 dark:fill-neutral-500"/>
                                <path d="M49.107 2.67868H37.5V16.0713H45.5357C46.0289 16.0713 46.4287 16.4711 46.4287 16.9643C46.4287 17.4576 46.0289 17.857 45.5357 17.857H37.5V25H45.5357C46.0289 25 46.4287 25.3998 46.4287 25.893C46.4287 26.3859 46.0289 26.7857 45.5357 26.7857H37.5V29.4643H38.393C38.8859 29.4643 39.2857 29.8641 39.2857 30.357C39.2857 30.8502 38.8859 31.25 38.393 31.25H37.5V33.9287H45.5357C46.0289 33.9287 46.4287 34.3285 46.4287 34.8213C46.4287 35.3146 46.0289 35.7143 45.5357 35.7143H37.5V47.3213H49.107C49.6002 47.3213 50 46.9215 50 46.4287V3.57132C50 3.07846 49.6002 2.67868 49.107 2.67868ZM45.5357 31.25H42.857C42.3641 31.25 41.9643 30.8502 41.9643 30.357C41.9643 29.8641 42.3641 29.4643 42.857 29.4643H45.5357C46.0289 29.4643 46.4287 29.8641 46.4287 30.357C46.4287 30.8502 46.0289 31.25 45.5357 31.25ZM45.5357 22.3213H41.0713C40.5785 22.3213 40.1787 21.9215 40.1787 21.4287C40.1787 20.9354 40.5785 20.5357 41.0713 20.5357H45.5357C46.0289 20.5357 46.4287 20.9354 46.4287 21.4287C46.4287 21.9215 46.0289 22.3213 45.5357 22.3213Z" class="fill-neutral-600 dark:fill-neutral-500"/>
                                <path d="M0.893021 50H34.8213C35.3146 50 35.7143 49.6002 35.7143 49.107V2.89116L33.0402 8.24814C32.2746 9.75304 30.7331 10.7048 29.0447 10.7143H18.75V12.6644C19.9799 13.0993 20.7176 14.357 20.4971 15.6425C20.2766 16.9285 19.1616 17.8684 17.857 17.8684C16.5527 17.8684 15.4377 16.9285 15.2172 15.6425C14.9967 14.357 15.7345 13.0993 16.9643 12.6644V10.7143H6.66962C4.98314 10.7037 3.44353 9.75304 2.67868 8.25005L0 2.89268V49.107C0 49.6002 0.39978 50 0.893021 50ZM2.67868 40.1787C2.67868 39.1922 3.47824 38.393 4.46434 38.393H16.9643C17.9504 38.393 18.75 39.1922 18.75 40.1787V45.5357C18.75 46.5218 17.9504 47.3213 16.9643 47.3213H4.46434C3.47824 47.3213 2.67868 46.5218 2.67868 45.5357V40.1787Z" class="fill-neutral-600 dark:fill-neutral-500"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.7505 4.46434C18.7505 4.95758 18.3507 5.35698 17.8575 5.35698C17.3646 5.35698 16.9648 4.95758 16.9648 4.46434C16.9648 3.9711 17.3646 3.57132 17.8575 3.57132C18.3507 3.57132 18.7505 3.9711 18.7505 4.46434Z" class="fill-neutral-600 dark:fill-neutral-500"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.7505 15.1787C18.7505 15.6715 18.3507 16.0713 17.8575 16.0713C17.3646 16.0713 16.9648 15.6715 16.9648 15.1787C16.9648 14.6854 17.3646 14.2857 17.8575 14.2857C18.3507 14.2857 18.7505 14.6854 18.7505 15.1787Z" class="fill-neutral-600 dark:fill-neutral-500"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_156_6058">
                                <rect width="50" height="50" fill="white"/>
                                </clipPath>
                                </defs>
                            </svg>

                            <p class="text-lg mt-24 text-gray-800 dark:text-gray-400">Crear expediente</p>
                        </a>
                    </div>

                    <div
                        class="w-52 p-6 mt-8 bg-white border-gray-200 rounded-lg shadow-lg  shadow-zinc-300 dark:shadow-none dark:bg-zinc-800 dark:border-zinc-800">
                        <a href="{{ route('expediente.list') }}" class="text-right">

                            <svg width="57" height="57" viewBox="0 0 57 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_156_6066)">
                                <path d="M52.9294 21.375C52.9294 23.0613 51.5622 24.4286 49.8758 24.4286C48.1895 24.4286 46.8223 23.0613 46.8223 21.375C46.8223 19.6887 48.1895 18.3214 49.8758 18.3214C51.5622 18.3214 52.9294 19.6887 52.9294 21.375Z" class="fill-neutral-600 dark:fill-neutral-500"/>
                                <path d="M4.07227 34.6071H22.3937V44.7857H4.07227V34.6071Z" class="fill-neutral-600 dark:fill-neutral-500"/>
                                <path d="M47.8398 26.0329V28.6332L49.3105 27.6531C49.6529 27.425 50.0982 27.425 50.4406 27.6531L51.9113 28.6332V26.0329C50.6151 26.6079 49.136 26.6079 47.8398 26.0329Z" class="fill-neutral-600 dark:fill-neutral-500"/>
                                <path d="M0 14.25V48.8571H57V14.25H0ZM24.4286 45.8036C24.4286 46.3657 23.9728 46.8214 23.4107 46.8214H3.05357C2.49146 46.8214 2.03571 46.3657 2.03571 45.8036V33.5893C2.03571 33.0272 2.49146 32.5714 3.05357 32.5714H23.4107C23.9728 32.5714 24.4286 33.0272 24.4286 33.5893V45.8036ZM53.9464 24.4286V30.5357C53.9464 30.911 53.7397 31.2564 53.4087 31.4333C53.0777 31.6102 52.6761 31.5908 52.3635 31.3826L49.875 29.7216L47.3865 31.3806C47.0744 31.5889 46.6728 31.6082 46.3423 31.4318C46.0113 31.2554 45.8041 30.911 45.8036 30.5357V24.4286H45.8299C45.1565 23.5529 44.7897 22.4798 44.7857 21.375C44.7857 18.5645 47.0645 16.2857 49.875 16.2857C52.6855 16.2857 54.9643 18.5645 54.9643 21.375C54.9603 22.4798 54.5935 23.5529 53.9201 24.4286H53.9464Z" class="fill-neutral-600 dark:fill-neutral-500"/>
                                <path d="M26.1811 12.2143H28.1064L26.9872 8.84114C26.8461 8.42515 26.4564 8.14434 26.0171 8.14285H24.8223C24.8282 8.15925 24.8372 8.17416 24.8421 8.19056L26.1811 12.2143Z" class="fill-neutral-600 dark:fill-neutral-500"/>
                                <path d="M18.8412 8.84114C18.7001 8.42565 18.3114 8.14534 17.8731 8.14285H2.03516V12.2143H19.9625L18.8412 8.84114Z" class="fill-neutral-600 dark:fill-neutral-500"/>
                                <path d="M22.1087 12.2143H24.0341L22.9149 8.84114C22.7737 8.42515 22.3841 8.14434 21.9447 8.14285H20.7539L20.7698 8.19056L22.1087 12.2143Z" class="fill-neutral-600 dark:fill-neutral-500"/>
                                <path d="M30.2514 12.2143H32.1768L31.0575 8.84114C30.9164 8.42515 30.5267 8.14434 30.0874 8.14285H28.8926C28.8985 8.15925 28.9075 8.17416 28.9125 8.19056L30.2514 12.2143Z" class="fill-neutral-600 dark:fill-neutral-500"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_156_6066">
                                <rect width="57" height="57" fill="white"/>
                                </clipPath>
                                </defs>
                            </svg>                                

                            <p class="text-lg mt-24 text-gray-800 dark:text-gray-400">Expedientes</p>
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>

</x-app-layout>