<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">

            <div>
                <h2 class="text-xl font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                    {{_('Proveedores')}}
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

                    <div class="p-6 mt-8 bg-white border border-gray-200 rounded-lg shadow-lg w-60 w-30 text dark:shadow-none dark:bg-zinc-800 dark:border-zinc-800">
                        <a href="{{route('proveedores.pendientes')}}" class="text-right">
                            <svg width="40" height="53" viewBox="0 0 40 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_317_4148)">
                                <path d="M34.3197 38.1705V42.6083C34.3197 42.7884 34.3913 42.9611 34.5186 43.0884C34.646 43.2158 34.8187 43.2873 34.9988 43.2873H39.3207C39.5008 43.2873 39.6735 43.3589 39.8009 43.4862C39.9282 43.6136 39.9998 43.7863 39.9998 43.9664V45.7479C39.9998 45.928 39.9282 46.1007 39.8009 46.2281C39.6735 46.3554 39.5008 46.4269 39.3207 46.4269H34.9988C34.8187 46.4269 34.646 46.4985 34.5186 46.6258C34.3913 46.7532 34.3197 46.9259 34.3197 47.106V51.6357C34.3197 51.8151 34.2487 51.9872 34.1223 52.1144C33.9958 52.2416 33.8241 52.3136 33.6447 52.3147H31.8352C31.6558 52.3136 31.4841 52.2416 31.3576 52.1144C31.2311 51.9872 31.1601 51.8151 31.1602 51.6357V47.106C31.1602 46.9259 31.0886 46.7532 30.9613 46.6258C30.8339 46.4985 30.6612 46.4269 30.4811 46.4269H26.0873C25.9072 46.4269 25.7344 46.3554 25.6071 46.2281C25.4797 46.1007 25.4082 45.928 25.4082 45.7479V43.9664C25.4082 43.7863 25.4797 43.6136 25.6071 43.4862C25.7344 43.3589 25.9072 43.2873 26.0873 43.2873H30.4811C30.6612 43.2873 30.8339 43.2158 30.9613 43.0884C31.0886 42.9611 31.1602 42.7884 31.1602 42.6083V38.1705C31.1601 37.9911 31.2311 37.819 31.3576 37.6918C31.4841 37.5645 31.6558 37.4925 31.8352 37.4915H33.6447C33.8241 37.4925 33.9958 37.5645 34.1223 37.6918C34.2487 37.819 34.3197 37.9911 34.3197 38.1705Z" fill="#515151"/>
                                <path d="M29.259 41.2542V35.726H35.8977V4.79329C35.8977 3.52203 35.3927 2.30284 34.4938 1.40392C33.5949 0.505006 32.3757 0 31.1045 0L4.79329 0C3.52203 0 2.30284 0.505006 1.40392 1.40392C0.505006 2.30284 0 3.52203 0 4.79329L0 43.0837C0 44.3549 0.505006 45.5741 1.40392 46.4731C2.30284 47.372 3.52203 47.877 4.79329 47.877H23.7747V41.2542H29.259ZM9.58658 7.18993H26.3232C26.6429 7.17071 26.9631 7.21954 27.2626 7.33318C27.562 7.44683 27.834 7.6227 28.0605 7.84921C28.287 8.07571 28.4629 8.34768 28.5765 8.64716C28.6902 8.94665 28.739 9.26683 28.7198 9.58658C28.739 9.90632 28.6902 10.2265 28.5765 10.526C28.4629 10.8255 28.287 11.0975 28.0605 11.324C27.834 11.5505 27.562 11.7263 27.2626 11.84C26.9631 11.9536 26.6429 12.0024 26.3232 11.9832H9.58658C9.26684 12.0024 8.94665 11.9536 8.64717 11.84C8.34768 11.7263 8.07571 11.5505 7.84921 11.324C7.62271 11.0975 7.44683 10.8255 7.33318 10.526C7.21954 10.2265 7.17071 9.90632 7.18993 9.58658C7.17071 9.26683 7.21954 8.94665 7.33318 8.64716C7.44683 8.34768 7.62271 8.07571 7.84921 7.84921C8.07571 7.6227 8.34768 7.44683 8.64717 7.33318C8.94665 7.21954 9.26684 7.17071 9.58658 7.18993ZM9.58658 16.7765H26.3232C26.6429 16.7573 26.9631 16.8061 27.2626 16.9198C27.562 17.0334 27.834 17.2093 28.0605 17.4358C28.287 17.6623 28.4629 17.9343 28.5765 18.2337C28.6902 18.5332 28.739 18.8534 28.7198 19.1732C28.7397 19.4931 28.6913 19.8135 28.5779 20.1133C28.4645 20.4131 28.2886 20.6853 28.062 20.912C27.8353 21.1386 27.5631 21.3145 27.2633 21.4279C26.9635 21.5413 26.6431 21.5897 26.3232 21.5698H9.58658C9.26668 21.5897 8.94621 21.5413 8.64643 21.4279C8.34665 21.3145 8.07441 21.1386 7.84777 20.912C7.62113 20.6853 7.44527 20.4131 7.33186 20.1133C7.21844 19.8135 7.17006 19.4931 7.18993 19.1732C7.16716 18.8515 7.21334 18.5286 7.3254 18.2262C7.43745 17.9239 7.61279 17.6489 7.83968 17.4197C8.06658 17.1905 8.3398 17.0125 8.64106 16.8974C8.94233 16.7824 9.26469 16.733 9.58658 16.7525V16.7765ZM9.58658 26.3631H26.3232C26.9588 26.3631 27.5684 26.6156 28.0178 27.0651C28.4673 27.5145 28.7198 28.1241 28.7198 28.7597C28.7198 29.3954 28.4673 30.005 28.0178 30.4544C27.5684 30.9039 26.9588 31.1564 26.3232 31.1564H9.58658C8.95095 31.1564 8.34135 30.9039 7.8919 30.4544C7.44244 30.005 7.18993 29.3954 7.18993 28.7597C7.18993 28.1241 7.44244 27.5145 7.8919 27.0651C8.34135 26.6156 8.95095 26.3631 9.58658 26.3631ZM19.1732 40.723H9.58658C8.95095 40.723 8.34135 40.4705 7.8919 40.021C7.44244 39.5716 7.18993 38.962 7.18993 38.3263C7.18993 37.6907 7.44244 37.0811 7.8919 36.6317C8.34135 36.1822 8.95095 35.9297 9.58658 35.9297H19.1732C19.8088 35.9297 20.4184 36.1822 20.8678 36.6317C21.3173 37.0811 21.5698 37.6907 21.5698 38.3263C21.5698 38.962 21.3173 39.5716 20.8678 40.021C20.4184 40.4705 19.8088 40.723 19.1732 40.723Z" fill="#515151"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_317_4148">
                                <rect width="40" height="52.3148" fill="white"/>
                                </clipPath>
                                </defs>
                            </svg>

                            <p class="mt-24 text-lg dark:text-gray-200">Proveedores <br/> pendientes por revisar</p>
                        </a>
                    </div>

                    <div class="p-6 mt-8 bg-white border border-gray-200 rounded-lg shadow-lg w-60 w-30 text dark:shadow-none dark:bg-zinc-800 dark:border-zinc-800">
                        <a href="{{route('compraConsolidadaBorrador.borradorCompra')}}" class="text-right">
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_317_4142)">
                                <path d="M37.9976 -2.78144e-05H35.9948C35.7274 -0.016633 35.4596 0.0237945 35.2091 0.118573C34.9586 0.213352 34.7311 0.360315 34.5417 0.549714C34.3523 0.739113 34.2053 0.966619 34.1105 1.21714C34.0157 1.46766 33.9753 1.73547 33.9919 2.00281V27.9996H40.0004V2.00281C40.0165 1.7356 39.9757 1.46803 39.8807 1.21776C39.7857 0.967482 39.6388 0.740199 39.4495 0.550915C39.2602 0.361632 39.0329 0.214652 38.7826 0.119682C38.5324 0.0247113 38.2648 -0.0160898 37.9976 -2.78144e-05Z" fill="#515151"/>
                                <path d="M33.998 31.9985V33.998L36.999 39.9999L39.9999 33.998V31.9985H33.998Z" fill="#515151"/>
                                <path d="M26.0002 0H4.00567C2.9433 0 1.92444 0.422025 1.17324 1.17323C0.422025 1.92444 0 2.9433 0 4.00567L0 36.0043C0 37.0667 0.422025 38.0856 1.17324 38.8368C1.92444 39.588 2.9433 40.01 4.00567 40.01H26.0002C27.0625 40.01 28.0814 39.588 28.8326 38.8368C29.5838 38.0856 30.0058 37.0667 30.0058 36.0043V4.00567C30.0058 2.9433 29.5838 1.92444 28.8326 1.17323C28.0814 0.422025 27.0625 0 26.0002 0ZM15.986 33.9982H8.01135C7.48016 33.9982 6.97073 33.7872 6.59513 33.4115C6.21952 33.0359 6.00851 32.5265 6.00851 31.9953C6.00851 31.4641 6.21952 30.9547 6.59513 30.5791C6.97073 30.2035 7.48016 29.9925 8.01135 29.9925H16.0227C16.5539 29.9925 17.0633 30.2035 17.4389 30.5791C17.8145 30.9547 18.0255 31.4641 18.0255 31.9953C18.0255 32.5265 17.8145 33.0359 17.4389 33.4115C17.0633 33.7872 16.5539 33.9982 16.0227 33.9982H15.986ZM21.9945 25.9868H8.01135C7.48016 25.9868 6.97073 25.7758 6.59513 25.4002C6.21952 25.0246 6.00851 24.5152 6.00851 23.984C6.00851 23.4528 6.21952 22.9434 6.59513 22.5678C6.97073 22.1922 7.48016 21.9811 8.01135 21.9811H21.9978C22.529 21.9811 23.0384 22.1922 23.4141 22.5678C23.7897 22.9434 24.0007 23.4528 24.0007 23.984C24.0007 24.5152 23.7897 25.0246 23.4141 25.4002C23.0384 25.7758 22.529 25.9868 21.9978 25.9868H21.9945ZM21.9945 17.9755H8.01135C7.74401 17.9921 7.4762 17.9516 7.22568 17.8569C6.97516 17.7621 6.74765 17.6151 6.55825 17.4257C6.36885 17.2363 6.22189 17.0088 6.12711 16.7583C6.03233 16.5078 5.99191 16.24 6.00851 15.9726C5.99245 15.7054 6.03325 15.4378 6.12822 15.1876C6.22319 14.9373 6.37017 14.71 6.55946 14.5207C6.74874 14.3314 6.97602 14.1845 7.2263 14.0895C7.47657 13.9945 7.74414 13.9537 8.01135 13.9698H21.9978C22.265 13.9537 22.5326 13.9945 22.7829 14.0895C23.0332 14.1845 23.2604 14.3314 23.4497 14.5207C23.639 14.71 23.786 14.9373 23.881 15.1876C23.9759 15.4378 24.0167 15.7054 24.0007 15.9726C24.0208 16.2418 23.9829 16.5122 23.8897 16.7656C23.7965 17.019 23.65 17.2494 23.4603 17.4414C23.2705 17.6334 23.0417 17.7825 22.7895 17.8787C22.5372 17.9748 22.2673 18.0158 21.9978 17.9988L21.9945 17.9755ZM21.9945 9.96412H8.01135C7.74414 9.98018 7.47657 9.93938 7.2263 9.84441C6.97602 9.74944 6.74874 9.60246 6.55946 9.41317C6.37017 9.22389 6.22319 8.99661 6.12822 8.74633C6.03325 8.49606 5.99245 8.22848 6.00851 7.96128C5.99245 7.69407 6.03325 7.4265 6.12822 7.17623C6.22319 6.92595 6.37017 6.69867 6.55946 6.50938C6.74874 6.3201 6.97602 6.17312 7.2263 6.07815C7.47657 5.98318 7.74414 5.94238 8.01135 5.95844H21.9978C22.265 5.94238 22.5326 5.98318 22.7829 6.07815C23.0332 6.17312 23.2604 6.3201 23.4497 6.50938C23.639 6.69867 23.786 6.92595 23.881 7.17623C23.9759 7.4265 24.0167 7.69407 24.0007 7.96128C24.0242 8.23251 23.989 8.50563 23.8974 8.762C23.8058 9.01838 23.66 9.25197 23.4698 9.44685C23.2797 9.64172 23.0498 9.79328 22.7958 9.89119C22.5417 9.9891 22.2696 10.0311 21.9978 10.0142L21.9945 9.96412Z" fill="#515151"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_317_4142">
                                <rect width="40" height="40" fill="white"/>
                                </clipPath>
                                </defs>
                            </svg>
                            <p class="mt-24 text-lg dark:text-gray-200"> Compras <br/> consolidadas en <br/> borrador </p>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>



</x-app-layout>