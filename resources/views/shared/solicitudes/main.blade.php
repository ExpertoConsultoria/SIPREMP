
<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">

            <div>
                <h2 class="text-xl font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                    {{ __('Solicitudes') }}
                </h2>
            </div>

            <div class="grid" style="justify-content: end; padding-right: 5.5rem">
                <a href="{{ route('dashboard') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 40 40" fill="none">
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

                <div class="container grid grid-cols-1 gap-6 px-8 m-auto justify-content-center sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
                    <div
                        class="p-6 mt-8 bg-white border-gray-200 rounded-lg shadow-lg shadow-zinc-300 dark:shadow-none dark:bg-zinc-800 dark:border-zinc-800">
                        <a href="{{ route('solicitudes.create') }}" class="text-right">

                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="53" viewBox="0 0 40 53"
                                fill="none">
                                <g clip-path="url(#clip0_94_6814)">
                                    <path
                                        d="M34.32 38.1705V42.6083C34.32 42.7884 34.3915 42.9611 34.5189 43.0884C34.6462 43.2158 34.8189 43.2873 34.999 43.2873H39.321C39.5011 43.2873 39.6738 43.3589 39.8011 43.4862C39.9285 43.6136 40 43.7863 40 43.9664V45.7479C40 45.928 39.9285 46.1007 39.8011 46.2281C39.6738 46.3554 39.5011 46.4269 39.321 46.4269H34.999C34.8189 46.4269 34.6462 46.4985 34.5189 46.6258C34.3915 46.7532 34.32 46.9259 34.32 47.106V51.6357C34.32 51.8151 34.249 51.9872 34.1225 52.1144C33.996 52.2416 33.8243 52.3136 33.6449 52.3147H31.8354C31.656 52.3136 31.4844 52.2416 31.3579 52.1144C31.2314 51.9872 31.1604 51.8151 31.1604 51.6357V47.106C31.1604 46.9259 31.0889 46.7532 30.9615 46.6258C30.8342 46.4985 30.6614 46.4269 30.4813 46.4269H26.0875C25.9074 46.4269 25.7347 46.3554 25.6073 46.2281C25.48 46.1007 25.4084 45.928 25.4084 45.7479V43.9664C25.4084 43.7863 25.48 43.6136 25.6073 43.4862C25.7347 43.3589 25.9074 43.2873 26.0875 43.2873H30.4813C30.6614 43.2873 30.8342 43.2158 30.9615 43.0884C31.0889 42.9611 31.1604 42.7884 31.1604 42.6083V38.1705C31.1604 37.9911 31.2314 37.819 31.3579 37.6918C31.4844 37.5645 31.656 37.4925 31.8354 37.4915H33.6449C33.8243 37.4925 33.996 37.5645 34.1225 37.6918C34.249 37.819 34.32 37.9911 34.32 38.1705Z"
                                        class="fill-neutral-600 dark:fill-neutral-500" />
                                    <path
                                        d="M29.259 41.2542V35.726H35.8977V4.79329C35.8977 3.52203 35.3927 2.30284 34.4938 1.40392C33.5949 0.505006 32.3757 0 31.1045 0L4.79329 0C3.52203 0 2.30284 0.505006 1.40392 1.40392C0.505006 2.30284 0 3.52203 0 4.79329L0 43.0837C0 44.3549 0.505006 45.5741 1.40392 46.4731C2.30284 47.372 3.52203 47.877 4.79329 47.877H23.7747V41.2542H29.259ZM9.58658 7.18993H26.3232C26.6429 7.17071 26.9631 7.21954 27.2626 7.33318C27.562 7.44683 27.834 7.6227 28.0605 7.84921C28.287 8.07571 28.4629 8.34768 28.5765 8.64716C28.6902 8.94665 28.739 9.26683 28.7198 9.58658C28.739 9.90632 28.6902 10.2265 28.5765 10.526C28.4629 10.8255 28.287 11.0975 28.0605 11.324C27.834 11.5505 27.562 11.7263 27.2626 11.84C26.9631 11.9536 26.6429 12.0024 26.3232 11.9832H9.58658C9.26684 12.0024 8.94665 11.9536 8.64717 11.84C8.34768 11.7263 8.07571 11.5505 7.84921 11.324C7.62271 11.0975 7.44683 10.8255 7.33318 10.526C7.21954 10.2265 7.17071 9.90632 7.18993 9.58658C7.17071 9.26683 7.21954 8.94665 7.33318 8.64716C7.44683 8.34768 7.62271 8.07571 7.84921 7.84921C8.07571 7.6227 8.34768 7.44683 8.64717 7.33318C8.94665 7.21954 9.26684 7.17071 9.58658 7.18993ZM9.58658 16.7765H26.3232C26.6429 16.7573 26.9631 16.8061 27.2626 16.9198C27.562 17.0334 27.834 17.2093 28.0605 17.4358C28.287 17.6623 28.4629 17.9343 28.5765 18.2337C28.6902 18.5332 28.739 18.8534 28.7198 19.1732C28.7397 19.4931 28.6913 19.8135 28.5779 20.1133C28.4645 20.4131 28.2886 20.6853 28.062 20.912C27.8353 21.1386 27.5631 21.3145 27.2633 21.4279C26.9635 21.5413 26.6431 21.5897 26.3232 21.5698H9.58658C9.26668 21.5897 8.94621 21.5413 8.64643 21.4279C8.34665 21.3145 8.07441 21.1386 7.84777 20.912C7.62113 20.6853 7.44527 20.4131 7.33186 20.1133C7.21844 19.8135 7.17006 19.4931 7.18993 19.1732C7.16716 18.8515 7.21334 18.5286 7.3254 18.2262C7.43745 17.9239 7.61279 17.6489 7.83968 17.4197C8.06658 17.1905 8.3398 17.0125 8.64106 16.8974C8.94233 16.7824 9.26469 16.733 9.58658 16.7525V16.7765ZM9.58658 26.3631H26.3232C26.9588 26.3631 27.5684 26.6156 28.0178 27.0651C28.4673 27.5145 28.7198 28.1241 28.7198 28.7597C28.7198 29.3954 28.4673 30.005 28.0178 30.4544C27.5684 30.9039 26.9588 31.1564 26.3232 31.1564H9.58658C8.95095 31.1564 8.34135 30.9039 7.8919 30.4544C7.44244 30.005 7.18993 29.3954 7.18993 28.7597C7.18993 28.1241 7.44244 27.5145 7.8919 27.0651C8.34135 26.6156 8.95095 26.3631 9.58658 26.3631ZM19.1732 40.723H9.58658C8.95095 40.723 8.34135 40.4705 7.8919 40.021C7.44244 39.5716 7.18993 38.962 7.18993 38.3263C7.18993 37.6907 7.44244 37.0811 7.8919 36.6317C8.34135 36.1822 8.95095 35.9297 9.58658 35.9297H19.1732C19.8088 35.9297 20.4184 36.1822 20.8678 36.6317C21.3173 37.0811 21.5698 37.6907 21.5698 38.3263C21.5698 38.962 21.3173 39.5716 20.8678 40.021C20.4184 40.4705 19.8088 40.723 19.1732 40.723Z"
                                        class="fill-neutral-600 dark:fill-neutral-500" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_94_6814">
                                        <rect width="40" height="52.3148" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>

                            <p class="mt-20 text-lg text-gray-800 dark:text-gray-300">Nueva Solicitud de <br /> Bienes/Servicios</p>
                        </a>
                    </div>

                    <div
                        class="p-6 mt-8 bg-white border-gray-200 rounded-lg shadow-lg shadow-zinc-300 dark:shadow-none dark:bg-zinc-800 dark:border-zinc-800">
                        <a href="{{ route('solicitudes.borradores') }}" class="text-right">

                            <svg xmlns="http://www.w3.org/2000/svg" width="47" height="49" viewBox="0 0 47 49"
                                fill="none">
                                <g clip-path="url(#clip0_94_6808)">
                                    <path
                                        d="M37.9971 -2.78144e-05H35.9943C35.7269 -0.016633 35.4591 0.0237945 35.2086 0.118573C34.9581 0.213352 34.7306 0.360315 34.5412 0.549714C34.3518 0.739113 34.2048 0.966619 34.11 1.21714C34.0152 1.46766 33.9748 1.73547 33.9914 2.00281V27.9996H39.9999V2.00281C40.016 1.7356 39.9752 1.46803 39.8802 1.21776C39.7853 0.967482 39.6383 0.740199 39.449 0.550915C39.2597 0.361632 39.0324 0.214652 38.7822 0.119682C38.5319 0.0247113 38.2643 -0.0160898 37.9971 -2.78144e-05Z"
                                        class="fill-neutral-600 dark:fill-neutral-500" />
                                    <path d="M33.998 31.9987V33.9982L36.999 40L39.9999 33.9982V31.9987H33.998Z"
                                        class="fill-neutral-600 dark:fill-neutral-500" />
                                    <path
                                        d="M26.0002 0H4.00567C2.9433 0 1.92444 0.422025 1.17323 1.17323C0.422025 1.92444 0 2.9433 0 4.00567L0 36.0043C0 37.0667 0.422025 38.0856 1.17323 38.8368C1.92444 39.588 2.9433 40.01 4.00567 40.01H26.0002C27.0625 40.01 28.0814 39.588 28.8326 38.8368C29.5838 38.0856 30.0058 37.0667 30.0058 36.0043V4.00567C30.0058 2.9433 29.5838 1.92444 28.8326 1.17323C28.0814 0.422025 27.0625 0 26.0002 0ZM15.986 33.9982H8.01135C7.48016 33.9982 6.97073 33.7872 6.59513 33.4115C6.21952 33.0359 6.00851 32.5265 6.00851 31.9953C6.00851 31.4641 6.21952 30.9547 6.59513 30.5791C6.97073 30.2035 7.48016 29.9925 8.01135 29.9925H16.0227C16.5539 29.9925 17.0633 30.2035 17.4389 30.5791C17.8145 30.9547 18.0255 31.4641 18.0255 31.9953C18.0255 32.5265 17.8145 33.0359 17.4389 33.4115C17.0633 33.7872 16.5539 33.9982 16.0227 33.9982H15.986ZM21.9945 25.9868H8.01135C7.48016 25.9868 6.97073 25.7758 6.59513 25.4002C6.21952 25.0246 6.00851 24.5152 6.00851 23.984C6.00851 23.4528 6.21952 22.9434 6.59513 22.5678C6.97073 22.1922 7.48016 21.9811 8.01135 21.9811H21.9978C22.529 21.9811 23.0384 22.1922 23.414 22.5678C23.7897 22.9434 24.0007 23.4528 24.0007 23.984C24.0007 24.5152 23.7897 25.0246 23.414 25.4002C23.0384 25.7758 22.529 25.9868 21.9978 25.9868H21.9945ZM21.9945 17.9755H8.01135C7.74401 17.9921 7.4762 17.9516 7.22568 17.8569C6.97516 17.7621 6.74765 17.6151 6.55825 17.4257C6.36885 17.2363 6.22189 17.0088 6.12711 16.7583C6.03233 16.5078 5.99191 16.24 6.00851 15.9726C5.99245 15.7054 6.03325 15.4378 6.12822 15.1876C6.22319 14.9373 6.37017 14.71 6.55945 14.5207C6.74874 14.3314 6.97602 14.1845 7.2263 14.0895C7.47657 13.9945 7.74414 13.9537 8.01135 13.9698H21.9978C22.265 13.9537 22.5326 13.9945 22.7829 14.0895C23.0332 14.1845 23.2604 14.3314 23.4497 14.5207C23.639 14.71 23.786 14.9373 23.881 15.1876C23.9759 15.4378 24.0167 15.7054 24.0007 15.9726C24.0208 16.2418 23.9829 16.5122 23.8897 16.7656C23.7965 17.019 23.65 17.2494 23.4603 17.4414C23.2705 17.6334 23.0417 17.7825 22.7895 17.8787C22.5372 17.9748 22.2673 18.0158 21.9978 17.9988L21.9945 17.9755ZM21.9945 9.96412H8.01135C7.74414 9.98018 7.47657 9.93938 7.2263 9.84441C6.97602 9.74944 6.74874 9.60246 6.55945 9.41317C6.37017 9.22389 6.22319 8.99661 6.12822 8.74633C6.03325 8.49606 5.99245 8.22848 6.00851 7.96128C5.99245 7.69407 6.03325 7.4265 6.12822 7.17623C6.22319 6.92595 6.37017 6.69867 6.55945 6.50938C6.74874 6.3201 6.97602 6.17312 7.2263 6.07815C7.47657 5.98318 7.74414 5.94238 8.01135 5.95844H21.9978C22.265 5.94238 22.5326 5.98318 22.7829 6.07815C23.0332 6.17312 23.2604 6.3201 23.4497 6.50938C23.639 6.69867 23.786 6.92595 23.881 7.17623C23.9759 7.4265 24.0167 7.69407 24.0007 7.96128C24.0242 8.23251 23.989 8.50563 23.8974 8.762C23.8058 9.01838 23.66 9.25197 23.4698 9.44685C23.2797 9.64172 23.0498 9.79328 22.7958 9.89119C22.5417 9.9891 22.2696 10.0311 21.9978 10.0142L21.9945 9.96412Z"
                                        class="fill-neutral-600 dark:fill-neutral-500" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_94_6808">
                                        <rect width="40" height="40" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>

                            <p class="mt-20 text-lg text-gray-800 dark:text-gray-300">Borradores </p>
                        </a>
                    </div>

                    <div
                        class="p-6 mt-8 bg-white border-gray-200 rounded-lg shadow-lg shadow-zinc-300 dark:shadow-none dark:bg-zinc-800 dark:border-zinc-800">
                        <a href="{{ route('solicitudes.list') }}" class="text-right">

                            <svg xmlns="http://www.w3.org/2000/svg" width="47" height="49" viewBox="0 0 47 49"
                                fill="none">
                                <g clip-path="url(#clip0_94_6803)">
                                    <path
                                        d="M23.8743 3.27356H3.67816C2.70265 3.27356 1.7671 3.66108 1.07731 4.35087C0.387519 5.04066 0 5.97621 0 6.95172L0 36.3341C0 37.3096 0.387519 38.2452 1.07731 38.935C1.7671 39.6247 2.70265 40.0123 3.67816 40.0123H23.8743C24.8498 40.0123 25.7854 39.6247 26.4752 38.935C27.165 38.2452 27.5525 37.3096 27.5525 36.3341V6.94559C27.5509 5.97114 27.1626 5.03716 26.473 4.3487C25.7834 3.66024 24.8488 3.27356 23.8743 3.27356ZM14.6789 34.492H7.35632C6.86857 34.492 6.40079 34.2982 6.0559 33.9533C5.711 33.6084 5.51724 33.1406 5.51724 32.6529C5.51724 32.1651 5.711 31.6973 6.0559 31.3524C6.40079 31.0076 6.86857 30.8138 7.35632 30.8138H14.7126C15.2004 30.8138 15.6682 31.0076 16.0131 31.3524C16.358 31.6973 16.5517 32.1651 16.5517 32.6529C16.5517 33.1406 16.358 33.6084 16.0131 33.9533C15.6682 34.2982 15.2004 34.492 14.7126 34.492H14.6789ZM20.1962 27.1356H7.35632C6.86857 27.1356 6.40079 26.9419 6.0559 26.597C5.711 26.2521 5.51724 25.7843 5.51724 25.2965C5.51724 24.8088 5.711 24.341 6.0559 23.9961C6.40079 23.6512 6.86857 23.4575 7.35632 23.4575H20.1992C20.687 23.4575 21.1548 23.6512 21.4997 23.9961C21.8446 24.341 22.0383 24.8088 22.0383 25.2965C22.0383 25.7843 21.8446 26.2521 21.4997 26.597C21.1548 26.9419 20.687 27.1356 20.1992 27.1356H20.1962ZM20.1962 19.7793H7.35632C7.11096 19.7941 6.86527 19.7566 6.63546 19.6694C6.40565 19.5822 6.19695 19.4472 6.02314 19.2734C5.84933 19.0996 5.71437 18.8909 5.62716 18.6611C5.53996 18.4313 5.50249 18.1856 5.51724 17.9402C5.50249 17.6949 5.53996 17.4492 5.62716 17.2194C5.71437 16.9896 5.84933 16.7809 6.02314 16.607C6.19695 16.4332 6.40565 16.2983 6.63546 16.2111C6.86527 16.1239 7.11096 16.0864 7.35632 16.1011H20.1992C20.4446 16.0864 20.6903 16.1239 20.9201 16.2111C21.1499 16.2983 21.3586 16.4332 21.5324 16.607C21.7062 16.7809 21.8412 16.9896 21.9284 17.2194C22.0156 17.4492 22.0531 17.6949 22.0383 17.9402C22.0563 18.1873 22.0212 18.4354 21.9354 18.6678C21.8496 18.9002 21.7151 19.1116 21.541 19.2878C21.3668 19.464 21.157 19.6009 20.9256 19.6894C20.6942 19.7779 20.4465 19.8158 20.1992 19.8008L20.1962 19.7793ZM20.1962 12.423H7.35632C7.11084 12.4382 6.86493 12.4011 6.63489 12.3141C6.40485 12.2271 6.19595 12.0921 6.02204 11.9182C5.84812 11.7443 5.71317 11.5354 5.62615 11.3053C5.53912 11.0753 5.50199 10.8294 5.51724 10.5839C5.50249 10.3385 5.53996 10.0929 5.62716 9.86304C5.71437 9.63323 5.84933 9.42453 6.02314 9.25072C6.19695 9.07691 6.40565 8.94195 6.63546 8.85475C6.86527 8.76754 7.11096 8.73008 7.35632 8.74482H20.1992C20.4446 8.73008 20.6903 8.76754 20.9201 8.85475C21.1499 8.94195 21.3586 9.07691 21.5324 9.25072C21.7062 9.42453 21.8412 9.63323 21.9284 9.86304C22.0156 10.0929 22.0531 10.3385 22.0383 10.5839C22.0582 10.8318 22.0244 11.0812 21.9395 11.3149C21.8545 11.5487 21.7202 11.7615 21.5458 11.9388C21.3714 12.1161 21.1609 12.2539 20.9285 12.3427C20.6962 12.4315 20.4475 12.4694 20.1992 12.4536L20.1962 12.423Z"
                                        class="fill-neutral-600 dark:fill-neutral-500" />
                                    <path
                                        d="M28.1195 1.27726e-06H7.9203C7.27131 0.00152113 6.63429 0.174725 6.07389 0.502031C5.51348 0.829336 5.04966 1.29909 4.72949 1.8636C4.87404 1.84771 5.01933 1.83952 5.16474 1.83908H25.367C26.3426 1.83908 27.2781 2.2266 27.9679 2.91639C28.6577 3.60618 29.0452 4.54173 29.0452 5.51724V34.8996C29.0449 35.534 28.8791 36.1574 28.564 36.708C29.4553 36.6003 30.2765 36.1703 30.8727 35.499C31.4689 34.8276 31.799 33.9614 31.8008 33.0636V3.67816C31.8008 3.19488 31.7055 2.71634 31.5205 2.26988C31.3354 1.82343 31.0642 1.41781 30.7224 1.07623C30.3805 0.734636 29.9747 0.463769 29.528 0.279104C29.0814 0.0944398 28.6028 -0.000401457 28.1195 1.27726e-06Z"
                                        class="fill-neutral-600 dark:fill-neutral-500" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_94_6803">
                                        <rect width="31.7946" height="40" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>

                            <p class="mt-20 text-lg text-gray-800 dark:text-gray-300">Estatus de <br /> Solicitudes</p>
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>

    @push('js')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                setInterval(getRejectionAlert, 10000); //Cada 10 segundo (30 mil milisegundos)
                setInterval(getAcceptanceAlert, 10000); //Cada 10 segundo (30 mil milisegundos)
                setInterval(getApprovedAlert, 10000); //Cada 10 segundo (30 mil milisegundos)
                setInterval(getVMProgressAlert, 10000); //Cada 10 segundo (30 mil milisegundos)
                setInterval(getRejectionAlertVale, 10000); //Cada 10 segundo (30 mil milisegundos)
            });

            // On window load
            window.onload = function() {
                localStorage.setItem("rejectionAlert", '');
                localStorage.setItem("acceptanceAlert", '');
                localStorage.setItem("approvedAlert", '');
                localStorage.setItem("VMProgressAlert", '');
                localStorage.setItem("rejectionAlertVale", '');
                getRejectionAlert();
                getAcceptanceAlert();
                getApprovedAlert();
                getVMProgressAlert();
                getRejectionAlertVale();
            }

            // On window unload
            window.onbeforeunload = function() {
                localStorage.removeItem("rejectionAlert");
                localStorage.removeItem("acceptanceAlert");
                localStorage.removeItem("approvedAlert");
                localStorage.removeItem("VMProgressAlert");
                localStorage.removeItem("rejectionAlertVale");
            };

            //Memorandums
            function getRejectionAlert() {

                var rejectionAlert = localStorage.getItem("rejectionAlert");

                $.get('api/rejectionAlert/{{ Auth::user()->id }}', function(data) {

                    if (rejectionAlert != '') {
                        data = JSON.stringify(data);

                        if (data != rejectionAlert) {

                            data = JSON.parse(data);
                            for (let i = 0; i < data.folios.length; i++) {
                                Livewire.dispatch('toastifyAlert', [`${data.folios[i]} ha sido Rechazada`,
                                    `/solicitudes/${data.folios[i]}`, '#F05252', 10000, 'bottom', 'right'
                                ]);
                            }
                            data = JSON.stringify(data);
                            localStorage.setItem("rejectionAlert", data);
                        }

                    } else {

                        for (let i = 0; i < data.folios.length; i++) {
                            Livewire.dispatch('toastifyAlert', [`${data.folios[i]} ha sido Rechazada`,
                                `/solicitudes/${data.folios[i]}`, '#F05252', 10000, 'bottom', 'right'
                            ]);
                        }
                        data = JSON.stringify(data);
                        localStorage.setItem("rejectionAlert", data);
                    }

                });
            }

            function getAcceptanceAlert() {

                var acceptanceAlert = localStorage.getItem("acceptanceAlert");

                $.get('api/acceptanceAlert/{{ Auth::user()->id }}', function(data) {

                    if (acceptanceAlert != '') {
                        data = JSON.stringify(data);

                        if (data != acceptanceAlert) {

                            data = JSON.parse(data);
                            for (let i = 0; i < data.folios.length; i++) {
                                @if (Auth::user()->hasAnyRole(['N7:GS:17A', 'N6:17A']))
                                    Livewire.dispatch('toastifyAlert', [
                                        `${data.folios[i]} ha sido Validada por Unidad de Sucursales`,
                                        `/solicitudes/${data.folios[i]}`, '#5682C2', 10000, 'bottom', 'right'
                                    ]);
                                @endif
                            }
                            data = JSON.stringify(data);
                            localStorage.setItem("acceptanceAlert", data);
                        }

                    } else {

                        for (let i = 0; i < data.folios.length; i++) {

                            @if (Auth::user()->hasAnyRole(['N7:GS:17A', 'N6:17A']))
                                Livewire.dispatch('toastifyAlert', [
                                    `${data.folios[i]} ha sido Validada por Unidad de Sucursales`,
                                    `/solicitudes/${data.folios[i]}`, '#5682C2', 10000, 'bottom', 'right'
                                ]);
                            @endif
                        }
                        data = JSON.stringify(data);
                        localStorage.setItem("acceptanceAlert", data);
                    }

                });
            }

            function getApprovedAlert() {

                var approvedAlert = localStorage.getItem("approvedAlert");

                $.get('api/approvedAlert/{{ Auth::user()->id }}', function(data) {

                    if (approvedAlert != '') {
                        data = JSON.stringify(data);

                        if (data != approvedAlert) {

                            data = JSON.parse(data);
                            for (let i = 0; i < data.folios.length; i++) {
                                Livewire.dispatch('toastifyAlert', [
                                    `${data.folios[i]} ha sido Aprobada por Servicos Generales`,
                                    `/solicitudes/${data.folios[i]}`, '#0b8750', 10000, 'bottom', 'right'
                                ]);
                            }
                            data = JSON.stringify(data);
                            localStorage.setItem("approvedAlert", data);
                        }

                    } else {

                        for (let i = 0; i < data.folios.length; i++) {
                            Livewire.dispatch('toastifyAlert', [
                                `${data.folios[i]} ha sido Aprobada por Servicos Generales`,
                                `/solicitudes/${data.folios[i]}`, '#0b8750', 10000, 'bottom', 'right'
                            ]);
                        }
                        data = JSON.stringify(data);
                        localStorage.setItem("approvedAlert", data);
                    }

                });
            }


            function getVMProgressAlert() {

                var VMProgressAlert = localStorage.getItem("VMProgressAlert");

                $.get('api/VMProgressAlert/{{ Auth::user()->id }}', function(data) {

                    if (VMProgressAlert != '') {
                        data = JSON.stringify(data);

                        if (data != VMProgressAlert) {

                            data = JSON.parse(data);
                            for (let i = 0; i < data.folios.length; i++) {
                                Livewire.dispatch('toastifyAlert', [
                                    `El Vale de ${data.folios[i]} ha Progresado`,
                                    `/solicitudes/${data.folios[i]}`, '#DB2777', 10000, 'bottom', 'right'
                                ]);
                            }
                            data = JSON.stringify(data);
                            localStorage.setItem("VMProgressAlert", data);
                        }

                    } else {

                        for (let i = 0; i < data.folios.length; i++) {
                            Livewire.dispatch('toastifyAlert', [
                                `El Vale de ${data.folios[i]} ha Progresado`,
                                `/solicitudes/${data.folios[i]}`, '#DB2777', 10000, 'bottom', 'right'
                            ]);
                        }
                        data = JSON.stringify(data);
                        localStorage.setItem("VMProgressAlert", data);
                    }

                });
            }

            function getRejectionAlertVale() {
                var rejectionAlertVale = localStorage.getItem("rejectionAlertVale");

                $.get('api/rejectionAlertVale/{{ Auth::user()->id }}', function(data) {
                    if (rejectionAlertVale != '') {
                        data = JSON.stringify(data);

                        if (data != rejectionAlertVale) {
                            data = JSON.parse(data);
                            data.folios.forEach(folio => {
                                if (folio.type === 'folio_solicitud') {
                                    Livewire.dispatch('toastifyAlert', [`${folio.value} ha sido Rechazada`,
                                        `/solicitudes/${folio.value}`, '#F05252', 10000, 'bottom',
                                        'right'
                                    ]);
                                }
                            });
                            data = JSON.stringify(data);
                            localStorage.setItem("rejectionAlertVale", data);
                        }
                    } else {
                        data.folios.forEach(folio => {
                            if (folio.type === 'folio_solicitud') {
                                Livewire.dispatch('toastifyAlert', [`${folio.value} ha sido Rechazada`,
                                    `/solicitudes/${folio.value}`, '#F05252', 10000, 'bottom', 'right'
                                ]);
                            }
                        });
                        data = JSON.stringify(data);
                        localStorage.setItem("rejectionAlertVale", data);
                    }
                });
            }
        </script>
    @endpush

</x-app-layout>
