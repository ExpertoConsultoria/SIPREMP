<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">

            <div>
                <h2 class="text-xl font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                    {{_('Solicitudes')}}
                </h2>
            </div>

            <div class="grid" style="justify-content: end; padding-right: 5.5rem" >
                <a href="{{route('dashboard')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 40 40" fill="none">
                        <path
                            d="M36.6666 18.3334H7.35664L16.1783 9.51172C16.3375 9.35798 16.4645 9.17407 16.5518 8.97073C16.6392 8.76739 16.6851 8.54869 16.6871 8.32739C16.689 8.10609 16.6468 7.88662 16.563 7.6818C16.4792 7.47697 16.3554 7.29088 16.199 7.1344C16.0425 6.97791 15.8564 6.85415 15.6516 6.77035C15.4467 6.68655 15.2273 6.64438 15.006 6.6463C14.7847 6.64823 14.566 6.6942 14.3626 6.78155C14.1593 6.8689 13.9754 6.99587 13.8216 7.15505L2.15497 18.8217C1.84252 19.1343 1.66699 19.5581 1.66699 20.0001C1.66699 20.442 1.84252 20.8658 2.15497 21.1784L13.8216 32.8451C14.136 33.1487 14.557 33.3166 14.994 33.3128C15.431 33.309 15.849 33.1338 16.158 32.8248C16.467 32.5157 16.6423 32.0977 16.6461 31.6607C16.6499 31.2237 16.4819 30.8027 16.1783 30.4884L7.35664 21.6667H36.6666C37.1087 21.6667 37.5326 21.4911 37.8451 21.1786C38.1577 20.866 38.3333 20.4421 38.3333 20.0001C38.3333 19.558 38.1577 19.1341 37.8451 18.8215C37.5326 18.509 37.1087 18.3334 36.6666 18.3334Z"
                            fill="#515151" />
                    </svg>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl lg:px-8">
            <div class="grid justify-center overflow-hidden bg-transparent">

                <div class="container grid grid-cols-1 gap-6 px-8 m-auto justify-content-center sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">

                    <div class="w-60 p-6 mt-8 bg-white border border-gray-200 rounded-lg shadow-lg w-30 text dark:bg-gray-800 dark:border-gray-700">
                        <a href="{{route('solicitudes.rechazadas')}}" class="text-right">
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_328_648)">
                                <path d="M20 0C8.97156 0 0 8.97156 0 20C0 31.0284 8.97156 40 20 40C31.0284 40 40 31.0284 40 20C40 8.97156 31.0284 0 20 0Z" fill="#F44336"/>
                                <path d="M27.3649 25.0083C28.0164 25.6601 28.0164 26.7133 27.3649 27.3651C27.0399 27.6901 26.6132 27.8534 26.1863 27.8534C25.7597 27.8534 25.333 27.6901 25.008 27.3651L19.9998 22.3566L14.9915 27.3651C14.6665 27.6901 14.2399 27.8534 13.8132 27.8534C13.3863 27.8534 12.9597 27.6901 12.6347 27.3651C11.9831 26.7133 11.9831 25.6601 12.6347 25.0083L17.6432 20L12.6347 14.9918C11.9831 14.3399 11.9831 13.2868 12.6347 12.6349C13.2865 11.9834 14.3397 11.9834 14.9915 12.6349L19.9998 17.6434L25.008 12.6349C25.6599 11.9834 26.713 11.9834 27.3649 12.6349C28.0164 13.2868 28.0164 14.3399 27.3649 14.9918L22.3563 20L27.3649 25.0083Z" fill="#FAFAFA"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_328_648">
                                <rect width="40" height="40" fill="white"/>
                                </clipPath>
                                </defs>
                            </svg>

                            <p class="text-lg mt-24">Solicitudes<br/>Rechazadas</p>
                        </a>
                    </div>

                    <div class="w-60 p-6 mt-8 bg-white border border-gray-200 rounded-lg shadow-lg w-30 text dark:bg-gray-800 dark:border-gray-700">
                        <a href="{{route('solicitudes.revisadoValidado')}}" class="text-right">
                            <svg width="32" height="40" viewBox="0 0 32 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_328_651)">
                                <path d="M23.8743 3.27368H3.67816C2.70265 3.27368 1.7671 3.6612 1.07731 4.35099C0.387519 5.04078 0 5.97633 0 6.95184L0 36.3342C0 37.3097 0.387519 38.2453 1.07731 38.9351C1.7671 39.6249 2.70265 40.0124 3.67816 40.0124H23.8743C24.8498 40.0124 25.7854 39.6249 26.4752 38.9351C27.165 38.2453 27.5525 37.3097 27.5525 36.3342V6.94571C27.5509 5.97127 27.1626 5.03729 26.473 4.34882C25.7834 3.66036 24.8488 3.27368 23.8743 3.27368ZM14.6789 34.4921H7.35632C6.86857 34.4921 6.40079 34.2983 6.0559 33.9534C5.711 33.6085 5.51724 33.1407 5.51724 32.653C5.51724 32.1652 5.711 31.6975 6.0559 31.3526C6.40079 31.0077 6.86857 30.8139 7.35632 30.8139H14.7126C15.2004 30.8139 15.6682 31.0077 16.0131 31.3526C16.358 31.6975 16.5517 32.1652 16.5517 32.653C16.5517 33.1407 16.358 33.6085 16.0131 33.9534C15.6682 34.2983 15.2004 34.4921 14.7126 34.4921H14.6789ZM20.1962 27.1358H7.35632C6.86857 27.1358 6.40079 26.942 6.0559 26.5971C5.711 26.2522 5.51724 25.7844 5.51724 25.2967C5.51724 24.8089 5.711 24.3411 6.0559 23.9962C6.40079 23.6514 6.86857 23.4576 7.35632 23.4576H20.1992C20.687 23.4576 21.1548 23.6514 21.4997 23.9962C21.8446 24.3411 22.0383 24.8089 22.0383 25.2967C22.0383 25.7844 21.8446 26.2522 21.4997 26.5971C21.1548 26.942 20.687 27.1358 20.1992 27.1358H20.1962ZM20.1962 19.7794H7.35632C7.11096 19.7942 6.86527 19.7567 6.63546 19.6695C6.40564 19.5823 6.19695 19.4473 6.02314 19.2735C5.84933 19.0997 5.71437 18.891 5.62716 18.6612C5.53996 18.4314 5.50249 18.1857 5.51724 17.9403C5.50249 17.695 5.53996 17.4493 5.62716 17.2195C5.71437 16.9897 5.84933 16.781 6.02314 16.6072C6.19695 16.4334 6.40564 16.2984 6.63546 16.2112C6.86527 16.124 7.11096 16.0865 7.35632 16.1013H20.1992C20.4446 16.0865 20.6903 16.124 20.9201 16.2112C21.1499 16.2984 21.3586 16.4334 21.5324 16.6072C21.7062 16.781 21.8412 16.9897 21.9284 17.2195C22.0156 17.4493 22.0531 17.695 22.0383 17.9403C22.0562 18.1874 22.0212 18.4355 21.9354 18.6679C21.8496 18.9003 21.7151 19.1117 21.541 19.2879C21.3668 19.4641 21.157 19.601 20.9256 19.6895C20.6942 19.778 20.4465 19.816 20.1992 19.8009L20.1962 19.7794ZM20.1962 12.4231H7.35632C7.11084 12.4384 6.86493 12.4012 6.63489 12.3142C6.40485 12.2272 6.19595 12.0922 6.02203 11.9183C5.84812 11.7444 5.71317 11.5355 5.62614 11.3055C5.53912 11.0754 5.50199 10.8295 5.51724 10.584C5.50249 10.3387 5.53996 10.093 5.62716 9.86316C5.71437 9.63335 5.84933 9.42465 6.02314 9.25084C6.19695 9.07704 6.40564 8.94207 6.63546 8.85487C6.86527 8.76766 7.11096 8.7302 7.35632 8.74495H20.1992C20.4446 8.7302 20.6903 8.76766 20.9201 8.85487C21.1499 8.94207 21.3586 9.07704 21.5324 9.25084C21.7062 9.42465 21.8412 9.63335 21.9284 9.86316C22.0156 10.093 22.0531 10.3387 22.0383 10.584C22.0581 10.832 22.0244 11.0813 21.9395 11.3151C21.8545 11.5488 21.7202 11.7616 21.5458 11.9389C21.3714 12.1163 21.1609 12.254 20.9285 12.3428C20.6962 12.4317 20.4475 12.4695 20.1992 12.4538L20.1962 12.4231Z" fill="#515151"/>
                                <path d="M28.1195 1.27726e-06H7.9203C7.27131 0.00152113 6.63429 0.174725 6.07388 0.502031C5.51348 0.829336 5.04966 1.29909 4.72949 1.8636C4.87404 1.84771 5.01933 1.83952 5.16474 1.83908H25.367C26.3425 1.83908 27.2781 2.2266 27.9679 2.91639C28.6577 3.60618 29.0452 4.54173 29.0452 5.51724V34.8996C29.0449 35.534 28.8791 36.1574 28.564 36.708C29.4553 36.6003 30.2765 36.1703 30.8727 35.499C31.4689 34.8276 31.799 33.9614 31.8008 33.0636V3.67816C31.8008 3.19488 31.7055 2.71634 31.5205 2.26988C31.3354 1.82343 31.0642 1.41781 30.7224 1.07623C30.3805 0.734636 29.9747 0.463769 29.528 0.279104C29.0814 0.0944398 28.6028 -0.000401457 28.1195 1.27726e-06Z" fill="#515151"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_328_651">
                                <rect width="31.7946" height="40" fill="white"/>
                                </clipPath>
                                </defs>
                            </svg>

                            <p class="text-lg mt-24"> Vales revisados <br/> y validados </p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>