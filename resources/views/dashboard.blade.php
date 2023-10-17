<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">
            <div>
                <h2 class="text-2xl font-bold leading-tight text-gray-800 font dark:text-gray-200">
                    {{ __('Dashboard') }}
                </h2>
            </div>

        </div>
    </x-slot>

    <!-- {{Auth::user() -> roles[0]}} -->

    @if ( Auth::user() -> roles[0] -> name === 'N6:17A' )
    <div class="py-12">
        <div class="mx-auto max-w-7xl lg:px-8">
            <div class="overflow-hidden bg-transparent">

                <div
                    class="p-6 bg-white border border-gray-200 rounded-lg shadow w-30 text dark:bg-gray-800 dark:border-gray-700">
                    <p class="mb-3 text-lg font-semibold text-center text-gray-700 text dark:text-gray-400">¡HOLA,
                        {{ strtoupper(Auth::user () -> username)}}! BIENVENIDO AL SIPREMP</p>
                </div>


                <div
                    class="p-6 mt-8 bg-white border border-gray-200 rounded-lg shadow text dark:bg-gray-800 dark:border-gray-700">
                    <div class="grid grid-cols-3 gap-4 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3">

                        <div class="grid justify-start">
                            <x-user-icon class="block w-auto h-9" />
                        </div>
                        <div class="grid justify-start">
                            <x-building-icon class="block w-auto h-9" />
                        </div>
                        <div class="grid justify-start">
                            <x-localization-icon class="block w-auto h-9" />
                        </div>

                    </div>
                </div>

                <div class="grid justify-center">
                    <div class="grid grid-cols-3 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3">

                        <div
                            class="p-6 mt-8 bg-white border border-gray-200 rounded-lg shadow w-30 text dark:bg-gray-800 dark:border-gray-700">
                            <a href="{{ route('solicitudBienes.create') }}"
                                class="grid text-center justify-items-center">

                                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 50 50"
                                    fill="none">
                                    <g clip-path="url(#clip0_32_48)">
                                        <path
                                            d="M34.3197 38.1706V42.6084C34.3197 42.7884 34.3913 42.9612 34.5186 43.0885C34.646 43.2159 34.8187 43.2874 34.9988 43.2874H39.3207C39.5008 43.2874 39.6735 43.3589 39.8009 43.4863C39.9282 43.6136 39.9998 43.7864 39.9998 43.9665V45.748C39.9998 45.9281 39.9282 46.1008 39.8009 46.2281C39.6735 46.3555 39.5008 46.427 39.3207 46.427H34.9988C34.8187 46.427 34.646 46.4985 34.5186 46.6259C34.3913 46.7532 34.3197 46.926 34.3197 47.1061V51.6357C34.3197 51.8151 34.2487 51.9872 34.1223 52.1145C33.9958 52.2417 33.8241 52.3137 33.6447 52.3148H31.8352C31.6558 52.3137 31.4841 52.2417 31.3576 52.1145C31.2311 51.9872 31.1601 51.8151 31.1602 51.6357V47.1061C31.1602 46.926 31.0886 46.7532 30.9613 46.6259C30.8339 46.4985 30.6612 46.427 30.4811 46.427H26.0873C25.9072 46.427 25.7344 46.3555 25.6071 46.2281C25.4797 46.1008 25.4082 45.9281 25.4082 45.748V43.9665C25.4082 43.7864 25.4797 43.6136 25.6071 43.4863C25.7344 43.3589 25.9072 43.2874 26.0873 43.2874H30.4811C30.6612 43.2874 30.8339 43.2159 30.9613 43.0885C31.0886 42.9612 31.1602 42.7884 31.1602 42.6084V38.1706C31.1601 37.9912 31.2311 37.819 31.3576 37.6918C31.4841 37.5646 31.6558 37.4926 31.8352 37.4915H33.6447C33.8241 37.4926 33.9958 37.5646 34.1223 37.6918C34.2487 37.819 34.3197 37.9912 34.3197 38.1706Z"
                                            fill="#515151" />
                                        <path
                                            d="M29.259 41.2542V35.726H35.8977V4.79329C35.8977 3.52203 35.3927 2.30284 34.4938 1.40392C33.5949 0.505006 32.3757 0 31.1045 0L4.79329 0C3.52203 0 2.30284 0.505006 1.40392 1.40392C0.505006 2.30284 0 3.52203 0 4.79329L0 43.0837C0 44.3549 0.505006 45.5741 1.40392 46.4731C2.30284 47.372 3.52203 47.877 4.79329 47.877H23.7747V41.2542H29.259ZM9.58658 7.18993H26.3232C26.6429 7.17071 26.9631 7.21954 27.2626 7.33318C27.562 7.44683 27.834 7.6227 28.0605 7.84921C28.287 8.07571 28.4629 8.34768 28.5765 8.64716C28.6902 8.94665 28.739 9.26683 28.7198 9.58658C28.739 9.90632 28.6902 10.2265 28.5765 10.526C28.4629 10.8255 28.287 11.0975 28.0605 11.324C27.834 11.5505 27.562 11.7263 27.2626 11.84C26.9631 11.9536 26.6429 12.0024 26.3232 11.9832H9.58658C9.26684 12.0024 8.94665 11.9536 8.64717 11.84C8.34768 11.7263 8.07571 11.5505 7.84921 11.324C7.62271 11.0975 7.44683 10.8255 7.33318 10.526C7.21954 10.2265 7.17071 9.90632 7.18993 9.58658C7.17071 9.26683 7.21954 8.94665 7.33318 8.64716C7.44683 8.34768 7.62271 8.07571 7.84921 7.84921C8.07571 7.6227 8.34768 7.44683 8.64717 7.33318C8.94665 7.21954 9.26684 7.17071 9.58658 7.18993ZM9.58658 16.7765H26.3232C26.6429 16.7573 26.9631 16.8061 27.2626 16.9198C27.562 17.0334 27.834 17.2093 28.0605 17.4358C28.287 17.6623 28.4629 17.9343 28.5765 18.2337C28.6902 18.5332 28.739 18.8534 28.7198 19.1732C28.7397 19.4931 28.6913 19.8135 28.5779 20.1133C28.4645 20.4131 28.2886 20.6853 28.062 20.912C27.8353 21.1386 27.5631 21.3145 27.2633 21.4279C26.9635 21.5413 26.6431 21.5897 26.3232 21.5698H9.58658C9.26668 21.5897 8.94621 21.5413 8.64643 21.4279C8.34665 21.3145 8.07441 21.1386 7.84777 20.912C7.62113 20.6853 7.44527 20.4131 7.33186 20.1133C7.21844 19.8135 7.17006 19.4931 7.18993 19.1732C7.16716 18.8515 7.21334 18.5286 7.3254 18.2262C7.43745 17.9239 7.61279 17.6489 7.83968 17.4197C8.06658 17.1905 8.3398 17.0125 8.64106 16.8974C8.94233 16.7824 9.26469 16.733 9.58658 16.7525V16.7765ZM9.58658 26.3631H26.3232C26.9588 26.3631 27.5684 26.6156 28.0178 27.0651C28.4673 27.5145 28.7198 28.1241 28.7198 28.7597C28.7198 29.3954 28.4673 30.005 28.0178 30.4544C27.5684 30.9039 26.9588 31.1564 26.3232 31.1564H9.58658C8.95095 31.1564 8.34135 30.9039 7.8919 30.4544C7.44244 30.005 7.18993 29.3954 7.18993 28.7597C7.18993 28.1241 7.44244 27.5145 7.8919 27.0651C8.34135 26.6156 8.95095 26.3631 9.58658 26.3631ZM19.1732 40.723H9.58658C8.95095 40.723 8.34135 40.4705 7.8919 40.021C7.44244 39.5716 7.18993 38.962 7.18993 38.3263C7.18993 37.6907 7.44244 37.0811 7.8919 36.6317C8.34135 36.1822 8.95095 35.9297 9.58658 35.9297H19.1732C19.8088 35.9297 20.4184 36.1822 20.8678 36.6317C21.3173 37.0811 21.5698 37.6907 21.5698 38.3263C21.5698 38.962 21.3173 39.5716 20.8678 40.021C20.4184 40.4705 19.8088 40.723 19.1732 40.723Z"
                                            fill="#515151" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_32_48">
                                            <rect width="40" height="52.3148" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                <p class="mt-2">Nueva solicitud de bienes/servicios</p>
                            </a>
                        </div>

                        <div
                            class="p-6 mt-8 bg-white border border-gray-200 rounded-lg shadow w-30 text dark:bg-gray-800 dark:border-gray-700">
                            <a href="{{ route('solicitudBienes.borradores') }}"
                                class="grid text-center justify-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 45 45"
                                    fill="none">
                                    <g clip-path="url(#clip0_32_53)">
                                        <path
                                            d="M37.9976 -1.11153e-06H35.9948C35.7274 -0.0166063 35.4596 0.0238212 35.2091 0.1186C34.9586 0.213378 34.7311 0.360341 34.5417 0.549741C34.3523 0.73914 34.2053 0.966646 34.1105 1.21717C34.0157 1.46769 33.9753 1.7355 33.9919 2.00284V27.9997H40.0004V2.00284C40.0165 1.73563 39.9757 1.46806 39.8807 1.21778C39.7857 0.967508 39.6388 0.740226 39.4495 0.550942C39.2602 0.361658 39.0329 0.214679 38.7826 0.119709C38.5324 0.024738 38.2648 -0.0160631 37.9976 -1.11153e-06Z"
                                            fill="#515151" />
                                        <path d="M33.998 31.9987V33.9982L36.999 40L39.9999 33.9982V31.9987H33.998Z"
                                            fill="#515151" />
                                        <path
                                            d="M26.0002 0H4.00567C2.9433 0 1.92444 0.422025 1.17324 1.17323C0.422025 1.92444 0 2.9433 0 4.00567L0 36.0043C0 37.0667 0.422025 38.0856 1.17324 38.8368C1.92444 39.588 2.9433 40.01 4.00567 40.01H26.0002C27.0625 40.01 28.0814 39.588 28.8326 38.8368C29.5838 38.0856 30.0058 37.0667 30.0058 36.0043V4.00567C30.0058 2.9433 29.5838 1.92444 28.8326 1.17323C28.0814 0.422025 27.0625 0 26.0002 0ZM15.986 33.9982H8.01135C7.48016 33.9982 6.97073 33.7872 6.59513 33.4115C6.21952 33.0359 6.00851 32.5265 6.00851 31.9953C6.00851 31.4641 6.21952 30.9547 6.59513 30.5791C6.97073 30.2035 7.48016 29.9925 8.01135 29.9925H16.0227C16.5539 29.9925 17.0633 30.2035 17.4389 30.5791C17.8145 30.9547 18.0255 31.4641 18.0255 31.9953C18.0255 32.5265 17.8145 33.0359 17.4389 33.4115C17.0633 33.7872 16.5539 33.9982 16.0227 33.9982H15.986ZM21.9945 25.9868H8.01135C7.48016 25.9868 6.97073 25.7758 6.59513 25.4002C6.21952 25.0246 6.00851 24.5152 6.00851 23.984C6.00851 23.4528 6.21952 22.9434 6.59513 22.5678C6.97073 22.1922 7.48016 21.9811 8.01135 21.9811H21.9978C22.529 21.9811 23.0384 22.1922 23.4141 22.5678C23.7897 22.9434 24.0007 23.4528 24.0007 23.984C24.0007 24.5152 23.7897 25.0246 23.4141 25.4002C23.0384 25.7758 22.529 25.9868 21.9978 25.9868H21.9945ZM21.9945 17.9755H8.01135C7.74401 17.9921 7.4762 17.9516 7.22568 17.8569C6.97516 17.7621 6.74765 17.6151 6.55825 17.4257C6.36885 17.2363 6.22189 17.0088 6.12711 16.7583C6.03233 16.5078 5.99191 16.24 6.00851 15.9726C5.99245 15.7054 6.03325 15.4378 6.12822 15.1876C6.22319 14.9373 6.37017 14.71 6.55946 14.5207C6.74874 14.3314 6.97602 14.1845 7.2263 14.0895C7.47657 13.9945 7.74414 13.9537 8.01135 13.9698H21.9978C22.265 13.9537 22.5326 13.9945 22.7829 14.0895C23.0332 14.1845 23.2604 14.3314 23.4497 14.5207C23.639 14.71 23.786 14.9373 23.881 15.1876C23.9759 15.4378 24.0167 15.7054 24.0007 15.9726C24.0208 16.2418 23.9829 16.5122 23.8897 16.7656C23.7965 17.019 23.65 17.2494 23.4603 17.4414C23.2705 17.6334 23.0417 17.7825 22.7895 17.8787C22.5372 17.9748 22.2673 18.0158 21.9978 17.9988L21.9945 17.9755ZM21.9945 9.96412H8.01135C7.74414 9.98018 7.47657 9.93938 7.2263 9.84441C6.97602 9.74944 6.74874 9.60246 6.55946 9.41317C6.37017 9.22389 6.22319 8.99661 6.12822 8.74633C6.03325 8.49606 5.99245 8.22848 6.00851 7.96128C5.99245 7.69407 6.03325 7.4265 6.12822 7.17623C6.22319 6.92595 6.37017 6.69867 6.55946 6.50938C6.74874 6.3201 6.97602 6.17312 7.2263 6.07815C7.47657 5.98318 7.74414 5.94238 8.01135 5.95844H21.9978C22.265 5.94238 22.5326 5.98318 22.7829 6.07815C23.0332 6.17312 23.2604 6.3201 23.4497 6.50938C23.639 6.69867 23.786 6.92595 23.881 7.17623C23.9759 7.4265 24.0167 7.69407 24.0007 7.96128C24.0242 8.23251 23.989 8.50563 23.8974 8.762C23.8058 9.01838 23.66 9.25197 23.4698 9.44685C23.2797 9.64172 23.0498 9.79328 22.7958 9.89119C22.5417 9.9891 22.2696 10.0311 21.9978 10.0142L21.9945 9.96412Z"
                                            fill="#515151" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_32_53">
                                            <rect width="40" height="40" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>

                                <p class="mt-2">Borradores</p>
                            </a>
                        </div>

                        <div
                            class="p-6 mt-8 bg-white border border-gray-200 rounded-lg shadow w-30 text dark:bg-gray-800 dark:border-gray-700">
                            <a href="{{ route('solicitudBienes.list') }}" class="grid text-center justify-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 45 45"
                                    fill="none">
                                    <g clip-path="url(#clip0_32_59)">
                                        <path
                                            d="M23.8743 3.27356H3.67816C2.70265 3.27356 1.7671 3.66108 1.07731 4.35087C0.387519 5.04066 0 5.97622 0 6.95172L0 36.3341C0 37.3096 0.387519 38.2452 1.07731 38.935C1.7671 39.6247 2.70265 40.0123 3.67816 40.0123H23.8743C24.8498 40.0123 25.7854 39.6247 26.4752 38.935C27.165 38.2452 27.5525 37.3096 27.5525 36.3341V6.94559C27.5509 5.97115 27.1626 5.03717 26.473 4.3487C25.7834 3.66024 24.8488 3.27356 23.8743 3.27356ZM14.6789 34.492H7.35632C6.86857 34.492 6.40079 34.2982 6.0559 33.9533C5.711 33.6084 5.51724 33.1406 5.51724 32.6529C5.51724 32.1651 5.711 31.6973 6.0559 31.3524C6.40079 31.0076 6.86857 30.8138 7.35632 30.8138H14.7126C15.2004 30.8138 15.6682 31.0076 16.0131 31.3524C16.358 31.6973 16.5517 32.1651 16.5517 32.6529C16.5517 33.1406 16.358 33.6084 16.0131 33.9533C15.6682 34.2982 15.2004 34.492 14.7126 34.492H14.6789ZM20.1962 27.1356H7.35632C6.86857 27.1356 6.40079 26.9419 6.0559 26.597C5.711 26.2521 5.51724 25.7843 5.51724 25.2966C5.51724 24.8088 5.711 24.341 6.0559 23.9961C6.40079 23.6512 6.86857 23.4575 7.35632 23.4575H20.1992C20.687 23.4575 21.1548 23.6512 21.4997 23.9961C21.8446 24.341 22.0383 24.8088 22.0383 25.2966C22.0383 25.7843 21.8446 26.2521 21.4997 26.597C21.1548 26.9419 20.687 27.1356 20.1992 27.1356H20.1962ZM20.1962 19.7793H7.35632C7.11096 19.7941 6.86527 19.7566 6.63546 19.6694C6.40564 19.5822 6.19695 19.4472 6.02314 19.2734C5.84933 19.0996 5.71437 18.8909 5.62716 18.6611C5.53996 18.4313 5.50249 18.1856 5.51724 17.9402C5.50249 17.6949 5.53996 17.4492 5.62716 17.2194C5.71437 16.9896 5.84933 16.7809 6.02314 16.607C6.19695 16.4332 6.40564 16.2983 6.63546 16.2111C6.86527 16.1239 7.11096 16.0864 7.35632 16.1011H20.1992C20.4446 16.0864 20.6903 16.1239 20.9201 16.2111C21.1499 16.2983 21.3586 16.4332 21.5324 16.607C21.7062 16.7809 21.8412 16.9896 21.9284 17.2194C22.0156 17.4492 22.0531 17.6949 22.0383 17.9402C22.0562 18.1873 22.0212 18.4354 21.9354 18.6678C21.8496 18.9002 21.7151 19.1116 21.541 19.2878C21.3668 19.464 21.157 19.6009 20.9256 19.6894C20.6942 19.7779 20.4465 19.8158 20.1992 19.8008L20.1962 19.7793ZM20.1962 12.423H7.35632C7.11084 12.4382 6.86493 12.4011 6.63489 12.3141C6.40485 12.2271 6.19595 12.0921 6.02203 11.9182C5.84812 11.7443 5.71317 11.5354 5.62614 11.3053C5.53912 11.0753 5.50199 10.8294 5.51724 10.5839C5.50249 10.3386 5.53996 10.0929 5.62716 9.86304C5.71437 9.63323 5.84933 9.42453 6.02314 9.25072C6.19695 9.07692 6.40564 8.94196 6.63546 8.85475C6.86527 8.76754 7.11096 8.73008 7.35632 8.74483H20.1992C20.4446 8.73008 20.6903 8.76754 20.9201 8.85475C21.1499 8.94196 21.3586 9.07692 21.5324 9.25072C21.7062 9.42453 21.8412 9.63323 21.9284 9.86304C22.0156 10.0929 22.0531 10.3386 22.0383 10.5839C22.0581 10.8319 22.0244 11.0812 21.9395 11.3149C21.8545 11.5487 21.7202 11.7615 21.5458 11.9388C21.3714 12.1161 21.1609 12.2539 20.9285 12.3427C20.6962 12.4315 20.4475 12.4694 20.1992 12.4536L20.1962 12.423Z"
                                            fill="#515151" />
                                        <path
                                            d="M28.1195 1.27726e-06H7.9203C7.27131 0.00152113 6.63429 0.174725 6.07388 0.502031C5.51348 0.829336 5.04966 1.29909 4.72949 1.8636C4.87404 1.84771 5.01933 1.83952 5.16474 1.83908H25.367C26.3425 1.83908 27.2781 2.2266 27.9679 2.91639C28.6577 3.60618 29.0452 4.54173 29.0452 5.51724V34.8996C29.0449 35.534 28.8791 36.1574 28.564 36.708C29.4553 36.6003 30.2765 36.1703 30.8727 35.499C31.4689 34.8276 31.799 33.9614 31.8008 33.0636V3.67816C31.8008 3.19488 31.7055 2.71634 31.5205 2.26988C31.3354 1.82343 31.0642 1.41781 30.7224 1.07623C30.3805 0.734636 29.9747 0.463769 29.528 0.279104C29.0814 0.0944398 28.6028 -0.000401457 28.1195 1.27726e-06Z"
                                            fill="#515151" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_32_59">
                                            <rect width="31.7946" height="40" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>

                                <p class="mt-2">Estatus de solicitudes</p>
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    @elseif( Auth::user() -> roles[0] -> name === 'N5:18A:F')


    <div class="py-12">
        <div class="mx-auto max-w-7xl lg:px-8">
            <div class="overflow-hidden bg-transparent">

                <div
                    class="p-6 bg-white border border-gray-200 rounded-lg shadow w-30 text dark:bg-gray-800 dark:border-gray-700">
                    <p class="mb-3 text-lg font-semibold text-center text-gray-700 text dark:text-gray-400">¡HOLA,
                        {{ strtoupper(Auth::user () -> username)}}! BIENVENIDO AL SIPREMP</p>
                </div>


                <div
                    class="p-6 mt-8 bg-white border border-gray-200 rounded-lg shadow text dark:bg-gray-800 dark:border-gray-700">
                    <div class="grid grid-cols-3 gap-4 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3">

                        <div class="grid justify-start">
                            <x-user-icon class="block w-auto h-9" />
                        </div>
                        <div class="grid justify-center">
                            <x-building-icon class="block w-auto h-9" />
                        </div>
                        <div class="grid justify-end">
                            <x-localization-icon class="block w-auto h-9" />
                        </div>

                    </div>
                </div>

                <div class="grid justify-center">
                    <div
                        class="grid grid-cols-1 gap-5 md:gap-12 xl:gap-12 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 mb-3">

                        <div
                            class="p-2 mt-8 bg-white border border-gray-200 rounded-lg shadow-lg w-30 text dark:bg-gray-800 dark:border-gray-700">
                            <a href="{{ route('bandejaentrada') }}"
                                class="p-5 sm:p-8 md:p-12 lg:p-16 xl:p-20 grid text-center justify-items-center">

                                <svg width="83" height="83" viewBox="0 0 83 83" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M53.7812 44.9449L46.8298 51.9199C44.0109 54.7487 39.051 54.8096 36.1711 51.9199L29.2194 44.9449L4.25195 69.9934C5.18133 70.4232 6.20602 70.6796 7.29539 70.6796H75.7056C76.7949 70.6796 77.8193 70.4235 78.7483 69.9936L53.7812 44.9449Z"
                                        fill="#515151" />
                                    <path
                                        d="M75.7052 12.3203H7.29507C6.2057 12.3203 5.181 12.5768 4.25195 13.0065L30.9314 39.7745C30.9332 39.7763 30.9353 39.7766 30.9371 39.7784C30.9389 39.7802 30.9392 39.7826 30.9392 39.7826L39.6142 48.4863C40.5356 49.4077 42.465 49.4077 43.3865 48.4863L52.0596 39.7841C52.0596 39.7841 52.0617 39.7802 52.0635 39.7784C52.0635 39.7784 52.0674 39.7763 52.0692 39.7745L78.748 13.0064C77.819 12.5764 76.7946 12.3203 75.7052 12.3203Z"
                                        fill="#515151" />
                                    <path
                                        d="M0.775855 16.4075C0.295039 17.3798 0 18.4591 0 19.6153V63.3848C0 64.541 0.294715 65.6203 0.775693 66.5926L25.7864 41.5009L0.775855 16.4075Z"
                                        fill="#515151" />
                                    <path
                                        d="M82.2243 16.4071L57.2139 41.5008L82.2243 66.5929C82.7051 65.6206 83.0001 64.5413 83.0001 63.3848V19.6152C83.0001 18.4588 82.7051 17.3794 82.2243 16.4071Z"
                                        fill="#515151" />
                                </svg>


                                <p
                                    class="mt-6 text-xl font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                                    BANDEJA DE ENTRADA</p>
                                <p class="mt-2">Solicitudes generadas por gerentes de sucursales</p>
                            </a>
                        </div>

                        <div
                            class="p-2 mt-8 bg-white border border-gray-200 rounded-lg shadow-lg w-30 text dark:bg-gray-800 dark:border-gray-700">
                            <a href="{{ route('solicitudes') }}"
                                class="p-5 sm:p-8 md:p-12 lg:p-16 xl:p-20 grid text-center justify-items-center">
                                <svg width="66" height="83" viewBox="0 0 66 83" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_51_1154)">
                                        <path
                                            d="M49.5588 6.7926H7.63521C5.61022 6.7926 3.66818 7.59671 2.2363 9.02802C0.804421 10.4593 0 12.4006 0 14.4248L0 75.3932C0 77.4174 0.804421 79.3587 2.2363 80.79C3.66818 82.2213 5.61022 83.0254 7.63521 83.0254H49.5588C51.5838 83.0254 53.5259 82.2213 54.9578 80.79C56.3896 79.3587 57.1941 77.4174 57.1941 75.3932V14.4121C57.1907 12.3901 56.3848 10.4521 54.9533 9.02352C53.5217 7.59496 51.5816 6.7926 49.5588 6.7926ZM30.4708 71.5708H15.2704C14.2579 71.5708 13.2869 71.1687 12.571 70.4531C11.855 69.7374 11.4528 68.7668 11.4528 67.7547C11.4528 66.7426 11.855 65.7719 12.571 65.0563C13.2869 64.3406 14.2579 63.9386 15.2704 63.9386H30.5408C31.5533 63.9386 32.5243 64.3406 33.2403 65.0563C33.9562 65.7719 34.3584 66.7426 34.3584 67.7547C34.3584 68.7668 33.9562 69.7374 33.2403 70.4531C32.5243 71.1687 31.5533 71.5708 30.5408 71.5708H30.4708ZM41.9236 56.3064H15.2704C14.2579 56.3064 13.2869 55.9044 12.571 55.1887C11.855 54.473 11.4528 53.5024 11.4528 52.4903C11.4528 51.4782 11.855 50.5076 12.571 49.7919C13.2869 49.0763 14.2579 48.6742 15.2704 48.6742H41.93C42.9425 48.6742 43.9135 49.0763 44.6295 49.7919C45.3454 50.5076 45.7476 51.4782 45.7476 52.4903C45.7476 53.5024 45.3454 54.473 44.6295 55.1887C43.9135 55.9044 42.9425 56.3064 41.93 56.3064H41.9236ZM41.9236 41.042H15.2704C14.7611 41.0726 14.2511 40.9949 13.774 40.8139C13.297 40.633 12.8638 40.3529 12.503 39.9923C12.1422 39.6316 11.862 39.1986 11.681 38.7217C11.5 38.2449 11.4222 37.7351 11.4528 37.2259C11.4222 36.7168 11.5 36.207 11.681 35.7301C11.862 35.2533 12.1422 34.8202 12.503 34.4596C12.8638 34.0989 13.297 33.8189 13.774 33.6379C14.2511 33.457 14.7611 33.3792 15.2704 33.4098H41.93C42.4393 33.3792 42.9493 33.457 43.4264 33.6379C43.9034 33.8189 44.3367 34.0989 44.6975 34.4596C45.0583 34.8202 45.3384 35.2533 45.5194 35.7301C45.7005 36.207 45.7782 36.7168 45.7476 37.2259C45.7848 37.7387 45.712 38.2534 45.5339 38.7357C45.3559 39.2179 45.0767 39.6566 44.7152 40.0222C44.3536 40.3878 43.9181 40.6719 43.4377 40.8554C42.9574 41.039 42.4433 41.1178 41.93 41.0865L41.9236 41.042ZM41.9236 25.7777H15.2704C14.7608 25.8093 14.2504 25.7323 13.7729 25.5517C13.2953 25.3711 12.8617 25.0911 12.5007 24.7302C12.1397 24.3693 11.8595 23.9359 11.6789 23.4585C11.4982 22.9812 11.4212 22.4709 11.4528 21.9616C11.4222 21.4524 11.5 20.9426 11.681 20.4658C11.862 19.9889 12.1422 19.5559 12.503 19.1952C12.8638 18.8346 13.297 18.5545 13.774 18.3736C14.2511 18.1926 14.7611 18.1149 15.2704 18.1455H41.93C42.4393 18.1149 42.9493 18.1926 43.4264 18.3736C43.9034 18.5545 44.3367 18.8346 44.6975 19.1952C45.0583 19.5559 45.3384 19.9889 45.5194 20.4658C45.7005 20.9426 45.7782 21.4524 45.7476 21.9616C45.7888 22.4761 45.7188 22.9934 45.5424 23.4785C45.366 23.9635 45.0873 24.405 44.7253 24.773C44.3632 25.1409 43.9262 25.4268 43.4439 25.6111C42.9616 25.7954 42.4453 25.8739 41.93 25.8413L41.9236 25.7777Z"
                                            fill="#515151" />
                                        <path
                                            d="M58.3709 2.65031e-06H16.4409C15.0938 0.00315635 13.7714 0.362555 12.6081 1.04171C11.4448 1.72087 10.482 2.69561 9.81738 3.86698C10.1174 3.83399 10.419 3.81701 10.7209 3.81609H52.6573C54.6822 3.81609 56.6243 4.6202 58.0562 6.05151C59.488 7.48282 60.2925 9.4241 60.2925 11.4483V72.4167C60.2919 73.7331 59.9476 75.0266 59.2935 76.1692C61.1438 75.9456 62.8484 75.0533 64.0861 73.6603C65.3237 72.2674 66.0089 70.47 66.0125 68.607V7.63219C66.0125 6.62938 65.8148 5.6364 65.4307 4.71001C65.0466 3.78361 64.4836 2.94196 63.7739 2.23317C63.0643 1.52437 62.2218 0.962321 61.2948 0.579142C60.3677 0.195963 59.3741 -0.000833023 58.3709 2.65031e-06Z"
                                            fill="#515151" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_51_1154">
                                            <rect width="66" height="83" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>


                                <p
                                    class="mt-6 text-xl font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                                    SOLICITUDES
                                </p>
                                <p class="mt-2">Solcitudes de bienes/servicios</p>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    </div>

    @elseif(Auth::user() -> roles[0] -> name == 'admin' || Auth::user() -> roles[0] -> name == 'N7:GS:17A')

    <div class="py-12">
        <div class="mx-auto max-w-7xl lg:px-8">
            <div class="overflow-hidden bg-transparent">

                <div
                    class="p-6 bg-white border border-gray-200 rounded-lg shadow w-30 text dark:bg-gray-800 dark:border-gray-700">
                    <p class="mb-3 text-lg font-semibold text-center text-gray-700 text dark:text-gray-400">¡HOLA,
                        {{ strtoupper(Auth::user () -> username)}}! BIENVENIDO AL SIPREMP</p>
                </div>


                <div
                    class="p-6 mt-8 bg-white border border-gray-200 rounded-lg shadow text dark:bg-gray-800 dark:border-gray-700">
                    <div class="grid grid-cols-3 gap-4 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3">

                        <div class="grid justify-start">
                            <x-user-icon class="block w-auto h-9" />
                        </div>
                        <div class="grid justify-start">
                            <x-building-icon class="block w-auto h-9" />
                        </div>
                        <div class="grid justify-start">
                            <x-localization-icon class="block w-auto h-9" />
                        </div>

                    </div>
                </div>

                <div class="grid justify-center">
                    <div class="grid grid-cols-2 gap-4 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">

                        <div
                            class="p-6 mt-8 bg-white border border-gray-200 rounded-lg shadow w-30 text dark:bg-gray-800 dark:border-gray-700">
                            <a href="{{ route('cajamenor') }}" class="grid text-center justify-items-center">

                                <svg xmlns="http://www.w3.org/2000/svg" width="77" height="77" viewBox="0 0 90 90"
                                    fill="none">
                                    <g clip-path="url(#clip0_94_6247)">
                                        <path
                                            d="M89.2173 20.1954C88.5169 19.2983 87.442 18.774 86.3038 18.774H15.9335L14.8875 7.12085C14.7164 5.21519 13.1193 3.755 11.206 3.755H3.69621C1.65485 3.755 0 5.40985 0 7.45122C0 9.49259 1.65485 11.1474 3.69621 11.1474H7.82682L11.8782 56.2833C11.8791 56.3365 11.8765 56.3887 11.8795 56.4422C11.8877 56.5841 11.9062 56.7228 11.9298 56.8594L12.078 58.5097C12.0808 58.5408 12.084 58.572 12.0877 58.6028C12.5369 62.4944 14.5256 65.8662 17.4014 68.1443C15.9113 70.0473 15.0197 72.4402 15.0197 75.039C15.0197 81.218 20.0467 86.245 26.2255 86.245C32.4045 86.245 37.4316 81.218 37.4316 75.039C37.4316 73.7004 37.1948 72.4164 36.7625 71.2253H56.9925C56.56 72.4164 56.3234 73.7004 56.3234 75.039C56.3234 81.218 61.3505 86.245 67.5295 86.245C73.7085 86.245 78.7355 81.218 78.7355 75.039C78.7355 68.86 73.7085 63.8329 67.5295 63.8329H26.2505C23.4428 63.8329 20.9961 62.139 19.94 59.671L79.0105 56.1994C80.6231 56.1047 81.9875 54.9733 82.3795 53.4061L89.8898 23.3664C90.1656 22.2625 89.9176 21.0927 89.2173 20.1954Z"
                                            fill="#515151" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_94_6247">
                                            <rect width="90" height="90" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>

                                <p
                                    class="mt-6 text-xl font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                                    CAJA MENOR</p>
                                <p class="mt-2">Crea o revisa las compras de la Caja Menor</p>
                            </a>
                        </div>

                        <div
                            class="p-6 mt-8 bg-white border border-gray-200 rounded-lg shadow w-30 text dark:bg-gray-800 dark:border-gray-700">
                            <a href="{{ route('solicitudes') }}" class="grid text-center justify-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="58" height="77" viewBox="0 0 58 77"
                                    fill="none">
                                    <path
                                        d="M49.5588 0.792603H7.63521C5.61022 0.792603 3.66818 1.59671 2.2363 3.02802C0.804421 4.45933 0 6.40061 0 8.42479L0 69.3932C0 71.4174 0.804421 73.3587 2.2363 74.79C3.66818 76.2213 5.61022 77.0254 7.63521 77.0254H49.5588C51.5838 77.0254 53.5259 76.2213 54.9578 74.79C56.3896 73.3587 57.1941 71.4174 57.1941 69.3932V8.41207C57.1907 6.39009 56.3848 4.45208 54.9533 3.02352C53.5217 1.59496 51.5816 0.7926 49.5588 0.792603ZM30.4708 65.5708H15.2704C14.2579 65.5708 13.2869 65.1687 12.571 64.4531C11.855 63.7374 11.4528 62.7668 11.4528 61.7547C11.4528 60.7426 11.855 59.7719 12.571 59.0563C13.2869 58.3406 14.2579 57.9386 15.2704 57.9386H30.5408C31.5533 57.9386 32.5243 58.3406 33.2403 59.0563C33.9562 59.7719 34.3584 60.7426 34.3584 61.7547C34.3584 62.7668 33.9562 63.7374 33.2403 64.4531C32.5243 65.1687 31.5533 65.5708 30.5408 65.5708H30.4708ZM41.9236 50.3064H15.2704C14.2579 50.3064 13.2869 49.9044 12.571 49.1887C11.855 48.473 11.4528 47.5024 11.4528 46.4903C11.4528 45.4782 11.855 44.5076 12.571 43.7919C13.2869 43.0763 14.2579 42.6742 15.2704 42.6742H41.93C42.9425 42.6742 43.9135 43.0763 44.6295 43.7919C45.3454 44.5076 45.7476 45.4782 45.7476 46.4903C45.7476 47.5024 45.3454 48.473 44.6295 49.1887C43.9135 49.9044 42.9425 50.3064 41.93 50.3064H41.9236ZM41.9236 35.042H15.2704C14.7611 35.0726 14.2511 34.9949 13.774 34.8139C13.297 34.633 12.8638 34.3529 12.503 33.9923C12.1422 33.6316 11.862 33.1986 11.681 32.7217C11.5 32.2449 11.4222 31.7351 11.4528 31.2259C11.4222 30.7168 11.5 30.207 11.681 29.7301C11.862 29.2533 12.1422 28.8202 12.503 28.4596C12.8638 28.0989 13.297 27.8189 13.774 27.6379C14.2511 27.457 14.7611 27.3792 15.2704 27.4098H41.93C42.4393 27.3792 42.9493 27.457 43.4264 27.6379C43.9034 27.8189 44.3367 28.0989 44.6975 28.4596C45.0583 28.8202 45.3384 29.2533 45.5194 29.7301C45.7005 30.207 45.7782 30.7168 45.7476 31.2259C45.7848 31.7387 45.712 32.2534 45.5339 32.7357C45.3559 33.2179 45.0767 33.6566 44.7152 34.0222C44.3536 34.3878 43.9181 34.6719 43.4377 34.8554C42.9574 35.039 42.4433 35.1178 41.93 35.0865L41.9236 35.042ZM41.9236 19.7777H15.2704C14.7608 19.8093 14.2504 19.7323 13.7729 19.5517C13.2953 19.3711 12.8617 19.0911 12.5007 18.7302C12.1397 18.3693 11.8595 17.9359 11.6789 17.4585C11.4982 16.9812 11.4212 16.4709 11.4528 15.9616C11.4222 15.4524 11.5 14.9426 11.681 14.4658C11.862 13.9889 12.1422 13.5559 12.503 13.1952C12.8638 12.8346 13.297 12.5545 13.774 12.3736C14.2511 12.1926 14.7611 12.1149 15.2704 12.1455H41.93C42.4393 12.1149 42.9493 12.1926 43.4264 12.3736C43.9034 12.5545 44.3367 12.8346 44.6975 13.1952C45.0583 13.5559 45.3384 13.9889 45.5194 14.4658C45.7005 14.9426 45.7782 15.4524 45.7476 15.9616C45.7888 16.4761 45.7188 16.9934 45.5424 17.4785C45.366 17.9635 45.0873 18.405 44.7253 18.773C44.3632 19.1409 43.9262 19.4268 43.4439 19.6111C42.9616 19.7954 42.4453 19.8739 41.93 19.8413L41.9236 19.7777Z"
                                        fill="#515151" />
                                </svg>


                                <p
                                    class="mt-6 text-xl font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                                    SOLICITUDES
                                </p>
                                <p class="mt-2">Solcitudes de bienes/servicios</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @endif

    <!-- {{ Auth::user() -> roles[0] -> name }} -->

</x-app-layout>
